<head><link rel="stylesheet" href="main.css"/></head>

<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
if(@($_SESSION['emp_id']==null || $_SESSION['emp_id']=="") && (@($_SESSION['atm']==null ||$_SESSION['atm']=="") || @($_SESSION['pin']==null ||$_SESSION['pin']=="")))
{
die(header('Location:index.php'));
}
?>

<?php

$acc_no=$_SESSION['acc_no'];
$query1="SELECT * FROM Transactions  WHERE Acc_no='$acc_no' ";
$query2="SELECT First_name,Amount FROM CUSTOMERS WHERE Acc_no='$acc_no'";
$query1_data=mysql_query($query1);
$query2_data=mysql_query($query2);

if( mysql_num_rows($query1_data)!=0){
	$query2_row=mysql_fetch_assoc($query2_data);
	$first_name =$query2_row['First_name'];
	$amount =$query2_row['Amount'];

	echo 'Name:           '.$first_name.'<br>';
	echo 'Account number: '.$acc_no.'<br>';
	echo 'Balance:        '.$amount.'<br><br><br>';
	echo '<table  border="1" cellpadding="4" cellspacing="0">'.
	        
	        '<col width="120">'.
	        '<col width="120">'.
	        '<col width="120">'.
	        '<col width="120">'.
	        '<col width="180">'.
	        '<col width="180">'.
	        
		'<tr>'.
			'<th>'.'Sl/no'.'</th>'.
		 	'<th>'.'Transaction id'.'</th>'.
		 	'<th>'.'DATE'.'</th>'.
 		 	'<th>'.'Amount'.'</th>'.
 			'<th>'.'Remark'.'</th>'.
 			'<th>'.'Employee id'.'</th>'.
 		'</tr>'.
 	      '</table>';
	$i=0;
	while($query1_row=mysql_fetch_assoc($query1_data)){
		$i+=1;
		$trans_id=$query1_row['Trans_id'];
		$remark=$query1_row['Remark'];
		$amount=$query1_row['Amount'];
		$date=$query1_row['Date'];
		$emp_id=$query1_row['Emp_id'];
	

   	        echo '<table  border="1" cellpadding="4" cellspacing="0">'.
        		
		        '<col width="120">'.
		        '<col width="120">'.
		        '<col width="120">'.
		        '<col width="120">'.
		        '<col width="180">'.
		        '<col width="180">'.
		     '<tr>'.
		     '<td>'.$i.'</td>'.
 		     '<td>'.$trans_id.'</td>'.
		     '<td>'.$date.'</td>'.
 	   	     '<td>'.$amount.'</td>'.
 	             '<td>'.$remark.'</td>'.
		     '<td>'.$emp_id.'</td>'.
 		     '</tr>'.
	  	     '</table>';
		
			}
		echo '<br>'.'Total number of transactions:   '.$i;
		}

        else {
		echo '<h4>No Transactions have been made</h4>';
		}

//<a href="index.php"><h1>home</h1></a>
//<a href="logout.php"><h1>logout</h1></a>


?>


