<?php
//Conecta com o Banco de Dados MySQL
$host="pi.cj8iq16vacqe.us-east-1.rds.amazonaws.com";
$usuario="root";
$senha="admin";
$banco="projetomo";
$conecta="";
$conexao = new mysqli ('pi.cj8iq16vacqe.us-east-1.rds.amazonaws.com', 'root', 'adminadmin', 'projetomo');
//Checa se a conexão obteve sucesso
if ($conexao->connect_error){
    die("Conexao falhou:" .$conexao->connect_error);
} else {
//echo "Conectado";
}

?>
