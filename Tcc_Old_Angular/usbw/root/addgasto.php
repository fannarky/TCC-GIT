<!DOCTYPE html>
<html>
<title>Adicionar um gasto diário</title>
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
<body class="w3-light-grey">

<div class="w3-top">
<div class="w3-bar w3-theme-d1 w3-large" id="myNavbar">
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
    <div class="w3-right">
     <a  href="homepage.php" class="w3-left w3-bar-item w3-button"><?php echo $_SESSION["user"]?><i style="padding-left: 10px" class="fa fa-user"></i></a>
        <a href="configuracoes.php" class="w3-bar-item w3-button" title="Configurações"><i style="padding-left: 10px" class="fa fa-cog"></i></a>
        <a href="#sair" class="w3-bar-item w3-button"><form method="post" action="validalogin.php"><button name="sair" class="button-menu" class="w3-theme-d1"><i class="fa fa-sign-out"></i></button></form></a>

    </div>
</div>
</div>
    <div> 
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars w3-padding-right w3-padding-left"></i>
    </a>
    </div>

<nav class="w3-sidenav w3-black w3-card-2 w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="Sidenav">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-large w3-padding-16">Close ×</a>
  <a href="#home" onclick="w3_close()">INÍCIO</a>
  <a href="#team" onclick="w3_close()">EQUIPE</a>
  <a href="#login" onclick="w3_close()">ACESSAR CONTA</a>
</nav>


    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars w3-padding-right w3-padding-left"></i>
    </a>
<br>
<div class="w3-container w3-padding-larges">
<?php

	if (isset($_POST["bota"])) {
		$recebe = $_POST["bota"];
	}
	if (isset($_POST["criar"])) 
	{
		
	
	?>
	<br>	
         <div class="w3-modal-content w3-animate-left w3-card-4">
            <header class="w3-container w3-theme-d1">
              <h6 style="font-size: 25px;" >Adicionar um gasto diário:</h6>
              </header>
             <form method="post" id="formulario" action="infogastos.php" class="w3-center">
             <br>
			 Nome do Produto:
			 <input type="text" name="nm_produto">
			<br>
			Como você estava se sentindo?
			<select name="Feeling">
				<option value="Feliz">Feliz</option>
				<option value="Triste">Triste</option>
				<option value="Irritado">Irritado</option>
				<option value="Estressado">Estressado</option>
			</select>	
			<br>
			Preço do Produto:

				<input type="text" name="preco">
			<br>
			Tipo do produto: 
			<select name="tipoproduto">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<br>
			<br>
			
			<a href="homepage.php" class="w3-button w3-theme-d1 w3-center"> Cancelar </a>
			<button name="enviar" class="w3-button w3-theme-d1 w3-center"> Enviar</button>
			
			<?php
				}
			elseif (isset($recebe)) {
				include 'conexaobanco.php';
				$query = mysql_query("SELECT * FROM tb_gasto_diario where cd_usuario = ".$_SESSION['cd_usuario']." and cd_gasto_diario = ".$_POST["codcompra"]."   ");
				$return = mysql_fetch_assoc($query);
			?>
			</br>
			<div class="w3-modal-content w3-animate-left w3-card-4">
            <header class="w3-container w3-theme-d1">
              <h6 style="font-size: 25px;" >Visualizar gasto diário:</h6>
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
			<br>
			<br>

	<a href="homepage.php" class="w3-button w3-theme-d1 w3-center"> Voltar para a página inicial</a>
	<?php
		}
	?>
	
	</form>
	</div>
	</form>
	</div>
	</div>        
            </div>
          </div>
        </div>
      </div>
	
	</div>
</body>
</html>