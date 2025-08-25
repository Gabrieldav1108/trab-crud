<?php
    require_once '../db_connection.php';
    require_once '../protege.php';
	$id_genero = $_GET["id"];

	$sql = "DELETE FROM generos WHERE id = $id_genero";

	if (mysqli_query($con, $sql) ){
		echo ("
            <script>
                alert('Genero excluído com sucesso');
                window.location.href = 'index.php';
            </script>");
	} else {
		echo ("
            <script>
                alert('Houve um erro ao excluir');
                window.location.href = 'index.php';
            </script>");
	}

