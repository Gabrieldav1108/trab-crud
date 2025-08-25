<?php
	require("db_connection.php");

    $usuario = $_POST["usuario"];
	$senha = $_POST["senha"];

	$sql = "SELECT * FROM usuarios WHERE (email = '$usuario' OR cpf = '$usuario') AND senha = '$senha' ";

	$resultado = mysqli_query($con, $sql);

	session_start();

	if (mysqli_num_rows($resultado) > 0){
        $_SESSION["estahLogado"] = true;
		header("location: ./filmes/index.php");	
	} else {
		$_SESSION["erro"] = "Usuário ou senha incorretos";
		header("location: ./login.php");
	}

?>