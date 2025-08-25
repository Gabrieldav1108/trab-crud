<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        </div>
    </nav>

    <div class="container border border-1 border-dark rounded p-4 my-5 shadow" style="max-width: 400px;">
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST" action="valida_login.php">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário ou e-mail</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <?php if (isset($_SESSION["erro"])): ?>
                <div class="alert alert-danger py-2 my-2">
                    <?= $_SESSION["erro"] ?>
                </div>
                <?php unset($_SESSION["erro"]); ?>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
