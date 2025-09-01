<?php
session_start();
require_once '../db_connection.php';
require_once '../protege.php';

// Verificar se o ID foi passado
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['mensagem_erro'] = "ID do filme inválido para exclusão.";
    header("Location: index.php");
    exit();
}

$id_filme = (int) $_GET['id'];

$sql = "DELETE FROM filmes WHERE id = $id_filme";

if (mysqli_query($con, $sql)) {
    $_SESSION['mensagem_sucesso'] = "Filme excluído com sucesso!";
} else {
    $_SESSION['mensagem_erro'] = "Houve um erro ao excluir o filme.";
}

header("Location: index.php");
exit();
