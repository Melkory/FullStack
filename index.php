<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Observatório - Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>

    <header class="bg-dark text-light text-center py-4">
        <h2>Observatório - Login / Cadastro</h2>
    </header>

    <div class="container mt-4">
        <p class="text-center">Realize o login / Cadastro para acessar ao Observatório.</p>

        <?php
            if(isset($_GET['erro'])){
                echo '<p class="text-center text-danger">Usuário ou Senha incorretos!</p>';
            }

            if(isset($_GET['autentica'])){
                echo '<p class="text-center text-danger">Sem negado! Usuário não logado! Por favor, efetue o Login</p>';
            }
        ?>

        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">Login</h2>
                <form action="login.php" method="post">

                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login" />
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" />
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="Logar">
                    </div>

                </form>
            </div>

            <div class="col-md-6">
                <h2 class="text-center">Cadastrar</h2>
                <form action="cadastro.php" method="POST">

                    <div class="form-group">
                        <label for="nome_usuario">Nome de usuário</label>
                        <input type="text" class="form-control" name="nome_usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="login_cadastro">Login</label>
                        <input type="text" class="form-control" name="login_cadastro" required>
                    </div>

                    <div class="form-group">
                        <label for="senha1">Senha</label>
                        <input type="password" class="form-control" name="senha1" id="senha1" required>
                    </div>

                    <div class="form-group">
                        <label for="senha2">Confirma Senha</label>
                        <input type="password" class="form-control" name="senha2" id="senha2" onkeyup="validarSenha()" required>
                        <p>
                            <input type="checkbox" class="btn btn-info" onclick="mostrarOcultarSenhaCadastro()"> <b>Mostrar senha</b>
                        </p>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Cadastrar">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light text-center py-3 mt-4">
        <p>Todos direitos reservados.</p>
    </footer>

</body>
</html>
