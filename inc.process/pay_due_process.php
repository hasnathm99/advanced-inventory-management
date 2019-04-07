<?php
require_once('header.php');

$id=$_GET['id'];

$query="select customer_name,sum(payment),net_total from customer_due where customer_pid= '$id' ";
$query_run=mysqli_query($connect, $query);
while( $row=mysqli_fetch_array($query_run)){
    $customer_name=$row['customer_name'];
    $net_total=$row['net_total'];
    $payment=$row['sum(payment)'];
    @$due=$net_total - $payment;

?>
<!-- <form >
    
</form> -->

<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <!-- Start to Copy From Here -->
                    <div class="row m-t-30">
                    <div class="col-md-12">
                        <p>Due Payment of<?php echo '<b> '. $customer_name.'</b>'; ?> </p>
                        <br>
                                 <div class="col-lg-7">
                                     <div class="card">
                                         <div class="card-header">Due Information</div>
                                         <div class="card-header">Due <?php echo '<b> '. $due.'</b>'; ?> Tk</div>
                                         <div class="card-body">
                                             <div class="card-title">
                                                 <h3 class="text-center title-2">Provide Due Payment Information</h3>
                                             </div>
                                             <hr>
                                             <form  method="POST" action="pay_due_process_func.php?pid=<?php echo $id; ?>&name=<?php echo $customer_name; ?> ">
                                                 <div class="row">
                                                     <div class="col-12">
                                                         <label for="payment" class="control-label mb-1">Payment Amount</label>
                                                         <input type="text" name="payment" class="form-control form-control-sm" id="payment" required/>
                                                     </div>
                                                 </div>
                                                 <div class="row">
                                                      <div class="col-6">
                                                          <div class="form-group">
                                                              <label for="payment_date" class="control-label mb-1">Payment Date</label>
                                                              <input id="payment_date" name="payment_date" type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div align="">
                                                     <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                </div>
                            <?php } ?>
                    </div>
                </div>
                <br>
                <br>

                
            </div>
        </div>
    </div>

<?php
require_once('footer.php');
?>