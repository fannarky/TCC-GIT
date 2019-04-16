<!DOCTYPE html>
<html>
<title>Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="Scripts/cadastro.js"></script>
    <link rel="stylesheet" type="text/css" href="strength.css">
    <?php
    session_start();
    if ($_SESSION["logado"] == "TRUE") 
          {
            echo"<script language='javascript' type='text/javascript'>alert('Você já está cadastrado. Por Favor Entre na sua Conta') ; window.location.href='homepage.php';</script>";
          }
    ?>
<body>

<div class="w3-top">
  <div class="w3-bar w3-theme-d1 w3-large" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
    <div class="w3-right w3-hide-small">
        <a href="#home" class=" w3-bar-item w3-button "><i class="fa fa-home"></i></a>
        <a href="#Login" class="w3-bar-item w3-button" onclick="document.getElementById('id01').style.display='block'"> <i class="fa fa-user"></i></a>  
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
          <label style="color:#FFF3F2; font-size: 18px" >Usuário</label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Insira seu login" name="usrname" required>
          <label style="color: #FFF3F2; font-size: 18px">Senha</label>
          <input class="w3-input w3-border" type="password" placeholder="*******" name="psw" required>
          <button class="w3-btn-block w3-section w3-padding w3-white w3-opacity w3-hover-opacity-off" style="font-size: 18px; color: white" type="submit" name="entrar">Entrar na sua conta</button>

          <!--<input class="w3-check w3-margin-top" type="checkbox" checked="checked" style="color:#FFF3F2; font-size: 18px"> Lembrar-me-->
        </div>      

      <div class="w3-container  w3-border-top w3-padding-16" style="background-color:#403B3F">
        <a href="cadastro.php" class="w3-btn w3-white w3-opacity w3-hover-opacity-off" style="font-size: 17px">Cadastre-se</a>
        <span class="w3-right w3-padding w3-hide-small"><a href="#" style="color:#FFF3F2; font-family: Arial;  font-size: 17px"> Esqueceu sua senha?</a></span>
        </div>
        </form> 
    </div>
  </div> 
  <!-- ********************************************************  FIM MODAL ****************************************************************--> 
 
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars w3-padding-right w3-padding-left"></i>
    </a>
    </div>
</div>

<!-- Sidenav on small screens when clicking the menu icon -->
<nav class="w3-sidenav w3-black w3-card-2 w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-large w3-padding-16">Close ×</a>
  <a href="index.php" onclick="w3_close()">INÍCIO</a>
  <a href="#login" onclick="w3_close()">ACESSAR CONTA</a>

</nav>
<!--*****************************************************************************************************************************************-->
<!--************************************************* CONTEÚDO DA PÁGINA ********************************************************************-->

<header>
<br>
<div id="cadastro" class="w3-container w3-padding-128 w3-center">
  <div class="w3-content">
    <h1 style="color:black;opacity:0.86; text-align: center;"><b>Deseja cadastrar-se como...</b></h1>
    <div class="w3-row">
      <div class="w3-half ">
        <a href="#Paciente" name="<?php $paciente; ?>"><img src="imagens/cadastro/oniomaniaca.png" onclick="mostraCadastroPaciente()" style="cursor:pointer; padding: 4%"></a>
        <p style="font-size: 25px">Paciente</p>
      </div>
       <div class="w3-half ">
        <a href="#Médico" name="<?php $medico; ?>"><img src="imagens/cadastro/medico.png" onclick="mostraCadastroMedico()" style="cursor:pointer" ></a>
        <p style="font-size: 25px">Médico</p>
      </div>
  </div>
</div>
</div>
</header>

 
<div id="paciente">
  <div class="w3-row w3-container">
  <div class="w3-container w3-quarter"> </div>
    
    <div class="w3-container w3-half">
      <div style="text-align: center">
        <img src="imagens/cadastro/oniomaniaca.png">  
      </div>

          <form  id="myform" class="w3-container" method="POST">
         
          <p><label>Nome Completo</label>
            <input class="w3-input" type="text" name="nome" id="mascara" required="true"> </p>
           
          <p><label>Sexo</label></p>
            <p><input class="w3-radio" type="radio" name="gender" value="1001" checked>
            <label>Masculino</label>
            <input class="w3-radio" type="radio" name="gender" value="1002">
            <label>Feminino</label>
           
          <p><label>Email</label>
            <input class="w3-input" type="text" name="email" required="true"></p>
           
          <p><label>Data</label>
            <input class="w3-input" type="date" name="data" id="telefonee" maxlength="15"></p>
           
          <p><label>Celular</label>
            <input class="w3-input" type="text" id="celular" name="celular"></p>
           
          <p><label>CPF</label>
            <input class="w3-input" type="text" type="text" id="cpf" name="cpf" ></p>
          
          <p><label>Login</label>
            <input class="w3-input" type="text" name="login" minlength="4" required="true"></p>

          <p>
            <label>Senha</label>
            <input class="w3-input" type="password" name="senha" id="myPassword" required="true"></p>
          
          <p><label>Confimar Senha</label>
           <input class="w3-input" type="password" name="confirmasenha" required="true"></p>
          
          <button class="w3-btn w3-left w3-xlarge" onclick="VoltaCadastro()" type="button" style="background-color:#d67b6a;">Voltar</button>
          <button class="w3-btn w3-right w3-xlarge" type="submit" style=" background-color:#5fba7d;" name="enviarpaciente">Enviar</button>
          
          </form>
          <?php             
              if(isset($_POST["enviarpaciente"]))
              {
                $_enviar = $_POST["enviarpaciente"];
              }
              if (isset($_enviar)) {
                $senha = $_POST["senha"];
                $confirmasenha = $_POST["confirmasenha"];
                if ($senha == $confirmasenha) 
                {
                include_once 'Classes/cadastro.class.php';
                $cadastro = new Cadastro();
                $senha = $_POST["senha"];
                $genero = $_POST["gender"];
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $data =  $_POST["data"];
                $celular = $_POST["celular"];
                $cpf = $_POST["cpf"];
                $login = $_POST["login"];
                $cadastro->dadosPaciente($nome , $email, $genero,$data, $celular, $cpf, $login, $senha);
                echo"<script language='javascript' type='text/javascript'>alert('Usuário Cadastrado com Sucesso!!!') ;</script>";
              }

              else
              {
                echo"<script language='javascript' type='text/javascript'>alert('As senhas inseridas não conferem') ;</script>";
              }
            }
                                   
 ?>
      </div>
     <div class="w3-container w3-quarter"></div>
  </div>
