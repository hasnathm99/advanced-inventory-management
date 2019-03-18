<?php
require_once('db_connect.php');

if(isset($_POST['submit'])){
	if (isset($_POST['product_name']) and isset($_POST['product_description']) and isset($_POST['product_unit']) ) {
		$product_name=$_POST['product_name'];
		$product_description=$_POST['product_description'];
		$product_unit=$_POST['product_unit'];
		$product_image="Comming Soon";
		

		$query="insert into product(product_name, product_description, product_unit, product_image) values('$product_name' , '$product_description' , '$product_unit' , '$product_image')";
		$query_run=mysqli_query($connect ,$query );
		if($query_run){
			$message="Product Added Successfully";
			header( "refresh:0;url=../view_product.php" );
		}else{
			$message="Can Not Add Product.Try Again...";
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