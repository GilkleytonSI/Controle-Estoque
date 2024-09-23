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
        <form action="dashboard.html" method="post">
            <div class="form-group">
                <label for="username"><i class="fa-solid fa-user"></i></label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password"><i class="fa-solid fa-lock"></i></label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Entrar</button>
        </form>
        <div class="login-footer">
            <p>Esqueceu a senha? <a href="#">Clique aqui</a></p>
            <p>Não tem uma conta? <a href="#">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>
