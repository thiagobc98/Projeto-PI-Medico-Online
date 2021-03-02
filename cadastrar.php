<?php
  require_once('Classes/pacientes.php');
  $u = new Paciente;

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
        <!--FORMULÁRIO DE CADASTRO PACIENTE-->
    <div class="content">
      <div id="cadastro">
        <form method="post"> 
          <h1>Cadastro de pacientes</h1>
           
          <p> 
            <label for="nome_pac">Nome Completo</label>
            <input id="nome_pac" name="nome_pac" required="required" type="text" placeholder="nome" maxlength="30" />
          </p>
           
          <p> 
            <label for="email_pac">E-mail</label>
            <input id="email_pac" name="email_pac" required="required" type="email" placeholder="contato@htmlecsspro.com" maxlength="50" /> 
          </p>
           
          <p> 
            <label for="senha_pac">Senha</label>
            <input id="senha_pac" name="senha_pac" required="required" type="password" placeholder="ex. 1234" maxlength="15" />
          </p>


          <p>
            <label for="datanasc_pac">Data de Nascimento</label>
            <input id="datanasc_pac" name="datanasc_pac" required="required" type="date">
          </p>

          <p> 
            <label for="cpf_pac">CPF</label>
            <input id="cpf_pac" name="cpf_pac" required="required" type="CPF" placeholder="ex. 000000000-00"/>
          </p>

          <p> 
            <label for="sexo_pac">Sexo</label>
            <select id="sexo_pac" name="sexo_pac">
              <option>Sexo</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outro">Outro</option>
            </select>
          </p>


            

           
          <p> 
            <input type="submit" value="Cadastrar"/> 
          </p>
           
          <p class="link">  
            Já tem conta?
            <a href="index.php"> Ir para Login </a>
          </p>
        </form>
      </div>
    </div>
    <?php

    // verificar se a pessoa clicou no botão cadastrar

   if ( isset($_POST["nome_pac"]))
    {
      $nome = ($_POST["nome_pac"]);
      $email = ($_POST["email_pac"]);
      $senha = ($_POST["senha_pac"]);
      $datanasc = ($_POST["datanasc_pac"]);
      $cpf = ($_POST["cpf_pac"]);
      $sexo = ($_POST["sexo_pac"]);


      // verificar se está preenchido
      if (!empty($nome) && !empty($email) && !empty($senha) && !empty($datanasc) && !empty($cpf) && !empty($sexo)) 
      {

            $strcon = mysqli_connect('pi.cj8iq16vacqe.us-east-1.rds.amazonaws.com', 'root', 'adminadmin', 'projetomo');
            $sql = "INSERT INTO pacientes (nome, email, senha, datanasc, cpf, sexo) VALUES('$nome','$email', '$senha', '$datanasc', '$cpf', '$sexo')";

            mysqli_query($strcon, $sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($strcon);
            echo "Paciente cadastrado com sucesso!";



      }
      else
      {
        echo "Preencha todos os campos!";
      }
    }
      ?>
</body>
</html>
