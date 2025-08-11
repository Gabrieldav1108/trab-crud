<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Adicionar</title>
</head>
<body>
    <?php
        require_once '../../db_connection.php';
        $generos = $con->query("SELECT * FROM generos ORDER BY genero");
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <a href="" class="btn btn-primary">Sair</a>
        </div>
    </nav>
    <div class="container border border-1 border-dark rounded p-4 my-4 shadow">
        <h1>Novo Gênero</h1>

        <form action="proc_form.php" method="post">
            <?php if (isset($_GET['id'])) : ?>
                <input type="hidden" name="id_genero" value="<?php echo $_GET['id']; ?>">
            <?php endif; ?>
            
            <div class="column mb-3">
                <div class="col-9">
                    <label for="genero" class="form-label">Gênero:</label>
                    <input 
                        autofocus
                        type="text" 
                        name="genero" 
                        class="form-control" 
                        value="<?php echo isset($genero) ? htmlspecialchars($genero) : ''; ?>"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <?php echo isset($_GET['id']) ? 'Atualizar' : 'Adicionar'; ?>
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>