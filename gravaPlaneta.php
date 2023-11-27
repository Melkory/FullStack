<?php

    require 'bd/conectaBD.php';
    require 'autentica.php';

    //Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn == false){
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    //Recebe os dados enviados via POST pelo formulário
    $id = $_POST['id'];
    
    $nome = $_POST['nome'];
	$lua = $_POST['lua'];
	$massa = $_POST['massa'];
	$presenca_vida = $_POST['presenca_vida'];
	$gal = $_POST['galaxia'];
    $gravidade = $_POST['gravidade'];


    //INSERÇÃO
    if(empty($id)){
        //Monta o código SQL para inserir o Planeta
        $sql = "INSERT INTO planeta (nome, lua, massa, presenca_vida, id_galaxia, gravidade) 
                VALUES 
                ('$nome', '$lua', '$massa', '$presenca_vida', '$gal', '$gravidade')";

        //Envia o código SQL ao MySQL
        $res = mysqli_query($conn, $sql);

        //Se a inserção deu certo
        if($res){
            header("Location: listaDados.php");
        }
        else{
            echo "ERRO AO INSERIR!";
        }
        
        $conn->close();  //Encerra conexao com o BD

    } else {
        //Monta o SQL com os campos enviados pelo usuário
		$sql = "UPDATE planeta SET 
        nome = '$nome',
        lua = '$lua',
        massa = '$massa',
        presenca_vida = '$presenca_vida',
        id_galaxia = '$gal',
        gravidade = '$gravidade'
        WHERE
        id = $id";

        //Envia código ao MySQL
        $res = mysqli_query($conn, $sql);

        //Se SQL executou sem erros
        if($res){
        header("Location: listaDados.php");

        }
        else{
        echo "ERRO!";
        }
    }
?>
    
