<?php
    require 'bd/conectaBD.php';
    require 'autentica.php';

    // Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn == false) {
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    $id = "";
    $nome = "";
    $lua = "";
    $massa = "";
    $presenca_vida = "";
    $gal = "";
    $gravidade = "";

    // Obtém as Galáxias na Base de Dados para um combo box
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

    // Se a tela está sendo aberta para edição
    if (isset($_GET['id'])) {

        // Obtém o parâmetro ID que foi enviado via GET
        $id = $_GET['id'];

        // Monta o comando SQL para buscar as informações cadastradas
        $sql = "SELECT nome, lua, massa, presenca_vida, gravidade FROM planeta WHERE id = $id";

        // Envio da consulta ao MySQL
        $res = mysqli_query($conn, $sql);
        // Armazena o registro encontrado
        $row = mysqli_fetch_assoc($res);

        // Guarda os valores nas variáveis
        $nome = $row['nome'];
        $lua = $row['lua'];
        $massa = $row['massa'];
        $gravidade = $row['gravidade'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Planetas</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>

    <?php
        if (isset($_GET['id'])) {
            // Obtém o parâmetro ID que foi enviado via GET
            echo ("<header class='container-fluid bg-dark text-white text-center py-3'>
                        <h2>Atualizar Cadastro de Planetas</h2>
                    </header>");
        } else {
            echo ("<header class='container-fluid bg-dark text-white text-center py-3'>
                        <h2>Cadastro de Planetas</h2>
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
					<img src="./img/undraw_astronaut_re_8c33.svg" alt="Constelação" class="img-fluid mb-3">
                </ul>
            </div>

            <div class="col-md-9">
                <article>
                    <form action="gravaPlaneta.php" method="post">

                        <input type="hidden" name="id" value="<?php echo $id; ?>" />

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" pattern="[a-zA-Z\u00C0-\u00FF ]{2,100}$" title="Nome entre 2 e 100 letras." required/>
                        </div>

                        <div class="form-group">
                            <label for="lua">Lua</label>
                            <input type="text" name="lua" class="form-control" value="<?php echo $lua; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
                        </div>

                        <div class="form-group">
                            <label for="massa">Massa</label>
                            <input type="text" name="massa" class="form-control" value="<?php echo $massa; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
                        </div>

                        <div class="form-group">
                            <label for="presenca_vida">Presença de Vida</label>
                            <select name="presenca_vida" class="form-control" required>
                                <option value="">Selecione</option>
                                <option value="sim" <?php echo ($presenca_vida == 'sim') ? 'selected' : ''; ?>>Sim</option>
                                <option value="nao" <?php echo ($presenca_vida == 'nao') ? 'selected' : ''; ?>>Não</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="galaxia">Galáxia</label>
                            <select name="galaxia" id="galaxia" class="form-control" required>
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
                        </div>

                        <div class="form-group">
                            <label for="gravidade">Gravidade</label>
                            <input type="text" name="gravidade" class="form-control" value="<?php echo $gravidade; ?>" pattern="[0-9]+([,.][0-9]+)?" title="Indique um número!" required/>
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
