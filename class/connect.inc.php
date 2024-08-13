<?php
	define("DB_HOSTNAME","localhost");
 	$host = "localhost";
	if($_SERVER["HTTP_HOST"] == "localhost" ){
	define("DB_DATABASE","talubpra");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");
	}else{
	define("DB_DATABASE","tungtaka_tlp");
	define("DB_USERNAME","tungtaka_tlp");
	define("DB_PASSWORD","aod123456");	
	}
	$mysqli=new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD);
	$mysqli->select_db(DB_DATABASE);
	$mysqli->query("SET NAMES utf8;");
	mysql_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD) or die('Can not connect db<br>'.mysql_error());
	mysql_select_db(DB_DATABASE) or die('Can not select db');
	mysql_query("SET NAMES UTF8");
