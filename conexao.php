<?php
$database = "login";
$host = "localhost";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    echo "Falha ao conectar ao banco de dados: " . $mysqli->connect_error;
} else {
    echo "";
}


;
?>
