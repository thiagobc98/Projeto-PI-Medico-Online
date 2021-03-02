<?php
    require_once('Classes/medicos.php');
    $m = new medicos;
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
<!--FORMULÁRIO DE CADASTRO MÉDICO-->
<div class="content">
    <div id="cadastro">
        <form method="post">
            <h1>Cadastro de médicos</h1>

            <p>
                <label for="nome_med">Nome Completo</label>
                <input id="nome_med" name="nome_med" required="required" type="text" placeholder="nome" maxlength="30" />
            </p>

            <p>
                <label for="email_med">E-mail</label>
                <input id="email_med" name="email_med" required="required" type="email" placeholder="contato@htmlecsspro.com" maxlength="50" />
            </p>

            <p>
                <label for="senha_med">Senha</label>
                <input id="senha_med" name="senha_med" required="required" type="password" placeholder="ex. 1234" maxlength="15" />
            </p>


            <p>
                <label for="datanasc_med">Data de Nascimento</label>
                <input id="datanasc_med" name="datanasc_med" required="required" type="date">
            </p>

            <p>
                <label for="cpf_pac">CPF</label>
                <input id="cpf_med" name="cpf_med" required="required" type="CPF" placeholder="ex. 000000000-00"/>
            </p>
            <p>
                <label for="crm">CRM</label>
                <input id="crm" name="crm" required="required" type="text" placeholder="ex. 00000">
            </p>
            <p>
                <label for="datains">Data de inscrição</label>
                <input id="datains" name="datains" required="required" type="date">
            </p>
            <p>
                <label for="esp">Especialidade</label>
                <input id="esp" name="esp" required="required" type="text" placeholder="ex. Pediatria">
            </p>
            <p>
                <label for="area">Área de atuação</label>
                <input id="area" name="area" required="required" type="text" placeholder="ex. Neonatologia">
            </p>

            <p>
                <label for="sexo_med">Sexo</label>
                <select id="sexo_med" name="sexo_med">
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

// verificar se a pessoa clicou no botão cadastrar médico

if ( isset($_POST["nome_med"]))
{
    $nome = ($_POST["nome_med"]);
    $email = ($_POST["email_med"]);
    $senha = ($_POST["senha_med"]);
    $datanasc = ($_POST["datanasc_med"]);
    $cpf = ($_POST["cpf_med"]);
    $sexo = ($_POST["sexo_med"]);
    $crm = ($_POST["crm"]);
    $datains = ($_POST["datains"]);
    $esp = ($_POST["esp"]);
    $area = ($_POST["area"]);

    // verificar se está preenchido
    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($datanasc) && !empty($cpf) && !empty($sexo) && !empty($crm) && !empty($datains) && !empty($esp) && !empty($area))
    {
        //teste
        $strcon = mysqli_connect('pi.cj8iq16vacqe.us-east-1.rds.amazonaws.com', 'root', 'adminadmin', 'projetomo');
        $sql = "INSERT INTO medicos (nome, email, senha, datanasc, cpf, sexo, crm, datains, esp, area) VALUES('$nome','$email', '$senha', '$datanasc', '$cpf', '$sexo', '$crm', '$datains', '$esp', '$area')";

        mysqli_query($strcon, $sql) or die("Erro ao tentar cadastrar registro");
        mysqli_close($strcon);
        echo "Médico cadastrado com sucesso!";

    }


    else
    {
        echo "Preencha todos os campos!";
    }
}
?>
</body>
</html>



