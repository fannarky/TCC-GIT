<?php 
	session_start();
	include 'conexaobanco.php';
	if (isset($_POST["aceitar"])) {
		mysql_query("UPDATE medico_usuario set cd_situacao = 1 where cd_usuario = ".$_SESSION["cd_usuario"]." ") or die(mysql_error());
		echo "<script>alert('medico vinculado'); window.location.href='homepage.php';</script>";
	}
	else{
		mysql_query("DELETE FROM medico_usuario where cd_usuario = ".$_SESSION["cd_usuario"]." ");
	}
 ?>