<?php

$host = 'localhost';
$dbname = 'attack-on-titan';
$dbuser = 'root';
$dbpass = "";

$db = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);

if(!$db) {
    echo "fail";
}

?>
