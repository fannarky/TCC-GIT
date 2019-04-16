<!DOCTYPE html>
<html>
<title>OnioCare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/w3.css">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script type="text/javascript" src="Scripts/login.js"></script>
    <script src="JQuery/jquery-3.2.1.min.js"></script>
    <script src="JQuery/JQuery.sliphover.min.js"></script>
<body>

<div class="w3-top">
  <div class="w3-bar w3-theme-d1 w3-large" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
    <div class="w3-right">
      
    <?php 
      session_start();
      include 'conexaobanco.php';
      if (!isset($_SESSION["logado"])) 
      {
    ?>
       <a href="#home" class=" w3-bar-item w3-button "><i class="fa fa-home"></i></a>
        <a href="#" class="w3-bar-item w3-button" onclick="document.getElementById('modalLogar').style.display='block'"> <i class="fa fa-user"></i></a>
      <?php 
      }
      else{   
      ?>
      <a  href="homepage.php" class="w3-left w3-bar-item w3-button"><?php echo $_SESSION["user"];?><i style="padding-left: 10px" class="fa fa-user"></i></a>
      <a href="configuracoes.php" class="w3-bar-item w3-button" title="Configurações"><i class="fa fa-cog"></i></a>
      <a href="#sair" class="w3-bar-item w3-button"><form method="post" action="validalogin.php"><button name="sair" class="button-menu" class="w3-theme-d1"><i class="fa fa-sign-out"></i></button></form></a>
      <?php
       } ?>
    </div>
  </div>
</div>

  <!-- *********************************************************** MODAL ***************************************************-->
  <div id="modalLogar" class="w3-modal">

      <div id="main" class="w3-modal-content w3-card-8 w3-animated-zoom" style="max-width: 400px; background-color: #403B3F">
          <!-- MODAL PRINCIPAL PARA ESCOLHER ENTRE MÉDICO E PACIENTE -->
            <div class="w3-center">
              <span onclick="document.getElementById('modalLogar').style.display='none'" class="w3-closebtn w3-hover-red w3-container w3-padding-4 w3-display-topright" title="Fechar Modal">&times;</span>
                <div class="container">
                  <h2 style="font-size: Rockwell; color:white; font-size: 24px"><p>Bem Vindo ao Oniocare</p></h2>
                </div>
            </div>
          <div id="escolheLogin"> 
                    <form name="escolheLogin">                       
                      <div class="w3-row">
                          <div class="w3-half w3-center">
                             <img src="imagens/login/perfil.png" style="width:50%" class="w3-circle w3-margin-top"><br>
                             <input name="usuario" class="w3-radio" type="radio" >
                          </div>
                          <div class="w3-half w3-center">
                              <img src="imagens/login/medico.png" style="width:50%" class="w3-circle w3-margin-top"><br>
                              <input name="usuario"  class="w3-radio" type="radio" >
                          </div>    
                    </div>
                      <div  class="w3-container w3-border-top w3-padding" style="background-color: #403B3F; margin-top: 5%">
                        <button class="w3-btn-block w3-white w3-opacity w3-hover-opacity-off" type="submit" style="font-size: 18px; color:white; margin-top:4%" onclick="chamaLogin()">Entrar</button>
                      </form>
                        <a href="cadastro.php" class="w3-btn-block w3-section w3-white w3-opacity w3-hover-opacity-off" style="text-decoration: none">Cadastrar-se</a>
                      </div>
          </div>
          <!-- FIM DO MODAL PRINCIPAL PARA ESCOLHER ENTRE MÉDICO E PACIENTE -->   
          
          <div id="paciente">
          <!-- MODAL PARA LOGAR COMO PACIENTE -->  
            <div class="w3-center" style="background-color:#403B3F;"><br>
                <img src="imagens/login/perfil.png" style="width:30%" class="w3-circle w3-margin-top">
            </div>
                <form id="frmlogin" class="w3-container" method="post" action="validalogin.php" style="background-color:#403B3F">
                <div class="w3-section">
                  <label style="color:white; font-size: 18px" >Usuário</label>
                  <input class="w3-input w3-border w3-margin-bottom" type="text" id="login" placeholder="Insira seu login" name="login" required="true">
                  <label style="color: white; font-size: 18px">Senha</label>
                  <input class="w3-input w3-border" id="senha" type="password" placeholder="*******" name="senha" required="true">
                  <button class="w3-btn-block w3-section w3-padding w3-white w3-opacity w3-hover-opacity-off" style="font-size: 18px; color: white" type="submit" name="entrar">Entrar na sua conta</button>
                </div>      
                <div class="container w3-border-top">
                  <div class="w3-container w3-right  w3-padding-16" style="background-color:#403B3F">
                    <a href="cadastro.php" class="w3-btn w3-white w3-opacity w3-hover-opacity-off" style="font-size: 17px">Cadastre-se</a>
                  </div>
                  <div class="w3-container w3-left w3-padding-16" style="background-color:#403B3F">
                    <button class="w3-btn w3-white w3-opacity w3-hover-opacity-off" onclick="voltaEscolha()">Voltar</button>
                  </div>
                </div>
                </form> 
          <!-- FIM DO MODAL PARA LOGAR COMO PACIENTE -->
          </div>   

          <div id="medico">
          <!-- MODAL PARA LOGAR COMO MEDICO -->  
            <div class="w3-center" style="background-color:#403B3F;"><br>
                <img src="imagens/login/medico.png" style="width:30%" class="w3-circle w3-margin-top">
            </div>
                <form id="frmloginmedico" method="post" action="validamedico.php" class="w3-container" style="background-color:#403B3F">
                <div class="w3-section">
                  <label style="color:white; font-size: 18px" >CRM</label>
                  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="4679012" name="crm" required="true">
                  <label style="color: white; font-size: 18px">Senha</label>
                  <input class="w3-input w3-border" type="password"  name="senhamedico" required="true">
                  <button class="w3-btn-block w3-section w3-padding w3-white w3-opacity w3-hover-opacity-off" style="font-size: 18px; color: white" type="submit" name="entrar">Entrar na sua conta</button>
                </div>      
                <div class="container w3-border-top">
                  <div class="w3-container w3-left w3-padding-16" style="background-color:#403B3F">
                    <button class="w3-btn w3-white w3-opacity w3-hover-opacity-off" onclick="voltaEscolha()">Voltar</button>
                  </div>
                  <div class="w3-container w3-right  w3-padding-16" style="background-color:#403B3F">
                    <a href="cadastro.php" class="w3-btn w3-white w3-opacity w3-hover-opacity-off" style="font-size: 17px">Cadastre-se</a>
                  </div>
                </div>
                </form> 
          <!-- FIM DO MODAL PARA LOGAR COMO MEDICO -->
          </div>   

      </div>

  </div> 
