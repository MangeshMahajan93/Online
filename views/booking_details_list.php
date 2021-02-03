<!-- FOR CK EDITOR -->
<script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
<!-- Navbar Code -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">   
          <div class="box box-info">
            <div class="box-header with-border">  
              <h3 class="box-title">Booking Details</h3>  
               <div class="col-sm-1" style="float: right;">                      
                      <a href="<?php echo base_url('booking/manageBooking/');?>"><button class="btn btn-block btn-primary" type="button" name="Back">Back</button></a>
                    </div>          
                 <hr>
            <!-- /.box-header -->
            <?php
            foreach ($booking_details_result as $bk_details_res) { }
            ?>            
            <!-- form start -->
            <form name ="bookingDetailsForm" class="form-horizontal" action="<?php echo base_url('');?>" method="post">                    
              <div class="box-body">       
            <!-- info row -->
      <div class="row invoice-info">       
        <div class="col-sm-8 invoice-col">          
          <address>
            <strong>Name : <?php echo $bk_details_res->customer_name;?></strong><br>     
            <strong>Phone : </strong><?php echo $bk_details_res->mobile_number;?><br>   
            <strong>Email : </strong><?php echo $bk_details_res->email_id;?><br>
            <strong>Aadhar Card Number : </strong><?php echo $bk_details_res->aadhar_number;?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         <b>Order ID :<?php echo $bk_details_res->booking_id;?></b><br>
          <b>Booking Date :</b> <?php echo $bk_details_res->booking_date;?><br>
          <b>Booking From :</b> <?php echo date("d/m/Y", strtotime($bk_details_res->booking_start_date))?><br>
          <b>Booking To :</b> <?php echo date("d/m/Y", strtotime($bk_details_res->booking_end_date))?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Sr.No</th>
              <th>Super Category Name</th>
              <th>Category Name</th>
              <th>Product Name</th>
              <th>Rent Duration(in days)</th>
              <th>Quantity</th>
              <th>Rent Price(per Day)</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
              <?php
                  $num=1;
                 foreach ($booking_details_result as $bookingDetails) {
              ?>
            <tr>
              <td><?php echo $num++;?></td>
             <td><?php echo $bookingDetails->super_category_name?></td>
              <td><?php echo $bookingDetails->category_name?></td>
              <td><?php echo $bookingDetails->product_name?></td>
              <td><?php echo $bookingDetails->rent_duration?></td>
              <td><?php echo $bookingDetails->quantity?></td>
              <td><?php echo $bookingDetails->rent_price?></td>
              <td><?php echo $bookingDetails->amount?></td>
             
            </tr>
          <?php
}

          ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-9">
         
        </div>
        <!-- /.col -->
        <div class="col-xs-3">
           <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><?php echo $booking_result->total;?></td>
              </tr>
              <tr>
                <th>Discount(%) :</th>
                <td><?php echo $booking_result->discount;?></td>
              </tr>
              <tr>
                <th>Discount Obtained :</th>
                <td><?php echo $booking_result->discount_obtained_amount;?></td>
                </tr>              
              <tr>
                <th>Security Deposit Amount:</th>
                <td><?php echo $booking_result->deposit_amount;?></td>
                  </tr>
            </table>
          </div>
           <p class="lead"><strong>Grand Total : </strong><?php echo $booking_result->grand_total;?></p>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
         
         <!--  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
          <!-- <a href="<?php //echo base_url('bookingpdf/pdf/'.base64_encode($booking_result->booking_id));?>">PDF </a>
 -->
           <a href="<?php echo base_url('bookingpdf/pdf/'.base64_encode($booking_result->booking_id));?>"><button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download">&nbsp;&nbsp;Generate PDF</i></button></a>

        </div>
      </div>


            </div>
           
            </form>
          </div>

        </section>
        <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- FOR CK EDITOR -->
  <script>
 CKEDITOR.replace('categoryDescription');
 </script>
