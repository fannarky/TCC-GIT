<!DOCTYPE html>
<html>
<title>OnioCare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script type="text/javascript" src="Scripts/quiz.js"></script>
<body>
<div class="w3-top">
  <div class="w3-bar w3-theme-d1 w3-large" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
    <div class="w3-right w3-hide-small">
      
    <?php 
      session_start();
      include 'conexaobanco.php';
      if (!isset($_SESSION["logado"])) 
      {
    ?>
       <a href="#home" class=" w3-bar-item w3-button "><i class="fa fa-home"></i></a>
        <a href="#Login" class="w3-bar-item w3-button" onclick="document.getElementById('id01').style.display='block'"> <i class="fa fa-user"></i></a>
      <?php 
      }
      else{   
      ?>
      <a  href="homepage.php" class="w3-left w3-bar-item w3-button"><?php echo $_SESSION["user"]?><i style="padding-left: 10px" class="fa fa-user"></i></a>
      <a href="configuracoes.php" class="w3-bar-item w3-button" title="Configurações"><i class="fa fa-cog"></i></a>
      <a href="#sair" class="w3-bar-item w3-button"><form method="post" action="validalogin.php"><button name="sair" class="button-menu" class="w3-theme-d1"><i class="fa fa-sign-out"></i></button></form></a>
      <?php
       } ?>
    </div>

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars w3-padding-right w3-padding-left"></i>
    </a>
  </div>
</div>

<nav class="w3-sidebar w3-bar-block w3-theme-d1  w3-card-2 w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">FECHAR X</a>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">CADASTRAR</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">EQUIPE</a>
</nav>

  <!-- *********************************************************** MODAL ********************************************************************-->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:400px">

      <div class="w3-center" style="background-color:#403B3F"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-8 w3-display-topright" title="Close Modal">&times;</span>
        <img src="imagens/login/perfil.png" style="width:20%" class="w3-circle w3-margin-top" style="">
      </div>

      <form method="POST" class="w3-container" style="background-color:#403B3F" action="validalogin.php">
        <div class="w3-section">
          <label style="color:#FFF3F2">Usuário</label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Insira seu login" name="usrname" required>
          <label style="color: #FFF3F2">Senha</label>
          <input class="w3-input w3-border" type="password" placeholder="*******" name="psw" required>
          <button class="w3-btn-block w3-section w3-padding  w3-white w3-opacity w3-hover-opacity-off" style="color:#FFF3F2; background-color:#b22323" type="submit" name="entrar">Entrar na sua conta</button>
         
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked" style="color:#FFF3F2; font-size: 18px"> Lembrar-me
        </div>      

      <div class="w3-container  w3-border-top w3-padding-16" style="background-color:#403B3F">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-btn w3-white w3-opacity w3-hover-opacity-off">Voltar</button>
        <span class="w3-right w3-padding w3-hide-small"><a href="#" style="color:#FFF3F2; font-family: Arial;  font-size: 18px"> Esqueceu sua senha?</a></span>
        </div>
        </form> 
    </div>
  </div> 
<!-- ********************************************************  FIM MODAL ****************************************************************--> 
<!--******************************************************  INICIO DO QUIZ **************************************************-->
<?php
  if (isset($_SESSION["logado"]))
  {
    //SÓ IRÁ APARECE APARECER A DIV DE ESCOLHER O CAMINHO ENTRE HOMEPAGE E INICIAR O QUIZ CASO O USUÁRIO ESTEJA LOGADO
      ?>
<div class="w3-row" id="main" style="padding: 11%; background-color: #FEF2EE; ">
  <h1 style="font-size: 62px; text-align: center; font-family:Raleway">Bem Vindo ao <span style="font-weight:bold;color:Black; opacity:.3;">OnioCare</span></h1>
  <div class="w3-col l6 m6">
    <h2 style="opacity:.86; text-align: center; font-family:Raleway">Deseja iniciar o Quiz?<br><i class="fa fa-question-circle" style="font-size: 7em; cursor: pointer;" onclick="iniciaQuiz()"></i></h2>
  </div>
  <div class="w3-col l6 m6">
    <h2 style="opacity:.86; text-align: center; font-family:Raleway">Ir direto à Homepage<br><a href="homepage.php" style="text-decoration: none;"><i class="fa fa-home" style="font-size: 7em;"></i></a></h2>
  </div>
</div>
<div id="quiz" class="w3-row" style="display: none">
<?php
  } 
  else
  {
    ?>
  <div id="quiz" class="w3-row" style="display: block;">
<?php 
  } 
  ?>

