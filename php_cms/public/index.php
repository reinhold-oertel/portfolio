<?php

session_start();

// Durch die Einbindung wird ein Container Objekt (in $container) verfügbar gemacht, mit dem 
// über die Methode: make($name) alle benötigten Repositorys, Controller und das Datenbank - handle
// bereitgestellt werden. Kurzum, das Framework wird geladen.

require __DIR__ . "/../init.php";   


// Hintergrund Info: Einer php-Datei können auch per "/" Parameter übergeben werden,
// die dann im $_Server-Array unter PATH_INFO abgefragt werden.
// ...zusätzlich können weitere Paraeter via url..?[parameter] übergeben werden. 


$pathInfo = $_SERVER['PATH_INFO'];

// routing:
//
$routes = [
  '/index' => [
    'controller' => 'contentController',
    'method' => 'index'
  ],
  '/perform-setup' => [
    'controller' => 'setupController',
    'method' => 'setup'
  ], 
  '/setup' => [
    'controller' => 'setupController',
    'method' => 'show'
  ],

  '/login' => [
    'controller' => 'loginController',
    'method' => 'login'
  ],
  '/dashboard' => [
    'controller' => 'loginController',
    'method' => 'dashboard'
  ],
  '/logout' => [
    'controller' => 'loginController',
    'method' => 'logout'
  ],
  '/posts-admin' => [
    'controller' => 'postsAdminController',
    'method' => 'index'
  ],
  '/posts-edit' => [
    'controller' => 'postsAdminController',
    'method' => 'edit'
  ],
];

if (isset($routes[$pathInfo])) {
  $route = $routes[$pathInfo];    // das info-aray der jeweiligen route wird auslesen
  $controller = $container->make($route['controller']); //
  $method = $route['method'];
  $controller->$method();
}


/*
if ($pathInfo == "/index") {
  $postsController = $container->make("postsController");
  $postsController->index();
} elseif ($pathInfo == "/post") {
  $postsController = $container->make("postsController");
  $postsController->show();
}
*/
?>
