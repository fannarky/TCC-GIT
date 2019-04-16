<?php		
Class Alteracao{
		public function alteraLogin($novologin, $cd_usuario)
		{
			include 'conexaobanco.php';
			$incluir = mysql_query("CALL spAlteraLoginUsuario(".$cd_usuario.",'".$novologin."')") or die(mysql_error());
			mysql_close();
		}

		public function alteraNome($novonome, $cd_usuario)
		{
			include 'conexaobanco.php';
			$incluir = mysql_query("CALL spAlteraNomeUsuario(".$cd_usuario.", '".$novonome."')") or die(mysql_error());
			$volta = mysql_query("select nm_usuario from tb_usuario where cd_usuario = '$cd_usuario' ");
			$nomenovo = mysql_fetch_assoc($volta);
			mysql_close();
			return $nomenovo;
		}

		public function alteraSenha($novasenha, $cd_usuario)
		{
			include 'conexaobanco.php';
			$incluir = mysql_query("CALL spAlteraSenhaUsuario(".$cd_usuario.", '".$novasenha."')") or die(mysql_error());
			mysql_close();
		}

		public function alteraTelefone($telefone, $cd_usuario)
		{
			include 'conexaobanco.php';
			$incluir = mysql_query("CALL spAlteraTelefoneUsuario(".$cd_usuario.", '".$telefone."')") or die(mysql_error());
			mysql_close();
		}

		public function alteraCelular($cd_usuario, $celular)
		{
			include 'conexaobanco.php';
			$incluir = mysql_query("CALL spAlteraCelular( '".$celular."',".$cd_usuario.")") or die(mysql_error());
			mysql_close();
		}

		public function Deletar($cd_usuario)
		{
			include 'conexaobanco.php';
			$incluir = mysql_query("CALL spApagarUsuario(".$cd_usuario.")") or die(mysql_error());
			mysql_close();
		}

		public function alteraProfissao($cd_usuario, $nm_profissao){
			include 'conexaobanco.php';
			$update = mysql_query("UPDATE tb_usuario SET nm_profissao = '".$nm_profissao."' WHERE cd_usuario = ".$cd_usuario." ") or die(mysql_error());
			echo $update;
			mysql_close();
		}

		public function alteraSalario($cd_usuario, $vl_salario){
			include 'conexaobanco.php';
			$update = mysql_query("UPDATE tb_usuario SET vl_salario = ".$vl_salario." where cd_usuario = ".$cd_usuario." ");
			mysql_close();
		}
	}
?>