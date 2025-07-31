<?php
require_once '../db_connection.php';

// DEBUG: Mostra todo o conteúdo do $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Confirma se os campos esperados chegaram
if (!isset($_POST["titulo"])) {
    die("Formulário não enviado corretamente.");
}

$titulo     = $_POST["titulo"];
$diretor    = $_POST["diretor"];
$genero     = $_POST["genero_id"]; // campo correto do formulário
$duracao    = $_POST["duracao"];
$lancamento = $_POST["lancamento"];
$plataforma = $_POST["plataforma"];

$erros = [];

if (empty($titulo))     $erros[] = "Preencha o <b>título</b> corretamente";
if (empty($diretor))    $erros[] = "Preencha o <b>diretor</b> corretamente";
if (empty($genero))     $erros[] = "Preencha o <b>gênero</b>";
if (empty($duracao))    $erros[] = "Preencha a <b>duração</b>";
if (empty($lancamento)) $erros[] = "Preencha o <b>lançamento</b>";
if (empty($plataforma)) $erros[] = "Preencha a <b>plataforma</b>";

if (count($erros) == 0) {
    // DEBUG: Mostrar a SQL gerada
    echo "<p><strong>SQL:</strong> ";
    echo "INSERT INTO filmes (titulo, diretor, genero_id, duracao, lancamento, plataforma)
          VALUES ('$titulo', '$diretor', '$genero', '$duracao', '$lancamento', '$plataforma')</p>";

    $sql = "INSERT INTO filmes (titulo, diretor, genero_id, duracao, lancamento, plataforma)
            VALUES ('$titulo', '$diretor', '$genero', '$duracao', '$lancamento', '$plataforma')";
            echo "<pre>Executando SQL:\n$sql</pre>";


    if (mysqli_query($con, $sql)) {
        echo "<p class='text-success'>✅ Filme inserido com sucesso!</p>";
        echo "<script>setTimeout(() => window.location.href = 'index.php', 2000);</script>";
    } else {
        echo "<p class='text-danger'>❌ Erro MySQL: " . mysqli_error($con) . "</p>";
    }

} else {
    echo "<p class='text-danger'>Foram encontrados os seguintes erros:</p>";
    foreach ($erros as $erro) {
        echo "<li>$erro</li>";
    }
}
?>
