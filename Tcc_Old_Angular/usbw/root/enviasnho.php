<?php
	include 'conexaobanco.php';
	session_start();
	$query = mysql_query("INSERT INTO tb_sonho_consumo(nm_sonho_consumo, vl_sonho_consumo, cd_usuario) VALUES('".$_POST["nome"]."', ".$_POST["valor"].", ".$_SESSION["cd_usuario"].") ") or die(mysql_error());
	echo "foi";
?>