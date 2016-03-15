<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
if(@($_SESSION['emp_id']==null || $_SESSION['emp_id']=="") && (@($_SESSION['atm']==null ||$_SESSION['atm']=="") || @($_SESSION['pin']==null ||$_SESSION['pin']=="")))
{
die(header('Location:index.php'));
}
?>

<html>
<head><link rel="stylesheet" href="main.css"/></head>
<body>

	<form action="debit.php" method="POST" onsubmit="return validateForm()">
 		Amount*:&nbsp;&nbsp;<input type="number" value="" name="Amount"><br><br>
 			<input type="submit" value="Submit">
	</form>

<script type="text/javascript">
function validateForm() {
	var amount = document.forms[0]["Amount"].value;
    
	if ( amount == null || amount == "") {
	        alert("Fields with * are compulsory");
	        return false;
            } 
	}
</script>

</body>
</html>

<?php



if(isset($_POST['Amount']) && !empty($_POST['Amount'])){

	$time=time();
	$date=date("Y/m/d",$time);
	$amount=$_POST['Amount'];
	$_SESSION['amount']=$amount;

	if($amount>0){
		@$atm=$_SESSION['atm'];
		@$pass=$_SESSION['pass'];
		$acc_no=$_SESSION['acc_no'];
		@$Emp_id=$_SESSION['emp_id'];
		if(($Emp_id==null || $Emp_id=="")){
			$remark="ATM_DEBIT";
			$Emp_id="ATM_banker";
			}
		else{
			$remark="DEBIT";
			}
	//echo"$acc_no1";
	$query3="SELECT * FROM CUSTOMERS WHERE Acc_no='$acc_no'";

	if($query3_data=mysql_query($query3)){
		$query3_row=mysql_fetch_assoc($query3_data);
		$a=$query3_row['Amount'];
		//echo"$Emp_id";

		if($amount<=$a){
		if($amount<=100000){
		if(($atm!=null || $atm!="") && $amount>10000){
		die('<h4>you cannot withdraw amount more than 10000<br></h4><h2>transaction declined ');
		}
		if($amount>20000){
		die('you cannot withdraw amount more than 20000.......transaction declined ');
		}
$query4="SELECT Trans_count FROM Transaction_count";
$query4_data=mysql_query($query4);
$query4_row=mysql_fetch_assoc($query4_data);
		$Trans_id=$query4_row['Trans_count']+1;
$query1="INSERT INTO Transactions(Trans_id,Date,Acc_no,Remark,Amount,Emp_id) VALUES('$Trans_id','$date','$acc_no','$remark','$amount','$Emp_id')";
$query2="UPDATE CUSTOMERS SET Amount=Amount-'$amount' WHERE Acc_no='$acc_no'";
$query5="UPDATE Transaction_count SET Trans_count=Trans_count+1";

			if($query1_data=mysql_query($query1) && $query2_data=mysql_query($query2) ){
				if($query5_data=mysql_query($query5)){
				echo 'Successful';//.$query1_data;
				echo '<h4>Account Number :</h4>'.$acc_no.'<h4>Amount debited:</h4>'.$amount;
				}
			else { echo 'Couldnot perform!!<br> Internal error';
				}
				

  			  }
		
		
		}
		else{
		if($atm!=null || $atm!=""){
		die('<h4>you cannot withdraw amount more than 10000<br></h4><h2>transaction declined</h2> ');
		}
		if($amount>20000){
		die('<h4>you cannot withdraw amount more than 20000..</h4>.....use heavier version');
		}
		}
		
	  }
	  else{
			echo 'Your account does not have sufficient balance for this transaction'.'<br>';
			echo 'Your present account balance is'.' '.$a.'<br>';
			  }
	  }
	

//<a href="index.php"><h1>home</h1></a>
//<a href="logout.php"><h1>logout</h1></a>
}
else{
		die('amount entered is not valid');
	  }
	
}
?>


