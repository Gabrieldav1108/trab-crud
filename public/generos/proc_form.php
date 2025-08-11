<?php
require_once '../../db_connection.php';
session_start();

if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Método inválido");
}

// Recebe dados do formulário
$genero = trim($_POST['genero']);
$id_genero = isset($_POST['id_genero']) ? (int)$_POST['id_genero'] : null;

// Validação
$erros = [];
if (empty($genero)) {
    $erros[] = "O campo gênero é obrigatório";
}

if (count($erros) === 0) {
    $genero = mysqli_real_escape_string($con, $genero);
    
    if ($id_genero) {
        // UPDATE
        $sql = "UPDATE generos SET genero = '$genero' WHERE id = $id_genero";
        $msg = "Gênero atualizado com sucesso";
    } else {
        // INSERT
        $sql = "INSERT INTO generos (genero) VALUES ('$genero')";
        $msg = "Gênero cadastrado com sucesso";
    }

    if (mysqli_query($con, $sql)) {
        $_SESSION['msg_sucesso'] = $msg;
        header("Location: index.php");
        exit();
    } else {
        $erros[] = "Erro no banco de dados: " . mysqli_error($con);
    }
}

// Se houve erros
if (count($erros) > 0) {
    $_SESSION['erros'] = $erros;
    $_SESSION['dados_form'] = $_POST; // Para manter os dados digitados
    header("Location: " . ($id_genero ? "editar.php?id=$id_genero" : "create.php"));
    exit();
}

mysqli_close($con);
?>