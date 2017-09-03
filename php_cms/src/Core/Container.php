<?php

namespace App\Core; 
//  legt einen name-space für die vorliegende Datei an.

use PDO; // importiert andere Name-spaces -- Die Klassen können auch umbenannt werden mit: use PDO as myPDO;
use Exception;
use PDOException;

use App\Content\ContentRepository;     // App\..\.. wegen psr-4 autoloading...dort muss die Ordnerstruktur der Quellcode-dateien nicht den name-spaces entsprechen..
use App\Content\CommentsRepository;  // letzlich werden die namespaces im autoloader auf Pfade der source-dateien abgebildet, wo dann automatisch required werden
use App\Content\ContentController;
use App\Content\PostsAdminController;
use App\User\UsersRepository;
use App\User\LoginController;
use App\User\LoginService;

 /*
    Hier wird an zentraler Stelle die Funktionalität bereitgestellt, um Instanzen 
    aller verwendeten Klassen zu erzeugen. 
    Einerseits kann so an einem Ort geändert werden, wie die Instanz erstellt wird,
    andererseits kann ggf. eine bestimmte Instanz zurückgegeben werden anstatt
    jedes Mal, wenn ein bestimmtes Objekt gebraucht wird, eine neue Instanz zu erstellen. 
    Darüber hinaus können bequem Objekte ertstellt oder übergeben werden, die Voraussetzung 
    für die Konstruktion anderer Objekte sind. Bsp. Datenbank-handle für den Aufbau des Post-Repository ...
    und es werden die Objekte erst erstellt, wenn sie wirklich gebraucht werden.
 */

    class Container
    {

      private $receipts = [];
      private $instances = [];

      public function __construct()
      {
        $this->receipts = [
        'setupController' => function() {
          return new setupController();
        },
        'postsAdminController' => function() {
          return new PostsAdminController($this->make("contentRepository"), $this->make("loginService") );
        },
        'loginService' => function() {
          return new LoginService(
            $this->make("usersRepository")
            );
        },
        'loginController' => function() {
          return new LoginController(
            $this->make("loginService")
            );
        },
        'contentController' => function() {
          return new ContentController(
            $this->make('contentRepository')
          // $this->make('commentsRepository')    // keine Verwendung für Komentare erstmal
            );
        },
        'contentRepository' => function() {
          return new ContentRepository(
            $this->make("pdo")
            );
        },
        'usersRepository' => function() {
          return new UsersRepository(
            $this->make("pdo")
            );
        },
        'commentsRepository' => function() {
          return new CommentsRepository(
            $this->make("pdo")
            );
        },
        'pdo' => function() {
          try {
            $pdo = new PDO(
              'mysql:host=localhost;dbname=tinycms;charset=utf8',
              'tinycms',
              'XFl5LWTP3gNzp378'
              );
          } catch (PDOException $e) {
            echo "Verbindung zur Datenbank fehlgeschlagen <br> Fehlermeldung der Datenbank: ";
            echo "{$e->getMessage()}";
            die();
          }
        /* 
          :: -->  ein Kürzel, das Zugriff auf statische, konstante und überschriebene Member oder Methoden einer Klasse erlaubt. 
          setAttribute --> Sets an attribute on the database handle. Here: disables emulation of prepared statements. 
          It will always fall back to emulating the prepared statement if the driver cannot successfully prepare the current query. 
          charset=utf8 im PDO Konstruktor --> relevant gegen SQL Injections --> damit steht dies alles im Zusammenhang
          Weiteres: https://stackoverflow.com/questions/134099/are-pdo-prepared-statements-sufficient-to-prevent-sql-injection/12202218#12202218
        
        'mysql:host=localhost;dbname=slim_cms;charset=utf8',
            'slim_cms',
            'XFl5LWTP3gNzp377'

        */
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $pdo;
          }
          ];
        }

        public function make($name)
        {
    // prüft ob eine Instanz bereits existiert und gibt diese ggf. zurück.
          if (!empty($this->instances[$name]))
          {
            return $this->instances[$name];
          }

    // prüft, ob es eine Rezeptfunktion gibt, führt sie aus und schreibt die Rückgabe in das "instances" array.
          if (isset($this->receipts[$name])) {
            $this->instances[$name] = $this->receipts[$name](); 
          }

          return $this->instances[$name];
        }

} // ende class container

?>
