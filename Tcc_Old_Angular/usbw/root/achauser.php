<?php
	session_start();
	include 'conexaobanco.php';
	if (isset($_POST["enviar"])) {
		$pegacdusuario = mysql_query("select cd_usuario from tb_usuario where cd_cpf = '".$_POST["cpf"]."' ") or die(mysql_error());
		$pegacdusuario2 = mysql_fetch_assoc($pegacdusuario);
		$incluir = mysql_query("INSERT INTO medico_usuario(cd_usuario, cd_medico) values (".$pegacdusuario2["cd_usuario"].", ".$_SESSION["cd_medico"].")") or die(mysql_error());
		echo"<script language='javascript' type='text/javascript'>alert('Solicitação Enviada') ; window.location.href='homepagemedico.php';</script>"; 
	}
?>