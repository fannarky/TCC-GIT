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
<script type="text/javascript" src="JQuery/jquery-3.1.1"></script>

<?php
session_start();
if ($_SESSION["logado"] != "TRUE") 
      {
        echo"<script language='javascript' type='text/javascript'>alert('Você não está logado, Por Favor Entre na sua Conta') ; window.location.href='index.php';</script>";
      }
  
  include 'conexaobanco.php';
  $query = mysql_query("select img_perfil from tb_usuario where cd_usuario = ".$_SESSION["cd_usuario"]." ") or die(mysql_error());
  while ($rows = mysql_fetch_assoc($query)) {
    $var = $rows["img_perfil"];
  }

  $frasee = mysql_query("SELECT nm_autor, ds_frase from tb_frase_motivacao");
      while ($rows = mysql_fetch_assoc($frasee)){
        $autor = $rows["nm_autor"];
        $frase = $rows["ds_frase"];
      }

  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d-m-Y');
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
                $('#im').hide('fast');
           });
</script>
<body  class="w3-light-grey">
<div class="w3-top">
<div class="w3-bar w3-theme-d1 w3-large " id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
    <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-red">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
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

    <!-- Div principal -->
    <header class="w3-container" style="padding-top:22px">
    <br>
      <h5><b><i class="fa fa-dashboard"></i> Painel de metas</b></h5>
    </header>
    <!-- Amostra das metas atuais-->
    <div class="w3-row-padding w3-margin-bottom w3-animate-left">
      <div class="w3-quarter">
        <div class="w3-container w3-red w3-padding-16">
          <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>52</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Metas Diárias</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-blue w3-padding-16">
          <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>99</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Metas Semanais</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-teal w3-padding-16">
          <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>23</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Metas Mensais</h4>
        </div>
      </div>
      <div class="w3-quarter">
        <div class="w3-container w3-orange w3-text-white w3-padding-16">
          <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3>50</h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Sonho de consumo</h4>
        </div>
      </div>
    </div>

    <!-- Amostra das metas atuais -->
    <div class="w3-panel">
      <div class="w3-row-padding" style="margin:0 -16px">
        
        <div class="w3-container">
          <h5>Metas atuais</h5>
          <table class="w3-table w3-striped w3-white">
            <tr>
              <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
              <td>New record, over 90 views.</td>
              <td><i>10 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
              <td>Database error.</td>
              <td><i>15 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
              <td>New record, over 40 users.</td>
              <td><i>17 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
              <td>New comments.</td>
              <td><i>25 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
              <td>Check transactions.</td>
              <td><i>28 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
              <td>CPU overload.</td>
              <td><i>35 mins</i></td>
            </tr>
            <tr>
              <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
              <td>New shares.</td>
              <td><i>39 mins</i></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <hr>
    <!-- Progresso do usuário -->
    <div class="w3-container">
      <h5>Desenvolvimento atual das metas</h5>
      <p>New Visitors</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
      </div>

      <p>New Users</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
      </div>

      <p>Bounce Rate</p>
      <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
      </div>
    </div>
    <hr>

    <div class="w3-container">
      <h5>Countries</h5>
      <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
        <tr>
          <td>United States</td>
          <td>65%</td>
        </tr>
        <tr>
          <td>UK</td>
          <td>15.7%</td>
        </tr>
        <tr>
          <td>Russia</td>
          <td>5.6%</td>
        </tr>
        <tr>
          <td>Spain</td>
          <td>2.1%</td>
        </tr>
        <tr>
          <td>India</td>
          <td>1.9%</td>
        </tr>
        <tr>
          <td>France</td>
          <td>1.5%</td>
        </tr>
      </table><br>
      <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
    </div>
    <hr>
    <div class="w3-container">
      <h5>Recent Users</h5>
      <ul class="w3-ul w3-card-4 w3-white">
        <li class="w3-padding-16">
          <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
          <span class="w3-xlarge">Mike</span><br>
        </li>
        <li class="w3-padding-16">
          <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
          <span class="w3-xlarge">Jill</span><br>
        </li>
        <li class="w3-padding-16">
          <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
          <span class="w3-xlarge">Jane</span><br>
        </li>
      </ul>
    </div>
    <hr>

    <div class="w3-container">
      <h5>Recent Comments</h5>
      <div class="w3-row">
        <div class="w3-col m2 text-center">
          <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
        </div>
        <div class="w3-col m10 w3-container">
          <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
        </div>
      </div>

      <div class="w3-row">
        <div class="w3-col m2 text-center">
          <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
        </div>
        <div class="w3-col m10 w3-container">
          <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
          <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
        </div>
      </div>
    </div>
    <br>
    
      </div>
    </div>
    </p>
    </div>
    </div>
    </div>
    </div>
    </div>
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
</script>
    </body>
    </html>