<?php
	include 'conexaobanco.php';
	session_start();
	$extensao = strtolower(substr($_FILES["imagem"]["name"], -4));
	$novonome = time() .$extensao;
	
	echo $novonome;
	move_uploaded_file($_FILES["imagem"]["tmp_name"], "Imagens/Cadastro/".$novonome); 
	
	$inserir = mysql_query("update tb_usuario set img_perfil = '".$novonome."' where cd_usuario = ".$_SESSION["cd_usuario"]." ") or die(mysql_error());
	?>