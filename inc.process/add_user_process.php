<?php
require_once('db_connect.php');

if(isset($_POST['submit'])){
	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name=test_input($_POST['name']);
    $password=test_input($_POST['password']);
    $repassword=test_input($_POST['repassword']);
    $userlevel=test_input($_POST['userlevel']);

    //check for password match
    if($password != $repassword){
        echo "<div><h2  style='color:red'>Password Don't Match.Enter Password Again...</h2></div>";
        echo "<button><a href='../add_new_user.php'>Go Back</a></button>";
    }else{
        //check for userlevel (0 or 1)
        if($userlevel < 0  or $userlevel >1){
            echo "<div ><h2  style='color:red'>User Level Must Be 0 or 1 .Enter User Level Again...</h2></div>";
            echo "<button><a href='../add_new_user.php'>Go Back</a></button>";
        }else{
            $query="select * from users";
            $query_run=mysqli_query($connect , $query);
            while($row=mysqli_fetch_array($query_run)){
                $olduser=$row['name'];
                
            }
            //check if user exists
            if($olduser==$name){
                    echo "<div ><h2  style='color:red'>User Already Exists.Enter Username Again...</h2></div>";
                    echo "<button><a href='../add_new_user.php'>Go Back</a></button>";
                }else if($olduser != $name){
                    //add new user
                    $query1="insert into users(name,password,user_control_level) values('$name' , '$password' , '$userlevel') ";
                        $query1_run=mysqli_query($connect, $query1);
                        if($query1_run){
                            $message="New User Added Successfully";
                            header( "refresh:0;url=../account_setings.php" );
                        }else{
                            $message="Can not Add User.Try Again... ";
                            header( "refresh:0;url=../account_setings.php" );
                        }
                }
        }
    }  
}

?>
<script type="text/javascript">
	var message='<?php echo $message; ?>';
	alert(message);
</script>

