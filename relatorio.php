<?php

session_start();
if (isset($_SESSION['id_medico'])) {

    header("Location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Médico On-Line</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css" />
    <link rel="icon" href="Imagens/logo.png">
    <link href="bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-4.5.0-dist/js/jquery-3.5.1.min"></script>
</head>
<body>
<div class="container" >
    <div class="content1">
        <div id="Consulta">
            <form method="post" action="">
                <a href='index.php'><input type='button' name='logout' value='logout'></a>
                <h1> ESTÁ SENDO IMPLEMENTADA PARA UMA MELHOR EXPERIÊNCIA...</h1>
            </form>
</body>



