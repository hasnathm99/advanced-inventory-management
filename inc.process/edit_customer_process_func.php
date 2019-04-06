<?php
require_once('db_connect.php');
$edit_id=$_GET['id'];

if(isset($_POST['submit'])){
	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $company_name=test_input($_POST['company_name']);
    $customer_name=test_input($_POST['customer_name']);
    $phn_no_1=test_input($_POST['phn_no_1']);
    $phn_no_2=test_input($_POST['phn_no_2']);
    $email=test_input($_POST['email']);
    $address=test_input($_POST['address']);
    $city=test_input($_POST['city']);
    $zip_code=test_input($_POST['zip_code']);
    $country=test_input($_POST['country']);
    

    $query="update customer set
    			company_name='$company_name' , 
    			customer_name='$customer_name' ,
    			phn_no_1= '$phn_no_1' ,
                phn_no_2= '$phn_no_2' ,
                email= '$email' ,
                address= '$address' ,
                city= '$city' ,
                zip_code= '$zip_code' ,
    			country='$country'  where id='$edit_id' ";
    $query_run=mysqli_query($connect, $query);
    if($query_run){
    	$message="Information Updated Successfully";
    	header( "refresh:0;url=../view_customer.php" );
    }else{
    	$message="Can not Update Information.Try Again... ";
    	header( "refresh:0;url=../view_customer.php" );
    }
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>