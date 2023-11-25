<?php
    
    require 'bd/conectaBD.php';
	require 'autentica.php'; 

	 //Abre conexão com o MySQL
	 $conn = new mysqli($servername, $username, $password, $database);

	 if($conn == false){
		 die("ERRO: Não foi possível conectar com o Banco de Dados!");
	 }

	 $id_galaxia = "";
	 $nome_gal = "";
	 $qtd_planetas = "";
	 $distancia = "";


	//Se a tela esta sendo aberta para edição
	if(isset($_GET['id_galaxia'])){

		//Obtém o parametro ID que foi enviado via GET
		$id_galaxia = $_GET['id_galaxia'];

		//Monta o comando SQL para buscar as informações cadastradas
		$sql = "SELECT nome_gal, qtd_planetas, distancia FROM galaxia WHERE id_galaxia = $id_galaxia";

		//Envio da consulta ao MySQL
		$res = mysqli_query($conn, $sql);
		//Armazena o registro encontrado
		$row = mysqli_fetch_assoc($res);

		//Guarda os valores nas variáveis
		$nome_gal = $row['nome_gal'];
		$qtd_planetas = $row['qtd_planetas'];
		$distancia = $row['distancia'];

	 }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Galáxias</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
	<?php

		if(isset($_GET['id_galaxia'])){
			//Obtém o parametro ID que foi enviado via GET
				echo ("<header>
			<h2>Atualizar Cadastro de Galaxias</h2>
			</header>");
			} else {
				echo ("<header>
			<h2>Cadastro de Galaxias</h2>
			</header>");
			}

		?>
		
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
		  
			<form action="gravaGalaxia.php" method="post">

				<input type="hidden" name="id_galaxia" value="<?php echo $id_galaxia; ?>" />
			
				<label for="nome_gal">Nome</label> 
				<input type="text" name="nome_gal" value="<?php echo $nome_gal; ?>" pattern="[a-zA-Z\u00C0-\u00FF ]{2,100}$" title="Nome entre 10 e 100 letras." required/>
				

				<label for="qtd_planetas">Quantidade de Planetas</label>
				<input type="text" name="qtd_planetas" value="<?php echo $qtd_planetas; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
	
				
				<label for="distancia">Distancia da Terra</label>
				<input type="text" name="distancia" value="<?php echo $distancia; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
				

				<input type="submit">
			
			</form>
			<a href="menu.php">Voltar</a>
		  </article>
		</section>

		<footer>
		  <p>Todos direitos reservados.</p>
		</footer>
		
		
	</body>
</html>