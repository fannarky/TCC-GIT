<!DOCTYPE html>
<html>
<title>Página Inicial</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>>
<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css">
<script type="text/javascript" src="JQuery/jquery-3.1.1.js"></script>
<script type="text/javascript" src="Scripts/homepage.js"></script>

<?php
session_start();
if ($_SESSION["logado"] != "TRUE") 
      {
        echo"<script language='javascript' type='text/javascript'>alert('Você não está logado, Por Favor Entre na sua Conta') ; window.location.href='index.php';</script>";
      }
  
  include 'conexaobanco.php';
  $query = mysql_query("call sp_geraMeta(".$_SESSION["cd_usuario"].") ") or die(mysql_error());
  


  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d-m-Y');

$quiz = mysql_query("SELECT qt_pontos_planej from tb_quiz_planej where cd_usuario = ".$_SESSION['cd_usuario']." ");
  $pontuacao = mysql_fetch_assoc($quiz);
  $quiz2 = mysql_query("SELECT qt_pontos_contro_comp from tb_quiz_contro_comp where cd_usuario = ".$_SESSION['cd_usuario']." ");
  $pontuacao2 = mysql_fetch_assoc($quiz2);

$salario = mysql_query("SELECT (100 - (100 * (SELECT total_compra FROM vwcalculosalario WHERE cd_usuario = ".$_SESSION['cd_usuario'].")/(select vl_salario from vwcalculosalario where cd_usuario = ".$_SESSION['cd_usuario']."))) as Porcentagem");
$salarioconfirmed = mysql_fetch_assoc($salario);
if ($salarioconfirmed["Porcentagem"] < 0 ){
  $alerta = "<a href='#' class='w3-bar-item w3-button'>Limite do Salário excedido</a>";
}
if ($salarioconfirmed["Porcentagem"]<0) {
  $salarioconfirmed["Porcentagem"] = 0;
}
else{
  $alerta = "";
}

?>
<script>
  function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
      } else { 
          x.className = x.className.replace(" w3-show", "");
      }
  }
</script>
<script>
$(document).ready(function(){
  $('#im').hide('fast');}
);
</script>
<body class="w3-light-grey">
<div class="w3-top">
<div class="w3-bar w3-theme-d1 w3-large " id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell" style="font-size: 1.5em;"></i><span class="w3-badge w3-right w3-small w3-red"></span></button>     
      <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
        <?php
          echo $alerta;
        ?>
      </div>
    </div>
    <!-- Right-sided navbar links -->
    <div class="w3-right ">
     <a  href="homepage.php" class="w3-left w3-bar-item w3-button"><?php echo $_SESSION["user"]?><i style="padding-left: 10px" class="fa fa-user"></i></a>
        <a href="configuracoes.php" class="w3-bar-item w3-button" title="Configurações"><i class="fa fa-cog"></i></a>
        <a href="#sair" class="w3-bar-item w3-button"><form method="post" action="validalogin.php"><button name="sair" class="button-menu" class="w3-theme-d1"><i class="fa fa-sign-out"></i></button></form></a>
    </div>
</div>
</div>
<br><br>


<!-- ALERTA AO USUÁRIO -->
<?php
$quizpontos =  mysql_query("select qt_pontos_contro_comp, qt_pontos_planej from tb_quiz_contro_comp , tb_quiz_planej where tb_quiz_planej.cd_usuario = ".$_SESSION['cd_usuario']."") or die(mysql_error());
$verificarpontos = mysql_fetch_array($quizpontos) ;
if ($verificarpontos["qt_pontos_planej"] == 0 && $verificarpontos["qt_pontos_contro_comp"] == 0) 
  {
    echo "<div class='container w3-yellow w3-row' style='width:100; height:10%;padding-top:1%; display:block' id='info'> ";
  }
else
  {
    echo "<div class='container w3-yellow w3-row' style='width:100; height:10%;padding-top:1%; display: none' id='info'>";
  }
 ?>
   <div class="w3-col l10">
    <h1 style="font-size:20px;">Você ainda não colocou todas as informações necessárias! Deseja começar pelo OnioQuiz?</h1>
  </div>
  <div class="w3-col l2"  style="padding-top:1%;">
    <i class="fa fa-check fa-2x w3-margin-right icon-check" onclick="document.getElementById('quiz').style.display='block'"></i>
    <i class="fa fa-close fa-2x icon-close" onclick="document.getElementById('info').style.display='none'"></i>
  </div>
</div>

  
<!-- FIM DO ALERTA AO USUÁRIO -->
 
