<?php 
	session_start();
	if(!isset($_SESSION ['id_user'])){                              // Não houve login ainda
		header('location: /Universo/index.php?autentica=1');    // Vai para a página inicial
    }
	?>