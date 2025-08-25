<?php
    require_once '../db_connection.php';
    require_once '../protege.php';

	$id_filme = $_GET["id"];

	$sql = "DELETE FROM filmes WHERE id = $id_filme";

	if (mysqli_query($con, $sql) ){
		echo ("
            <script>
                alert('Filme excluído com sucesso');
                window.location.href = 'index.php';
            </script>"
            );
	} else {
		echo ("
            <script>
                alert('Filme excluído com sucesso');
                window.location.href = 'index.php';
            </script>
        ");
	}