<!-- MODAL DO QUIZ -->
<div id="quiz" class="w3-modal w3-animate-opacity">  
  <div class="w3-modal-content" style="max-width:540px;">
      <div id="inicio">
        <header class="w3-container w3-theme-d1"> 
          <span onclick="document.getElementById('quiz').style.display='none'" 
            class="w3-closebtn w3-container w3-padding-8 w3-hover-red w3-display-topright" title="Fechar">&times;</span>
          <h1 style="font-size: 22px; padding:48px!important; text-align: center;">Planejamento - Pense em uma compra que você fez recentemente e responda</h1>
        </header>
        <div style="height: 35%; text-align: center;">
          <i style=" font-size: 4em;" class="fa fa-question"></i>
          <div>
            <button style="font-size:22px" class="w3-btn w3-margin" onclick="comecaquiz()">Começar</button>
          </div>
        </div>
      </div>

    <form name="quiz" action="infoquiz.php" method="post">

    <!-- PERGUNTA 1 -->
      <div class="w3-row" id="pergunta1" style="display: none;">
        <div class="w3-container w3-card-2 w3-theme-d1">
          <p class="paragrafoquiz">Pergunta 1 - Avaliou a real necessidade?</p>
        </div>

          <div class="w3-container" id="alerta" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q1" value="Sim" required>Sim<br>
          <input class = "w3-radio" type="radio" name="q1" value="Não">Não
        </div>
          <div class="w3-right-align">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário avaliou a real necessidade de fazer aquela compra no determinado momento" aria-hidden="true"></i><br>
            <i class="fa fa-arrow-right fa-3x" onclick="Gotop2()"> </i>
          </div>
      </div>
      <!-- FIM DA PERGUNTA 1 -->

      <!-- PERGUNTA 2 -->
      <div class="w3-row" id="pergunta2" style="display: none;">
        <div class="w3-container w3-theme-d1">
          <p class="paragrafoquiz">Pergunta 2 - Avaliou suas possibilidades financeiras?</p>
        </div>

          <div class="w3-container" id="alerta2" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>


        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q2" value="Sim">Sim<br>
          <input class = "w3-radio" type="radio" name="q2" value="Não">Não
        </div>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário analisou suas condições financeiras antes de realizar as compras" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop1()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop3()"></i></div>
      </div>
      <!-- FIM DA PERGUNTA 2 -->

      <!-- PERGUNTA 3 -->
      <div class="w3-row"  id="pergunta3"  style="display:none">
        <div class="w3-container  w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 3 - Fez pesquisa de preço e condições de pagamento?</p>
        </div>

          <div class="w3-container " id="alerta3" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q3" value="Sim" required="required">Sim<br>
          <input class = "w3-radio" type="radio" name="q3" value="Não">Não
        </div>
       <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário pesquisou por mais de um preço antes de realizar a compra" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop2()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop4()"></i></div>
      </div>
      <!-- FIM DA PERGUNTA 3 -->

      <!-- PERGUNTA 4 -->
      <div class="w3-row" id="pergunta4" style="display: none;">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 4 - Pediu a opinião de outras pessoas?</p>
        </div>

          <div class="w3-container " id="alerta4" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q4" value="Sim" required="required">Sim<br>
          <input class = "w3-radio" type="radio" name="q4" value="Não">Não
        </div>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário pediu opinião de alguma outra pessoa ou não antes de realizar a compra" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop3()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop5()"></i></div>
      </div>
      <!-- FIM DA PERGUNTA 4 -->

      <!-- PERGUNTA 5 -->
      <div class="w3-row" id="pergunta5" style="display: none;">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 5 - Negociou ou pechinchou?</p>
        </div>

          <div class="w3-container " id="alerta5" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q5" value="Sim" required="required">Sim<br>
          <input class = "w3-radio" type="radio" name="q5" value="Não">Não
        </div>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário negociou ou pechinchou a compra para obter melhores preços" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop4()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop6()"></i></div>
      </div>
      <!-- FIM DA PERGUNTA 5 -->

      <!-- PERGUNTA 6 -->
      <div class="w3-row" id="pergunta6" style="display: none;">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 6 - Deu um tempo a si mesmo para pensar?</p>
        </div>

          <div class="w3-container " id="alerta6" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q6" value="Sim" required="required">Sim<br>
          <input class = "w3-radio" type="radio" name="q6" value="Não">Não
        </div>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário deu um intervalo de tempo para pensar se a compra é realmente necessária" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop5()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop7()"></i></div>
      </div>
      <!-- FIM DA PERGUNTA 6 -->

      <!-- PERGUNTA 7 -->
      <div class="w3-row" id="pergunta7" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 7 - Comprou apenas o que estava programado?</p>
        </div>

        <div class="w3-container " id="alerta7" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q7" value="Sim" required="required">Sim<br>
          <input class = "w3-radio" type="radio" name="q7" value="Não">Não
        </div><br>
        <div style="text-align:right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário comprou apenas o que estava em sua lista de compras" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop6()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="proximaEtapaQuiz()"></i></div>
      </div>
      <!-- FIM DA PERGUNTA 7 -->
      <!-- **************************************** MODAL DA PARTE DOIS ************************************************ -->
      <div id="parteDois" style="display: none">
        <header class="w3-container w3-theme-d1"> 
          <span onclick="document.getElementById('quiz').style.display='none'" 
            class="w3-closebtn w3-container w3-padding-8 w3-hover-red w3-display-topright" title="Fechar">&times;</span>
          <h1 style="font-size: 22px; padding:48px!important; text-align: center;">Controle - A segunda parte se refere às características dessa compra</h1>
        </header>
        <div style="height: 35%; text-align: center;">
          <i style=" font-size: 4em;" class="fa fa-question"></i>
          <div>
            <button style="font-size:22px" class="w3-btn w3-margin" onclick="comecaquiz2()">Continuar</button>
          </div>
        </div>
      </div>

      <!-- PERGUNTA 8 -->
      <div class="w3-row" id="pergunta8" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 8 - Comprei rápido, sem pensar duas vezes!</p>
        </div>

        <div class="w3-container " id="alerta8" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q8" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q8" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q8" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q8" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente o usuário fez a compra de maneira impulsiva, sem nenhum planejamento e inconsequência momentânea" aria-hidden="true"></i>
        </div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop9()"></i></div>
        </div> 
        <!-- FIM DA PERGUNTA 8 -->

        <!-- PERGUNTA 9 -->
        <div class="w3-row" id="pergunta9" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 9 - Uma das razões para ter comprado foi ter me sentido pressionado pelo vendedor, ou pela situação</p>
        </div>

        <div class="w3-container " id="alerta9" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q9" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q9" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q9" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q9" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário fez a compra sob-pressão do vendedor ou da situação no qual se encontrava" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop8()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop10()"></i></div>
        </div>
        <!-- FIM DA PERGUNTA 9 -->

        <!-- PERGUNTA 10 -->
        <div class="w3-row" id="pergunta10" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 10 - Avaliei os produtos disponíveis e escolhi aquele que me servia melhor</p>
        </div>

        <div class="w3-container " id="alerta10" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q10" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q10" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q10" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q10" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário avaliou e conseguiu fazer a melhor escolha do produto que precisava" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop9()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop11()"></i></div>
        </div> 
        <!-- FIM DA PERGUNTA 10 -->    

        <!-- PERGUNTA 11 -->
        <div class="w3-row" id="pergunta11" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 11 - Comprei exatamente o que estava precisando sem exageros</p>
        </div>

        <div class="w3-container " id="alerta11" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q11" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q11" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q11" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q11" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário comprpou exatamente o que precisava" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop10()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop12()"></i></div>
        </div> 
        <!-- FIM DA PERGUNTA 11 -->    

        <!-- PERGUNTA 12 -->
        <div class="w3-row" id="pergunta12" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 12 - Fiz esta compra quando estava me sentindo triste, inseguro, ou sozinho e senti que precisava me distrair</p>
        </div>

        <div class="w3-container " id="alerta12" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q12" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q12" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q12" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q12" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário fez a compra apenas para sentir mais confortavel emocionalmente" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop11()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop13()"></i></div>
        </div> 
        <!-- FIM DA PERGUNTA 12 --> 

        <!-- PERGUNTA 13 -->
        <div class="w3-row" id="pergunta13" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 13 - Depois que saí da loja, pensei que não deveria ter comprado</p>
        </div>

        <div class="w3-container " id="alerta13" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q13" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q13" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q13" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q13" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário sentiu-se inseguro sobre o que acabou de comprar" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop12()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop14()"></i></div>
        </div> 
        <!-- FIM DA PERGUNTA 13 --> 


        <!-- PERGUNTA 14 -->
        <div class="w3-row" id="pergunta14" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 14 - Eu realmente precisava das coisas que comprei e sei que elas serão muito úteis</p>
        </div>

        <div class="w3-container " id="alerta14" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q14" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q14" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q14" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q14" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário comprou produtos realmente necessárias/uteis para ele" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop13()"></i></div>
            <div class="w3-right"><i class="fa fa-arrow-right fa-3x" onclick="Gotop15()"></i></div>
        </div> 
        <!-- FIM DA PERGUNTA 14 -->

        <!-- PERGUNTA 15 -->
        <div class="w3-row" id="pergunta15" style="display: none">
        <div class="w3-container w3-card-2 w3-theme-d1 ">
          <p class="paragrafoquiz">Pergunta 15 - Sei que o uso dessa compra me trará satisfação por bastante tempo</p>
        </div>

        <div class="w3-container " id="alerta15" style="background-color:#f44336; display: none;">
            <p>Selecione uma das alternativas para prosseguir</p>
          </div>

        <div style="margin-top:2%" class="w3-container">
          <input class = "w3-radio" type="radio" name="q15" value="Com certeza sim" required="required">Com certeza sim<br>
          <input class = "w3-radio" type="radio" name="q15" value="Talvez sim">Talvez sim<br>
          <input class = "w3-radio" type="radio" name="q15" value="Talvez não">Talvez não<br>
          <input class = "w3-radio" type="radio" name="q15" value="Com certeza não">Com Certeza não
        </div><br>
        <div style="text-align: right;">
            <i class="fa fa-lightbulb-o fa-3x icon-lightbulb" style="cursor: pointer; margin-right:1%" title="Pergunta referente se o usuário fez uma compra que irá agrada-lo a longo prazo" aria-hidden="true"></i>
        </div>
            <div class="w3-left"><i class="w3-left-align fa fa-arrow-left fa-3x" onclick="Backtop14()"></i></div>
            <div class="w3-right"><button name="submit" style="  border: none; padding:  0; background-color: white"><i class="fa fa-arrow-right fa-3x" ></i></button></div>
        </div> 
        <!-- FIM DA PERGUNTA 15 -->

        <!-- RESULTADO -->
        <div class="w3-row" id="resultado" style="display: none">

        <div>
        <header class="w3-container w3-theme-d1"> 
          <span onclick="document.getElementById('quiz').style.display='none'" 
            class="w3-closebtn w3-container w3-padding-8 w3-hover-red w3-display-topright" title="Fechar">&times;</span>
        </header>
        </div>
        
        </div> 
        <!-- FIM RESULTADO -->        

      </form>
 </div>
