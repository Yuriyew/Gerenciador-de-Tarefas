<?php 

if(!isset($_SESSION)){
    session_start();
}
session_destroy();

header("Location: ../Estaciositev2/index.php");

?>