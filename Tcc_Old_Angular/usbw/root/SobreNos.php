<html>
<head>
	<title>Sobre Nós</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="design/w3.css">
  <link rel="stylesheet" type="text/css" href="design/style.css">
	<script>

// *********************************************************** MENU EM RESOLUÇÕES MENORES ****************************************************//
	function myFunction() {
	    var x = document.getElementById("navDemo");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	    }
	}
//********************************************************************************************************************************************//
  </script>
</head>
<body>
<div class="site">

<div style="top: 0">
 <ul class="w3-navbar w3-wide w3-card-2 font-top-bar" style="border-bottom:1px solid black">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
     <a style="padding:13.5px" class="w3-hover-black w3-white" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    </li>
    <li>
      <a href="index.php" style="text-decoration: none">ONIOCARE</a>
    </li>
    <li class="w3-right w3-hide-small">
      
      <?php 
      session_start();
      include 'conexaobanco.php';
      if (!isset($_SESSION["logado"])) 
      {
    ?>
      <a href="SobreNos.php" class="w3-left "> Sobre Nós</a>
      <a href="cadastro.php" class="w3-left" style="text-decoration: none"> Inscreva-se</a>
      <a href="#Login" class="w3-left" onclick="document.getElementById('id01').style.display='block'"> Entrar</a>
      <?php 
      }
      else{   
      ?>
      <h1 class="w3-left" style="font-size: 19px; font-family: Rockwell">Bem Vindo <?php echo $_SESSION["user"] ?></h1>
      <a href="configuracoes.php" class="w3-left" title="Configurações"><i class="fa fa-cog" style="padding: 5.5px"></i></a>
      <a href="#" class="w3-left"><form method="post" action="validalogin.php" style="margin:0!important"><button name="sair" style="border:none;background-color: #FFFFFF; padding: 0;" class="hover-grey"><img src="imagens/Nav/exit.png" style="padding: 3px"></button></form></a>
      <?php
       } ?>
    </li>
  </ul>

<!-- *********************************************************** MODAL ********************************************************************-->
 <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn PositionTopRight w3-container w3-padding-8 hover-red" title="Fechar">&times;</span>
        <img src="imagens/login/perfil.png"  style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="validalogin.php" method="post">
        <div class="w3-section">
          <label><b>Usuário</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Devedor" name="usrname" required>
          <label><b>Senha</b></label>
          <input class="w3-input w3-border" type="password" placeholder="******" name="psw" required>
          <button class="w3-btn-block w3-green w3-section w3-padding" type="submit" name="entrar">LOGIN</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-btn"><a href="cadastro.php" style="text-decoration: none">CADASTRAR-SE</a></button>
        <span class="w3-right w3-padding w3-hide-small">ESQUECEU SUA <a href="#">SENHA?</a></span>
      </div>

    </div>
  </div>
<!-- *********************************************************** MENU EM RESOLUÇÕES MENORES *************************************************-->
  <div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium">
    <ul class="w3-navbar w3-left-align w3-large" style="letter-spacing: 4px">
      <li><a class="w3-padding-large" href="SobreNos.php">Sobre Nós</a></li>
      <li><a class="w3-padding-large" href="cadastro.php">Inscreva-se</a></li>
      <li><a class="w3-padding-large" href="#Login" onclick="document.getElementById('id01').style.display='block'">Entrar</a></li>
    </ul>
  </div>
</div>
<!--*****************************************************************************************************************************************-->
<!--************************************************* CONTEÚDO DA PÁGINA ********************************************************************-->
<div class="w3-container w3-padding-32 w3-center">
<h2 style="font-family: Rockwell; font-size: 60px; color: #403B3F;">Equipe</h2>
</div>

<div class="w3-row" style="margin: 2%">
	<div class="w3-col l4" style="text-align: center;">
		<a href="#Eric"><img src="imagens/SobreNos/Eric.jpg" style="width:50%;  max-width:100%; cursor:pointer" onclick="document.getElementById('id02').style.display='block'" title="Clique para mais informações" class="w3-circle w3-hover-opacity"></a>
		<h3 style="font-family: Arial; letter-spacing: 4px; margin:3%">Eric Henry </h3>
	</div>

	<div class="w3-col l4" style="text-align: center;">
		<a href="#Mateus"><img src="imagens/SobreNos/Mateus.jpg" style="width:50%;  max-width:100%; cursor:pointer" onclick="document.getElementById('id03').style.display='block'" title="Clique para mais informações" class="w3-circle w3-hover-opacity "></a>
		<h3 style="font-family: Arial; letter-spacing: 4px; margin:3%">Mateus Henrique </h3>
	</div>

	<div class="w3-col l4" style="text-align: center;">
		<a href="#Phelipe"><img src="imagens/SobreNos/Phelipe.jpg" style="width:50%;  max-width:100%; cursor:pointer" onclick="document.getElementById('id04').style.display='block'" title="Clique para mais informações" class="w3-circle w3-hover-opacity "></a>
		<h3 style="font-family: Arial; letter-spacing: 4px; margin:3%">Phelipe Soares </h3>
	</div>
