<?php
    require 'autentica.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Observatório X</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Cor de fundo suave */
        }

        header {
            background-color: #343a40; /* Cor de fundo da barra de cabeçalho */
            color: #ffffff; /* Cor do texto na barra de cabeçalho */
            text-align: center;
            padding: 20px;
        }

        nav {
            background-color: #e9ecef; /* Cor de fundo da barra de navegação */
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        nav a {
            color: #495057; /* Cor do texto na barra de navegação */
            font-size: 18px;
        }

        article {
            margin-top: 20px;
            font-size: 16px;
        }

        footer {
            background-color: #343a40; /* Cor de fundo do rodapé */
            color: #ffffff; /* Cor do texto no rodapé */
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header class="container-fluid text-center py-3">
        <h2 class="text-white">Página Inicial</h2>
        <img src="./img/undraw_to_the_moon_re_q21i.svg" alt="Imagem de boas-vindas" class="img-fluid" style="width: 200px;">
    </header>

    <section class="container mt-3">
        <nav class="row">
            <div class="col-md-3">
                <ul id="menu" class="nav flex-column">
                    <li class="nav-item">
                        <a href="menu.php" class="nav-link active">Início</a>
                    </li>
                    <li class="nav-item">
                        <a href="cadPlaneta.php" class="nav-link">Cad. Planetas</a>
                    </li>
                    <li class="nav-item">
                        <a href="cadGalaxia.php" class="nav-link">Cad. Galáxias</a>
                    </li>
                    <li class="nav-item">
                        <a href="listaDados.php" class="nav-link">Dados</a>
                    </li>
                </ul>
            </div>
            
            <div class="col-md-9">
                <article>
                    <p class="mt-3">Bem-vindo ao Observatório X, <?php echo $_SESSION['nome_usuario'];?></p>
                    <a href="logout.php" class="btn btn-danger mt-3">Sair</a>
                </article>
            </div>
        </nav>
    </section>

    <footer class="container-fluid text-center py-3 mt-3">
        <p>Todos os direitos reservados.</p>
    </footer>
</body>
</html>
