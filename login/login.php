<?php
require 'conexao.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo "Login realizado com sucesso!";
    } else {
        echo "Usuário ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./style.css" />
</head>
<body>
    <div class="page">
        <form action="menu_inicial_qi.html" method="POST" class="formLogin">
            <h1>Login</h1>
            <p>Sign in with</p>
            <label for="username">Usuário</label>
            <input type="text" name="username"  placeholder="" autofocus="true" >
            <p></p><label for="password">Senha</label>
            <input type="password" name="password" placeholder="" "> </p>
            <a href="recuperacao_senha">Esqueci minha senha</a>
            <a href="criar_conta.php">Cadastrar</a>
            <input type="submit" value="Login" class="btn" />
        </form>
    </div> 
    <p aling="left"> <br> 2024. QUEM_INDICA. </br> <a href="c:\QUEM_INDICA\creditos.pdf" style="color: rgb(86, 36, 180)">CREDITOS | 
        <a href="termos-de-privacidade.pdf" style="color: rgb(86, 36, 180)">TERMOS DE PRIVACIDADE </p>
</body>
</html>


