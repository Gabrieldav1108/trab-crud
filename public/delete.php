<?php 
require_once '../db_connection.php';
$id_filme = $_GET["id"];

$sql = "DELETE FROM filmes WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_filme);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>
        alert('Filme deletado com sucesso');
        window.location.href = 'index.php';
    </script>";
}else{
    echo "<script>
        alert('Erro ao deletar o filme');
        window.location.href = 'index.php';
    </script>";
}