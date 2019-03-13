<?php
require_once('include\db_connect.php');
?>
<?php require 'include/header.php' ?>
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
                                        <h3>Stock Table</h3>
                                        <br>
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Product Name</th>
                                                <th>Toatl Unit</th>
                                                <!-- <th colspan="2" style="text-align: center;">Action</th> -->                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter=0;
                                            $query="select product_name, sum(ream) from purchase group by product_name";
                                            $query_run=mysqli_query($connect, $query);
                                            while($row=mysqli_fetch_array($query_run)){
                                                $counter++;
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                            <td><?php echo $row['product_name'] ?></td>
                                                <td><?php echo $row['sum(ream)']; ?></td>
                                                                                         
                                            </tr>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                                <!-- END DATA TABLE-->
                                <!-- calculation -->
                                <form action="inc.process\add_product_process.php" method="POST">
                                    <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header"><b>Calculate Stock Price</b></div>
                                    <div class="card-body">
                                        
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="unit_price" class="control-label mb-1">Unit Price</label>
                                                        <input  name="unit_price" id="unit_price" type="text" class="form-control " >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="total_ream" class="control-label mb-1">Total Ream</label>
                                                    <div class="input-group">
                                                        <input id="total_ream" name="total_ream" type="text" class="form-control " >
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="total_price" class="control-label mb-1">Total Stock Price</label>
                                                    <div class="input-group">
                                                        <input id="total_price" name="total_price" type="text" class="form-control " disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Show</span>
                                                    <span id="payment-button-sending" style="display:none;">Saving...</span>
                                                </button>
                                            </div> -->
                                        
                                    </div>
                                </div>
                            </div>
                                </form>
                            </div>
                        </div>

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
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php require 'include/footer.php' ?>
<!-- end document-->

<script >
    $(function() {
        $("#unit_price, #total_ream").on("keydown keyup", sum);
      function sum() {
      $("#total_price").val(Number($("#unit_price").val()) * Number($("#total_ream").val()));
      }
    });
</script>