<!--  FIM DO QUIZ -->
</div>


<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
  

  <div class="w3-row">


    <div class="w3-col m3">


      <div class="w3-card-2 w3-round w3-white" >
        <div class="w3-container">
           <h4 class="w3-center"><?php echo $_SESSION["nome"]; ?></h4>
           <div id="content" >
            <ul>
              
                 
                </a> 
              </form>
              </li>
            </ul>       
           </div>     
         <hr>
         <p style="text-align: center"> Planejamento de compras</p>
          <div class="w3-light-grey" style="margin-bottom: 5%">
         <div  id="bar1" style="height:24px;width:<?php echo $pontuacao["qt_pontos_planej"]; ?>%"></div>
         </div>
         <p style="text-align: center"> Controle de compras</p>
         <div class="w3-light-grey" style="margin-bottom: 5%">
         <div id="bar2" style="height:24px;width:<?php echo $pontuacao2["qt_pontos_contro_comp"]; ?>%"></div>
         </div>
         <?php
         $verificaSalario = mysql_query("SELECT vl_salario from tb_usuario WHERE cd_usuario = ".$_SESSION['cd_usuario']." ");
         $salarioVerifica = mysql_fetch_assoc($verificaSalario);
         if (!is_null($salarioVerifica["vl_salario"])) 
         {?>
        <p style="text-align: center"> Salário Restante</p>
         <div class="w3-light-grey" style="margin-bottom: 5%">
         <div id="bar3" style="height:24px;width:<?php echo $salarioconfirmed["Porcentagem"];?>%"></div>
         </div>    

         <?php 
         }?>         
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION["profissao"]; ?></p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> São Vicente</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $_SESSION["nasc"]; ?></p>
         <p><i class="fa fa-battery-full fa-fw w3-margin-right w3-text-theme"></i></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round">
        <div class="w3-white">
           <button onclick="document.getElementById('modelgastos').style.display='block'" class="w3-button w3-block w3-theme-d1 w3-left-align"><i class="fa fa-credit-card fa-fw w3-margin-right"></i> Meus gastos</button>

          

          <a href="#quiz" onclick="document.getElementById('quiz').style.display='block'" style="text-decoration: none"><button  class="w3-button w3-block w3-theme-d1 w3-left-align"><i class="fa fa-pencil fa-fw w3-margin-right"></i> Quiz</button></a>
        </div>      
      </div>

  <div id="modelgastos" class="w3-modal w3-animate-opacity">  
    <div class="w3-modal-content" style="max-width:840px;">
      <div id="menu">
          <header class="w3-container w3-theme-d1"> 
          <span onclick="document.getElementById('modelgastos').style.display='none'" 
            class="w3-closebtn w3-container w3-padding-8 w3-hover-red w3-display-topright" title="Fechar">&times;</span>
        <h1><center> Painel de acesso aos gastos diários </center></h1>
      </header>
        <div class="w3-container w3-theme-d1">
          <h2>Meta Semanal</h2>
          <div class="w3-blue">
                <?php
                    $metasemanal = mysql_query("select vl_limite from tb_meta_semanal where cd_usuario = ".$_SESSION["cd_usuario"]." order by cd_meta_semanal desc limit 1") or die(mysql_error());
                    $valormeta = mysql_fetch_assoc($metasemanal);
                    $resultmeta = mysql_query("SELECT sum(vl_compra) as 'Valor_Gastos' FROM `tb_gasto_diario` 
                                                WHERE dt_compra between  (SELECT dt_duracao 
                                                  FROM tb_meta_semanal
                                                    WHERE cd_usuario = ".$_SESSION["cd_usuario"]."
                                                      ORDER BY cd_meta_semanal DESC 
                                                        LIMIT 1) - interval 1 week and (SELECT dt_duracao 
                                                          FROM tb_meta_semanal
                                                            WHERE cd_usuario = ".$_SESSION["cd_usuario"]."
                                                              ORDER BY cd_meta_semanal DESC LIMIT 1) and cd_usuario = ".$_SESSION["cd_usuario"]." ");
                    while ($linhas = mysql_fetch_assoc($resultmeta)) {
                      $valor_porcentagem = ($linhas["Valor_Gastos"]*100)/$valormeta["vl_limite"];
                    }
                    if ($valor_porcentagem > 100) {
                      echo "<h3 style='text-align:center'>Você ultrapassou a Meta Semanal!</h3>";
                      $valor_porcentagem = 100;
                    }
                ?>
                <div class="w3-light-grey" style="margin-bottom: 5%">
                  <div  id="bar4" style="background-color:red;height:24px;width:<?php echo $valor_porcentagem;?>%"></div>
                </div>
          </div>
          <p><?php 
          include 'conexaobanco.php';
          $comando = mysql_query("SELECT * from tb_gasto_diario where cd_usuario = ".$_SESSION["cd_usuario"]." ");
           while ($teste = mysql_fetch_assoc($comando)) {
              echo "<div class='w3-row'><div class='w3-col l4 w3-card-2 w3-round w3-white w3-center' style='float:left'>Produto ".$teste["nm_compra"]."<br> Preço ".$teste["vl_compra"]."  Quantidade ".$teste["qt_compra"]."<br>".$teste["ds_compra"]."  <br>Compra do dia ".$teste["dt_compra"]."<input type='hidden' name='codcompra' value='".$teste["cd_gasto_diario"]."'></div></div><br>";
           }
          ?></p>
              <div class="container w3-right" onclick="addgastos()"><i title="Adicionar um novo gasto" class="fa fa-4x fa-plus-circle"; style="color:#5BFF60; cursor:pointer"></i></div>
        </div>
      </div>

      <div id="addgasto" style="display: none;">
           <header class="w3-container w3-theme-d1">
              <h6 style="font-size: 25px;" >Adicionar um gasto diário</h6>
              </header>
             <form method="post" id="formulario" action="infogastos.php" class="w3-center">
             <br>
          <center><label class="w3-label" style="color: black"> Nome do Produto:</label>
           <input type="text" name="nm_produto">
          <br>
          <label class="w3-label" style="color: black">Como você estava se sentindo?</label>
          <select name="Feeling">
            <option value="Feliz">Feliz</option>
            <option value="Triste">Triste</option>
            <option value="Irritado">Irritado</option>
            <option value="Estressado">Estressado</option>
          </select> 
          <br>
          <label class="w3-label" style="color: black"></li>Preço do Produto:</label>
            <input type="text" name="preco">
          <br>
          <label class="w3-label" style="color: black">Quantidade do produto:</label> 
          <select name="quantidade">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
          </select>
          </form>
          <br>
          <br>
            <div style="padding-bottom: 5%">
              <a class="w3-button w3-theme-d1 w3-center" onclick="voltamenu()"> Cancelar </a>
              <button name="enviar" class="w3-button w3-theme-d1 w3-center"> Enviar</button>
            </div>
          </center>
      </div>
     
      <div id="gasto" style="display: none">
          <header class="w3-container w3-theme-d1">
             <h6 style="font-size: 25px;" >Visualizar gasto diário</h6>
          </header>
          <br>
        <form class="w3-center">
        Nome do Produto
          <input type="text" name="nm_produto" readonly value="<?php echo $return["nm_compra"];?>">
        <br>
        Como você estava se sentindo?
          <select name="Feeling" readonly>
            <option><?php echo $return["ds_compra"];?></option>
          </select> 
        <br>
        Preço do Produto
          <input type="text" name="preco" readonly value="<?php echo $return["vl_compra"];?>">
        </form>
      </div>

    </div>
  </div>
      
      <!-- Artigos Recomendados --> 
      <div class="w3-card-2 w3-round w3-white w3-hide-small" style="margin-top:4%">
        <div class="w3-container">
          <p>Artigos recomendados</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">Devedores anônimos</span>
            <span class="w3-tag w3-small w3-theme-d4">Doenças relacionadas à oniomania</span>
            <span class="w3-tag w3-small w3-theme-d3">Números da patologia</span>
            <span class="w3-tag w3-small w3-theme-d2">Tratamentos</span>
            <span class="w3-tag w3-small w3-theme-d1">Ajuda médica</span>
            <span class="w3-tag w3-small w3-theme">Consultórios</span>
            <span class="w3-tag w3-small w3-theme-l1">O que é a oniomania?</span>
            
          </p>
        </div>
      </div>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
          </div>
        </div>
      </div>

    <script type="text/javascript">
        

        function atualizar()
        {
            $.post('validaFrases.php', function (frase) {
                $('#frases').html('<i>' + frase.ds_frase + '</i><br/>'+ frase.nm_autor);

            }, 'JSON');
        }
        setInterval("atualizar()", 10000);
        $(document).ready(function() {
            atualizar();
        });

    </script>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin" id="frases">
        
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Grupo dos devedores anônimos</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Devedores Anônimos é uma Irmandade de mútua-ajuda, sem fins lucrativos, de homens e mulheres, que funciona dentro dos moldes de Alcoólicos Anônimos, com a sua autorização. Nela buscamos trilhar o Programa de 12 Passos e as 12 Tradições, a fim de conseguir alcançar a nossa recuperação....</p>
        <div class="w3-right-align">
          <p><a href="http://www.devedoresanonimos-sp.com.br/site/" target="_blank">Leia mais</a></p>
        </div> 
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Grupo dos devedores anônimos</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Devedores Anônimos é uma Irmandade de mútua-ajuda, sem fins lucrativos, de homens e mulheres, que funciona dentro dos moldes de Alcoólicos Anônimos, com a sua autorização. Nela buscamos trilhar o Programa de 12 Passos e as 12 Tradições, a fim de conseguir alcançar a nossa recuperação....</p>
        <div class="w3-right-align">
          <p><a href="http://www.devedoresanonimos-sp.com.br/site/" target="_blank">Leia mais</a></p>
        </div> 
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Oniomania: A Doença dos Compradores Compulsivos</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">As compras por impulso infelizmente fazem parte do quotidiano de muita boa gente, mas quando o desejo de comprar se torna vício, então podemos estar perante uma doença que em linguagem psiquiátrica se designa por oniomania.

        De um modo muito resumido, a oniomania é a doença dos compradores compulsivos – vítimas da sociedade de consumo, ou melhor, da sociedade do desperdício!
        Quem padece de oniomania sente um enorme prazer em comprar seja o que for e não consegue controlar os seus impulsos de adquirir cada vez mais.


        Este desequilíbrio psicológico leva normalmente o doente a um arrependimento profundo e à acumulação de dívidas caóticas.
          <p><a href="https://poupaeganha.pt/oniomania/" target="_blank">Leia mais</a></p>
        </div> 
      

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>O que é transtorno de compras compulsivas ou oniomania?</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Comprar compulsivamente o que é?
        Comprar compulsivo (ou oniomania) pode ser entendido como um transtorno do controle dos impulsos caracterizado pela incapacidade de controlar compras e gastos financeiros.
        Estima-se que 2 a 8% da população seja vítima deste quadro e que as mulheres sejam mais acometidas do que os homens.
        Como é o quadro clínico?
        Pessoas acometidas por este transtorno sofrem com um excesso de preocupações e desejos relacionados a compras e, muitas vezes, perdem o controle e acabam gastando mais do que podem ou que planejaram.
        O quadro em geral se inicia por volta dos 18 anos, mas o comportamento costuma se tornar evidente somente muito tempo mais tarde, por volta dos 30 anos de idade.
        Enquanto as mulheres tendem a comprar mais roupas, bolsas, sapatos, maquiagem e jóias, os homens gastam mais com eletrônicos,   relógios, carros e acessórios.
        Em geral, os pacientes compram coisas para si próprios; entretanto, muitos objetos podem ser comprados também para familiares (filhos, marido). Presentear os demais membros da família não só alivia a culpa do paciente por ter gastado muito dinheiro consigo próprio como também tem a função de “comprar” a cumplicidade dos familiares.
        Existe tratamento eficaz?
        Sim. O tratamento do transtorno de compras compulsivas geralmente é feito com antidepressivos, porém outras classes de medicamentos têm se mostrado eficazes em relatos de casos.
        Obviamente, o objetivo do tratamento não é a abstinência completa do ato de comprar, mas o controle do comportamento, que em situações normais obedece à seguinte sequência de etapas: avaliação da necessidade; avaliação das possibilidades; pesquisa de preços e condições de pagamento; consulta a terceiros; negociação; deliberação; comprar o que foi programado.
        Quando adequadamente tratado, o prognóstico costuma ser favorável.</p>
        <div class="w3-right-align">
          <p><a href="http://psiquiatrarj.com.br/dicionario/o-que-e-transtorno-de-compras-compulsivas-ou-oniomania/" target="_blank">Leia mais</a></p>
        </div> 
      </div>


      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Oniomania: A doença do consumo compulsivo</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">A palavra oniomania, vem do grego (onios, à venda, e mania, insanidade). Embora tenha sido descrita há mais de cem anos, a doença voltou a ser estudada apenas nos últimos 15 anos. Este distúrbio não é raro, atinge 3% da população brasileira e parece estar aumentando já que o terreno para seu desenvolvimento é fértil no mundo moderno, com o advento de catálogos de compras pelos correios, canais de televisão dedicados a vendas e compras pela internet.
        Segundo Dr.André Malbergier (médico, professor do Departamento de Psiquiatria na Faculdade de Medicina da Universidade de São Paulo e coordenador do GREA, Grupo Interdisciplinar de Estudos de Álcool e Drogas) o comportamento compulsivo se caracteriza por uma pressão interna que, em determinadas situações, faz com que a pessoa se sinta impelida, tomada por desejo muito forte de realizar uma ação que gera prazer principalmente nos estágios iniciais, mas que depois provoca sentimento de culpa e mal-estar. Uma pessoa é compradora compulsiva quando, em determinado momento, começa a contabilizar prejuízos financeiros, pessoais e de relacionamento provocados pelo descontrole nas compras. Embora as pesquisas mostrem que quase todo mundo, de vez em quando, compre por impulso, o comprador compulsivo não cede a essa pressão eventualmente.
        Para esses indivíduos o excitante é o ato de comprar e não o objeto adquirido. Compradores compulsivos deixam de pagar contas e dívidas simplesmente ignorado-as por algum tempo, na esperança de que, de alguma maneira, elas possam ser pagas milagrosamente. Alguns  compram coisas de que não necessitam, e nem querem. Quando sentem-se carentes,  que algo está faltando, frustrados, ou com baixa alto-estima esbanjam dinheiro em algo que não podem pagar. Gastam compulsivamente, entram em dívidas, sentem-se culpados, prometem que nunca farão  isto de novo, e apenas repetem o mesmo ciclo na próxima vez que o sentimento de “não ser suficiente” aflore. Tendo gasto além da conta, freqüentemente não tem nada para mostrar no que gastam, e ficam se perguntando para onde foi todo aquele dinheiro. Alguns gastadores compulsivos não estão realmente endividados, mas mesmo assim, preenchem todos os outros critérios de diagnóstico da doença. Além de sua compulsão em comprar, as pessoas que sofrem da oniomania apresentam outros tipos de impulsividades, como fazer muito exercício, comer exageradamente e trabalhar muito.
        Muitos problemas podem ser gerados por essa doença. Contraem dívidas de até dez vezes a sua renda mensal. Passam a ter problemas pessoais, amigos muitas vezes cansados de emprestar dinheiro se afastam. Passam a ter problemas familiares . Quando são privados dos meios de compra, chegam até a roubar.  Essas pessoas, até então, eram honestas e se deixaram levar pelo impulso de comprar. Algumas vezes aplicam golpes, passam cheque sem fundo e pedem dinheiro emprestado para quitar dívidas advindas de sua compulsão.
        Normalmente, o indivíduo não percebe ou não admite ser portador deste distúrbio, acreditando ser algo momentâneo do qual terá controle da próxima vez, porém, na verdade o controle não depende somente de esforço.  A compulsão por compras é uma doença e necessita de tratamento constante e adequado. A psicoterapia cognitivo comportamental (TCC) é uma forte aliada no tratamento dos comportamentos compulsivos, pois ajuda a pessoa a identificar os pensamentos que influenciam o desejo de comprar, reconhecer as situações de crise e promover a mudança do comportamento, lidando e evitando as situações que aumentam o desejo de consumo desenvolvendo assim mecanismos de enfrentamento.</p>
        <div class="w3-right-align">
          <p><a href="http://www.psicologiaitaimbibi.com.br/oniomania-doenca-do-consumo-compulsivo/" target="_blank">Leia mais</a>
          </p>
        </div> 
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Grupo dos devedores anônimos</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Devedores Anônimos é uma Irmandade de mútua-ajuda, sem fins lucrativos, de homens e mulheres, que funciona dentro dos moldes de Alcoólicos Anônimos, com a sua autorização. Nela buscamos trilhar o Programa de 12 Passos e as 12 Tradições, a fim de conseguir alcançar a nossa recuperação....</p>
        <div class="w3-right-align">
          <p><a href="http://www.devedoresanonimos-sp.com.br/site/" target="_blank">Leia mais</a></p>
        </div> 
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Oniomania</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Oneomania é o vício em compras. É a doença do consumo compulsivo. Causa uma sensação de euforia parecida com o prazer do álcool.
        É uma vontade incontrolável de comprar. A pessoa não tem culpa, é mais forte do que ela e nesse momento ela não usa a razão e sim a emoção, dominada pelo impulso, chegando a grandes prejuízos financeiros. Normalmente nem precisa do que está comprando e gasta muito mais do que imaginava.
        Antes das compras pode sentir muita ansiedade, taquicardia, sudorese, irritação e até agressividade. E isso só passa quando a pessoa começa a comprar. Esconder as compras é um dos principais sintomas da Oneomania.
        Se a pessoa ouviu falar que algo ou alguma loja ou shopping está em promoção, ela não aguenta e vai às compras, mesmo que essa promoção seja mais para chamar a atenção do que uma grande promoção mesmo.
        A sociedade estimula a compra, mas depois quem tem a doença pode entrar até em depressão. Algumas pessoas podem comprar diversas cores e tamanhos do mesmo modelo. Ou de mesmas cores para usar quando alguma estragar. Pode comprar uma coleção inteira. Ou sair para comprar apenas um par de sapatos, por exemplo, e sair com muitas sacolas da loja. Se alguém falar que o preço está bom, lá vai ela comprar, mesmo que não esteja.
        Não consegue ir apenas passear num shopping, tem que comprar, tem que voltar com um monte de sacolas. E as compras online? Em questão de minutos é muito fácil clicar em “comprar” e digitar o cartão de crédito em inúmeras ofertas que chegam aos e-mails todos os dias ou aparecem em sites.
        Muitas compras são feitas sem precisar, apenas pelo prazer de comprar porque se convence que realmente está em promoção e é imperdível, mesmo não precisando de nada daquilo que muitas vezes pode nem ser usado depois. Isso a princípio dá uma sensação de prazer, mas depois pode trazer muita culpa e baixa autoestima quando ela se dá conta que não precisava de tudo aquilo e principalmente se está com a conta negativa. Em casos mais raros a pessoa pode cometer suicídio.
        Seria interessante investigar o que está por trás disso, a pessoa pode estar com uma grande carência afetiva. Pode ser que sempre que fica triste ou frustrada “tem” que comprar algo. É fundamental que a própria pessoa perceba que precisa de ajuda e procure um terapeuta e talvez também ajuda medicamentosa de um psiquiatra. É importante ressaltar também que existem grupos de autoajuda que são dos “Devedores Anônimos”.</p>
        <div class="w3-right-align">
          <p><a href="https://www.portaleducacao.com.br/conteudo/artigos/administracao/oneomania/30111" target="_blank">Leia mais</a></p>
        </div> 
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Tratamento para Compulsão por Compras (Oniomania)</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Tratamento para Compulsão por Compras (Oniomania)
        Em nossa sociedade, notadamente materialista, consumista e que incentiva o imediatismo e as aparências, as compras assumem um papel importante em nossas vidas. Somos incentivadas pela mídia, através de efetivas estratégias de marketing que atingem facilmente seu objetivo: o consumo imediato.
        Porém em algumas pessoas, este comportamento passa a ser descontrolado, ocasionando prejuízos financeiros e emocionais, além de problemas de relacionamento com a família ou amigos.
        Por definição, compulsão por compras, ou oniomania (do grego oné-comprar, mania- loucura), caracteriza-se por um excesso de preocupações e desejos relacionados com a aquisição de objetos e por um comportamento caracterizado pela incapacidade de controlar compras e gastos financeiros.
        Este padrão de comportamento muitas vezes surge como uma forma de tentar lidar com sentimentos negativos e difíceis, como baixa autoestima, tristeza, sensação de vazio, e frustrações, funcionando como alívio temporário e aparente solução para os problemas.
        Porém este alívio é apenas temporário, fazendo com que pouco tempo depois retornem os problemas originais, acompanhados de sentimento de culpa, fracasso e arrependimento pelo descontrole e pelos gastos realizados
        O comportamento de compras compulsivas ocorre entre 2% a 8% da população em geral, sendo mais frequente nas mulheres (80%) do que nos homens (20%). Geralmente se inicia em torno dos 18 anos, quando a pessoa passa a ter maior liberdade e autonomia financeira, mas normalmente só é percebido como um problema por volta dos 30 anos.
        Nas mulheres os objetos preferidos para as compras costumam ser: roupas, itens de vestuário, joias e cosméticos; Já nos homens, geralmente as compras são de eletrônicos, relógios, roupas caras e acessórios para carros.
        Apesar de não ser uma doença nova, atualmente o descontrole do ato de comprar compulsivamente é viabilizado pela facilidade de compras com linhas de crédito, parceladas, com cartão de crédito, cheques pré-datados ou sem fundos, sem preocupar-se com o valor mensal de todas as compras juntas ou o impacto no orçamento, ultrapassando desta forma sua receita e contraindo dividas, muitas vezes, apenas para manter a compulsão por comprar.</p>
        <div class="w3-right-align">
          <p><a href="http://www.clinicapracadaarvore.com.br/tratamentos/compulsao-por-compras/" target="_blank">Leia mais</a></p>
        </div> 
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Características de compulsão por compras</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">Gastos que superam o ganho mensal;
          Comprar por impulso;
          Comprar coisas que não necessita ou que já possui;
          Irritação quando não pode comprar;
          Problemas familiares ou conjugais devido aos gastos;
          Arrependimento ou culpa após a compra;
          Já foi avisado por parentes ou amigos sobre comprar em exagero;
          Dificuldade de interromper as compras mesmo após o aparecimento de prejuízos financeiros, familiares ou profissionais.</p>
        <div class="w3-right-align">
          <p><a href="http://www.clinicapracadaarvore.com.br/tratamentos/compulsao-por-compras/" target="_blank">Leia mais</a></p>
        </div> 
      </div>

         <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <span class="w3-right w3-opacity"></span>
        <h4>Oniomania: a compulsão por comprar</h4>
        <hr class="w3-clear">
        <p style="text-align: justify">
Quando a compulsão por comprar se apresenta de forma severa, ela se torna uma doença psicológica chamada Oniomania. O transtorno, caracterizado pelo descontrole dos impulsos, atinge cerca de 3% da população. Os portadores da Oniomania, também conhecidos como shopaholics ou consumidores compulsivos, frequentemente não conseguem resistir à tentação de comprar. Chegam a não pagar contas essenciais para gastar com supérfluos. A gratificação e a satisfação obtidas através da compra não os permitem avaliar a possibilidade de futuros prejuízos.
Entre os comportamentos mais comuns dos shopaholics estão esconder as compras da família ou do parceiro; mentir sobre a quantidade verdadeira de dinheiro gasto em compras; gastar em resposta a sentimentos negativos como depressão ou tédio; sentir euforia ou ansiedade durante a realização das compras; culpa, vergonha ou auto-depreciação como resultado das compras; se dedicar muito tempo fazendo “malabarismos” com as contas ou com as dívidas para acomodar os gastos; além de uma atração incontrolável por cartões de créditos e cheques especiais. Uma pessoa só é considerada um consumidor compulsivo se é incapaz de controlar o desejo de comprar e quando os gastos frequentes e excessivos interferem de modo importante em vários aspectos de sua vida. Antes de cometer o ato do qual não tem controle, é comum que o consumidor compulsivo apresente ansiedade e/ou excitação. Já durante a execução do ato, experimenta sensações de prazer e gratificação. E quando, por algum motivo, são impedidos de comprar, os pacientes costumam relatar sensações como angústia, frustração e irritabilidade. A maioria apresenta culpa, vergonha ou algum tipo de remorso ao término do ato. As compras compulsivas podem levar a sérios problemas psicológicos, ocupacionais, financeiros e familiares que incluem a depressão, enormes dívidas e graves problemas nas relações amorosas. Vários estudos revelaram que a idade e a situação econômica são os principais fatores de risco para o desenvolvimento desse transtorno. Os investigadores descobriram um percentual mais elevado em jovens que ganham menos em relação aos indivíduos mais velhos e em melhor situação econômica.
O comprador compulsivo consome pelo prazer de consumir e não pela real necessidade do objeto, e compra mais produtos relacionados à aparência como roupas da moda, sapatos, jóias e relógios. O descontrole é sem limites. Podemos traçar um paralelo entre as compulsões por compras e as dependências químicas. Em ambas, há perda de controle e o paciente se expõe a situações danosas para si e também para os outros. Assim como em alguns casos os dependentes químicos roubam para custear seus vícios, o compulsivo também pode se utilizar de meios ilegais para continuar comprando.
Compras compulsivas podem ser encontradas com muita frequência na fase maníaca do transtorno bipolar de humor, de exaltação do humor, quando existem sentimentos intensos de alegria e otimismo, associados à falta de capacidade para julgar com clareza as consequências dos atos cometidos; e também podem ser encontradas em portadores do transtorno obsessivo compulsivo (TOC), principalmente em pacientes com compulsões de colecionismo.
Embora a compulsão por compras possa estar relacionada a outros transtornos, alguns fatores presentes no dia a dia são facilitadores da compra descontrolada. Produtos à venda pela internet, canais de venda na televisão ou grandes promoções de queima de estoque são um grande perigo.
Infelizmente, a maioria dos shopaholics só costuma procurar ajuda quando as dívidas estão grandes e os gastos exagerados já acarretam problemas familiares, nos relacionamentos, em situações legais, ou até quando dão origem a episódios depressivos de intensidade importante. Em alguns casos, os portadores do transtorno só chegam ao consultório trazidos por familiares, amigos ou pelo cônjuge. Quanto à origem do transtorno, acredita-se que haja algum déficit do neurotransmissor serotonina, que reconhecidamente proporciona menor ocorrência de impulsividade. Desta forma, o tratamento pode envolver medicamentos como antidepressivos ou agentes estabilizadores do humor, e psicoterapia cognitivo-comportamental.
Dependendo do caso, duas outras medidas também devem ser levadas em consideração: frequentar grupos de autoajuda, como os devedores anônimos (DA) e nomear algum conselheiro financeiro, que possa orientar o paciente sobre suas movimentações financeiras. Quando esse último procedimento ocorre, o paciente continua com a responsabilidade de pagar suas contas, porém, não tem acesso a cartões de crédito e a cheques. É dado a ele, semanalmente, uma quantia previamente combinada à qual deve se adequar. Além disso, as contas são acompanhadas por meio do fornecimento de recibos ao conselheiro financeiro. Esta é uma das formas de tentar combater a possibilidade de episódios de compulsão por compras. Conforme o indivíduo obtém progressos, ele retoma paulatinamente o pleno controle sobre suas finanças.</p>
        <div class="w3-right-align">
          <p><a href="http://abp.org.br/portal/clippingsis/exibClipping/?clipping=10509" target="_blank">Leia mais</a></p>
        </div> 
      </div>
        
    <!-- End Middle Column -->
    </div>
    
    <!--Vinculação com médico -->
    <?php 
      $procura = mysql_query("select  nm_medico from medico_usuario inner join tb_medico on medico_usuario.cd_medico = tb_medico.cd_medico where cd_usuario = ".$_SESSION["cd_usuario"]." and cd_situacao = 0 ");
      $nome = mysql_fetch_assoc($procura);
     ?>
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <?php
          if(mysql_num_rows($procura)>0){
           ?>
          <form id="aceitarmed" action="aceitarmedico.php" method="post">
          <p>Vinculação com Médico <?php echo $nome["nm_medico"]; ?></p>
          <button class="w3-button w3-block w3-theme-l4" id="aceitarmedico" value="aceitar" name="aceitar">Aceitar</button>
          <button class="w3-button w3-block w3-theme-l4">Recusar</button>
          </form>
          <?php 
        }
           ?>
        </div>
      </div>
      <br>      
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-center w3-padding-16 w3-theme-d1">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-square w3-hover-text-indigo"></i>
    <i class="fa fa-instagram w3-hover-text-purple"></i>
    <i class="fa fa-twitter-square w3-hover-text-light-blue"></i>
  </div>
  <p><a href="" style="text-decoration: none">Desenvolvido por Horizon</a></p>
</footer>
 
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
 
    }
}
</script>
<script src="JQuery/jquery-1.11.1.min.js"></script>
<script src="JQuery/JQuery.sliphover.min.js"></script>
<script type="text/javascript">
          $(function(){
        
        $('#content').sliphover({
            textAlign:'left',
            verticalMiddle:false
       });
      })

