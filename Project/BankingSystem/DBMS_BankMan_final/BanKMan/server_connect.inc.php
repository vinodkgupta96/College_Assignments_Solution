<?php
if(!mysql_connect('localhost','v_kumar','b13141') || !mysql_select_db('B13141'))
{	$error='Cant connect'; 
	die($error);
}
?>
