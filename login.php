 <?php
ob_start();
session_start();
require_once('include/db_connect.php');

?> 
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Transparent Login Form</title>
        <link rel="stylesheet" href="css/login_style.css">

    </head>
    <body style="background: url(images/bird.png);">
        <div class="loginBox">
            <img src="images/user.png" class="user">
            <h2>Log In Here</h2>
            <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <p>User Name</p>
                <input type="text" name="name" placeholder="Enter Username" required="Enter Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="••••••" required="Enter Password">
                <input type="submit" name="submit" value="Sign In">
                
            </form>
        </div>
    </body>
</html>

<?php
if(isset($_POST["name"]) and isset($_POST["password"])){


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
            $name=test_input($_POST["name"]);
            $password=test_input($_POST["password"]);

            if(!empty($name) and !empty($password)){
                $query="select * FROM users ";
                $query_run=mysqli_query($connect,$query);

                while($row=mysqli_fetch_array($query_run)){
                    $old_name=$row['name'];
                    $old_password=$row['password'];
                    $user_id=$row['user_control_level'];
                    $user_name=$row['name'];

                    if($old_name==$name and $old_password==$password ){
                    $_SESSION['user_id']=$user_id;
                    $_SESSION['user_name']=$user_name;
                    header('location:index.php');
                }else{
                    $message="Wrong Information";
                    ?>
                    
                    <?php
                }
                }
                
            }
        }
?>
<script>
    var message= " <?php echo $message; ?> ";
    alert(message);
</script>