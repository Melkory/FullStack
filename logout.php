<?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    session_destroy();
    header('location: /Universo/index.php');
    exit();
?>