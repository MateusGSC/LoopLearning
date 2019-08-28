<?php
define("BASE", "http://localhost/LoopLearning/");
$server = "localhost";
$dbname = "looplearning";
$user = "root";
$password = "";

global $pdo;

try {
	$pdo = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8",$user,$password);
} catch (PDOException $erro) {
	echo $erro->getMessage();
	exit;
}