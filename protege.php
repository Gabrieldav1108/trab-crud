<?php
    session_set_cookie_params(0, "/");
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION["estahLogado"])) {
        $_SESSION["erro"] = "Você precisa estar logado para acessar essa página";
        header("Location: ../login.php");
        exit;
    }