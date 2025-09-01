<?php
$host = '127.0.0.1';
$usuario = 'root';
$senha = '';
$banco = 'trab-crud';

$con = mysqli_connect($host, $usuario, $senha, $banco);

if (!$con) {
    die('Erro na conexão com o banco de dados: ' . mysqli_connect_error());
}
