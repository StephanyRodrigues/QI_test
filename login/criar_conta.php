<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users ( username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$username, $password])) {
        $_SESSION['msg'] = "Conta criada com sucesso!";
                header("Location: login.php");
                exit();
    } else { 
        $_SESSION['msg'] = "Erro ao criar conta: " ;

    } 
    $conn->close();
} 
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
</head>
<body>
    <h2>Criar Conta</h2>
    <?php
    if (isset($_SESSION['msg'])) {
        echo "<p>" . $_SESSION['msg'] . "</p>";
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" name="username" id="usuario" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="password" id="senha" required><br><br>

        <input type="submit" value="Registrar">

    </form>
</body>
</html>
