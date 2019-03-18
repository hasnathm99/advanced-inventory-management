<?php
require_once('db_connect.php');

if(isset($_POST['submit'])){
	if (isset($_POST['company_name']) and isset($_POST['customer_name']) and isset($_POST['phn_no_1']) and isset($_POST['phn_no_2']) and isset($_POST['email']) and isset($_POST['address']) and isset($_POST['city']) and isset($_POST['zip_code']) and isset($_POST['country'])) {

		$company_name=$_POST['company_name'];
		$customer_name=$_POST['customer_name'];
		$phn_no_1=$_POST['phn_no_1'];
		$phn_no_2=$_POST['phn_no_2'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$zip_code=$_POST['zip_code'];
		$country=$_POST['country'];

		$query="insert into customer(company_name,customer_name,phn_no_1,phn_no_2,email,address,city,zip_code,country) values('$company_name' , '$customer_name' , '$phn_no_1' , '$phn_no_2' , '$email' , '$address' , '$city' , '$zip_code' , '$country' )";
		$query_run=mysqli_query($connect ,$query);
		if($query_run){
			$message="Customer Added Successfully";
			header( "refresh:0;url=../view_product.php" );
		}else{
			$message="Can Not Add Customer.Try Again...";
			header( "refresh:0;url=../add_product.php" );
		}
	}else{
		$message="Please fill all fields.";
		header( "refresh:0;url=../add_product.php" );
	}
}

?>
	<script type="text/javascript">
		var message= '<?php echo $message; ?>';
		alert(message);
	</script>