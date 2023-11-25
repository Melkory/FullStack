<!DOCTYPE html>
<html>
	<head>
		<title>Observatório - Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
	
		<header>
		  <h2>Observatório - Login / Cadastro</h2>
		</header>
		
		
	
		<div>
			<p style="text-align:center">Realize o login / Cadastro para acessar ao Observatório.</p>

            <?php
                if(isset($_GET['erro'])){
                    echo '<p style="text-align:center; color:red"> Usuário ou Senha incorretos! </p>';
                }

                if(isset($_GET['autentica'])){
                    echo '<p style="text-align:center; color:red"> Sem negado! Usuário não logado! Por favor, efetue o Login </p>';
                }
            ?>
			<h2>Login</h2>
			<form action="login.php" method="post">
			
				<label for="login">Login</label> 
				<input type="text" name="login" id="login"/>
				
				<label for="senha">Senha</label> 
				<input type="password" name="senha" id="senha" /><br/><br/>
				
				<input type="submit" value="Logar">
			
			</form>
		</div>

		<div>
            <div>
                <h2>Cadastrar</h2>
                    <form action="cadastro.php" method="POST">
                            
                        <label>Nome de usuário</label>
                        <input name="nome_usuario" type="text" required>
                                
                            
                        <label>Login</label>                        
                        <input name="login" type="text" required>


                        <label>Senha</label> 
                        <input name="senha1" id="senha1" type="password" required> 
                        

                        <label>Confirma Senha</label> 
                        <input name="senha2" id="senha2" type="password" onkeyup="validarSenha()" required>
                            <p>
                                <input type="checkbox" class="w3-btn w3-theme"  onclick="mostrarOcultarSenhaCadastro()"> <b>Mostrar senha</b>
                            </p>

                        <input type="submit" value="Cadastrar">
                    </form>

                        

            </div>
        </div>
		
		

		<footer>
		  <p>Todos direitos reservados.</p>
		</footer>
	</body>
</html>