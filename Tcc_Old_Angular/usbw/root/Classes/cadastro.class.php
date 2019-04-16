<?php
	class Cadastro{
		//DADOS DO PACIENTE-------------------------------------------
		
		public function dadosPaciente($nome ,$email, $genero,$data, $celular, $cpf, $login, $senha){
			include 'conexaobanco.php';
			$insertincrement = "SELECT max(cd_usuario) +1 usuario from tb_usuario";
       		$resincrement = mysql_fetch_assoc(mysql_query($insertincrement));
        	$cdusuario = $resincrement["usuario"];
			$incluir = mysql_query("CALL spCadastroUsuario(".$cdusuario.",'".$nome."', ".$genero.",'".$data."','".$celular."', '".$email."', '".$senha."', '".$cpf."', '".$login."' )") or die(mysql_error());
			mysql_query("INSERT INTO tb_meta_semanal(vl_limite, dt_duracao, cd_usuario, cd_situacao_meta) values (1000, curdate(), ".$cdusuario.", 0)  ");
			mysql_close();
			return "<script language='javascript' type='text/javascript'>alert('Usuario Cadastrado Com Sucesso'); window.location.href='index.php';</script>";
		}

		//DADOS DO MEDICO------------------------------------------
		public $nomemedico;
		public $sexomedico;
		public $emailmedico;
		public $telefonemedico;
		public $celularmedico;
		public $cpfmedico;
		public $crm;
		public $loginmedico;
		public $senhamedico;

		public function dadosMedico($nome, $cpf, $crm,$senha){
			$this->nomemedico = $nome;
			$this->cpfmedico = $cpf;
			$this->crm = $crm;
			$this->loginmedico = $login;
			$this->senhamedico = $senha;
			include 'conexaobanco.php';
			$insertincrement = "SELECT max(cd_medico) +1 as medico from tb_medico";
       		$resincrement = mysql_fetch_assoc(mysql_query($insertincrement));
        	$cdusuario = $resincrement["medico"];
			$incluir = mysql_query("CALL spCadastraMedico(".$cdusuario.", '".$nome."', '".$crm."', '".$cpf."', '".$senha."')") or die(mysql_error());
			mysql_close();
			return "<script language='javascript' type='text/javascript'>alert('Médico Cadastrado Com Sucesso'); window.location.href='index.php';</script>";
		}

	}
  ?>
