<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Instruções de recuperação de senha foram enviadas.";
    } else {
        echo "Usuário não encontrado.";
    }
}
?>

<form method="POST">
    Usuário: <input type="text" name="username" required>
    <input type="submit" value="Recuperar Senha">
</form>
