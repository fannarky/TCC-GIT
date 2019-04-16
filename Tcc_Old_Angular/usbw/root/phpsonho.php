  <?php
  	include 'conexaobanco.php';
	if (isset($_POST["nome"])) {
		$vlsonho = $_POST["valor"];
		$nmsonho = $_POST["nome"];
		$incluir = mysql_query("INSERT INTO tb_sonho_consumo(cd_usuario, vl_sonho_consumo, nm_sonho_consumo) values (1, ".$vlsonho.", '".$nmsonho."')") or die(mysql_error());
	}else{
		echo "erro";
	}

?>