<!DOCTYPE html>
<html>
<head>
	<title>Sonho de Consumo</title>
</head>
<body>
<form method="post" id="frmcad">


	<div id="seila">
		<?php
			include 'conexaobanco.php';
			$query = mysql_query("SELECT nm_sonho_consumo, vl_sonho_consumo from tb_sonho_consumo where cd_usuario = 1");
			while($array = mysql_fetch_assoc($query)){
				echo "<p style='text-align: center'>".$array["nm_sonho_consumo"].", ".$array["vl_sonho_consumo"].", <input type='text' name='valor'> Valor a ser  </p>
				";
			}

		?>
	</div>
	<p>Nome do Produto</p>
	<input type="text" id="nome" name="nome">
	<p>Valor do produto</p>
	<input type="text" name="valor" id="valorproduto">
	<button id="ok" name="ok">ok</button>

</form>
	<script src="JQuery/jquery-1.11.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#frmcad').submit(function(){
				$.post('phpsonho.php', $('#frmcad').serialize(), function(){window.location.href='phpsonho.php'});
        	});
        	return true;		
		});
	</script>

</body>
</html>