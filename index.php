<?php
  include_once 'conexao.php';
  session_start();

  require_once 'Classes/pacientes.php';
  $u = new Paciente
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Médico On-Line</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="estilo.css" />
  <link rel="icon" href="Imagens/logo.png">
  <link href="bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.5.0-dist/js/jquery-3.5.1.min"></script>
  <script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap-4.5.0-dist/js/jquery-3.5.1.min"></script>
</head>
<body>
  <div class="content">
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="post"> 
          <h1>Login</h1>

            <p>
                <label for="tipo">Quero entrar como </label>
                <select id="tipo" name="tipo">
                    <option>Selecione</option>
                    <option value="medico">Médico</option>
                    <option value="paciente">Paciente</option>

                </select>
            </p>

          <p> 
            <label for="email_user">Seu e-mail</label>
            <input name="email_user" required="required" type="text" placeholder="ex. fulano@ciclano.com" maxlength="50" />
          </p>
           
          <p> 
            <label for="password_user">Sua senha</label>
            <input name="password_user" required="required" type="password" placeholder="ex. senha" maxlength="32" />
          </p>
           

           
          <p> 
            <input type="submit" name="login" value="Logar"  />

          </p>
           
            <p class="link"> Cadastre-se
            <a href="cadastrarmed.php">Médico</a> <a href="cadastrar.php">Paciente</a>

            </p>
        </form>
      </div>
  </div>

      <?php

            if (isset($_POST['login'])) {
                if (($_POST['tipo']) == 'paciente') {
                    if (isset($_POST['email_user']) and isset($_POST['password_user'])) {
                        $email = $_POST['email_user'];
                        $password = $_POST['password_user'];


                        $sql = "SELECT email, senha FROM pacientes WHERE email = '$email' AND senha = '$password'";
                        $result = mysqli_query($conexao, $sql);

                        $busca = mysqli_num_rows($result);

                        if ($busca == 1) {
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            header('Location: consulta.php');
                            exit;
                        } else {
                            echo 'Usuário ou senha inválidos.';
                        }
                    }
                }

                else if (($_POST['tipo']) == 'medico') {
                    if (isset($_POST['email_user']) and isset($_POST['password_user'])) {
                        $email = $_POST['email_user'];
                        $password = $_POST['password_user'];


                        $sql = "SELECT email, senha FROM medicos WHERE email = '$email' AND senha = '$password'";
                        $result = mysqli_query($conexao, $sql);

                        $busca = mysqli_num_rows($result);

                        if ($busca == 1) {
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            header('Location: relatorio.php');
                            exit;
                        } else {
                            echo 'Usuário ou senha inválidos.';
                        }
                    }
                }



            }

            ?>

</body>


