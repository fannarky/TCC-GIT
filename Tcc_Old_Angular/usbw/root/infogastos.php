 <?php
	session_start();
	if (isset($_POST["enviar"])) {
	include 'conexaobanco.php';
	$nm_produto = $_POST["nm_produto"];
	$nm_sentimento = $_POST["Feeling"];
	$vl_produto = $_POST["preco"];
	$qt_compra = $_POST["quantidade"];
	$query = mysql_query("INSERT INTO tb_gasto_diario(nm_compra, vl_compra, dt_compra, ds_compra, qt_compra, cd_usuario) VALUES ('".$nm_produto."','".$vl_produto."',curdate(),'".$nm_sentimento."','".$qt_compra."','".$_SESSION['cd_usuario']."')") or die(mysql_error());
	header("Location:Homepage.php");
	}
	else{
		header("location: Homepage.php");
		echo "<script> alert('Seu saldo está zerado! não é possivel inserir mais gastos neste mes');</script>";
	
	}

?>
