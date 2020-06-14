<?php
$dbhost = $_SERVER['database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com'];
$dbport = $_SERVER['3306'];
$dbname = $_SERVER['database-1'];
$charset = 'utf8' ;

$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";$username = $_SERVER['admin'];
$password = $_SERVER['whysoserious'];
$pdo = new PDO($dsn, $admin, $whysoserious);
echo "hello world"; 

?>