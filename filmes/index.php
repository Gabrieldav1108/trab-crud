<?php
    require_once '../db_connection.php';
    require_once '../protege.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
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
        <a href="./create.php" class="btn btn-dark mb-2">Adicionar nova série</a>
        <a href="../generos/index.php" class="btn btn-dark mb-2">Gêneros</a>

        <?php 
            if ($con) {
                $sql = "SELECT f.id, f.titulo, f.diretor, g.genero AS genero,
                    f.duracao, f.lancamento, f.plataforma
                    FROM filmes f
                    JOIN generos g ON f.genero = g.id
                    ORDER BY f.titulo";

                        
                $filmes = mysqli_query($con, $sql);

                if (mysqli_num_rows($filmes) > 0) {
                    echo "<table class='table table-striped table-hover'>";
                    echo "<thead class='table-dark'>";
                    echo "<tr>
                            <th>Título</th>
                            <th>Diretor</th>
                            <th>Gênero</th>
                            <th>Duração (min)</th>
                            <th>Lançamento</th>
                            <th>Plataforma</th>
                            <th>Ações</th>
                          </tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    
                    foreach ($filmes as $filme) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($filme['titulo']) . "</td>";
                        echo "<td>" . htmlspecialchars($filme['diretor']) . "</td>";
                        echo "<td>" . htmlspecialchars($filme['genero']) . "</td>";
                        echo "<td>" . $filme['duracao'] . "</td>";
                        echo "<td>" . $filme['lancamento'] . "</td>";
                        echo "<td>" . htmlspecialchars($filme['plataforma']) . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $filme['id'] . "' class='btn btn-primary btn-sm me-2'>Editar</a>
                                <a href='delete.php?id=" . $filme['id'] . "' class='btn btn-danger btn-sm'>Deletar</a>
                              </td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p class='text-muted'>Nenhum filme/série cadastrado.</p>";
                }
            }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
