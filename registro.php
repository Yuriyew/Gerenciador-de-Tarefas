<?php
include("../Estaciositev2/conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = ($_POST['senha']);

    if (empty($nome) || empty($email) || empty($_POST['senha'])) {
        $errorMsg = "Todos os campos devem ser preenchidos.";
    } else {
        
        $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if ($mysqli->query($sql_code)) {
            header("Location: login.php");
            exit;
        } else {
            $errorMsg = "Erro ao cadastrar: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../Estaciositev2/css/register.css">
</head>
<body>
    
    <div id="background">
        
        <video autoplay loop muted>
            <source src="../Estaciositev2/img/Newts_final.mp4" type="video/mp4">
        </video>
    </div>  
    <h1>Cadastro</h1>
    <?php if (isset($errorMsg)) { echo "<div class='error'>$errorMsg</div>"; } ?>
    <form action="" method="POST">
        <p>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>
        </p>
        <p>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
        </p>
        <p>
            <button type="submit">Cadastrar</button>
            
        </p>
    </form>
</body>
</html>
