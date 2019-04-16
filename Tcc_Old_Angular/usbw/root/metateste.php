<!DOCTYPE html>
<html>
<head>
	<title>Teste Caraio</title>
</head>
<body>
	<script src="JQuery/jquery-1.11.1.min.js"</script>
	<script src="Meta.js"></script>
	<button name="criar" id="create">Criar Meta</button>
	<div id="novameta">
		<p>Valor da Meta</p>
		<input type="text" name="valor" id="valor" readonly>
		<input type="text" id="qtproduto" name="quantidade" readonly>
		<br><br>
		<select>
			<option>Diaria</option>
			<option>Semanal</option>
		</select>
		<button name="PegarMeta">Pegar Meta</button>
	</div>	
	<script>
		$(document).ready(function(){
		$('#create').click(function(){
		var seila = Math.floor((Math.random() * 500) + 1);
		var qtproduto = Math.floor((Math.random() * 10) + 1);
		$('#valor').val(seila);
		$('#qtproduto').val(qtproduto);
	});
});
	</script>
</body>
</html>