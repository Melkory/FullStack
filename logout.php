<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Observatório X</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; 
        }

        header {
            background-color: #343a40; 
            color: #ffffff; 
            text-align: center;
            padding: 20px 0;
        }

        section {
            text-align: center;
            margin: 50px 0;
        }

        footer {
            background-color: #343a40; 
            color: #ffffff; 
            padding: 10px 0;
            text-align: center;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <?php
        session_start();
        session_destroy();
        header('location: /Universo/index.php');
        exit();
    ?>

    <header class="container-fluid">
        <h2>Observatório X</h2>
    </header>

    <section class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Logout Efetuado!</h4>
            <p>Você saiu com sucesso. <a href="./index.php" class="alert-link">Clique aqui</a> para voltar à página inicial.</p>
        </div>
    </section>

    <footer class="container-fluid">
        <p>Todos os direitos reservados.</p>
    </footer>

</body>
</html>