$(document).ready(function()
{
    $bar = $("#bar1").width();
    var planejamento = document.getElementById("bar1");
      if ($bar == 0) 
      {
        planejamento.style.backgroundColor="#f1f1f1";
      }

      else if ($bar <= 102)
      {
        planejamento.style.backgroundColor="#f44336";
      }  

      else if ($bar > 102 && $bar <=205)
      {
        planejamento.style.backgroundColor="#ffeb3b";
      }

      else if ($bar > 205)
      {
        planejamento.style.backgroundColor="#5BFF60"
      }

    $bar2 = $("#bar2").width();
    var controle = document.getElementById("bar2");
     if ($bar2 == 0) 
      {
        controle.style.backgroundColor="#f1f1f1";
      }
      else if ($bar2 <=102)
      {
        controle.style.backgroundColor="#f44336";
      }

      else if($bar2 > 102 && $bar2 <= 205)
      {
        controle.style.backgroundColor="#ffeb3b";
      }

      else if ($bar2 > 205)
      {
        controle.style.backgroundColor="#5BFF60"
      }
    $bar3 = $("#bar3").width();
    var salario = document.getElementById("bar3");
      if ($bar3 == 0)
      {
        salario.style.backgroundColor="#f1f1f1";
      }

      else if ($bar3 <= 102)
      {
        salario.style.backgroundColor="#f44336";
      }

      else if ($bar3> 102 && $bar3 <= 205)
      {
        salario.style.backgroundColor="#ffeb3b";
      }

      else if ($bar3 > 205)
      {
        salario.style.backgroundColor="#5BFF60"
      }
    $bar4 = $("#bar4").width();
    var salario = document.getElementById("bar4");
      if ($bar4 == 0)
      {
        salario.style.backgroundColor="#f1f1f1";
      }

      else if ($bar4 <= 102)
      {
        salario.style.backgroundColor="#f44336";
      }

      else if ($bar4> 102 && $bar4 <= 205)
      {
        salario.style.backgroundColor="#ffeb3b";
      }

      else if ($bar3 > 204)
      {
        salario.style.backgroundColor="#5BFF60"
      }
    });

</script>
</body>
</html> 
