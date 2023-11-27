<?php
require 'bd/conectaBD.php';
require 'autentica.php';


    // Obtém o valor de "id_galaxia" da URL
    $id = $_GET['id_galaxia'];

    // Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    // Exclusão
    // Faz DELETE na Base de Dados
    $sql = "DELETE FROM galaxia WHERE id_galaxia = $id";

    if ($result = mysqli_query($conn, $sql)) {
        $mensagem = "Registro excluído com sucesso!";
    } else {
        $mensagem = "Erro executando DELETE: " . mysqli_error($conn);
    }

    // Verificação adicional para exibir mensagens de erro mais detalhadas
    if ($conn->errno) {
        die("Erro MySQL: " . $conn->error);
    }

    // Fecha a conexão com o BD
    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Galáxia</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Aviso!</h4>
        <p><?php echo $mensagem; ?></p>
        <hr>
        <p class="mb-0">Para retornar à página anterior, <a href="listaDados.php" class="alert-link">clique aqui</a>.</p>
    </div>
</div>

</body>
</html>
