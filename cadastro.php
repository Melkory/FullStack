<?php

    require 'bd/conectaBD.php';

    //Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn == false){
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    //Recebe os dados enviados via POST pelo formulário

    $login = $_POST['login'];
	$senha = $_POST['senha1'];
	$nome_usuario = $_POST['nome_usuario'];



    //INSERÇÃO
        //Monta o código SQL para inserir o galaxia
        $sql = "INSERT INTO usuario (login, senha, nome_usuario) 
                VALUES 
                ('$login', md5('$senha'), '$nome_usuario')";

        //Envia o código SQL ao MySQL
        $res = mysqli_query($conn, $sql);

        //Se a inserção deu certo
        if($res){
            header("Location: index.php");
        }
        else{
            echo "ERRO AO INSERIR!";
        }
