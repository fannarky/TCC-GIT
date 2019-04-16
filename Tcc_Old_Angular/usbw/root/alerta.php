<?php
	include 'conexaobanco.php';

	$result1 = mysql_query("SELECT vl_salario from tb_usuario where cd_usuario = 19");
	$result2 = mysql_query("SELECT sum(vl_compra) as 'SOMA' from tb_gasto_diario where cd_usuario = 19");
	while($row1 = mysql_fetch_assoc($result1) && $row2 = mysql_fetch_assoc($result2))
	{
		if ($row1["vl_salario"] < $row2["SOMA"]) {
			echo "acima do salário";
		}
		else{
			echo "ainda da pra comprar";
		}
	}
?>