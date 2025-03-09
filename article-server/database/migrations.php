<?php
require("../connection/connection.php");


// sql to create table
$sqlUser = "CREATE TABLE IF NOT EXISTS users (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(150) NOT NULL,
email VARCHAR(50) UNIQUE NOT NULL,
password VARCHAR(255) NOT NULL
)";

$query = $mysqli->prepare($sqlUser);
$query->execute();

$sqlQuest = "CREATE TABLE IF NOT EXISTS Questions (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  userId INT(6),
  question TEXT NOT NULL,
  answer TEXT NOT NULL
  )";

$query = $mysqli->prepare($sqlQuest);
$query->execute();