</div>

<div class="w3-row" style="margin: 4%; text-align: center;">

	<div class="w3-col l6" >
		<a href="#Maximiliano"><img src="imagens/SobreNos/Max.jpg" style="width:35%;  max-width:100%; cursor:pointer;" onclick="document.getElementById('id05').style.display='block'" title="Clique para mais informações" class="w3-circle w3-hover-opacity"></a>
		<h3 style="font-family: Arial; letter-spacing: 4px; margin:3%">Maximiliano De Souza </h3>
	</div>

	<div class="w3-col l6">
		<a href="#Gabriel"><img src="imagens/SobreNos/Jairro.jpg" style="width:35%;  max-width:100%; cursor:pointer" onclick="document.getElementById('id06').style.display='block'" title="Clique para mais informações" class="w3-circle w3-hover-opacity "></a>
		<h3 style="font-family: Arial; letter-spacing: 4px; margin:3%">Gabriel Jarró </h3>
	</div>
	
</div>

<!-- *********************************************************** MODAL ERIC ********************************************************************-->
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-closebtn PositionTopRight w3-container w3-padding-8 hover-red" title="Fechar">&times;</span>
        <img src="imagens/SobreNos/Eric.jpg"  style="width:55%" class="w3-circle w3-margin-top">
      </div>
      <div style="text-align: center" class="w3-padding-16">
	      <h2 style="letter-spacing: 4px;"> Eric Henry</h2>
	      <p>Designer/Documentador
	      <br>
	      Etec Dra. Ruth Cardoso
	      </p>
      </div>
      <div class="w3-container w3-border-top w3-light-grey" style="padding: 20px;text-align: center;">
      <h2 style="font-size: 22px; letter-spacing: 3px"> Redes Sociais </h2>
	      <a href="https://www.facebook.com/Erichenryfraga?fref=ts" target="_blank"><img src="imagens/SobreNos/Redes/face.png"  style="max-width:100%; cursor: pointer;" class="opacy"></a>
	   		<img src="imagens/SobreNos/Redes/skype.png"  style="max-width:100%; cursor: pointer;">
	   		<img src="imagens/SobreNos/Redes/gmail.png"  style="max-width:100%; cursor: pointer;">
      </div>

    </div>
  </div>
<!-- *********************************************************** MODAL MATEUS ********************************************************************-->
<div id="id03" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-closebtn PositionTopRight w3-container w3-padding-8 hover-red" title="Fechar">&times;</span>
        <img src="imagens/SobreNos/Mateus.jpg"  style="width:55%" class="w3-circle w3-margin-top">
      </div>
      <div style="text-align: center" class="w3-padding-16">
	      <h2 style="letter-spacing: 4px;"> Mateus Henrique</h2>
	      <p>Documentador/Designer
	      <br>
	      Etec Dra. Ruth Cardoso
	      </p>
      </div>
      <div class="w3-container w3-border-top w3-light-grey" style="padding: 20px;text-align: center;">
      <h2 style="font-size: 22px; letter-spacing: 3px "> Redes Sociais </h2>
	      	<a href="https://www.facebook.com/Favoritoteus" target="_blank"><img src="imagens/SobreNos/Redes/face.png"  style="max-width:100%; cursor: pointer;" class="opacy"></a>
	   		<img src="imagens/SobreNos/Redes/skype.png"  style="max-width:100%; cursor: pointer;">
	   		<img src="imagens/SobreNos/Redes/gmail.png"  style="max-width:100%; cursor: pointer;">
      </div>

    </div>
  </div>
