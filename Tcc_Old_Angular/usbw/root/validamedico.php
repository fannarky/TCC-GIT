<?php 
  session_start();
  include 'conexaobanco.php';
  
  $login = $_POST["crm"];  
  $senha = $_POST["senhamedico"];

  if (isset($_POST["sair"])){$sair = $_POST["sair"];}

  $verifica = mysql_query("SELECT * FROM tb_medico");

  while($row = mysql_fetch_assoc($verifica))
   {
     if ($row["cd_crm"] == $login && $row["nm_senha"] == $senha)
     {
      $_SESSION["cd_medico"] = $row["cd_medico"];
      $_SESSION["logado"] = TRUE;
      $_SESSION["user"] = $row["nm_medico"];
       echo"<script language='javascript' type='text/javascript'>alert('Bem Vindo') ; window.location.href='homepagemedico.php';</script>"; 
    }
      
    }
    if (!$_SESSION["logado"]) 
    {
      echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos) ; window.location.href='index.php';</script>"; 

    }
  
   else if (isset($sair))
      {
        session_destroy();
        header("Location:index.php");
      }
    
  ?>        
    