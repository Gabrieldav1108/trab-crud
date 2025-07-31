    <?php
    require_once '../db_connection.php';


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
        $id_filme = $_POST['id_filme'];

        if(isset($id_filme)) {
            $sql = "UPDATE filmes SET 
                    titulo = '$titulo', 
                    diretor = '$diretor', 
                    genero_id = '$genero', 
                    duracao = '$duracao', 
                    lancamento = '$lancamento', 
                    plataforma = '$plataforma' 
                    WHERE id = $id_filme";
        } else {
            $sql = "INSERT INTO filmes (titulo, diretor, genero_id, duracao, lancamento, plataforma)
                VALUES ('$titulo', '$diretor', '$genero', '$duracao', '$lancamento', '$plataforma')";
        }

        if (mysqli_query($con, $sql) ){
			if (isset($id_filme) && !empty($id_filme) ) {
				echo ("<script>alert('Usuário atualizado com sucesso'); </script>");
			} else { 
				echo ("<script>alert('Usuário inserido com sucesso'); </script>");// por enquanto mostrando a mensagem usando um alert
			}

		} else {
			echo ("Houve um erro ao inserir no banco de dados");
		}

    } else {
        echo "<p class='text-danger'>Foram encontrados os seguintes erros:</p>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
    }
    ?>
