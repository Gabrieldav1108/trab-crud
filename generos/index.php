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
        require '../db_connection.php';
        require'../protege.php';
    ?>
<?php

if (isset($_SESSION['mensagem_sucesso'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
        . $_SESSION['mensagem_sucesso'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['mensagem_sucesso']);
}

if (isset($_SESSION['mensagem_erro'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
        . $_SESSION['mensagem_erro'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['mensagem_erro']);
}
?>
    <div class="container border border-1 border-dark rounded p-4 my-4 shadow">
        <a href="./create.php" class="btn btn-dark mb-2">Adicionar novo gênero</a>
        <a href="../filmes/index.php" class="btn btn-dark mb-2">Filmes</a>
        <ul class="list-group">
            <?php 
                if ($con) {
                    $sql = "SELECT * FROM generos ORDER BY genero";
                    $generos = mysqli_query($con, $sql);

                    foreach ($generos as $genero) {
                        echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                        echo "<a href='#'>" . htmlspecialchars($genero['genero']) . "</a>";

                        echo "<span class='d-flex'>";
                        echo "<a href='edit.php?id=" . $genero['id'] . "' class='btn btn-primary btn-sm me-2'>Editar</a>";
                        echo "<a href='delete.php?id=" . $genero['id'] . "' class='btn btn-danger btn-sm'>Deletar</a>";
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