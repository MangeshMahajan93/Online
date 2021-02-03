<!-- Navbar Code -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">      
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">  
          <!-- quick email widget -->
          <div class="box box-info">
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">                  
                  <div class="col-sm-10 control-label">
                     <center>
                      <h1 class="box-title" style="color: #ff9999"><?php echo $this->session->flashdata('success');?>
                    </h1>
                     <h1 class="box-title" style="color: #ff9999"><?php echo $this->session->flashdata('delete_success');?>
                    </h1>                        
                  </center>   
                  </div>
                    <div class="col-sm-2">
                      <a href="<?php echo base_url('booking/productBooking/');?>"><button type="button" class="btn btn-block btn-primary" ><i class="fa fa-user-plus" aria-hidden="true"  ></i>Add Booking</button></a>                       
                    </div>
                </div>
                  <div class="box-body table-responsive">       
                  <table class="table table-hover">
                 <tr>
                    <th>Sr.</th>
                    <th>Booking Date</th> 
                    <th>Booking Start Date</th> 
                    <th>Booking End Date</th> 
                    <th>Customer Name</th>    
                    <th>Mobile Number</th> 
                    <th>Grand Total</th>
                    <th>Booking Status</th>                  
                    <th>Action</th>
                  </tr>               
                    <?php
                    $sr = $start;    
                     foreach ($result as $row)
                        { 
                    ?>
                  <tr>   
                    <td><?php echo $sr++; ?></td>
                    <td><?php echo $row->booking_date; ?></td>
                    <td><?php echo $row->booking_start_date	; ?></td>
                    <td><?php echo $row->booking_end_date; ?></td>
                    <td><?php echo $row->customer_name; ?></td>
                    <td><?php echo $row->mobile_number; ?></td>
                     <td><?php echo $row->grand_total ; ?></td>
                    <td>
                      <?php 
                      if($row->booking_status == "Active")
                      {
                       ?>                        
                          <a href="<?php echo base_url('booking/changeStatus/'.base64_encode($row->booking_id));?>"><button type="button" class="btn btn-block btn-primary" >Active</button></a>
                      <?php
                      }
                      else
                      {
                        ?>
                       <button type="button" class="btn btn-block btn-primary" >Success </button>
                        
                    <?php  }        ?>                        
                    </td>                  
                    <td>   
                     
                     <a href="<?php echo base_url('booking/viewBookingDetails/'.base64_encode($row->booking_id));?>">
                         <span class='glyphicon glyphicon-eye-open'>&nbsp;View</span>
                         </a>
                                           
                    </td>        
                 </tr>
            <?php
     }
  ?>
                       </table>          
  <style>
      li.active a {
      background-color: black;
  }
  .pagination a {
      color: #fff;
      text-decoration: none;
      background-color: transparent;
      -webkit-text-decoration-skip: objects;
      margin: 6px;
      background-color: pink;
      padding: 2px 10px;
      border-radius: 0px;
  }
  .pagination
  {
    float: right;
    padding:2px;
  }
  </style>
  <?php
  if($start > $totalEntries)
  {
    $start = $totalEntries;
  }
  else
  {
    $start = $start;
  }
  if($end > $totalEntries)
  {
    $end = $totalEntries;
  }
  else
  {
    $end = $end;
  }
  echo $this->pagination->create_links();
  echo "<br><h4>&nbsp;Showing&nbsp;".$start."&nbsp;to&nbsp;".$end."&nbsp;of&nbsp;".$totalEntries."&nbsp;entries</h4>";
  ?>
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