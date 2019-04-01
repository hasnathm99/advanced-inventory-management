<?php
require_once('include\db_connect.php');
?>
<style>
    th{
        font-size: 15px;
    }
</style>

<?php $currentPage = 'product_report'; include 'include/header.php' ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                          
                                <div class="container col-md-12">
                                    <div class="row table-responsive m-b-40">
                                        
                                    
                                        <table id="example" class="display" >
                                            <thead>
                                                    <tr>
                                                        <th >SL NO</th>
                                                        <th>Supplier</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Buy Price</th>
                                                        <th>sale Price</th>
                                                        <th>Date</th>
                                                        <th>edit</th>
                                                        <th>delete</th>
                                                                                       
                                                    </tr>
                                                </thead>
                                                <?php
                                                        $counter=0;
                                                        
                                                        $query="select * from purchase order by id DESC";
                                                        $query_run=mysqli_query($connect, $query);
                                                        while($row=mysqli_fetch_array($query_run)){
                                                            $counter++;
                                                        ?>
                                                    <tr>

                                                        <td ><?php echo $counter; ?></td>
                                                        <td><?php echo $row['supplier_name']; ?></td>
                                                        <td><?php echo $row['product_name']; ?></td>
                                                        <td><?php echo $row['qty']; ?></td>
                                                        <td><?php echo $row['buy_price']; ?></td>
                                                        <td><?php echo $row['sale_price']; ?></td>
                                                        <td ><?php echo date("d-m-Y", strtotime($row['order_date']));?></td>
                                                        <td>
                                                            <a href="inc.process/edit_purchase_report_process.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>
                                                           
                                                        </td>

                                                        
                                                        

                                                    <?php  
                                                    } ?>
                                                    </tr>
                                                <tbody>
                                                   
                                        
                                                </tbody>
                                            </table>
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
    
    
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>