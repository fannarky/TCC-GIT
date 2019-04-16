<?php
session_start();
include_once 'Classes/alteracao.class.php';
$alteracao = new Alteracao();


if (isset($_POST["botao"])) {
    $nomenovo = $_POST["nomenovo"];
    $alteracao ->alteraNome($nomenovo, $_SESSION["cd_usuario"]);
    $_SESSION["nome"] = $nomenovo;
}


if (isset($_POST["botaologin"])) {
    $loginnovo = $_POST["loginnovo"];
    $alteracao ->alteraLogin($loginnovo, $_SESSION["cd_usuario"]);
    $_SESSION["user"] = $loginnovo;
}

if (isset($_POST["botaosenha"])) {
    $senhanova = $_POST["senhanova"];
    $alteracao->alteraSenha($senhanova, $_SESSION["cd_usuario"]);
}

if (isset($_POST["enviartelefone"])) {
    $telefonenovo = $_POST["telefonenovo"];
    $alteracao->alteraTelefone($telefonenovo, $_SESSION["cd_usuario"]);
    header("Location: configuracoes.php");
 }

if (isset($_POST["botaocel"])) {
    $celularnovo = $_POST["celnovo"];
    $alteracao->alteraCelular($_SESSION["cd_usuario"], $celularnovo);
}

if (isset($_POST["botaodel"])) 
{
    if ($_POST["senhadel"] == $_SESSION["senha"])
        {
            {
                $alteracao->Deletar($_SESSION["cd_usuario"]);
                session_destroy();
            }
        }
    else
        {
            echo"<script language='javascript' type='text/javascript'>alert('Senha errada'); window.location.href='configuracoes.php';</script>";
        }
}

    if (isset($_POST["profissaoNova"])) {
        $novaprofissao = $_POST["profissaoNova"];
        $alteracao->alteraProfissao($_SESSION["cd_usuario"], $novaprofissao);
    }

    if (isset($_POST["salarioNovo"])) {
        $salarionovo = $_POST["salarioNovo"];
        $alteracao->alteraSalario($_SESSION["cd_usuario"], $salarionovo);
    }

?>