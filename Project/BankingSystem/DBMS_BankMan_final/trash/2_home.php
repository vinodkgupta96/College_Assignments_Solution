<!DOCTYPE html>

<?php
require_once 'server_connect.inc.php';
session_start();
?>

<head>
  <meta charset="utf-8">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  
  <title>Moneta Bank: We try not to run away!!</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">

	<style>aside{
			    float: left;
		            width: 45%;
		   	    min-height: 480px;	
	 		    background: url(../images/aside-bg.png) center top no-repeat;
		  	    margin: 0 0 20px 0;
				}
			section {
			    width:45%;
			    float:left;
			    padding:10px;	 	 
				} </style>

</head>

<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation" align="center">
      <div class="navbar-header">
        <div class="logo"><h1>Moneta Bank</h1></div>
      </div>   
    </div>

   <section>
    <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" action="home.php" method="POST">
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Employee ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Emp_id" name="Emp_id" placeholder="Username">
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
            </div>
          </div>
        </div>
      
<!--	  <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
          </div>
        </div>
-->
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Log in" class="btn btn-default">
            </div>
          </div>
        </div>
      </form>
    </div>

<?php
echo $_POST['Password'];
if(isset($_POST['Emp_id']) && !empty($_POST['Emp_id']) && isset($_POST['Password']) && !empty($_POST['Password'])){
			$Emp_id=$_POST['Emp_id'];
			$Password=$_POST['Password'];
			$Password_new=MD5($Password);

			$query1="SELECT Emp_id FROM Employee WHERE Emp_id='$Emp_id' AND Password='$Password_new'";

			if($query1_data=mysql_query($query1)) {

				if(mysql_num_rows($query1_data)==1){
						$emp_id=mysql_result($query1_data,0,'Emp_id');
						//echo 'Welcome,'.$emp_id;
						$_SESSION['emp_id']=$emp_id;
						header('Location:index.php');

						}
						
				else if(mysql_num_rows($query1_data)==0){ 
						echo 'Invalid username and/or password';
						}
					}
	
				}

			
?>
</section>


  <aside>

	
    <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" action="home.php" method="POST">
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">ATM Number</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  id="ATM_NO" name="ATM_NO" placeholder="ATM Number">
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">PIN</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="PIN" name="PIN" placeholder="PIN">
            </div>
          </div>
        </div>
      
<!--	  <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
          </div>
        </div>
-->
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Sign in" class="btn btn-default">
            </div>
          </div>
        </div>
      </form>
    </div>

<?php
if(isset($_POST['ATM_NO']) && !empty($_POST['ATM_NO']) && isset($_POST['PIN']) && !empty($_POST['PIN']) ){

		$atm_no=$_POST['ATM_NO'];
		$pin=$_POST['PIN'];
		$query1="SELECT Acc_no FROM CUSTOMERS WHERE ATM_NO='$atm_no' AND PIN='$pin'";
		
		if($query1_data=mysql_query($query1)){

			if(mysql_num_rows($query1_data)==1){
					$_SESSION['atm']=$atm_no;
					$_SESSION['pin']=$pin;
					$acc_no=mysql_result($query1_data,0,'Acc_no');
					$_SESSION['acc_no']=$acc_no;
					echo $_SESSION['acc_no'];					
					header('Location:index.php');
						}
			
			else if(mysql_num_rows($query1_data)==0){
					echo 'Invalid ATM NUMBER and/or PIN';
						}
				}

			}
	
	?>
 </aside>



  </div>



</body>
</html>
