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

$sql = "SELECT * FROM filmes WHERE id = $id";
$resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $filme = mysqli_fetch_assoc($resultado);
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
    <h1>Editar Série</h1>

    <form action="proc_form.php" method="POST">
        <input type="hidden" name="id_filme" value="<?= $filme['id'] ?>">

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input 
                type="text" 
                name="titulo" 
                class="form-control" 
                value="<?= htmlspecialchars($filme['titulo']) ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor:</label>
            <input 
                type="text" 
                name="diretor" 
                class="form-control" 
                value="<?= htmlspecialchars($filme['diretor']) ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="genero_id" class="form-label">Gênero:</label>
            <select name="genero_id" class="form-select" required>
                <option value="">Selecione um gênero</option>
                <?php 
                // Resetar o ponteiro para garantir que vamos percorrer todos os resultados
                $generos_query->data_seek(0);
                while ($genero = $generos_query->fetch_assoc()): 
                ?>
                    <option value="<?= $genero['id'] ?>" 
                        <?= ($filme['genero_id'] == $genero['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($genero['genero']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração (em minutos):</label>
            <input 
                type="number" 
                name="duracao" 
                class="form-control" 
                value="<?= $filme['duracao'] ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="lancamento" class="form-label">Data de lançamento:</label>
            <input 
                type="date" 
                name="lancamento" 
                class="form-control" 
                value="<?= $filme['lancamento'] ?>" 
                required>
        </div>

        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma:</label>
            <input 
                type="text" 
                name="plataforma" 
                class="form-control" 
                value="<?= htmlspecialchars($filme['plataforma']) ?>" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>