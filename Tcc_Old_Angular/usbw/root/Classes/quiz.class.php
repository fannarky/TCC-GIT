<?php
	class Quiz 
	{
		public function recebeResp($q1, $q2, $q3, $q4, $q5, $q6, $q7, $q8, $q9, $q10, $q11, $q12, $q13, $q14, $q15){
		include 'conexaobanco.php';
		$pt = 0;
		$pt2 = 0;
		if ($q1 == "Sim") {
				$pt ++;
		}
		
		if ($q2 == "Sim") {
			$pt ++;
		}
		if ($q3 == "Sim") {
			$pt ++;
		}
		
		if ($q4 == "Sim") {
				$pt ++;
		}
		
		if ($q5 == "Sim") {
				$pt ++;
		}

		if ($q6 == "Sim") {
				$pt ++;
		}
		
		if ($q7 == "Sim") {
				$pt ++;
		}
		
		if ($q8 == "Com certeza sim") {
			$pt2 += 0;
		}
		elseif ($q8 == "Talvez sim" ) {
			$pt2 += 1;
		}
		elseif ($q8 == "Talvez não"){
			$pt2 +=2;
		}
		elseif ($q8 == "Com certeza não") {
			$pt2 +=3;
		}
		
		if ($q9 == "Com certeza sim") {
			$pt2 += 0;
		}
		elseif ($q9 == "Talvez sim" ) {
			$pt2 += 1;
		}
		elseif ($q9 == "Talvez não"){
			$pt2 +=2;
		}
		elseif ($q9 == "Com certeza não") {
			$pt2 +=3;
		}
	
		if ($q10 == "Com certeza sim") {
			$pt2 += 3;
		}
		elseif ($q10 == "Talvez sim" ) {
			$pt2 += 2;
		}
		elseif ($q10 == "Talvez não"){
			$pt2 +=1;
		}
		elseif ($q10 == "Com certeza não") {
			$pt2 +=0;
		}
		
		if ($q11 == "Com certeza sim") {
			$pt2 += 3;
		}
		elseif ($q11 == "Talvez sim" ) {
			$pt2 += 2;
		}
		elseif ($q11 == "Talvez não"){
			$pt2 +=1;
		}
		elseif ($q11 == "Com certeza não") {
			$pt2 +=0;
		}

		if ($q12 == "Com certeza sim") {
			$pt2 += 0;
		}
		elseif ($q12 == "Talvez sim" ) {
			$pt2 += 1;
		}
		elseif ($q12 == "Talvez não"){
			$pt2 +=2;
		}
		elseif ($q12 == "Com certeza não") {
			$pt2 +=3;
		}
		
		if ($q13 == "Com certeza sim") {
			$pt2 += 0;
		}
		elseif ($q13 == "Talvez sim" ) {
			$pt2 += 1;
		}
		elseif ($q13 == "Talvez não"){
			$pt2 +=2;
		}
		elseif ($q13 == "Com certeza não") {
			$pt2 +=3;
		}
		
		if ($q14 == "Com certeza sim") {
			$pt2 += 3;
		}
		elseif ($q14 == "Talvez sim" ) {
			$pt2 += 2;
		}
		elseif ($q14 == "Talvez não"){
			$pt2 +=1;
		}
		elseif ($q14 == "Com certeza não") {
			$pt2 +=0;
		}
		
		if ($q15 == "Com certeza sim") {
			$pt2 += 3;
		}
		elseif ($q15 == "Talvez sim" ) {
			$pt2 += 2;
		}
		elseif ($q15 == "Talvez não"){
			$pt2 +=1;
		}
		elseif ($q15 == "Com certeza não") {
			$pt2 +=0;
		}
		
		$rp1 = "";
		$rp2 = "";
		if ($pt > 3) {
			$rp1 = "Referente ao Planejamento : Você já possui as habilidades necessárias para fazer boas compras";
			echo $rp1;
		}
		else {
			$rp1 = "Referente ao Planejamento :  Você precisa planejar melhor as suas compras";
			echo $rp1;
		}

		if ($pt2 > 0 && $pt2 < 8) {
			$rp2 = "Referente ao controle de compras : Você não conseguiu se controlar, foi uma compra compulsiva";
		}

		elseif ($pt2 >=9 && $pt2 < 16) {
			$rp2 = "Referente ao controle de compras : O controle foi parcial, pode ter sido uma compra compulsiva";
		}

		elseif ($pt2 >=17 && $pt2 <=24) {
			$rp2 = "Referente ao controle de compras : Você se controlou a maior parte do tempo durante esta compra";
		}
		$pontuacao = ($pt*100)/7;
		$pontuacao1 = ($pt2*100)/24;
		$insere = mysql_query("insert into tb_quiz_planej(nm_diagnostico_planej, cd_usuario, qt_pontos_planej) values('".$rp1."',".$_SESSION["cd_usuario"].",".$pontuacao.")") or die(mysql_error());
		$insere2 = mysql_query("insert into tb_quiz_contro_comp(nm_diagnostico_contro_comp	, cd_usuario, qt_pontos_contro_comp) values('".$rp2."',".$_SESSION["cd_usuario"].",".$pontuacao1.")") or die(mysql_error());
		
		return "<script language='javascript' type='text/javascript'>alert('Informações Enviadas com Sucesso!'); window.location.href='homepage.php'</script>;";

	}
	}
?>