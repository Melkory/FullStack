<?php
    require 'bd/conectaBD.php'; 

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);


        $login = $_POST['login']; 
        $senha   = $_POST['senha'];
        
        // Faz Select na Base de Dados
        $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = md5('$senha')";
        $res = mysqli_query($conn, $sql);

        $qtdeRegistros = mysqli_num_rows($res);

        if ($qtdeRegistros > 0) {
            session_start();

            $row = mysqli_fetch_assoc($res);

            $_SESSION['id_user'] = $row['id_usuario'];
            $_SESSION['nome_usuario'] = $row['nome_usuario'];

            header("Location: menu.php");
        } else {
            header("Location: index.php?erro=1");
        }
    
?>