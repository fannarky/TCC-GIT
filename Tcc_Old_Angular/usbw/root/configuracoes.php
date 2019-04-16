<!DOCTYPE html>
<html>
	<title>Configrações Gerais</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/w3.css">
	<link rel="stylesheet" type="text/css" href="CSS/styles.css">
	<?php
	session_start();
	if ($_SESSION["logado"] != "TRUE") 
		  {
			echo"<script language='javascript' type='text/javascript'>alert('Você não está logado, Por Favor Entre na sua Conta') ; window.location.href='index.php';</script>";
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
<body class="w3-light-grey">
	<div class="w3-top">
		<div class="w3-bar w3-theme-d1 w3-large" id="myNavbar">
			<a href="index.php" class="w3-bar-item w3-button w3-wide">ONIOCARE</a>
			<div class="w3-dropdown-hover w3-hide-small">
		      <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell" style="font-size: 1.5em;"></i><span class="w3-badge w3-right w3-small w3-red">1</span></button>     
		      <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
		        <a href="#" class="w3-bar-item w3-button">One new friend request</a>
		        <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
		        <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
		      </div>
		    </div>
				<div class="w3-right ">
				 <a  href="homepage.php" class="w3-left w3-bar-item w3-button"><?php echo $_SESSION["user"]?><i style="padding-left: 10px" class="fa fa-user"></i></a>
					<a href="configuracoes.php" class="w3-bar-item w3-button" title="Configurações"><i class="fa fa-cog"></i></a>
					<a href="#sair" class="w3-bar-item w3-button"><form method="post" action="validalogin.php"><button name="sair" class="button-menu" class="w3-theme-d1"><i class="fa fa-sign-out"></i></button></form></a>
				</div>
		</div>
	</div>

	
	<div class="w3-row w3-container" style="max-width:100%;margin-top:4%">    
		<!-- BARRA LATERAL -->
		<div class="w3-col l2 w3-center w3-card-2 w3-hide-small" style="padding: 16px; border-right:1px solid black;background-color: #f6f7f9; max-width:auto">
			<div class="hover-white" style="padding-top:7%" onclick="exibeConfGerais()">
				<i class="fa fa-gear fa-4x" aria-hidden="true"></i>
				<h5>Configrações Gerais </h5>
			</div>
			<div class="hover-white" style="padding-top: 7%;" >
				<i class="fa fa-search fa-4x" aria-hidden="true" onclick="exibeInfoAdicionais()"></i>
				<h5>Informaçoes Adicionais</h5>
			 </div>
			<div class="hover-white" style="padding-top: 7%;" >
				<i class="fa fa-window-close fa-4x" aria-hidden="true" onclick="document.getElementById('id03').style.display='block'" style="color: red"></i>
				<h5>Deletar conta</h5>
			 </div>
		<!-- FIM DA BARRA LATERAL -->
		</div>
		
		<!-- MENU DE CONFIGURAÇÕES GERAIS -->
		<div class="w3-col l10 w3-center" id="confgerais" style="display:block">
		  <?php
		      include 'conexaobanco.php';
		      $dados = mysql_query("SELECT nm_usuario, nm_login, nm_senha, cd_celular, nm_profissao, vl_salario from tb_usuario where cd_usuario = ".$_SESSION["cd_usuario"]."");
		      while ($rows = mysql_fetch_assoc($dados)) {
		        $name = $rows["nm_usuario"];
		        $login = $rows["nm_login"];
		        $senha = $rows["nm_senha"];
		        $celular = $rows["cd_celular"];
		        $profissao = $rows["nm_profissao"];
		        $salario = $rows["vl_salario"];
		      }
		  ?>
			<div>
				<h1 style="margin-top:3%; font-size: 32px; font-family:Raleway">CONFIGURAÇÕES GERAIS</h1>
			</div>
			<!-- DIV EXIBINDO O NOME DO USUÁRIO -->
			<div class="w3-row hover-edit container" style="text-align:left; cursor:pointer;" onclick="editaNome()" id="nome">
				<div class="w3-third w3-col s4 w3-container" >
					<h2 style="font-size: 18px">Nome de Usuário</h2> 
				  </div>
				 <div class="w3-third w3-col s4 w3-container">
					<h2 style="font-size: 18px"><?php echo $name;?></h2> 
				 </div>
				<div class="w3-third w3-col s4 w3-container">
					<a href="#"><h2 style="font-size: 18px">Editar</h2></a>
				</div>
			</div>

			<!--ALTERANDO NOME DE USUÁRIO -->
			 <div class="w3-row" style="background-color: #BCC3D1; height: 10%; border-bottom:2px solid #99A5AD; border-top:2px solid #99A5AD " id="editaNome">
		        <div class="w3-col l12">
		           <h1 style="margin-top: 2%; font-size: 25px">Editar Nome de Usuário</h1>
		         <center>
		         <table cellspacing="15">
		          <tr>
			           <td>
			            	<h5><label>Nome: </label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="text" name="nomepaciente" id="oldname" disabled="true" value="<?php echo $name;?>">
			           </td>
		          </tr>
		          <form class="w3-container" id="frmeditname" method="post">
		          <tr>
			           <td>
			            	<h5><label>Novo Nome: </label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="text" name="nomenovo" id="newname" required="true">
			           </td>
		          </tr>
		          <td>
		              <button class="w3-btn w3-large" onclick="VoltaNome()" type="button" style="background-color:#d67b6a;">Voltar</button>
		          </td>
		          <td>
		              <button class="w3-btn w3-large" type="submit" style=" background-color:#5fba7d;" id="buttonnome" name="enviarnome">Enviar</button>
		          </td>
		          </form>
		         </table> 
		         </center>
		        </div>
		    </div>

		    <!-- DIV EXIBINDO O LOGIN -->
		    <div class="w3-row hover-edit container" style="text-align:left; cursor:pointer;" onclick="editaLogin()" id="login">
				<div class="w3-third w3-col s4 w3-container" >
					<h2 style="font-size: 18px">Login</h2> 
				  </div>
				 <div class="w3-third w3-col s4 w3-container">
					<h2 style="font-size: 18px"><?php echo $login;?></h2> 
				 </div>
				<div class="w3-third w3-col s4 w3-container">
					<a href="#"><h2 style="font-size: 18px">Editar</h2></a>
				</div>
			</div>
			<!-- ALTERANDO LOGIN DO USUÁRIO -->
			 <div class="w3-row" style="background-color: #BCC3D1; height: 10%; border-bottom:2px solid #99A5AD; border-top:2px solid #99A5AD;"  id="editaLogin">
		        <div class="w3-col l12">
		           <h1 style="margin-top: 2%; font-size: 25px">Editar Login</h1>
		         <center>
		         <table cellspacing="15">
		          <tr>
			           <td>
			            	<h5><label>Login:</label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="text" name="loginpaciente" disabled="true" value="<?php echo $login;?>">
			           </td>
		          </tr>
		          <form class="w3-container" id="frmeditlogin" method="post">
		          <tr>
			           <td>
			            	<h5><label>Novo Login: </label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" id="loginnovo" type="text" name="loginnovo" required="true">
			           </td>
		          </tr>
		          <td>
		              <button class="w3-btn w3-large" type="button" style="background-color:#d67b6a;" onclick="VoltaLogin();">Voltar</button>
		          </td>
		          <td>
		              <button class="w3-btn w3-large" type="submit" id="envialogin" style=" background-color:#5fba7d;" name="enviarlogin">Enviar</button>
		          </td>
		          </form>
		          </table> 
		         </center>
		        </div>
		     </div>
		     <!-- DIV EXIBINDO A SENHA-->
		     <?php
		     $codesenha ="";
		     $char = strlen($senha);
		     for ($i=0; $i <$char ; $i++) { 
		     	$codesenha.="*";
		     }
		      ?>
		     <div class="w3-row hover-edit container" style="text-align:left; cursor:pointer;" onclick="editaSenha()" id="senha">
				<div class="w3-third w3-col s4 w3-container" >
					<h2 style="font-size: 18px">Senha</h2> 
				  </div>
				 <div class="w3-third w3-col s4 w3-container">
					<h2 style="font-size: 18px" ><?php echo $codesenha;?></h2> 
				 </div>
				<div class="w3-third w3-col s4 w3-container">
					<a href="#"><h2 style="font-size: 18px">Editar</h2></a>
				</div>
			</div>

			<!-- ALTERANDO SENHA DO USUÁRIO-->
			<div class="w3-row" style="background-color: #BCC3D1; height: 10%; border-bottom:2px solid #99A5AD; border-top:2px solid #99A5AD;"  id="editaSenha">
		        <div class="w3-col l12">
		           <h1 style="margin-top: 2%; font-size: 25px">Trocar senha</h1>
		         <center>
		         <table cellspacing="15">
		          <form class="w3-container " id="frmeditsenha" method="post">
		          <tr>
			           <td>
			            	<h5><label>Digite sua senha atual:</label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="password" name="password">
			           </td>
		          </tr>
		          <tr>
			           <td>
			            	<h5><label>Nova Senha: </label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="password" id="senhanova" name="senhanova" required="true">
			           </td>
		          </tr>
		          <tr>
			            <td>
			            	<h5><label>Confirma Nova Senha: </label></h5>
			             </td>
			            <td>
			            	<input class="w3-input" type="password" id="confirmasenha" name="senhanova" required="true">
			            </td>
		          </tr>
		          <td>
		              <button class="w3-btn w3-large" onclick="VoltaSenha()" type="button" style="background-color:#d67b6a;">Voltar</button>
		          </td>
		           <td>
		              <button class="w3-btn w3-large" type="submit" id="enviasenha" style="background-color:#5fba7d;" name="enviarsenha">Enviar</button>
		           </td>
		          </form>
		          </table> 
		         </center>
		        </div>
		     </div>			 

			<!-- DIV EXIBINDO O CELULAR -->
			<div class="w3-row hover-edit container" style="text-align: left;cursor: pointer;" onclick="editaCel()" id="cel">
			  <div class="w3-third w3-col s4 w3-container">
				<h2 style="font-size: 18px">Celular</h2> 
			  </div>
			  <div class="w3-third w3-col s4 w3-container">
				<h2 style="font-size: 18px;" id="celular"><?php echo $celular;?></h2> 
			  </div>
			  <div class="w3-third w3-col s4 w3-container">
				<a href="#"><h2 style="font-size: 18px">Editar</h2></a>
			  </div>
			</div>
			
			<!-- ALTERANDO CELULAR DO USUÁRIO-->
			<div class="w3-row" style="background-color: #BCC3D1; height:10%; border-bottom:2px solid #99A5AD; border-top:2px solid #99A5AD;"  id="editaCel">
				<div class="w3-col l12">
					<h1 style="margin-top: 2%; font-size: 25px">Editar Celular</h1>
					<center>
					<table cellspacing="15">
					<tr>
						<td>
							<h5><label>Celular</label></h5>
						</td>
						<td>
							<input class="w3-input" type="text" id="celular" disabled="true" value="<?php echo $celular;?>">
						
						</td>			   
					</tr>
					<form class="w3-container " id="frmeditcel" method="post">
					<tr>
						<td>
							<h5><label>Novo Celular: </label></h5>
						</td>
						<td>
							<input class="w3-input" type="text" id="novocelular" name="celularnovo" required="true">
						</td>
					</tr>
					<td>
						<button class="w3-btn w3-large" onclick="VoltaCel()" type="button" style="background-color:#d67b6a;">Voltar</button>
					</td>
					<td>
						<button class="w3-btn w3-large" type="submit" style=" background-color:#5fba7d;" id="enviacel" name="enviarcelular">Enviar</button>
					</td>
					</form>
					</table> 
					</center>
				</div>
			</div>

		<!-- FIM DO MENU DE CONFIGURAÇÕES -->
		</div>

		<!-- MENU DE INFORMAÇÕES ADICIONAIS -->
		<div class="w3-col l10 w3-center" id="infoadicionais" style="display: none">
			<div>
				<h1 style="margin-top:3%; font-size: 32px; font-family:Raleway">INFORMAÇÕES ADICIONAIS</h1>
			</div>
			<div class="w3-row" style="border-bottom:2px solid #99A5AD;">
				<div class="w3-col l3 container">
					<div id="content">
				            <ul >
				              <li style=" list-style-type: none;display: inline-block;">
				                 <form method="post" action="imagem.php" enctype="multipart/form-data">
				                <a><img src="Imagens/Cadastro/perfil.png" id="im" class="w3-circle" style="height:140px;width:140px"  title="<input type='file' name='imagem' style='display:none'><p style='text-align:center'>Alterar</p>">
				                </a> 
				              </form>
				              </li>
				            </ul>       
			           </div> 
				</div>
				<div class="w3-col l9">
					<div>
						<button type="button" class="w3-btn" style="float:left; margin-top: 4%; background-color: grey; color:black"> Alterar Foto <i class=" fa fa-arrow-down"></i></button><br><br><br>
						<p style="clear:both; text-align:left"> Está será sua foto que será exibido para outros usuários e médicos</p>
					</div>
				</div>
			</div>

			<!-- DIV EXIBINDO A PROFISSÃO -->
		    <div class="w3-row hover-edit container" style="text-align:left; cursor:pointer;" onclick="editaProfissao()" id="profissao">
				<div class="w3-third w3-col s4 w3-container" >
					<h2 style="font-size: 18px">Profissão</h2> 
				  </div>
				 <div class="w3-third w3-col s4 w3-container">
					<h2 style="font-size: 18px"><?php echo $profissao;?></h2> 
				 </div>
				<div class="w3-third w3-col s4 w3-container">
					<a href="#"><h2 style="font-size: 18px">Editar</h2></a>
				</div>
			</div>

			<!-- ALTERANDO PROFISSÃO -->
			 <div class="w3-row" style="background-color: #BCC3D1; height: 10%; border-bottom:2px solid #99A5AD; border-top:2px solid #99A5AD;" id="editaProfissao">
		        <div class="w3-col l12">
		           <h1 style="margin-top: 2%; font-size: 25px">Editar Profissão</h1>
		         <center>
		         <table cellspacing="15">
		          <tr>
			           <td>
			            	<h5><label>Profissao:</label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="text" name="profissaoPaciente" disabled="true" value="<?php echo $profissao;?>">
			           </td>
		          </tr>
		          <form class="w3-container" id="frmeditprofissao" method="post">
		          <tr>
			           <td>
			            	<h5><label>Nova Profissao: </label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" id="profissaoNova" type="text" name="profissaoNova" required="true">
			           </td>
		          </tr>
		          <td>
		              <button class="w3-btn w3-large" type="button" style="background-color:#d67b6a;" onclick="voltaProfissao();">Voltar</button>
		          </td>
		          <td>
		              <button class="w3-btn w3-large" type="submit" id="enviaProfissao" style=" background-color:#5fba7d;" name="enviarprofissao">Enviar</button>
		          </td>
		          </form>
		          </table> 
		         </center>
		        </div>
		     </div>

		     <!-- DIV EXIBINDO O SALÁRIO -->
			<div class="w3-row hover-edit container" style="text-align:left; cursor:pointer;" onclick="editaSalario()" id="salario">
				<div class="w3-third w3-col s4 w3-container" >
					<h2 style="font-size: 18px">Salário</h2> 
				  </div>
				 <div class="w3-third w3-col s4 w3-container">
					<h2 style="font-size: 18px"><?php echo $salario;?></h2> 
				 </div>
				<div class="w3-third w3-col s4 w3-container">
					<a href="#"><h2 style="font-size: 18px">Editar</h2></a>
				</div>
			</div>


			<!-- ALTERANDO SALÁRIO -->
			 <div class="w3-row" style="background-color: #BCC3D1; height: 10%; border-bottom:2px solid #99A5AD; border-top:2px solid #99A5AD;" id="editaSalario">
		        <div class="w3-col l12">
		           <h1 style="margin-top: 2%; font-size: 25px">Editar Salário</h1>
		         <center>
		         <table cellspacing="15">
		          <tr>
			           <td>
			            	<h5><label>Salário:</label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" type="text" name="salarioPaciente" disabled="true" value="<?php echo $salario;?>">
			           </td>
		          </tr>
		          <form class="w3-container" id="frmeditsalario" method="post">
		          <tr>
			           <td>
			            	<h5><label>Novo Salário: </label></h5>
			           </td>
			           <td>
			            	<input class="w3-input" id="salarioNovo" type="text" name="salarioNovo" required="true">
			           </td>
		          </tr>
		          <td>
		              <button class="w3-btn w3-large" type="button" style="background-color:#d67b6a;" onclick="voltaSalario();">Voltar</button>
		          </td>
		          <td>
		              <button class="w3-btn w3-large" type="submit" id="enviaSalario" style=" background-color:#5fba7d;" name="enviarSalario">Enviar</button>
		          </td>
		          </form>
		          </table> 
		         </center>
		        </div>
		     </div>
			<!-- FIM DO MENU DE INFORMAÇÕES ADICIONAIS -->
		</div>

	</div>
	
	<div id="id03" class="w3-modal">
				<div class="w3-modal-content" style="max-width:320px;">
				  <div class="w3-container"> 
					<span onclick="document.getElementById('id03').style.display='none'" 
					class="w3-closebtn w3-container w3-padding-8 w3-hover-red w3-display-topright" title="Fechar">&times;</span>

					<center><i class="fa fa-exclamation-circle fa-4x" style="color:#FFF543; padding-top:5%" aria-hidden="true"></i>
					<h3 style="">Tem certeza que deseja excluir sua conta?</center>
				  </div>
				  <div class="w3-container">
					<form id="frmdel" method="POST">
					<tr>
					   <td>
						<p style="text-align:center; font-size: 20px"><label>Digite sua senha</label></p>
					   </td>
					   <td>
						<center><input class="w3-input" style="width:90%" id="senhadel" type="password" name="senhadeletar"></center>
					   </td>
					</tr><br>
				  <center><button class="w3-btn w3-red" type="submit" id="deleta" style="width:90%; margin: 4%" onclick="document.getElementById('id03').style.display='block'" name="deletar">DELETAR USUÁRIO</button></center></form>
				  </div>
				</div>
	</div>


<footer class="w3-center w3-padding-16 w3-theme-d1">
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-square w3-hover-text-indigo"></i>
    <i class="fa fa-instagram w3-hover-text-purple"></i>
    <i class="fa fa-twitter-square w3-hover-text-light-blue"></i>
  </div>
  <p><a href="" style="text-decoration: none">	Desenvolvido por Horizon</a></p>
</footer>
	<script src="JQuery/jquery-1.11.1.min.js"></script>
	<script src="Jquery/jquery.mask.min.js"></script>
	<script src="Scripts/config.js"></script>
	<script src="Scripts/configuracoes.js"></script>
	<script src="JQuery/jquery.sliphover.min.js"></script>
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
