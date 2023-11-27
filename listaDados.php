<?php
    require 'autentica.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Sobre Universo</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>

    <header class="container-fluid bg-dark text-white text-center py-3">
        <h2>Dados Sobre Universo</h2>
    </header>

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
                </ul>
            </div>

            <div class="col-md-9">
                <article>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Lua</th>
                                <th>Massa</th>
                                <th>Presença de Vida</th>
                                <th>Galaxia</th>
                                <th>Gravidade</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require 'bd/conectaBD.php';

                                // Abre conexão com o MySQL
                                $conn = new mysqli($servername, $username, $password, $database);

                                if ($conn == false) {
                                    die("ERRO: Não foi possível conectar com o Banco de Dados!");
                                }

                                // Monta o comando SQL para buscar as informações cadastradas
                                $sql = "SELECT id, nome, lua, massa, presenca_vida, nome_gal AS nome_galaxia, gravidade FROM planeta INNER JOIN galaxia ON (planeta.Id_galaxia = galaxia.Id_galaxia)";

                                // Envio do código SQL ao MySQL
                                $res = mysqli_query($conn, $sql);

                                // Se deu certo e encontrou registros
                                if ($res) {
                                    // Percorre os Planetas encontrados
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<tr>
                                                <td>" . $row['id'] . "</td>
                                                <td>" . $row['nome'] . "</td>
                                                <td>" . $row['lua'] . "</td>
                                                <td>" . $row['massa'] . "</td>
                                                <td>" . $row['presenca_vida'] . "</td>
                                                <td>" . $row['nome_galaxia'] . "</td>
                                                <td>" . $row['gravidade'] . "</td>
                                                <td><a href='cadPlaneta.php?id=" . $row['id'] . "'>Editar</a></td>
                                                <td><a href='excluiPlaneta.php?id=" . $row['id'] . "'>Excluir</a></td>
                                              </tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Quantidade de Planetas</th>
                                <th>Distância</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require 'bd/conectaBD.php';

                                // Abre conexão com o MySQL
                                $conn = new mysqli($servername, $username, $password, $database);

                                if ($conn == false) {
                                    die("ERRO: Não foi possível conectar com o Banco de Dados!");
                                }

                                // Monta o comando SQL para buscar as informações cadastradas
                                $sql = "SELECT id_galaxia, nome_gal, qtd_planetas, distancia FROM galaxia";

                                // Envio do código SQL ao MySQL
                                $res = mysqli_query($conn, $sql);

                                // Se deu certo e encontrou registros
                                if ($res) {
                                    // Percorre as Galáxias encontradas
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        echo "<tr>
                                                <td>" . $row['id_galaxia'] . "</td>
                                                <td>" . $row['nome_gal'] . "</td>
                                                <td>" . $row['qtd_planetas'] . "</td>
                                                <td>" . $row['distancia'] . "</td>
                                                <td><a href='cadGalaxia.php?id_galaxia=" . $row['id_galaxia'] . "'>Editar</a></td>
                                                <td><a href='excluiGalaxia.php?id_galaxia=" . $row['id_galaxia'] . "'>Excluir</a></td>
                                              </tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>

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
