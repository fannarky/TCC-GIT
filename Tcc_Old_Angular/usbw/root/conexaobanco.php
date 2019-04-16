<?php   //Conexao_Banco.php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$servername = 'localhost'; // servidor
	$username = 'root';        // usuario
	$password = 'usbw';        // senha
	$dbname = 'db_oniocare';   // banco de dados
	//--------------------------------------------------                
	$connect = mysql_connect($servername, $username, $password) or print (mysql_error());
	mysql_query('SET NAMES utf8');
	mysql_query( 'SET character_set_connection=utf8');
	mysql_query( 'SET character_set_client=utf8');
	mysql_query( 'SET character_set_results=utf8');
	//---------------------------------------------------
	mysql_select_db($dbname, $connect);
?>	