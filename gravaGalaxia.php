<?php

    require 'bd/conectaBD.php';
    require 'autentica.php';

    //Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn == false){
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    //Recebe os dados enviados via POST pelo formulário
    $id_galaxia = $_POST['id_galaxia'];

    $nome_gal = $_POST['nome_gal'];
	$qtd_planetas = $_POST['qtd_planetas'];
	$distancia = $_POST['distancia'];



    //INSERÇÃO
    if(empty($id_galaxia)){
        //Monta o código SQL para inserir o galaxia
        $sql = "INSERT INTO galaxia (nome_gal, qtd_planetas, distancia) 
                VALUES 
                ('$nome_gal', '$qtd_planetas', '$distancia')";

        //Envia o código SQL ao MySQL
        $res = mysqli_query($conn, $sql);

        //Se a inserção deu certo
        if($res){
            header("Location: listaDados.php");
        }
        else{
            echo "ERRO AO INSERIR!";
        }
    } else {
        //Monta o SQL com os campos enviados pelo usuário
		$sql = "UPDATE galaxia SET 
        nome_gal = '$nome_gal',
        qtd_planetas = '$qtd_planetas',
        distancia = '$distancia'
        WHERE
        id_galaxia = $id_galaxia";

        //Envia código SQL ao MySQL (enviando sql para atualizar paciente)
        $res = mysqli_query($conn, $sql);

        //Se SQL executou sem erros (se atualizou no BD)
        if($res){
        header("Location: listaDados.php");
        //echo "SUCESSO!";
        }
        else{
        echo "ERRO!";
        }
    }
