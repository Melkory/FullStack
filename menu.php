<?php
    require 'autentica.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Menu - Tela inicial</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
	
		<header>
		  <h2>Painel inicial</h2>
		</header>

		<section>
        <nav>
			<ul id="menu">
				<li><a href="menu.php" class="active">Inicio</a></li>
                <br>
				<li><a href="cadPlaneta.php" class="active">Cad. Planetas</a></li>
                <br>
                <li><a href="cadGalaxia.php" class="active">Cad. Galaxias</a></li>
                <br>
                <li><a href="listaDados.php" class="active">Dados</a></li>
			</ul>
		  </nav>
		  
		  <article>
			Bem-vindo ao Observatório X, <?php echo $_SESSION['nome_usuario'];?><br/>
		
		
		
			<a href="logout.php">Sair</a>
		  </article>
		</section>

		<footer>
		  <p>Todos direitos reservados.</p>
		</footer>
	
		
	</body>
</html>