<?php

Class medicos
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;
        try{

            $pdo = new PDO("mysql:dbname = ".$nome.";host = ".$host, $usuario, $senha);

        } catch (PDOException $e){
            $msgErro = $e ->getMessage();
        }

    }

    public function cadastrar($nome, $email, $senha, $data_nasc, $cpf, $sexo, $crm, $datains, $esp, $area)
    {
        global $pdo;
        //Verificar se ja existe email cadastrado
        $sql = $pdo -> prepare("SELECT id_medico FROM medicos 
					WHERE email = :e");
        $sql -> bindValue(":e", $email);
        $sql -> execute();
        if($sql -> rowCount() > 0)
        {
            return false; // ja está cadastrada
        }
        else
        {
            //caso não, cadastrar

            $sql = $pdo -> prepare("INSERT INTO medicos (nome, email, senha, cpf, data_nasc, sexo, crm, datains, esp, area) VALUES (:n, :e, :s, :c, :d, :sx, :cr, :di, :es, :a)");

            $sql -> bindValue(":n", $nome);
            $sql -> bindValue(":e", $email);
            $sql -> bindValue(":s", md5($senha));
            $sql -> bindValue(":c", $cpf);
            $sql -> bindValue(":d", $data_nasc);
            $sql -> bindValue(":sx", $sexo);
            $sql -> bindValue(":cr", $crm);
            $sql -> bindValue(":di", $datains);
            $sql -> bindValue(":es", $esp);
            $sql -> bindValue(":a", $area);


            $sql -> execute();
            return true;
        }




    }

    public function logar($email, $senha)
    {
        global $pdo;

        //Verificar se o email e senha estão cadastrados, se sim, entra no sistema

        $sql = $pdo -> prepare("SELECT id_medico FROM medicos WHERE email = :e AND senha = :s");

        $sql->bindValue(":e", $email);
        $sql -> bindValue(":s", md5($senha));
        $sql -> execute();

        if ($sql -> rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_medico'] = $dado["id_medico"];
            return true; // logado com sucesso
        }
        else
        {
            return false; // não foi possivel logar
        }

    }
}

?>