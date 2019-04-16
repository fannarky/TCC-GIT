<?php
	include 'conexaobanco.php';
	$pegar = mysql_query("SELECT * FROM tb_artigo where ds_artigo like '%".$_POST["digita"]."%' ");
	$arr = mysql_fetch_array($pegar);
	echo json_encode($arr);
?>