<?php

    require 'bd/conectaBD.php';
    require 'autentica.php';

    // Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn == false) {
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

    // Recebe os dados enviados via POST pelo formulário
    $id = $_GET['id'];

    // Exclusão
    // Faz DELETE na Base de Dados
    $sql = "DELETE FROM planeta WHERE id = $id";

    if ($result = mysqli_query($conn, $sql)) {
        $mensagem = "Registro excluído com sucesso!";
    } else {
        $mensagem = "Erro executando DELETE: " . mysqli_error($conn);
    }

    $conn->close();  // Encerra conexão com o BD

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Registro</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Adicione outros estilos ou links necessários -->
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
