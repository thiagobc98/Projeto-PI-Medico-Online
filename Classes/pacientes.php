<?php

	Class Paciente
	{
		private $pdo;
		private $servidor;
		public $msgErro = "";



		public function conectar($nome, $host, $usuario, $senha)
		{
			global $pdo;
			global $servidor;
			global $msgErro;
			try{

				$pdo = new PDO("mysql:dbname = ".$nome.";host = ".$host, $usuario, $senha);
                //$host = "localhost";
                //$usuario = "root";
                //$senha = "admin";
                //$nome = "projetomo";
                //$servidor = mysqli_connect($host, $usuario, $senha);
                //$pdo = mysqli_select_db($servidor, $nome);

			} catch (PDOException $e){
				$msgErro = $e ->getMessage();
			}
			
		}

		public function cadastrar($nome, $email, $senha, $data_nasc, $cpf, $sexo)
		{
			global $pdo;
			//Verificar se ja existe email cadastrado
				$sql = $pdo -> prepare("SELECT id_paciente FROM pacientes 
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

					$sql = $pdo -> prepare("INSERT INTO pacientes (nome, email, senha, cpf, data_nasc, sexo) VALUES (:n, :e, :s, :c, :d, :sx)");

					$sql -> bindValue(":n", $nome);
					$sql -> bindValue(":e", $email);
					$sql -> bindValue(":s", md5($senha));
					$sql -> bindValue(":c", $cpf);
					$sql -> bindValue(":d", $data_nasc);
					$sql -> bindValue(":sx", $sexo);

					$sql -> execute();
					return true;
				}

			


		}
		
		public function logar($email, $senha)
		{
			global $pdo;

			//Verificar se o email e senha estão cadastrados, se sim, entra no sistema

			$sql = $pdo -> prepare("SELECT id_paciente FROM pacientes WHERE email = :e AND senha = :s");

			$sql->bindValue(":e", $email);
			$sql -> bindValue(":s", md5($senha));
			$sql -> execute();

			if ($sql -> rowCount() > 0)
			{
				$dado = $sql->fetch();
				session_start();
				$_SESSION['id_paciente'] = $dado["id_paciente"];
				return true; // logado com sucesso
			}
			else
			{
				return false; // não foi possivel logar
			}

		}
	}

?>