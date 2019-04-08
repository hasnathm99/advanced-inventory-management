<?php
require_once('include/db_connect.php');
require 'include/header.php';

if(!isset($_SESSION['user_id'])){
  echo '<h2 style="color:#C9302C">Log in First<h2>';
  header('Location: login.php');
  die();
 }

$user_id=$_SESSION['user_id'];
 ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <h3>Customer Due Table</h3>
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Customer Name</th>
                                                <th>Product Order Date</th>
                                                <th>Product Name</th>
                                                <th colspan="2" style="text-align: center;">Action</th>                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter=0;
                                            $query="select * from sales where due > 0 and due_status='0' order by order_date desc";
                                            $query_run=mysqli_query($connect, $query);
                                            while($row=mysqli_fetch_array($query_run)){
                                                $counter++;
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['cust_name'] ?></td>
                                                <td ><?php echo date("d-m-Y", strtotime($row['order_date']));?></td>
                                                <td><?php echo $row['pro_name']; ?></td>
                                                <?php
                                                if($user_id == 0){
                                                    echo '<td><a href="inc.process/view_due_details.php?pid='.$row['pid'].'"><button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a></td>';
                                                    echo '<td><a href="inc.process/pay_due_process.php?id='.$row['pid'].'"><button type="button" class="btn btn-success"><i class="fab fa-amazon-pay"></i></button></a></td>';

                                                }else{
                                                    echo '<td><a href="inc.process/view_due_details.php?pid='.$row['pid'].'"><button type="button" class="btn btn-info"><i class="fas fa-eye"></i></button></a></td>';
                                                }
                                                ?>
                                                                                         
                                            </tr>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <!-- END DATA TABLE-->
                                <!-- calculation -->
                                
                            </div>
                        </div>

                        <!-- End the Copy From Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>All rights reserved. <a href="https://colorlib.com"></a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php require 'include/footer.php' ?>
<!-- end document-->

