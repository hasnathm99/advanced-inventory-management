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
    $product_name=test_input($_POST['product_name']);
    $product_color=test_input($_POST['product_color']);
    $product_gsm=test_input($_POST['product_gsm']);
    $unit_price=test_input($_POST['unit_price']);
    $product_width=test_input($_POST['product_width']);
    $product_height=test_input($_POST['product_height']);

    $query="update product set
    			product_name='$product_name' , 
    			product_color='$product_color' ,
    			product_gsm= '$product_gsm' ,
    			unit_price='$unit_price' , 
    			product_width = '$product_width' , 
    			product_height = '$product_height' where id='$edit_id' ";
    $query_run=mysqli_query($connect, $query);
    if($query_run){
    	$message="Information Updated Successfully";
    	header( "refresh:0;url=../view_product.php" );
    }else{
    	$message="Can not Update Information.Try Again... ";
    	header( "refresh:0;url=../view_product.php" );
    }
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>