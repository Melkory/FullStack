<?php
    
    require 'bd/conectaBD.php';
	require 'autentica.php';

	 //Abre conexão com o MySQL
	 $conn = new mysqli($servername, $username, $password, $database);

	 if($conn == false){
		 die("ERRO: Não foi possível conectar com o Banco de Dados!");
	 }

	 $id = "";
	 $nome = "";
	 $lua = "";
	 $massa = "";
	 $presenca_vida = "";
	 $gal = "";
	 $gravidade = "";


		// Obtém as Galaxias na Base de Dados para um combo box
		$sqlG = "SELECT id_galaxia, nome_gal FROM galaxia";
		$result = $conn->query($sqlG);
		$optionsGalax = array();

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				array_push($optionsGalax, "\t\t\t<option value='" . $row["id_galaxia"] . "'>" . $row["nome_gal"] . "</option>\n");
			}
		} else {
			echo "Erro executando SELECT: " . $conn->connect_error;
		}


	//Se a tela esta sendo aberta para edição
	if(isset($_GET['id'])){

		//Obtém o parametro ID que foi enviado via GET
		$id = $_GET['id'];

		//Monta o comando SQL para buscar as informações cadastradas
		$sql = "SELECT nome, lua, massa, presenca_vida, gravidade FROM planeta WHERE id = $id";

		//Envio da consulta ao MySQL
		$res = mysqli_query($conn, $sql);
		//Armazena o registro encontrado
		$row = mysqli_fetch_assoc($res);

		//Guarda os valores nas variáveis
		$nome = $row['nome'];
		$lua = $row['lua'];
		$massa = $row['massa'];
		$gravidade = $row['gravidade'];

	 }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro de Planetas</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
		<?php

			if(isset($_GET['id'])){
				//Obtém o parametro ID que foi enviado via GET
					echo ("<header>
				<h2>Atualizar Cadastro de Planetas</h2>
				</header>");
				} else {
					echo ("<header>
				<h2>Cadastro de Planetas</h2>
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
		  
			<form action="gravaPlaneta.php" method="post">

				<input type="hidden" name="id" value="<?php echo $id; ?>" />
			
				<label for="nome">Nome</label> 
				<input type="text" name="nome" value="<?php echo $nome; ?>" pattern="[a-zA-Z\u00C0-\u00FF ]{2,100}$" title="Nome entre 2 e 100 letras." required/>
				

				<label for="lua">Lua</label>
				<input type="text" name="lua" value="<?php echo $lua; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
	
				
				<label for="massa">Massa</label>
				<input type="text" name="massa" value="<?php echo $massa; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
				
				 
				<label for="presenca_vida">Presença de Vida</label>
				<select name="presenca_vida" required>
					<option value="">Selecione</option>
					<option value="sim">Sim</option>
					<option value="nao">Não</option>
				</select>
				
				<label>Galáxia</label>
				<select name="galaxia" id="galaxia" value="<?php echo $gal; ?>" required>
					<option value="">Selecione</option>
    				<?php
					// Se $optionsGalax não estiver vazio, imprima as opções
					if (!empty($optionsGalax)) {
						foreach ($optionsGalax as $value) {
							echo $value;
						}
					} else {
						// Se $optionsGalax estiver vazio, você pode adicionar uma opção padrão ou exibir uma mensagem indicando que não há opções disponíveis.
						echo "<option value=''>Nenhuma galáxia disponível</option>";
					}
					?>
				</select>

                <label for="gravidade">Gravidade</label>
				<input type="text" name="gravidade" value="<?php echo $gravidade; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>

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