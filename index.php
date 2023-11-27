<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Observatório - Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <style>
        .paragrafo-estilizado {
            background-color: #90A19D; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            color: #333; 
            font-family: 'Arial', sans-serif; 
        }

    </style>

    <script type="text/javascript" src="js/script.js"></script>
</head>
<body>
    <header class="bg-dark text-light text-center py-4">
        <h2>Observatório - Login / Cadastro</h2>
    </header>

    <div class="container mt-4">
        <p class="paragrafo-estilizado">Realize o login / Cadastro para acessar o Observatório.</p>
        <hr class="border border-primary border-3 opacity-75">
        <?php
            //Em caso de erro na URL exibe a mensagem 
            if(isset($_GET['erro'])){
                echo '<p class="text-center bg-danger">Usuário ou Senha incorretos!</p>';
            }

            if(isset($_GET['autentica'])){
                echo '<p class="text-center bg-danger">Sem negado! Usuário não logado! Por favor, efetue o Login</p>';
            }
        ?>
    </div>
        

        <!-- Formulário para logar Usuário -->
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">Login</h2>
                <!-- JS para logar Usuário -->
                <div class="w3-container text-center">
                    <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-success" value="Login">Login</button>

                    <div id="id01" class="w3-modal">
                        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                                <img src="img/back.jpeg" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                            </div>

                            <form class="w3-container" action="login.php" method="POST">
                                <div class="w3-section">
                                <label><b>Login</b></label>
                                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="login" id="login" required>
                                <label><b>Senha</b></label>
                                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="senha" id="senha" required>
                                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
                                
                            </form>

                            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                                <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-6">
            <h2 class="text-center">Cadastro</h2>
            <!-- JS para Cadastrar Usuário -->
            <div class="w3-container text-center">
                    <button onclick="document.getElementById('id0C').style.display='block'" class="btn btn-success" value="Cadastrar">Cadastro</button>

                <div id="id0C" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                        <div class="w3-center"><br>
                            <span onclick="document.getElementById('id0C').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                            <img src="img/back2.jpeg" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                        </div>

                        <form class="w3-container" action="cadastro.php" method="POST">
                            <div class="w3-section">
                                <label><b>Nome de usuário</b></label>
                                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="nome_usuario" required>
                                <label><b>Login</b></label>
                                <input class="w3-input w3-border" type="text" placeholder="Enter Password" name="login" required>

                                <label for="senha1"><b>Senha</b></label>
                                <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="senha1" id="senha1" required>

                                <label for="senha2"><b>Confirma Senha</b></label>
                                <input class="w3-input w3-border" type="password" placeholder="Confirm Password" name="senha2" id="senha2" onkeyup="validarSenha()" required>

                                <p>
                                    <input type="checkbox" class="btn btn-info" onclick="mostrarOcultarSenhaCadastro()"> <b>Mostrar senha</b>
                                </p>

                                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Cadastrar</button>
                            </div>
                        </form>

                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id0C').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                            <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
        <img src="img/back3.jpeg" alt="Constelação" class="img-fluid mb-3">
        </div>
            

    <footer class="bg-dark text-light text-center py-3 mt-4">
        <p>Todos direitos reservados.</p>
    </footer>

</body>
</html>
