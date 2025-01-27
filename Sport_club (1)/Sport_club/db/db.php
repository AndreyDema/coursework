<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportclub";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Ошибка подключения:" . $conn->conect_error);
}