<?php

    if (!isset($_POST["enviar"]) )
		header("location: create.php");



    $titulo = $_POST["titulo"];
    $diretor = $_POST["diretor"];
    $genero = $_POST["genero"];
    $duracao = $_POST["duracao"];
    $lancamento = $_POST["lancamento"];
    $plataforma = $_POST["plataforma"];

    $erros = [];

	if (empty($titulo) )
		$erros[] = "Preencha o <b>título</b> corretamente";

	if (empty($diretor) )
		$erros[] = "Preencha o <b>diretor</b> corretamente";

	if (empty($genero) )
		$erros[] = "Preencha a <b>genero</b>";

	if (empty($duracao) )
		$erros[] = "Preencha o <b>duracao</b>";

	if (empty($lancamento))
		$erros[] = "Preencha o <b>lancamento</b>";

    if (empty($plataforma))
		$erros[] = "Preencha o <b>plataforma</b>";




        $con = mysqli_connect("localhost", "root", "", "trab-crud", 3306);
        if(count($erros) != 0){
            $sql = "INSERT INTO filmes (titulo, diretor, genero, duracao, lancamento, plataforma)
                    VALUES ('$titulo', '$diretor', '$genero', '$duracao', '$lancamento', '$plataforma')";    
    
            if (mysqli_query($con, $sql) ){
               echo ("<script>alert('Filme inserido com sucesso'); </script>");// por enquanto mostrando a mensagem usando um alert
            } else {
                echo ("Houve um erro ao inserir no banco de dados");
            }
        }else {
            // se cair aqui, é porque tem erros
            foreach($erros as $erro){
                echo ("$erro <br>");
            }
        }
    
