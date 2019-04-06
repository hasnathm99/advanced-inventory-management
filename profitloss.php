<?php require 'include/header.php' ?>
<?php
require_once('include/db_connect.php');

?>

            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <h2>Today's Reviews</h2>
                    
                    <br>
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            <?php
                            $date=date('Y-m-d');
                            // $date='2018-12-18';

                            //get details from sales
                            $query="select sum(qty) , sum(p_l) from sales where order_date='$date' ";
                            $query_run=mysqli_query($connect ,  $query);
                            if($query_run){
                                while($row=mysqli_fetch_array($query_run)){
                                    $pl=$row['sum(p_l)'];
                                    $sold_qty=$row['sum(qty)'];
                                }
                            }
                            
                            //get total profit/loss from sales
                            $query="select sum(p_l) from sales";
                            $query_run=mysqli_query($connect ,  $query);
                            if($query_run){
                                while($row=mysqli_fetch_array($query_run)){
                                     $total_pl=$row['sum(p_l)'];
                                     
                                }
                            }

                            //get total expense from sales
                            $query="select sum(amount) from expense";
                            $query_run=mysqli_query($connect ,  $query);
                            if($query_run){
                                while($row=mysqli_fetch_array($query_run)){
                                     $total_expense=$row['sum(amount)'];
                                     
                                }
                            }

                            //get details from purchase
                            $query2="select sum(qty) from purchase where order_date='$date' ";
                            $query2_run=mysqli_query($connect , $query2);
                            if($query2_run){
                                while($row2=mysqli_fetch_array($query2_run)){
                                     $purchased_qty=$row2['sum(qty)'];
                                }
                            }
                            //get details from expense
                            $query3="select sum(amount) from expense where date='$date' ";
                            $query3_run=mysqli_query($connect , $query3);
                            if($query3_run){
                                while($row3=mysqli_fetch_array($query3_run)){
                                     $expense=$row3['sum(amount)'];
                                }
                            }
                            ?>
                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                
                                                <div class="text">
                                                    <h3 style="color: white">Product Purchased</h3>
                                                    <span  style="font-weight: 500;font-size: 18px "><?php echo round($purchased_qty,3).' Unit' ;?></span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </div>
                                                
                                                <div class="text">
                                                    <h3 style="color: white">Product Sold</h3>
                                                    <span  style="font-weight: 500;font-size: 18px "><?php echo round($sold_qty,3).' Unit'; ?></span>

                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="fas fa-american-sign-language-interpreting"></i>
                                                </div>
                                                <br>
                                                <div class="text">
                                                    <h3 style="color: white">Expense</h3>
                                                    <span  style="font-weight: 500;font-size: 18px "><?php echo round($expense,3); ?> &#2547</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-money"></i>
                                                </div>
                                                <div class="text">
                                                    <h2 style="font-weight: 500;">Profit $ Loss</h2>
                                                    <span style="font-weight: 500;font-size: 18px "><?php $profit_loss= $pl-$expense;
                                                        echo round($profit_loss,3);
                                                     ?></span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2>Overall Profit/Loss</h2>
                            <br>
                            <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                
                                                <div class="text">
                                                    <h3 style="color: white">All Time Profit/Loss</h3>
                                                    <span  style="font-weight: 500;font-size: 18px "><?php echo round($total_pl - $total_expense) ;?></span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- start manual input -->

                            
                                <!-- end of manual section -->

                        <!-- End the Copy From Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>All rights reserved. Template by <a> Hasnath &  Sudipto</a>.</p>
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
