<?php
	$conecta = mysql_connect("localhost", "admin", "123") or print (mysql_error()); 
	mysql_select_db("controle_ru", $conecta) or print(mysql_error()); 
?>
