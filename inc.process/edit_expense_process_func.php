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
    $title=test_input($_POST['title']);
    $amount=test_input($_POST['amount']);
    $remarks=test_input($_POST['remarks']);
    $date=test_input($_POST['date']);
    

    $query="update expense set
    			title='$title' , 
    			amount='$amount' ,
    			remarks= '$remarks' ,
    			date='$date'  where id='$edit_id' ";
    $query_run=mysqli_query($connect, $query);
    if($query_run){
    	$message="Information Updated Successfully";
    	header( "refresh:0;url=../view_expense.php" );
    }else{
    	$message="Can not Update Information.Try Again... ";
    	header( "refresh:0;url=../view_expense.php" );
    }
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>