<?php

require __DIR__ . "/autoload.php";

function e($str)
{
	return htmlentities($str, ENT_QUOTES, 'UTF-8');
}


/*
Die Datei stellt eine (globale) Instanz des Container zur Verfügung ...
*/
$container = new App\Core\Container();




















// testspielwiese


/*
try {
	$my_pdo = new PDO('mysql:host=localhost;charset=utf8','root', NULL);

} catch (PDOException $e) {

	echo "{$e->getMessage()}";
	die;
}

$myQuery=$my_pdo->query("create database if not exists tinycms");
echo "erstelle Datenbank: {$myQuery->errorCode()} <br>";
$myQuery=$my_pdo->query("create user if not exists 'tinycms'@'localhost' identified by 'XFl5LWTP3gNzp378'");
echo "erstelle User: {$myQuery->errorCode()}";
$myQuery=$my_pdo->query("grant usage on *.* to 'tinycms'@'localhost' identified by 'XFl5LWTP3gNzp378'");
echo "{$myQuery->errorCode()} <br>";
$myQuery=$my_pdo->query("grant all privileges on tinycms.* to 'tinycms'@'localhost'");
echo "setze Rechte: {$myQuery->errorCode()}";
$myQuery=$my_pdo->query("flush privileges");
echo "{$myQuery->errorCode()} <br>";
$myQuery=$my_pdo->query("CREATE TABLE if not exists `tinycms`.`contactData` ( `id` INT(10) NOT NULL AUTO_INCREMENT ,
	`headline` VARCHAR(255) NOT NULL ,
	`contactPerson` VARCHAR(255) NOT NULL ,
	`role` VARCHAR(255) NOT NULL ,
	`phoneNumber1` VARCHAR(255) NOT NULL ,
	`phoneNumber2` VARCHAR(255) NOT NULL , 
	`email` VARCHAR(255) NOT NULL ,
	`address` TEXT NOT NULL , 
	PRIMARY KEY (`id`)) ENGINE = InnoDB");
echo "erstelle Tabellen: {$myQuery->errorCode()}";
$myQuery=$my_pdo->query("CREATE TABLE if not exists `tinycms`.`users` ( `id` INT(10) NOT NULL AUTO_INCREMENT ,
	`password` VARCHAR(255) NOT NULL ,
	`username` VARCHAR(255) NOT NULL , 
	PRIMARY KEY (`id`)) ENGINE = InnoDB;");
echo "{$myQuery->errorCode()} <br>";

$myQuery=$my_pdo->query("SELECT * FROM `tinycms`.`users` WHERE `username` = 'test'");
$result=$myQuery->fetchAll();

if (empty($result)) {

	$pswd=password_hash('test',PASSWORD_DEFAULT);
	$stmt=$my_pdo->query("INSERT INTO `tinycms`.`users` (`id`, `password`, `username`) 
	VALUES (NULL, '$pswd', 'test')");
	echo "TestUser - Dashboard anlegen {$stmt->errorCode()} <br>";
}

for ($i = 1; $i <= 2; $i++) {
$stmt=$my_pdo->query("INSERT INTO `tinycms`.`contactData` 
(`id`, `headline`, `contactPerson`, `role`, `phoneNumber1`, `phoneNumber2`, `email`, `address`) 
VALUES (NULL, 'MusterKontakt', 
	'Max Mustermann', 
	'Manager', 
	'+49 1 234', 
	'+49 5 678', 
	'email@host.domain', 
	'eine Strasse nr\r\nPLZ Ort')");

echo "Dummy Datensatz anlegen {$stmt->errorCode()} <br>";
}

die;
*/

?>
