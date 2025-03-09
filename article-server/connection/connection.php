<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "article_db";

$mysqli = new mysqli($host, $user, $password, $db_name);

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