</div>



<div id="medico">
  <div class="w3-row w3-container">
  <div class="w3-container w3-quarter"> </div>
    
    <div class="w3-container w3-half">
      <div style="text-align: center">
        <img src="imagens/cadastro/medico.png">  
      </div>

          <form class="w3-container " method="POST">
          <p><label>Nome Completo</label>
            <input class="w3-input" type="text" name="nome" required="true"> </p>
           
          <p><label>Sexo</label></p>
            <p><input class="w3-radio" type="radio" name="gender" value="Homem" checked>
            <label>Masculino</label>
            <input class="w3-radio" type="radio" name="gender" value="Mulher">
            <label>Feminino</label>


          <p><label>Email</label>
            <input class="w3-input" type="text" name="emailmedico" required="true"></p>
           
          <p><label>Celular</label>
            <input class="w3-input" id="celularmedico" type="text" name="celular"></p>
           
          <p><label>CPF</label>
            <input class="w3-input" id="cpfmedico" type="text" name="cpf"></p>

            <p><label>CRM</label>
            <input class="w3-input" type="text" name="crm" minlength="10" required="true"></p>
          <p>
            <label>Senha</label>
            <input class="w3-input" type="password" name="senhamedico" required="true"  accept-charset="utf-8"></p>
          
          <p><label>Confimar Senha</label>
           <input class="w3-input" type="password" name="confirmasenhamedico" required="true"></p>
           
          <button class="w3-btn w3-left w3-xlarge" onclick="VoltaCadastro()" type="button" style="background-color:#d67b6a;">Voltar</button>
          <button class="w3-btn w3-right w3-xlarge" type="submit" style=" background-color:#5fba7d;" name="enviarmedico">Enviar</button>
          <?php 
              if (isset($_POST["enviarmedico"]))
              {
                $enviar = $_POST["enviarmedico"];
                $senha = $_POST["senhamedico"];
                $confirmasenha = $_POST["confirmasenhamedico"];
              }
              if(isset($enviar))
              {
                if ($senha == $confirmasenha) {
                include_once 'Classes/cadastro.class.php';
                $cadastro = new Cadastro(); 
                $retorna = $cadastro->dadosMedico($_POST["nome"], $_POST["cpf"], $_POST["crm"], $_POST["senhamedico"]);
                }
                else{
                  echo"<script language='javascript' type='text/javascript'>alert('As senhas inseridas não conferem') ;</script>";
                }
            } 

          ?>
          </form>
          
      </div>
     
     <div class="w3-container w3-quarter"></div>
  </div>
</div>

<!--*********************************************** RÓDAPE ****************************************************************************-->
<footer class="w3-center w3-padding-16 w3-theme-d1">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-square w3-hover-text-indigo"></i>
    <i class="fa fa-instagram w3-hover-text-purple"></i>
    <i class="fa fa-twitter-square w3-hover-text-light-blue"></i>
  </div>
  <p><a href="" style="text-decoration: none">Desenvolvido por Horizon</a></p>
</footer>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="JQuery/strengt.js"></script>
<script type="text/javascript" src="JQuery/jquery.mask.min.js"></script>
<script>

$(document).ready(function(){
  $('#myPassword').strength({
            strengthClass: 'strength',
            strengthMeterClass: 'strength_meter',
            strengthButtonClass: 'button_strength',
            strengthButtonText: 'Mostrar Senha',
            strengthButtonTextToggle: 'Ocultar Senha'
        });
  $("#celular").mask("(99) 99999-9999");
  $("#cpf").mask("999.999.999-99");
  $("#celularmedico").mask("(99) 99999-9999");
  $("#cpfmedico").mask("999.999.999-99");
  $('#crm').mask("000000000-0");
});

</script>

</body>
</html>