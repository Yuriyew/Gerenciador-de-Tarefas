<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM tarefas WHERE id = $id";
    if ($mysqli->query($sql)) {
        header("Location: painel.php");
        exit;
    } else {
        echo "Erro: " . $mysqli->error;
    }
}
?>
