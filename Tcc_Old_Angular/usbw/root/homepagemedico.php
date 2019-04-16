<!DOCTYPE html>
<html>
<title>Página inicial - Médico</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" type="text/css" href="CSS/w3.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/styles.css">
<script type="text/javascript" src="JQuery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="Scripts/homepage.js"></script>
<script src="JQuery/jquery.mask.min.js"></script>
</style>
<body>
<?php
session_start();
include 'conexaobanco.php';
if ($_SESSION["logado"] != "TRUE") 
      {
        echo"<script language='javascript' type='text/javascript'>alert('Você não está logado, Por Favor Entre na sua Conta') ; window.location.href='index.php';</script>";
      }
?>
<!-- Side Navigation -->
<div class="w3-top">
<div class="w3-bar w3-theme-d1 w3-large " id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
    <div class="w3-right ">
     <a  href="homepage.php" class="w3-left w3-bar-item w3-button"><?php echo $_SESSION["user"]?><i style="padding-left: 10px" class="fa fa-user"></i></a>
        <a href="configuracoes.php" class="w3-bar-item w3-button" title="Configurações"><i class="fa fa-cog"></i></a>
        <a href="#sair" class="w3-bar-item w3-button"><form method="post" action="validalogin.php"><button name="sair" class="button-menu" class="w3-theme-d1"><i class="fa fa-sign-out"></i></button></form></a>
    </div>
</div>



<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card-2" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">Vincular novo paciente <i class="w3-padding fa fa-pencil"></i></a>
        <?php 
          $pegagastos = mysql_query("SELECT nm_usuario
                                      FROM medico_usuario
                                        INNER JOIN tb_usuario ON medico_usuario.cd_usuario = tb_usuario.cd_usuario
                                          WHERE medico_usuario.cd_medico = ".$_SESSION["cd_medico"]."
                                            AND cd_situacao = 1");
          
  ?>
  <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Pacientes atuais: (<?php echo mysql_num_rows($pegagastos); ?>)<i class="fa fa-caret-down w3-margin-left"></i></a>
  <div id="Demo1" class="w3-hide w3-animate-left">
  <?php while($gastos = mysql_fetch_assoc($pegagastos)){?>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('<?php echo $gastos["nm_usuario"]?>');w3_close();">
      <div class="w3-container">
        <span class="w3-opacity w3-large"><?php echo $gastos["nm_usuario"]?></span>
      </div>
    </a>
  <?php
}
  ?>
  </div>
</nav>

<!-- Modal that pops up when you click on "New Message" -->
<div id="id01" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-red">
       <span onclick="document.getElementById('id01').style.display='none'"
       class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
      <h2>Adicionar Paciente</h2>
    </div>
    <div class="w3-panel">
      <form id="frmenviauser" method="post" action="achauser.php">
    <div class="w3-panel">
      <label>CPF do paciente:</label>
      <input class="w3-input w3-border w3-margin-bottom" type="text" name="cpf" id="cpf">
      <div class="w3-section">
        <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancelar  <i class="fa fa-remove"></i></a>
        <button class="w3-button w3-light-grey w3-right" onclick="document.getElementById('id01').style.display='none'" name="enviar">Enviar <i class="fa fa-paper-plane"></i></button>
      </div>
    </div>
    </form>    
      </div>    
    </div>
  </div>
</div>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a> 
<?php 
          $verificausuarios = mysql_query("SELECT nm_usuario
                                            FROM medico_usuario
                                              INNER JOIN tb_usuario ON medico_usuario.cd_usuario = tb_usuario.cd_usuario
                                                WHERE medico_usuario.cd_medico = ".$_SESSION["cd_medico"]."
                                                  AND cd_situacao = 1");
          while($nome = mysql_fetch_assoc($verificausuarios)){
?>
              <div id='<?php echo $nome["nm_usuario"];?>' class='w3-container person'>
                <br>
                <hr>
                <p>
                    Gastos do Paciente <?php $nome["nm_usuario"]; ?>
                      
                    </p>
                    <?php 
                         $gastosdotal = mysql_query("SELECT * 
                                          FROM tb_gasto_diario
                                            INNER JOIN tb_usuario ON tb_usuario.cd_usuario = tb_gasto_diario.cd_usuario
                                              WHERE nm_usuario = '".$nome["nm_usuario"]."' ");
                      while ($valores = mysql_fetch_assoc($gastosdotal)) {
                              echo "<h6>"."Valor: ".$valores["vl_compra"] . " Data:". $valores["dt_compra"] . "  Sentimento:" .$valores["ds_compra"]." Produto: ". $valores["nm_compra"]."</h6>";
                      }


                     ?>
                     <div style = "width:50%; height:50%;">
                <?php

        $cod = array();
        $car = array();
        $cor = '#0b274a';
        //$numerodasemana =  optioneric;
        $i = 0;
        $kkk = 1;
        while($kkk <= 7)
        {

        $resultado = mysql_query("SELECT  sum(vl_compra) from tb_gasto_diario where cd_semana = 1 and cd_dia = ".$kkk." "); 
        $kkk ++;
         while($row = mysql_fetch_assoc($resultado))
        {
          
          $vez[$i] = $row["sum(vl_compra)"];
          
          $i = $i+1;

        }
        }   

        $mot[0] = "1º Dia";
        $mot[1] = "2º Dia";
        $mot[2] = "3º Dia";
        $mot[3] = "4º Dia";
        $mot[4] = "5º Dia";
        $mot[5] = "6º Dia";
        $mot[6] = "7º Dia";
?>
<canvas class="bar-chart"></canvas>
  <script src="Chart.min.js"></script>
  <script type="text/javascript" src="script/jquery.js"></script>
  <script>
    var ctx = document.getElementsByClassName("bar-chart");
    var chartGraph = new Chart(ctx, { 
      type: 'bar',
      data: {
    
        labels:[<?php 
          $k = $i;
            for($i = 0; $i < $k; $i++)
            { 
              echo "\"$mot[$i]\"";
              
              if($k > $i)
              {
                echo ",";
              }
              else
              {
                echo "";
              }
            } 
          ?>],
        datasets: [{
            label: "Quantidade Gasta em R$",
            data:[<?php $k = $i;
            for($i = 0; $i < $k; $i++)
            { 
              echo "\"$vez[$i]\"";
              
              if($k > $i)
              {
                echo ",";
              }
              else
              {
                echo "";
              }
            }  ?>],
            borderwidth: 1,
            borderColor: 'rgba(77,166,253,0.85)',
            backgroundColor: 'blue',
        }]
      },
      options: {
          title: {
            display:true,
            fontSize: 10,
            text: ""
          },
          labels: {
            fontStyle: "bold",
            fontSize: 20,
          },
          scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
        }
    });

  </script>
  </div>
</div> 
   <?php       
          }
 ?>
</div>
<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show"; 
        x.previousElementSibling.className += " w3-red";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-red", "");
    }
}

openMail("Borge")
function openMail(personName) {
    var i;
    var x = document.getElementsByClassName("person");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    x = document.getElementsByClassName("test");
      for (i = 0; i < x.length; i++) {
       x[i].className = x[i].className.replace(" w3-light-grey", "");
    }
    document.getElementById(personName).style.display = "block";
    event.currentTarget.className += " w3-light-grey";
}
</script>

<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>

<script>
$(document).ready(function(){
$('#cpf').mask("999.999.999-99");
})
</script>
</div>
</body>
</html> 
