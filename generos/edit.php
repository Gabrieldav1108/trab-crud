<?php
require_once '../db_connection.php';
require_once '../protege.php';

if (!$con) {
    die("Não foi possível conectar com o banco de dados");
}

// Buscar todos os gêneros do banco de dados
$generos_query = $con->query("SELECT id, genero FROM generos ORDER BY genero");
if (!$generos_query) {
    die("Erro ao buscar gêneros: " . $con->error);
}

$id = $_GET['id'] ?? null;
if (!$id) {
    header("location: index.php");
    exit;
}

$sql = "SELECT * FROM generos WHERE id = $id";
$resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $genero = mysqli_fetch_assoc($resultado);
} else {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Série</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Home</a>
        <a href="#" class="btn btn-primary">Sair</a>
    </div>
</nav>

<div class="container border border-1 border-dark rounded p-4 my-4 shadow">
    <h1>Editar Gênero</h1>

    <form action="proc_form.php" method="POST">
        <input type="hidden" name="id_genero" value="<?= $genero['id'] ?>">

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero:</label>
            <input 
                type="text" 
                name="genero" 
                class="form-control" 
                value="<?= htmlspecialchars($genero['genero']) ?>" 
                required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>