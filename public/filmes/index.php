<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <?php
        require_once '../../db_connection.php';
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <a href="" class="btn btn-primary">Sair</a>
        </div>
    </nav>
    <div class="container border border-1 border-dark rounded p-4 my-4 shadow">
        <a href="./create.php" class="btn btn-dark mb-2">Adicionar nova serie</a>
        <a href="../generos/index.php" class="btn btn-dark mb-2">Generos</a>
        <ul class="list-group">
            <?php 
                if ($con) {
                    $sql = "SELECT * FROM filmes ORDER BY titulo";
                    $filmes = mysqli_query($con, $sql);

                    foreach ($filmes as $filme) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                        echo "<a href='#'>" . htmlspecialchars($filme['titulo']) . "</a>";

                        echo "<span class='d-flex'>";
                        echo "<a href='edit.php?id=" . $filme['id'] . "' class='btn btn-primary btn-sm me-2'>Editar</a>";
                        echo "<a href='delete.php?id=" . $filme['id'] . "' class='btn btn-danger btn-sm'>Deletar</a>";
                        echo "</span>";

                        echo "</li>";
                    }
                }
            ?>
        </ul>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>