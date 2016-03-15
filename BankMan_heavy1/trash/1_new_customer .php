<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
?>

<!DOCTYPE html>	
<html>


<head>
<title>NEW CUSTOMER</title>
</head>

<body>
<br><br>
<div align="left">
<div align="center">
	<form action="new_customer.php" method="POST" onsubmit="return validateForm()">
			 First name*:&nbsp;&nbsp;<input type="text" value="" name="First_name"><br><br>
			 Last name*:&nbsp;&nbsp;&nbsp;<input type="text" value="" name="Last_name"><br><br>
			 Address*:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" name="Address"><br><br>
			
			 Date of Birth:&nbsp;&nbsp; <select name="month"><option>MONTH</option>
			 	 <option value="1">January</option>
	 			 <option value="2">February</option>
				 <option value="3">March</option>
				 <option value="4">April</option>
				 <option value="5">May</option>
				 <option value="6">June</option>
				 <option value="7">July</option>
				 <option value="8">August</option>
				 <option value="9">September</option>
				 <option value="10">October</option>
				 <option value="11">November</option>
				 <option value="12">December</option>
 					</select>
 					<select name="day"><option>DATE</option>
 				 <option value="1">1</option>
				 <option value="2">2</option>
				 <option value="3">3</option>
				 <option value="4">4</option>
				 <option value="5">5</option>
				 <option value="6">6</option>
				 <option value="7">7</option>
				 <option value="8">8</option>
				 <option value="9">9</option>
				 <option value="10">10</option>
				 <option value="11">11</option>
				 <option value="12">12</option>
				 <option value="13">13</option>
				 <option value="14">14</option>
				 <option value="15">15</option>
				 <option value="16">16</option>
				 <option value="17">17</option>
				 <option value="18">18</option>
				 <option value="19">19</option>
				 <option value="20">20</option>
				 <option value="21">21</option>
				 <option value="22">22</option>
				 <option value="23">23</option>
				 <option value="24">24</option>
				 <option value="25">25</option>
				 <option value="26">26</option>
				 <option value="27">27</option>
				 <option value="28">28</option>
				 <option value="29">29</option>
				 <option value="30">30</option>
				 <option value="31">31</option>
 					</select>
					<select name="year">
				 <option>YEAR</option>
				 <option value="2000">2000</option><option value="2001">2001</option>
				 <option value="2002">2002</option>
				 <option value="2003">2003</option>
				 <option value="2004">2004</option>
				 <option value="2005">2005</option>
				 <option value="2006">2006</option>
				 <option value="2007">2007</option>
				 <option value="2008">2008</option>
				 <option value="2009">2009</option>
				 <option value="2010">2010</option>
				 <option value="2011">2011</option>
				 <option value="2012">2012</option>
				 <option value="2013">2013</option>
					</select><br><br>
 				Contact number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" value="" name="Contact_no" max="9999999999" min="7000000000"><br><br>
				Enter initial amount:&nbsp;&nbsp;<input type="number" value="" name="Amount"><br><br>
 <br>
				<input type="submit" value="Submit">
				</form>
</div>
</div>
<script type="text/javascript">
	function validateForm() {
		var first_name = document.forms[0]["First_name"].value;
		var last_name = document.forms[0]["Last_name"].value;
		var address = document.forms[0]["Address"].value;
    
        if (first_name == null || first_name == "" || last_name == null || last_name == "" || address == null || address == "") {
    	        alert("Feilds with * are compulsory");
                return false;
        
    			} 
		}
</script>

</body>
</html>

<?php

if(isset($_POST['First_name']) && !empty($_POST['First_name']) && isset($_POST['Last_name']) && !empty($_POST['Last_name']) && isset($_POST['day']) && !empty($_POST['day']) && isset($_POST['Address']) && !empty($_POST['Address']) && isset($_POST['month']) && !empty($_POST['month']) && isset($_POST['Amount']) && !empty($_POST['Amount']) && isset($_POST['Contact_no']) && !empty($_POST['Contact_no'])){

/*variable from form*/

$first_name=$_POST['First_name'];
$last_name=$_POST['Last_name'];
$address=$_POST['Address'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$amount=$_POST['Amount'];
$contact_no=$_POST['Contact_no'];
$time=time();
$created_on=date("Y/m/d",$time);
$pin=rand(1000,9999);
$i=0;
$Emp_id=$_SESSION['emp_id'];


/*generate random numbers*/
while(1){
	$atm_no=rand(4591000000000000,4591999999999999);
	$acc_no=rand(1230000001,1239999991);


/*concatenating stings*/
	$dob=$year."/".$month."/".$day;

	$query2="SELECT Acc_no,ATM_NO FROM CUSTOMERS WHERE Acc_no='$acc_no' OR ATM_NO='$atm_no'";
	$query2_data=mysql_query($query2);
	//echo $query2_data;

	if(mysql_num_rows($query2_data)==0){
		$query1="INSERT INTO CUSTOMERS(Acc_no,First_name,Last_name,DOB,Contact_no,Address,Created_on,Amount,ATM_NO,PIN,Emp_id) VALUES('$acc_no','$first_name','$last_name','$dob','$contact_no','$address','$created_on','$amount','$atm_no','$pin','$Emp_id')";

		if($query1_data=mysql_query($query1)){
			$query3="SELECT * FROM CUSTOMERS WHERE Acc_no='$acc_no'";
			$query3_data=mysql_query($query3);
			$query3_row=mysql_fetch_assoc($query3_data);
			$first_name=$query3_row['First_name'];
			echo '<h3>Welcome to Moneta Family</h3>'.'<br>';
			echo 'Name :'.$first_name.' '.$last_name.'<br>';
			echo 'Account number:'.$acc_no.'<br>';
			echo 'ATM No:'.$atm_no.'<br>';
			echo 'PIN :'.$pin.'<br>';
			break;
				}
		//else { echo 'not done';
		//		}
			}

	$i=$i+1;
	if($i==1000000){
		echo 'no unique account number exists';
		break;
		   }
	}

	}


//<a href="index.php"><h1>home</h1></a>
//<a href="logout.php"><h1>logout</h1></a>

?>

