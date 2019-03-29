<?php
require_once('include\db_connect.php');
?>
<style>
    .pagination-small li a{
        padding: 5px;
        border: 1px solid grey;
        
    }
</style>

<?php $currentPage = 'product_report'; include 'include/header.php' ?>
            <!-- HEADER DESKTOP-->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                          
                            <div class="row m-t-30" ng-app="myApp" ng-controller="controller">
                            <div class="col-md-12">

                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40" >
                                    <div class="row">
                                        <div class="col-sm-2 pull-left">
                                            <label>PageSize:</label>
                                            <select ng-model="data_limit" class="form-control">
                                                <option>10</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 pull-right">
                                            <label>Search:</label>
                                            <input type="text" ng-model="search" ng-change="filter()" placeholder="Search" class="form-control" />
                                        </div>
                                    </div>
                                    <table class="table table-borderless table-data3">

                                        <br>
                                        
                                        <thead>
                                            <tr>
                                                <th >SL NO</th>
                                                <th>Company Name</th>
                                                <th>Product Name</th>
                                                <th>Purchase Unit Price</th>
                                                <th>Purchase Ream</th>
                                                <th>Total Amount</th>
                                                <th>Purchase Date</th>
                                                <th colspan="2" style="text-align: center;">Action</th>                               
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr ng-repeat="data in searched = (file | filter:search | orderBy : base :reverse) | beginning_data:(current_grid-1)*data_limit | limitTo:data_limit">
                                                <td>{{$index+1}}</td>
                                                <td>{{data.supplier_name}}</td>
                                                <td>{{data.product_name}}</td>
                                                <td>{{data.qty}}</td>
                                                <td>{{data.buy_price}}</td>
                                                <td>{{data.sale_price}}</td>
                                                <td>{{data.order_date}}</td>
                                                <td><a href="inc.process\edit_purchase_report_process.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>

                                                <td><a href="inc.process/delete_product.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger" onclick=" return confirm('Sure you want to delete???');" >Delete</button></a></td>
                                            </tr> 
                                            
                                        </tbody>
                                    </table>

                                </div>
                                <!-- END DATA TABLE-->
                               <div class="col-md-12" ng-show="filter_data == 0">
                                   <div class="col-md-12">
                                       <h4>No records found..</h4>
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="col-md-6 pull-left">
                                       <h5>Showing {{ searched.length }} of {{ entire_user}} entries</h5>
                                   </div>
                                   <div class="col-md-6" ng-show="filter_data > 0">
                                       <div pagination="" page="current_grid" on-select-page="page_position(page)" boundary-links="true" total-items="filter_data" items-per-page="data_limit" class="pagination-small pull-right" previous-text="&laquo;" next-text="&raquo;"></div>
                                   </div> 
                                    
                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.10.0/ui-bootstrap-tpls.min.js"></script>
    <script src="myapp.js"></script>