<?php
require_once '../db_connection.php';
require_once '../protege.php';

var_dump($_POST); // Para depuração, remova em produção
// Verificar conexão
if (!$con) {
    die("Não foi possível conectar ao banco de dados: " . mysqli_connect_error());
}

// Verificar método POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido ao arquivo.");
}

// Criando variáveis para armazenar os valores dos inputs
$titulo = $_POST["titulo"];
$diretor = $_POST["diretor"];
$genero_id = $_POST["genero_id"];
$duracao = $_POST["duracao"];
$lancamento = $_POST["lancamento"];
$plataforma = $_POST["plataforma"];
$id_filme = $_POST["id_filme"];

$erros = []; // Array para armazenar os erros

// Validação dos campos
if (empty($titulo)) {
    $erros[] = "Preencha o <b>título</b> corretamente";
}

if (empty($diretor)) {
    $erros[] = "Preencha o <b>diretor</b> corretamente";
}

if (empty($genero_id) || $genero_id <= 0) {
    $erros[] = "Selecione um <b>gênero</b> válido";
}

if (empty($duracao) || $duracao <= 0) {
    $erros[] = "Preencha a <b>duração</b> com um valor positivo";
}

if (empty($lancamento)) {
    $erros[] = "Preencha a <b>data de lançamento</b>";
}

if (empty($plataforma)) {
    $erros[] = "Preencha a <b>plataforma</b>";
}

// Se não houver erros, processa os dados
if (count($erros) == 0) {
    // Sanitizar entradas
    $titulo = mysqli_real_escape_string($con, trim($titulo));
    $diretor = mysqli_real_escape_string($con, trim($diretor));
    $genero_id = (int)$genero_id;
    $duracao = (int)$duracao;
    $lancamento = mysqli_real_escape_string($con, $lancamento);
    $plataforma = mysqli_real_escape_string($con, trim($plataforma));
    $id_filme = !empty($id_filme) ? (int)$id_filme : null;

    // Preparar a query baseada na operação (INSERT ou UPDATE)
    if (!empty($id_filme)) {
        // OPERAÇÃO DE ATUALIZAÇÃO
        $sql = "UPDATE filmes SET 
                titulo = '$titulo', 
                diretor = '$diretor', 
                genero = $genero_id, 
                duracao = $duracao, 
                lancamento = '$lancamento', 
                plataforma = '$plataforma' 
                WHERE id = $id_filme";
    } else {
        // OPERAÇÃO DE INSERÇÃO
        $sql = "INSERT INTO filmes (titulo, diretor, genero, duracao, lancamento, plataforma) 
                VALUES ('$titulo', '$diretor', $genero_id, $duracao, '$lancamento', '$plataforma')";
    }

    // Executar a query
    if (mysqli_query($con, $sql)) {
        // Define mensagem de sucesso na sessão
        if (!empty($id_filme)) {
            echo(
                "<script>
                    alert('Filme inserido com sucesso');
                    window.location.href = 'index.php';
                </script>"
            );
        } else {
            echo(
                "<script>
                    alert('Filme inserido com sucesso');
                    window.location.href = 'index.php';
                </script>"
            );
        }
        exit();
    } else {
        $erros[] = "Erro ao executar a operação: " . mysqli_error($con);
    }
}

// Se chegou aqui, houve erros
if (count($erros) > 0) {
    $_SESSION["erros"] = $erros;
    header("location: " . (!empty($id_filme) ? "editar.php?id=$id_filme" : "create.php"));
    exit();
}

// Encerrar conexão
mysqli_close($con);
?>