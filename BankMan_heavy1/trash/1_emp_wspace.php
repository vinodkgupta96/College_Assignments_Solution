	<?php //require_once 'get_logged.inc.php'; ?>	
		<html>
		<head>
		<style>
			header {
			    background-color:#0B4C5F;
			    color:white;
			    text-align:center;
			    padding:5px;	 
				}
			nav {
			    line-height:30px;
			    background-color:#eeeeee;
			    height:50px;
			    width: 100%;
			    float:left;
			    padding:0px;	      
				}
			
			section {
			    width:100%;
			    float:left;
			    padding:10px;	 	 
				}
			footer {
    			    background-color:#610B0B;
			    color:white;
			    clear:both;
			    text-align:center;
			    padding:0px;	 	 
				}
		</style>

		<title>Moneta Bank</title>
		</head>
		
		<body>
	
		<header>
		<h1>MONETA BANK</h1>
		</header>

		<nav>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="new_customer.php" target="iframe_a" style="text-decoration:none"><font color=black>New Customer</font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<a href="transaction.php" target="iframe_a" style="text-decoration:none"><font color=black>Transaction</font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		
		<?php // $emp_id=$_SESSION['emp_id']; echo 'Welcome, '.$emp_id; ?>
		<a href="logout.php" style="text-decoration:none"><font color=black>Logout</font></a>
		</nav>
		
		<section>
		
		<iframe width="1270px" height="450px" src="oneline.php" frameborder="0" name="iframe_a"></iframe>
			
		</section>

		<footer>
		<h5> Powered by BankMan Systems</h5>
		</footer>
			
		</body>
		</html>
	
