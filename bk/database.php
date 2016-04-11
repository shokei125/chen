<?php
// database.php
$db_name = "chen";
$user = "root";
$pass = "77";
$host = "localhost";
$dsn = "mysql:dbname={$db_name};host={$host}";

// use PDO to connect MYSQL
try {
	$pdo = new PDO($dsn,$user,$pass);
}catch (PDOException $e){
	echo "error";
	echo $e->getMessage();
	return;
}
//var_dump($pdo);