
<?php 
	//Condição para autenticar se o usuário já está logado
	session_start();
	if(!isset($_SESSION ['id_user'])){                              
		header('location: /Universo/index.php?autentica=1');    
    }
	?>