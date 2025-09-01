<?php
session_start();
require_once '../db_connection.php';
require_once '../protege.php';

$id_genero = $_GET["id"] ?? null;

if (!$id_genero) {
    $_SESSION['mensagem_erro'] = "ID do gênero inválido para exclusão.";
    header("Location: index.php");
    exit();
}

$sql = "DELETE FROM generos WHERE id = $id_genero";

if (mysqli_query($con, $sql)) {
    $_SESSION['mensagem_sucesso'] = "Gênero excluído com sucesso!";
} else {
    $_SESSION['mensagem_erro'] = "Houve um erro ao excluir o gênero.";
}

header("Location: index.php");
exit();
