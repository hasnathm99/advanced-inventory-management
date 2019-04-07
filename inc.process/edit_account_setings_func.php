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
    $name=test_input($_POST['name']);
    $password=test_input($_POST['password']);

    $query="update users set
    			name='$name' , 
    			password='$password'  where id='$edit_id' ";
    $query_run=mysqli_query($connect, $query);
    if($query_run){
    	$message="Information Updated Successfully";
    	header( "refresh:0;url=../account_setings.php" );
    }else{
    	$message="Can not Update Information.Try Again... ";
    	header( "refresh:0;url=../account_setings.php" );
    }
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>