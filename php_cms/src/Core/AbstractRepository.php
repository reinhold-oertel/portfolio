<?php

namespace App\Core;

use PDO;

abstract class AbstractRepository
{

  protected $pdo; // nur Zugriff durch Eltern & abgeleitete Klassen.

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  abstract public function getTableName(); // liefert den Namen der zu verwendenden Tabelle (implementiert in der Kindklasse)

  abstract public function getModelName(); // liefert einen String mit namen (+ namespace) der Klasse für die Datenobjekte (implementiert in der Kindklasse)

  // holt alle Datensätze aus der entsprechenden Tabelle und gibt ein array aus Datenobjekten zurück
  function all()
  {   
     $table = $this->getTableName();
     $model = $this->getModelName();
     $stmt = $this->pdo->query("SELECT * FROM `$table`");     // gibt ein PDOStatement zurück, mit dem die Daten geholt werden können
     $posts = $stmt->fetchAll(PDO::FETCH_CLASS, $model);      // wandelt alle resultierende Datensätze in Objekte um, die in einem array zurück kommen.
     return $posts;
  }

// liefert das Datenobjekt eines posts mit einer bestimmten id
  function find($id)
  {
    $table = $this->getTableName();
    $model = $this->getModelName();
    $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE id = :id"); // gibt ein PDOStatement zurück, mit dem die Daten geholt werden können
    $stmt->execute(['id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
    $post = $stmt->fetch(PDO::FETCH_CLASS);

    return $post;
  }
}
 ?>
