<?php

    require 'bd/conectaBD.php';
    require 'autentica.php';

    //Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn == false){
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    //Recebe os dados enviados via POST pelo formulário

    $id = $_GET['id'];


    //EXCLUSÃO
        // Faz DELETE na Base de Dados
		$sql = "DELETE FROM galaxia WHERE id_galaxia = $id";

		if ($result = mysqli_query($conn, $sql)) {
			echo "<p>&nbsp;Registro excluído com sucesso! </p>";
		} else {
			echo "<p>&nbsp;Erro executando DELETE: " . mysqli_error($conn . "</p>");
		}
        echo "</div>";
        
        $conn->close();  //Encerra conexao com o BD

    

    
