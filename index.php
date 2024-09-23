<?php
include_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $database = new Database();
    $db = $database->connect();

    $usuario = new Usuario($db);

    if ($usuario->login($email, $senha)) {
        // Login bem-sucedido
        session_start();
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['nome'] = $usuario->nome;
        header('Location: index.php');
    } else {
        // Login falhou
        $erro = "Email ou senha incorretos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Estoque</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
    <h2>Login</h2>
        <?php if (isset($erro)): ?>
            <p style="color: red;"><?= $erro ?></p>
        <?php endif; ?>
        <form action="admin/dashboard.php" method="POST">
            <div class="form-group">
                <label for="email"><i class="fa-solid fa-user"></i></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha"><i class="fa-solid fa-lock"></i></label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
    </div>
</body>
</html>
