<?php
require_once('db_connect.php');

$pid=$_GET['pid'];
$name=$_GET['name'];

if(isset($_POST['submit'])){
	$payment=$_POST['payment'];
	$payment_date=$_POST['payment_date'];

	//get due information
	$query="select customer_name,customer_pid,net_total,sum(payment),sum(due),payment_date from customer_due where customer_pid='$pid' and customer_name='$name' ";
	$query_run=mysqli_query($connect , $query);
	while($row=mysqli_fetch_array($query_run)){
		$net_total=$row['net_total'];
		//echo $due=$row['sum(due)'].'<br>';
		$paid=$row['sum(payment)'].'<br>';

	}
	@$new_due=$net_total - ($paid+$payment);

	if($payment > 0 && ( $new_due > 0 || $new_due == 0) ){
		
		//insert new due info into customer due table
			$query="insert into customer_due(customer_name , customer_pid , net_total ,	payment , due , payment_date) values( '$name' , '$pid' , '$net_total' , '$payment' , '$new_due' , '$payment_date')";
			$query_run=mysqli_query($connect , $query);

		if($query_run){
			$message="Payment Added Successfully";

			//if due cleared update due status
			if($new_due==0){
				$query1="update sales set due_status = 1 where pid='$pid' ";
				$query1_run=mysqli_query($connect , $query1);
			}
			header("Refresh:0; url=../view_customer_due.php");
		}else{
			$message="Problem Adding Customer Due.Try Again";
			header("Refresh:0; url=../view_customer_due.php");
		}
	}else{
		$message="Payment Is More Than Due or You Entered 0.Can not add payment.";
		header("Refresh:0; url=../view_customer_due.php");
	}
}
?>
<script type="text/javascript">
	var message = '<?php echo $message; ?>';
	alert(message);
</script>