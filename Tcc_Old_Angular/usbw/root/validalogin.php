<?php 
  session_start();
  include 'conexaobanco.php';
  
  $login = $_POST["login"];  
  $senha = $_POST["senha"];

  if (isset($_POST["sair"])){$sair = $_POST["sair"];}

  $verifica = mysql_query("SELECT * FROM tb_usuario");

  while($row = mysql_fetch_assoc($verifica))
   {
     if ($row["nm_login"] == $login && $row["nm_senha"] == $senha)
     {
      $_SESSION["cd_usuario"] = $row["cd_usuario"];
      $_SESSION["logado"] = TRUE;
      $_SESSION["user"] = $_POST["login"];
      $_SESSION["nome"] = $row["nm_usuario"];
      $_SESSION["email"] = $row["nm_email"];
      $_SESSION["senha"] = $row ["nm_senha"];
      $_SESSION["nasc"] = $row["dt_nascimento"];
      $_SESSION["salario"] = $row["vl_salario"];
      $_SESSION["profissao"] = $row["nm_profissao"];
      echo"<script language='javascript' type='text/javascript'>alert('Bem Vindo') ; window.location.href='homepage.php';</script>"; 
    }
      
    }
    if (!$_SESSION["logado"]) 
    {
      echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos') ; window.location.href='index.php';</script>"; 
    }
  
   else if (isset($sair))
      {
        session_destroy();
        header("Location:index.php");
      }
    
  ?>        
    