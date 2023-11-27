<?php
require 'bd/conectaBD.php';
require 'autentica.php';

// Verifica se o parâmetro "id" foi passado
if (isset($_GET['id'])) {
    // Obtém o valor de "id" da URL
    $id = $_GET['id'];

    // Abre conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("ERRO: Não foi possível conectar com o Banco de Dados!");
    }

   // Exclusão
// Faz DELETE na Base de Dados
    $sql = "DELETE FROM id_galaxia WHERE id_galaxia = $id";

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
} else {
    // Se "id" não foi passado, exibe uma mensagem de erro
    $mensagem = "Erro: Parâmetro 'id' não foi encontrado na URL.";
}
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
