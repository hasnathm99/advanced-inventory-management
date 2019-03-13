<?php
require_once('db_connect.php');

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

    $query="insert into expense(title,amount,remarks,date) values('$title' , '$amount' , '$remarks' , '$date') ";
    $query_run=mysqli_query($connect, $query);
    if($query_run){
    	$message="Information Added Successfully";
    	header( "refresh:0;url=../view_expense.php" );
    }else{
    	$message="Can not Add Information.Try Again... ";
    	header( "refresh:0;url=../view_expense.php" );
    }
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>