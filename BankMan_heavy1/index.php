<?php

require 'server_connect.inc.php';
require 'get_logged.inc.php';

	if(loginemp()){
		require 'emp_wspace.php';
		//echo '<a href="logout.php"><h1>logout</h1></a>';
			}

	else if(loginatm()){
		require 'account_summary.php';
		//require 'atm_home.php';
		//echo '<h1> BEFORE LEAVING PRESS EXIT:</h1><a href="logout.php"><h1>EXIT</h1></a>';
			}
	else{
		require 'home.php';
			}

?>

