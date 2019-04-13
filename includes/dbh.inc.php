<?php
/* Database Handler (DBH) */
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "quizappdb";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
}