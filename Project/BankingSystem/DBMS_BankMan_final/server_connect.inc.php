<?php
if(!mysql_connect('localhost','v_kumar','vision@123') || !mysql_select_db('B13141'))
{	$error='connect'; 
	die($error);
}
?>
