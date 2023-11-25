<?php
    require 'autentica.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Dados Sobre Universo </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Dados Sobre Universo</h2>
		</header>
		
		<section>
        <nav>
			<ul id="menu">
				<li><a href="menu.php" class="active">Menu</a></li>
                <br>
				<li><a href="cadPlaneta.php" class="active">Cad. Planetas</a></li>
                <br>
                <li><a href="cadGalaxia.php" class="active">Cad. Galaxias</a></li>
                <br>
                <li><a href="listaDados.php" class="active">Dados</a></li>
			</ul>
		  </nav>
		  
		  <article>
		  
            <table border="1">
                <tr>
                    <td> Id </td>
                    <td> Nome </td>
                    <td> Lua </td>
                    <td> Massa </td>
                    <td> Presença de vida </td>
                    <td> Galaxia </td>
                    <td> Gravidade </td>
                </tr>
                <?php

                    require 'bd/conectaBD.php';

                    //Abre conexão com o MySQL
                    $conn = new mysqli($servername, $username, $password, $database);

                    if($conn == false){
                        die("ERRO: Não foi possível conectar com o Banco de Dados!");
                    }

                    //Monta o comando SQL para buscar as informações cadastradas
                    $sql = "SELECT id, nome, lua, massa, presenca_vida, nome_gal AS nome_galaxia, gravidade FROM planeta INNER JOIN galaxia ON (planeta.Id_galaxia = galaxia.Id_galaxia)";

                    //Envia código SQL ao MySQL (enviando sql para consultar pacientes)
					$res = mysqli_query($conn, $sql);

                    //Se deu certo e encontrou registros
                    if($res){

                        //Percorre os planetas encontrados
                        while($row = mysqli_fetch_assoc($res)){
                            
                            echo " <tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['nome'] . "</td>
                                        <td>" . $row['lua'] . "</td>
                                        <td>" . $row['massa'] . "</td>
                                        <td>" . $row['presenca_vida'] . "</td>
                                        <td>" . $row['nome_galaxia'] . "</td>
                                        <td>" . $row['gravidade'] . "</td>
                                        <td><a href='cadPlaneta.php?id=" . $row['id'] . "'>Editar</a></td>
                                        <td><a href='excluiPlaneta.php?id=".$row['id']."'>Excluir</a></td>
    
                                    </tr>";

                        }

                    }

                ?>
            </table>
            <br>
            <br>
            <br>
            <table border="1">
                <tr>
                    <td> Id </td>
                    <td> Nome </td>
                    <td> Quantidade de Planetas </td>
                    <td> Distancia </td>
                    
                </tr>
                <?php

                    require 'bd/conectaBD.php';

                    //Abre conexão com o MySQL
                    $conn = new mysqli($servername, $username, $password, $database);

                    if($conn == false){
                        die("ERRO: Não foi possível conectar com o Banco de Dados!");
                    }

                    //Monta o comando SQL para buscar as informações cadastradas
                    $sql = "SELECT id_galaxia, nome_gal, qtd_planetas, distancia FROM galaxia";

                    //Envia código SQL ao MySQL (enviando sql para consultar pacientes)
					$res = mysqli_query($conn, $sql);

                    //Se deu certo e encontrou registros
                    if($res){

                        //Percorre as galaxias encontrados
                        while($row = mysqli_fetch_assoc($res)){
                            
                            echo " <tr>
                                        <td>" . $row['id_galaxia'] . "</td>
                                        <td>" . $row['nome_gal'] . "</td>
                                        <td>" . $row['qtd_planetas'] . "</td>
                                        <td>" . $row['distancia'] . "</td>
                                        <td><a href='cadGalaxia.php?id_galaxia=" . $row['id_galaxia'] . "'>Editar</a></td>
                                        <td><a href='excluiGalaxia.php?id=".$row['id_galaxia']."'>Excluir</a></td>

                                    </tr>";

                                    

                        }

                    }

                ?>
            </table>


			<a href="menu.php">Voltar</a>
		  </article>
		</section>

		<footer>
		  <p>Todos direitos reservados.</p>
		</footer>
		
		
	</body>
</html>