<?php 
	session_start();
	include 'conexaobanco.php';
	
  $artigos = mysql_query("SELECT ds_frase, nm_autor FROM tb_frase_motivacao order by rand() limit 1 ");
  $obj = mysql_fetch_assoc($artigos);
  echo json_encode($obj);

	?>				