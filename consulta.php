<?php

	session_start();
	if (isset($_SESSION['id_paciente'])) {

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
					<h1>Consulta Médica</h1>
					<P>
						<h2>Corona Vírus</h2>
                    <p>
					<label for="corona_febre">Você está com febre?</label>
					<input id="corona_febre"type="text" name="corona_febre" required="required" placeholder="Ex. Estou não">
					</p>
					<p>
					<label for="corona_faltar">Você está com falta de ar?</label>
					<input type="text" name="corona_faltar" id="corona_faltar" required="required" placeholder="Ex. Estou não.">
					</p>
					<p>
					<label for="corona_tosce">Você está com tosce seca?</label>
					<input type="text" name="corona_tosce" id="corona_tosce" required="required" placeholder="Ex. Estou não.">
					</p>

					<p>
						<h2>Continuação da consulta</h2>
                    <p>
            		<label for="oquesente_consulta">O que você está sentindo?</label>
            		<input id="oquesente_consulta" name="oquesente_consulta" required="required" type="text" placeholder="Ex. febre, falta de ar, dor no peito e etc..."/>
            		</p>
            		<p>
            		<label for="quantotempo">Quantos dias está se sentindo mau?</label>
            		<input id="quantotempo" name="quantotempo" required="required" type="text" placeholder="Ex. Estou me sentindo mau tem uns 5 dias."/>
            		</p>
            		<p>
            		<label for="medicamentos">Você tomou algum tipo de medicamento? Se sim, qual(is)?</label>
            		<input id="medicamentos" type="text" name="medicamentos" required="required" placeholder="Ex. Sim, tomei tal, tal, tal...">
            		</p>
            		<p>
            		<label for="doenca">Você tem algum tipo de doença crônica? Se sim, qual(is)?</label>
            		<input id="doenca" type="text" name="doenca" required="required" placeholder="Ex. Sim, tenho diabetes.">	
            		</p>
            		<p>
            		<label for="alergiamed">Você tem alergia a algum tipo de medicamento? Se sim, qual(is)?</label>
            		<input type="text" name="alergiamed" id="alergiamed" required="required" placeholder="Ex. Não tenho alergia.">

            		</p>
            		<p>
            		<label for="alergia">Você tem algum tipo de alergia? Se sim, qual(is)?</label>
            		<input type="text" name="alergia" id="alergia" required="required" placeholder="Ex. Sim, tenho alergia a mofo e a frutos do mar.">	
            		</p>
            		<p>
            		<label for="exames">Seus exames estão em dia?</label>
            		<input id="exames" type="text" name="exames" required="required" placeholder="Ex. Sim">	
            		</p>
            		<p> 
            		<input type="submit" value="Enviar laudo Médico"  />

          			</p>
                </form>
</body>
