<!DOCTYPE html>
<html>
<head>
	<title>Sonho de Consumoo</title>
</head>
<body>
	<form id="frmenviasonho" method="post">
		<label for="produto">Nome do Produto</label>
		<input type="text" name="nome">
		<label for="valorproduto">Valor do Produto</label>
		<input type="text" name="valor">
		<input type="submit" name="enviar">
	</form>
	<script src="JQuery/jquery-1.11.1.min.js"</script>
	<script>
		$(document).ready(function(){
			$('#frmenviasonho').submit(function(){
				$.post("enviasnho.php", $('#frmenviasonho').serialize(), function(){
					alert("funciona?");	
				});
			});
		});
	</script>
</body>
</html>