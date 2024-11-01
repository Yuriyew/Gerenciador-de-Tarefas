<?php
session_start();
include("../Estaciositev2/conexao.php"); 

if (isset($_POST["email"]) && isset($_POST["senha"])) {
    if (strlen($_POST["email"]) == 0) {
        $errorMsg = "Preencha seu e-mail";
    } else if (strlen($_POST["senha"]) == 0) {
        $errorMsg = "Preencha sua senha";
    } else {
      
        $email = $mysqli->real_escape_string($_POST["email"]);
        $senha = $mysqli->real_escape_string($_POST["senha"]);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code);

        if ($sql_query === false) {
            die("Erro na execução da consulta: " . $mysqli->error);
        }

        $quantidade = $sql_query->num_rows;
        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: painel.php");
            exit;
        } else {
            $errorMsg = "Falha ao logar";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($errorMsg)) { echo "<div class='error'>$errorMsg</div>"; } ?>
    <form action="" method="POST">
        <p>
            <label for="">E-mail</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label for="">Senha</label>
            <input type="password" name="senha" required>
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>
