<?php             
              if(isset($enviar))
              {
                $enviar = $_POST["enviar"];
                $senha = $_POST["senha"];
                $confirmasenha = $_POST["confirmasenha"];
                if ($senha == $confirmasenha) {
                  
                include_once 'cadastro.class.php';
                $cadastro = new Cadastro(); 
                echo $nome;
                echo $email;
                echo $telefone;
                echo $celular;
                echo $cpf;
                echo $login;
              }
              else{
                echo"<script language='javascript' type='text/javascript'>alert('As senhas inseridas não conferem') ;</script>";
              }
            }
                                   
 ?>