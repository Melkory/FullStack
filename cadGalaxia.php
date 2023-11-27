<?php
    require 'bd/conectaBD.php';
    require 'autentica.php';

    // Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn == false) {
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    $id_galaxia = "";
    $nome_gal = "";
    $qtd_planetas = "";
    $distancia = "";

    // Se a tela está sendo aberta para edição
    if (isset($_GET['id_galaxia'])) {

        // Obtém o parâmetro ID que foi enviado via GET
        $id_galaxia = $_GET['id_galaxia'];

        // Monta o comando SQL para buscar as informações cadastradas
        $sql = "SELECT nome_gal, qtd_planetas, distancia FROM galaxia WHERE id_galaxia = $id_galaxia";

        // Envio da consulta ao MySQL
        $res = mysqli_query($conn, $sql);
        // Armazena o registro encontrado
        $row = mysqli_fetch_assoc($res);

        // Guarda os valores nas variáveis
        $nome_gal = $row['nome_gal'];
        $qtd_planetas = $row['qtd_planetas'];
        $distancia = $row['distancia'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Galáxias</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>

    <?php
        if (isset($_GET['id_galaxia'])) {
            // Obtém o parâmetro ID que foi enviado via GET
            echo ("<header class='container-fluid bg-dark text-white text-center py-3'>
                        <h2>Atualizar Cadastro de Galaxias</h2>
                    </header>");
        } else {
            echo ("<header class='container-fluid bg-dark text-white text-center py-3'>
                        <h2>Cadastro de Galaxias</h2>
                    </header>");
        }
    ?>

    <section class="container mt-3">
        <nav class="row">
            <div class="col-md-3">
                <ul id="menu" class="nav flex-column">
                    <li class="nav-item">
                        <a href="menu.php" class="nav-link active">Menu</a>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a href="cadPlaneta.php" class="nav-link active">Cad. Planetas</a>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a href="cadGalaxia.php" class="nav-link active">Cad. Galaxias</a>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a href="listaDados.php" class="nav-link active">Dados</a>
                    </li>
                    <img src="./img/undraw_master_plan_re_jvit.svg" alt="Constelação" class="img-fluid mb-3">
                </ul>
            </div>

            <div class="col-md-9">
                <article>
                    <form action="gravaGalaxia.php" method="post">

                        <input type="hidden" name="id_galaxia" value="<?php echo $id_galaxia; ?>" />

                        <div class="form-group">
                            <label for="nome_gal">Nome</label>
                            <input type="text" name="nome_gal" class="form-control" value="<?php echo $nome_gal; ?>" pattern="[a-zA-Z\u00C0-\u00FF ]{2,100}$" title="Nome entre 10 e 100 letras." required/>
                        </div>

                        <div class="form-group">
                            <label for="qtd_planetas">Quantidade de Planetas</label>
                            <input type="text" name="qtd_planetas" class="form-control" value="<?php echo $qtd_planetas; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
                        </div>

                        <div class="form-group">
                            <label for="distancia">Distancia da Terra</label>
                            <input type="text" name="distancia" class="form-control" value="<?php echo $distancia; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                    <a href="menu.php" class="btn btn-secondary">Voltar</a>
                </article>
            </div>
        </nav>
    </section>

    <footer class="container-fluid bg-dark text-white text-center py-3 mt-3">
        <p>Todos os direitos reservados.</p>
    </footer>

</body>
</html>