<!-- ********************************************************  FIM MODAL ****************************************************************--> 


<header class="bgimg-1 w3-display-container" id="home">
  <div class="w3-display-left w3-padding-xxlarge w3-text-white">
    <span class="w3-jumbo w3-hide-small">Você é um comprador compulsivo?</span><br>
    <span class="w3-xlarge w3-hide-large w3-hide-medium">Você é um comprador compulsivo?</span><br>
    <span class="w3-large">Não consegue controlar as suas finanças e se sente deprimido por esse motivo?</span>
    <p><a href="quiz.php" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off w3-hide-small">Clique aqui e acesse o nosso questionário interativo para saber se é portador da oniomania</a></p>
  </div> 
</header>

<div class="w3-container w3-content w3-center w3-padding-32">
    <h2 style="letter-spacing: 4px"> ONIOMANIA </h2>
    <p><i>Um pouco sobre a doença</i></p>
    <p style="text-align: justify; font-size: 20px;">A Oniomania trata-se de um transtorno compulsivo que atinge homens e mulheres de todas as classes sociais. É uma doença que precisa de tratamento médico e, em certos casos, até mesmo de medicamentos, porém pouca gente sabe disso. O que essas pessoas com o distúrbio de Oniomania têm em comum é uma vontade incontrolável de comprar,  sem absoluto critério e consciência da sua verdadeira necessidade e condição financeira. Normalmente essas pessoas são viciadas em consumo descontrolado e estão sempre devendo, causando transtornos para si e para suas famílias.
  Estudos apontam que a doença atinge mais as mulheres que os homens, e não por fatores genéticos, mas em razão de nossa cultura</p>
    <div class="w3-row w3-padding-32">
      <h2 style="letter-spacing: 4px">MALEFICIOS DA DOENÇA</h2>
      <div class="w3-third">
        <p style="letter-spacing: 2px; font-size: 18px">Sem Controle de Finanças</p>
        <img src="imagens/home/maleficios/problemas_financeiras.jpg" style="width:75%; max-width: 100%; cursor: pointer" class="w3-circle w3-hover-opacity">
      </div>
      <div class="w3-third">
        <p style="letter-spacing: 2px; font-size: 18px">Problemas Familiares</p>
        <img src="imagens/Home/Maleficios/problemas_familiares.jpeg" style="width:75%;  max-width:100%; cursor:pointer"  class="w3-circle w3-hover-opacity">
      </div>
      <div class="w3-third">
        <p style="letter-spacing: 2px; font-size: 18px">Adquirir outras doenças</p>
         <img src="imagens/Home/Maleficios/outras_doencas.jpeg" style="width:75%;  max-width:100%; cursor:pointer"  class="w3-circle w3-hover-opacity">
      </div>
    </div>
  </div>

<div class="w3-container w3-content w3-center w3-padding-32">
    <h2 style="letter-spacing: 4px"> PARTICULARIDADES </h2>
    <p style="text-align: justify; font-size: 20px;"> Existe uma grande diferença entre um comprador impulsivo e um comprador compulsivo, enquanto o primeiro compra sem planejamento e por um simples desejo momentâneo - o compulsivo é caracterizado como uma espécie de vício onde a pessoa gera um desejo irresistível em comprar, que só passa após a aquisição de alguma coisa.</p>
    <div class="w3-row w3-padding-32">
        <img src="imagens/home/Diferenca/diferenca.png" style="width:75%; max-width: 100%;" >
      </div>
    </div>
  </div>
<!-- Footer -->
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