<!--PRIMEIRA PARTE DO QUIZ REFERENTE AO PLANEJAMENTO DE COMPRAS -->
  <form action="infoquiz.php" method="post">
  <div id="quizP1">
    <h1 style="font-size: 25px; margin-top:4%; padding:48px!important; text-align: center;">Planejamento - Pense em uma compra que você fez recentemente e responda:</h1>
    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
    <p>Pergunta 1 - 
    Avaliou a real necessidade?</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
    <input class = "w3-radio" type="radio" name="q1" value="Sim" required="required">Sim<br>
    <input class = "w3-radio" type="radio" name="q1" value="Não">Não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Pergunta references se a compra foi realmente necessário neste momento" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
      <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
        <p>Pergunta 2 -
        Avaliou suas possibilidades financeiras?</p>
      </div>
      <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
        <input class = "w3-radio" type="radio" name="q2" value="Sim required="required">Sim<br>
        <input class = "w3-radio" type="radio" name="q2" value="Não">Não
      </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
      <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
        <p>Pergunta 3 -
        Fez pesquisa de preço e condições de pagamento?</p>
      </div>
      <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
        <input class = "w3-radio" type="radio" name="q3" value="Sim" required="required">Sim<br>
        <input class = "w3-radio" type="radio" name="q3" value="Não">Não
      </div>
     <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
      <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
        <p>Pergunta 4 -
        Pediu a opinião de outras pessoas?</p>
      </div>
      <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
        <input class = "w3-radio" type="radio" name="q4" value="Sim" required="required">Sim<br>
        <input class = "w3-radio" type="radio" name="q4" value="Não">Não
      </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
      <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
        <p>Pergunta 5 -
        Negociou ou pechinchou?</p>
      </div>
      <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
        <input class = "w3-radio" type="radio" name="q5" value="Sim" required="required">Sim<br>
        <input class = "w3-radio" type="radio" name="q5" value="Não">Não
      </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
      <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
        <p>Pergunta 6 -
        Deu um tempo a si mesmo para pensar?</p>
      </div>
      <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
        <input class = "w3-radio" type="radio" name="q6" value="Sim" required="required">Sim<br>
        <input class = "w3-radio" type="radio" name="q6" value="Não">Não
      </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
      <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
        <p>Pergunta 7 -
        Comprou apenas o que estava programado?</p>
      </div>
      <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
        <input class = "w3-radio" type="radio" name="q7" value="Sim" required="required">Sim<br>
        <input class = "w3-radio" type="radio" name="q7" value="Não">Não
      </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div style="text-align: center">
      <button class="w3-btn w3-center w3-large w3-hover-black w3" onclick="proximaEtapaQuiz()" type="button" style="background-color:#403F3B; margin:3%">Continuar para a próxima fase!
      </button>
    </div>
  </div>

<!--SEGUNDA PARTE DO QUIZ REFERENTE AO CONTROLE DE COMPRAS -->

  <div id="quizP2" style="display: none">
    <h1 style="font-size: 25px; margin-top:4%; padding:48px!important; text-align: center;">Controle - A segunda parte se refere às características dessa compra:</h1>
    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 8 -
      Comprei rápido, sem pensar duas vezes!</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q8" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q8" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q8" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q8" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 9 -
      Uma das razões para ter comprado foi ter me sentido pressionado pelo vendedor, ou pela situação</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
      <input class = "w3-radio" type="radio" name="q9" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q9" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q9" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q9" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 10 -
    Avaliei os produtos disponíveis e escolhi aquele que me servia melhor</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q10" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q10" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q10" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q10" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>


    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 11 -
    Comprei exatamente o que estava precisando sem exageros</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q11" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q11" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q11" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q11" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 12 -
    Fiz esta compra quando estava me sentindo triste, inseguro, ou sozinho e senti que precisava me distrair</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q12" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q12" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q12" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q12" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 13 -
    Depois que saí da loja, pensei que não deveria ter comprado</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q13" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q13" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q13" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q13" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 14 -
    Eu realmente precisava das coisas que comprei e sei que elas serão muito úteis</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q14" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q14" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q14" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q14" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>

    <div class="w3-row">
    <div class="w3-col l12 s12 w3-container w3-card-2 w3-theme-d1 w3-large">
      <p>Pergunta 15 -
    Sei que o uso dessa compra me trará satisfação por bastante tempo</p>
    </div>
    <div style="margin-top:2%" class="w3-col l12 s12 w3-container">
     <input class = "w3-radio" type="radio" name="q15" value="Com certeza sim" required="required">Com certeza sim<br>
      <input class = "w3-radio" type="radio" name="q15" value="Talvez sim">Talvez sim<br>
      <input class = "w3-radio" type="radio" name="q15" value="Talvez não">Talvez não<br>
      <input class = "w3-radio" type="radio" name="q15" value="Com certeza não">Com Certeza não
    </div>
      <div class="w3-right-align"><i class="fa fa-lightbulb-o fa-3x" style="cursor: pointer" title="Teste" aria-hidden="true"></i></div>
    </div>
    <div style="text-align: center;">
      <button class="w3-btn w3-center w3-large w3-hover-black" name="submit" onclick="document.getElementById('id02').style.display='block'"  style="background-color:#403F3B; margin:3%">Concluir OnioQuiz
      </button>
    </div>
  </div>
</div>

<footer class="w3-center w3-padding-16 w3-theme-d1">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-square w3-hover-text-indigo"></i>
    <i class="fa fa-instagram w3-hover-text-purple"></i>
    <i class="fa fa-twitter-square w3-hover-text-light-blue"></i>
  </div>
  <p><a href="" style="text-decoration: none">Desenvolvido por Horizon</a></p>
</footer>
 
</body>
</html>
