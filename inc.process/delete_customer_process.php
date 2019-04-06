<?php
require_once('header.php');
require_once('footer.php');
$id=$_GET['id'];
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- Start to Copy From Here -->
                <div class="row m-t-30">
                <div class="col-md-12">
                	<h3>Do You want To Delete This Customer Info??</h3>
                	<br>
                   
                   	<button class="btn btn-danger" ><a href="delete_customer_process_func.php?id=<?php echo $id; ?>" style="color:white">Delete</a> </button>
                   
                </div>
            </div>
            <br>
            <br>

            <!-- End the Copy From Here -->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Utshab Technologies. All rights reserved. Template by <a href="https://colorlib.com">Utshab Technologies</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