<!-- *********************************************************** MODAL PHELIPE ********************************************************************-->
<div id="id04" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id04').style.display='none'" class="w3-closebtn PositionTopRight w3-container w3-padding-8 hover-red" title="Fechar">&times;</span>
        <img src="imagens/SobreNos/phelipe.jpg"  style="width:55%" class="w3-circle w3-margin-top">
      </div>
      <div style="text-align: center" class="w3-padding-16">
	      <h2 style="letter-spacing: 2px;"> Phelipe Soares</h2>
	      <p>Programador
	      <br>
	      Etec Dra. Ruth Cardoso
	      </p>
      </div>
      <div class="w3-container w3-border-top w3-light-grey" style="padding: 20px;text-align: center;">
      <h2 style="font-size: 22px; letter-spacing: 3Zpx"> Redes Sociais </h2>
	      <a href="https://www.facebook.com/phelipe.soare?ref=ts&fref=ts" target="_blank"><img src="imagens/SobreNos/Redes/face.png"  style="max-width:100%; cursor: pointer;" class="opacy"></a>
	   		<img src="imagens/SobreNos/Redes/skype.png"  style="max-width:100%; cursor: pointer;">
	   		<img src="imagens/SobreNos/Redes/gmail.png"  style="max-width:100%; cursor: pointer;">
      </div>

    </div>
  </div>
<!-- *********************************************************** MODAL MAX ************************************************************************-->
<div id="id05" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id05').style.display='none'" class="w3-closebtn PositionTopRight w3-container w3-padding-8 hover-red" title="Fechar">&times;</span>
        <img src="imagens/SobreNos/max.jpg"  style="width:55%" class="w3-circle w3-margin-top">
      </div>
      <div style="text-align: center" class="w3-padding-16">
	      <h2 style="letter-spacing: 4px;"> Maximiliano de Souza</h2>
	      <p>Gerente de Banco de Dados
	      <br>
	      Etec Dra. Ruth Cardoso
	      </p>
      </div>
      <div class="w3-container w3-border-top w3-light-grey" style="padding: 20px;text-align: center;">
      <h2 style="font-size: 22px; letter-spacing: 3px"> Redes Sociais </h2>
	      <a href="https://www.facebook.com/maximiliano.desouzamachado?fref=ts" target="_blank"><img src="imagens/SobreNos/Redes/face.png"  style="max-width:100%; cursor: pointer;" class="opacy"></a>
	   		<img src="imagens/SobreNos/Redes/skype.png"  style="max-width:100%; cursor: pointer;">
	   		<img src="imagens/SobreNos/Redes/gmail.png"  style="max-width:100%; cursor: pointer;">
      </div>

    </div>
  </div>
<!-- *********************************************************** MODAL GABRIEL ************************************************************************-->
<div id="id06" class="w3-modal">
    <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:450px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id06').style.display='none'" class="w3-closebtn PositionTopRight w3-container w3-padding-8 hover-red" title="Fechar">&times;</span>
        <img src="imagens/SobreNos/jairro.jpg"  style="width:55%" class="w3-circle w3-margin-top">
      </div>
      <div style="text-align: center" class="w3-padding-16">
	      <h2 style="letter-spacing: 4px;"> Gabriel Jarró</h2>
	      <p>Programador
	      <br>
	      Etec Dra. Ruth Cardoso
	      </p>
      </div>
      <div class="w3-container w3-border-top w3-light-grey" style="padding: 20px;text-align: center;">
      <h2 style="font-size: 22px; letter-spacing: 3px"> Redes Sociais </h2>
	      <a href="https://www.facebook.com/gjarro?fref=ts" target="_blank"><img src="imagens/SobreNos/Redes/face.png"  style="max-width:100%; cursor: pointer;" class="opacy"></a>
	   		<img src="imagens/SobreNos/Redes/skype.png"  style="max-width:100%; cursor: pointer;">
	   		<img src="imagens/SobreNos/Redes/gmail.png"  style="max-width:100%; cursor: pointer;">
      </div>
    </div>
  </div>
<!--*********************************************** RÓDAPE ****************************************************************************-->
<footer class="w3-container w3-padding-32 w3-center" style="background-color:#D7D7D7">  
  <div class="w3-xlarge">
   <img src="imagens/rodape/facebook.png" class="opacy" style="max-width: 100%">
   <img src="imagens/rodape/twitter.png" class="opacy" style="max-width: 100%">
   <img src="imagens/rodape/linkedin.png" class="opacy" style="max-width: 100%">
   <img src="imagens/rodape/google.png" class="opacy" style="max-width: 100%">

 </div>
 <img src="imagens/rodape/copyright.png"> 2017 HORIZON | ALL RIGHTS RESERVED
</footer>
</div>


</body>
</html>




















