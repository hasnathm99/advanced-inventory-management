<?php
require_once('include/db_connect.php');
require 'include/header.php' ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- Start to Copy From Here -->
                            
                                <form action="inc.process/add_product_process.php" method="POST" enctype="multipart/form-data">
                                    <div class="col-lg-10">
                                        <div class="card">
                                            <div class="card-header"><b>Product Information</b></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h3 class="text-center title-2"> Add New Product</h3>
                                                </div>
                                                <hr>
                                                
                                                    <div class="form-group">
                                                        <label for="product_name" class="control-label mb-1">Product Name</label>
                                                        <input id="product_name" name="product_name" type="text" class="form-control" required="must fill product name" >
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="product_description" class="control-label mb-1">Product Description</label>
                                                        <input id="product_description" name="product_description" type="text" class="form-control " >
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="product_unit" class="control-label mb-1">Product Unit</label>
                                                        <select id="product_unit" name="unit_type" type="text" class="form-control " >
                                                          
                                                          <option value="Kilogram">Kilogram</option>
                                                          <option value="Piece">Piece</option>
                                                          <option value="Packet">Packet</option>
                                                          <option value="Carton">Carton</option>
                                                        </select>

                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="product_image" class="control-label mb-1">Images</label>
                                                        <input id="product_image" name="product_image" type="text" class="form-control " disabled >
                                                    </div>
                                                    
                                                    <div>
                                                        <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                            <span id="payment-button-amount">Save</span>
                                                            <span id="payment-button-sending" style="display:none;">Saving...</span>
                                                        </button>
                                                    </div>
                                                
                                            </div>
                                        </div>
                            </div>
                                </form>
                            
                        <!-- End the Copy From Here -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Hasnath Rahman  &  Sudipta Mondal. All rights reserved. Template by <a href="#"></a>Hasnath Rahman  &  Sudipta Mondal</p>
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
