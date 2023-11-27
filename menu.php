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
            background-color: #f8f9fa; 
        }

        header {
            background-color: #343a40; 
            color: #ffffff; 
            text-align: center;
            padding: 20px;
        }

        nav {
            background-color: #e9ecef; 
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        nav a {
            color: #495057; 
            font-size: 18px;
        }

        article {
            margin-top: 20px;
            font-size: 16px;
        }

        footer {
            background-color: #343a40; 
            color: #ffffff; 
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
        }

        .paragrafo-estilizado {
            background-color: #90A19D; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            color: #333; 
            font-family: 'Arial', sans-serif; 
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
                    <p class="paragrafo-estilizado">Bem-vindo(a), <?php echo $_SESSION['nome_usuario'];?></p>
                    <p class="paragrafo-estilizado">
                        Bem-vindo ao fascinante Observatório da Pontifícia Universidade Católica do Paraná! Embarque conosco em uma jornada cósmica única, explorando os mistérios e maravilhas do universo. Nossa atividade de cadastro de planetas e galáxias oferece uma oportunidade emocionante para você se tornar parte integrante da nossa comunidade de entusiastas da astronomia.
                    </p>
                    <p class="paragrafo-estilizado">
                        Ao participar dessa atividade, você terá a chance de catalogar e contribuir para o conhecimento astronômico, enriquecendo nossa base de dados com informações valiosas sobre os corpos celestes que povoam o vasto cosmos. Seja um verdadeiro explorador do espaço, fornecendo dados sobre a localização, características e peculiaridades de planetas e galáxias que capturam sua curiosidade.
                    </p>
                    <p class="paragrafo-estilizado">
                        Nosso sistema de cadastro intuitivo e amigável torna a participação fácil e empolgante. Sinta-se à vontade para compartilhar suas observações, descobertas e até mesmo curiosidades sobre os fenômenos celestes que encontrar durante suas explorações. Ao unir-se a nós, você se torna parte de uma comunidade apaixonada pela exploração do desconhecido, onde cada contribuição conta para ampliar nossa compreensão do universo.
                    </p>
                    <p class="paragrafo-estilizado">
                        Prepare-se para uma experiência enriquecedora e educativa, enquanto mergulha nas maravilhas do espaço sideral e contribui para o avanço do conhecimento astronômico. Junte-se a nós no Observatório da PUC-PR e ajude a desvendar os segredos do cosmos!
                    </p>

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
