	<?php
	session_start();
	include_once 'Classes/quiz.class.php';
	$quiz = new Quiz();
	echo $quiz->recebeResp($_POST["q1"],$_POST["q2"],$_POST["q3"],$_POST["q4"],$_POST["q5"],$_POST["q6"],$_POST["q7"],$_POST["q8"],$_POST["q9"],$_POST["q10"],$_POST["q11"],$_POST["q12"],$_POST["q13"],$_POST["q14"],$_POST["q15"]);
	
  ?>