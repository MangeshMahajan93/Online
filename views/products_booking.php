<style>
  input[type="checkbox"]{
  width: 17px; /*Desired width*/
  height: 17px; /*Desired height*/
  cursor: pointer;
 /* -webkit-appearance: none;*/
  appearance: none;
 }
</style>
<script>
function createcategory(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;
          var categoryName="#categoryName".concat(k);
          $.ajax({
                        url: "<?php echo base_url('booking/getCategory/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,k:k},
                        success: function(data){

                            //$(output).append(data);
                            //alert(data);
                           $(categoryName).html(data);                      
                        }
});
        }    
      </script>
<script>
function createproduct(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;

          var categorySelected="categoryName".concat(k);
          var category=document.getElementById(categorySelected).value;
          
          var productName="#productName".concat(k);
          $.ajax({
                        url: "<?php echo base_url('booking/getProduct/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,category:category,k:k},
                        success: function(data){
                            // $(output).append(data);
                           // alert(data);
                           $(productName).html(data);                     
                        }
});
        }    
      </script>
      <script>
function createprice(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;

          var categorySelected="categoryName".concat(k);
          var category=document.getElementById(categorySelected).value;

          var productSelected="productName".concat(k);
          var product=document.getElementById(productSelected).value;
          
          var price="#price".concat(k);
          $.ajax({
                        url: "<?php echo base_url('booking/getPrice/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,category:category,product:product,k:k},
                        success: function(data){

                            // $(output).append(data);
                           // alert(data);


                            //  <!-- IMP FOR DROP DOWN START -->
                           //$(price).html(data);  
                           // //  <!-- IMP FOR DROP DOWN END -->


                            //  <!-- IMP FOR INPUT FIELD START -->
                           $(price).val(data);     
                             //  <!-- IMP FOR INPUT FIELD END -->     
                        }
});
        }    
      </script>
      <script>
function createquantity(k)
        {
          var superCategorySelected="supercategoryName".concat(k);
          var SuperCategory=document.getElementById(superCategorySelected).value;

          var categorySelected="categoryName".concat(k);
          var category=document.getElementById(categorySelected).value;

          var productSelected="productName".concat(k);
          var product=document.getElementById(productSelected).value;
          
          // var priceSelected="price".concat(k);
          // var price=document.getElementById(priceSelected).value;

          var oldquantity="#oldquantity".concat(k);

          $.ajax({
                        url: "<?php echo base_url('booking/getQuantity/');?>",
                        method: "post",
                        data: {SuperCategory:SuperCategory,category:category,product:product,k:k},
                        success: function(data)
                        {
                          $(oldquantity).val(data);                                 
                        }
});
        }    
      </script>
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
              <h3 class="box-title">PRODUCT BOOKING</h3> 
              <center>
                      <h1 class="box-title" style="color: #ff9999"><?php echo $this->session->flashdata('success_booking');?>
                    </h1>   
                  </center>                  
            </div>            
            <!-- /.box-header -->
            <!-- form start -->
            <form name ="bookingForm" enctype="multipart/form-data" class="form-horizontal" action="<?php echo base_url('booking/productBooking');?>" method="post">                 
              <div class="box-body">
              
              <div class="form-group">
                  <label class="col-sm-1 control-label">Name</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter Customer Name" value="<?php echo @$_POST['customer_name']?>" autocomplete="off">
                      <span style="color:red"><?php echo form_error('customer_name');?></span>
                    </div>
                    <label class="col-sm-1 control-label">Mobile No.</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number" value="<?php echo @$_POST['mobile_number']?>" autocomplete="off">
                      <span style="color:red"><?php echo form_error('mobile_number');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-1 control-label">Email ID</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Enter Email ID" value="<?php echo @$_POST['email_id']?>" autocomplete="off">
                      <span style="color:red"><?php echo form_error('email_id');?></span>
                    </div>
                    <label class="col-sm-1 control-label">Aadhar No.</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="aadhar_number" id="aadhar_number" placeholder="Enter Aadhar Card Number" value="<?php echo @$_POST['aadhar_number']?>" autocomplete="off">
                      <span style="color:red"><?php echo form_error('aadhar_number');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-1 control-label">Rent Start Date</label>
                    <div class="col-sm-5">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="start_date" class="form-control pull-right" value="" id="datepicker" onChange="return Calculation();" autocomplete="off">
                      </div>
                      <span style="color:red"><?php echo form_error('start_date');?></span>
                    </div>
                  <label class="col-sm-1 control-label">Rent End Date</label>
                    <div class="col-sm-5">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="end_date" class="form-control pull-right" value="" id="datepicker2" onChange="return Calculation();" autocomplete="off">
                      </div>
                      <span style="color:red"><?php echo form_error('end_date');?></span>
                    </div>                   
                  </div>
                  
               
                          <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="calculation">
                 
                  <tr>
                    <th>Sr.No.</th>
                    <th>Super Category</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Rent Price/Amount(per product)</th>
                     <th>Rent Duration(in days)</th>       
                     <th>Available Quantity</th>             
                    <th>Quantity</th>
                   
                    <th>Amount</th>
                    <!-- <th>Total</th> -->
                  </tr>
                   <?php
                  for($k=1;$k<=7;$k++)
                  {
                    ?>
                  <tr>
                     <td><?php echo $k;?></td>
                     <td>                              
                       
                          <select class="form-control" id="supercategoryName<?php echo $k;?>" name="supercategoryName[]" onchange="return createcategory(<?php echo $k;?>);" onClick="return createproduct(<?php echo $k;?>);">
                            <!-- ADDED ONCLICK NEW : onClick="return createproduct(<?php //echo $k;?>);"-->
                        <option value="">Select Super Category</option>
                          <?php
                            foreach ($super_category_result as $value) 
                            {
                          ?>
                          <option value="<?php echo $value->super_category_name;?>"><?php echo $value->super_category_name;?></option>
                          <?php
                          }
                          ?>
                          </select>
                          <span style="color:red"><?php echo form_error('supercategoryName');?></span>
                      </td>
                     <td>                              
                       <!--  <select class="form-control" name="categoryName[]" id="categoryName<?php //echo $k;?>">
                        <option value="">Select Category</option>
                          </select> -->
        <select class='form-control' name='categoryName[]' id='categoryName<?php echo $k;?>' onChange="return createproduct(<?php echo $k;?>);">
                          <option value="">Select Category</option>
                            
                         </select>
                          <span style="color:red"><?php echo form_error('categoryName');?></span>
                      </td>
                     
                     <td>            
                         <select class='form-control' name='productName[]' id='productName<?php echo $k;?>' onChange="return createprice(<?php echo $k;?>);" onClick="return createquantity(<?php echo $k;?>);">
                         	
                          <option value="">Select Product</option>
                            
                         </select>
                      </td>
                       <td>
                        <!-- <input type="number" class="form-control" size="20%" name="price[]" id="price<?php //echo $k;?>" placeholder="" onKeyPress="Calculation()" onKeyUp="Calculation()"> -->

                           <!-- IMP FOR INPUT FIELD START -->
                        <input type="text" class="form-control" readonly="" name='price[]' id='price<?php echo $k;?>'>
                          <!-- IMP FOR INPUT FIELD END -->
                       
                       <!-- IMP FOR DROP DOWN START -->
                            <!-- <select class='form-control' readonly name='price[]' id='price<?php //echo $k;?>' onchange="Calculation()">
                              <option value="">SELECT</option>                            
                             </select> -->
                      <!-- IMP FOR DROP DOWN END -->
                      </td>
                      <td><input type="text" class="form-control" size="20%" name="rentDuration[]" id="rentDuration<?php echo $k;?>" placeholder="" readonly onKeyPress="Calculation()" onKeyUp="Calculation()" autocomplete="off"></td>

                        <td>                        
                        <input type="text" class="form-control" readonly="" name='oldquantity[]' id='oldquantity<?php echo $k;?>'>                          
                      </td>
                     
                      <td><input type="text" class="form-control" size="20%" name="quantity[]" id="quantity<?php echo $k;?>" placeholder="" onKeyPress="Calculation()" onKeyUp="Calculation()" onChange="return calc(<?php echo $k;?>);" autocomplete="off"></td>


                     <!--  <td><input type="text" class="form-control" size="20%" name="quantity[]" id="quantity<?php //echo $k;?>"  onChange="return calc(<?php// echo $k;?>);" placeholder=""  autocomplete="off"></td> -->
                                             
                      <td><input type="text" class="form-control" size="20%" name="rowAmount[]" id="rowAmount<?php echo $k;?>" placeholder="" readonly autocomplete="off"></td>
                    <!--   <td><input type="text" class="form-control" name="purchasetotal" id="purchasetotal" placeholder="" readonly></td> -->
                  </tr>
                    <?php
                  }
                    ?>
         <tr>
            <td colspan="8" align="right"><strong>Total</strong></td>
            <td><input type="text" class="form-control"  name="allRowAmount" id="allRowAmount" placeholder="" readonly></td> 
          </tr>
           <tr>                    
            <td colspan="8" align="right"><strong>Discount <strong>%</strong></strong></td>
            <td><input type="number" class="form-control" value="0" max="100" name="discount" id="discount" laceholder="" onKeyPress="Calculation()" onKeyUp="Calculation()" autocomplete="off"></td> 
          </tr>
             <tr>                    
            <td colspan="8" align="right"><strong>Discount Obtained</strong></td>
           <td><input type="text" class="form-control"  name="discountObtained" id="discountObtained" readonly autocomplete="off"></td> 
          </tr>
           <tr>                    
            <td colspan="8" align="right"><strong>Discounted Total</strong></td>
            <td><input type="text" class="form-control" name="finalamount" id="finalamount" readonly></td> 
          </tr>          
      </table>
      <hr>
  </div>
   <div class="form-group">
              <div class="col-sm-10 control-label"><strong>Security Deposit Amount</strong></div>
        <div class="col-sm-2">
                 <input type="text" class="form-control"  name="depositamount" id="depositamount">
                 <span style="color:red"><?php echo form_error('depositamount');?></span>
                  </div>

              </div>
              <div class="form-group">      
              <input style="margin-left: 550px;" type="checkbox" name="confirm" id="confirm">&nbsp;&nbsp;<strong>Confirm Booking</strong>
                    <center><span style="color:red;"><?php echo form_error('confirm');?></span></center>                                                       
              </div>

             
  <br>
<div class="form-group">
                    <div class="col-sm-2 control-label"></div>
                    <div class="col-sm-3">
                  <button type="submit" name="BookingSubmit" value="SUBMIT" class="btn btn-block btn-primary">Submit</button> 
                  </div>
                  <div class="col-sm-3">                      
                      <button class="btn btn-block btn-primary" type="reset" value="Clear">Reset</button>
                  </div>
              </div>
  <br>
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
<!-- <script src="js/jquery-1.2.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script> -->
	 <script>
   function calc(k)
{
  // var oldqty = "oldquantity" + k; 
  // var oqty = document.getElementById(oldqty).value; 
  // var qty = "quantity" + k; 
  // var nqty = document.getElementById(qty).value;
  var oldqty = "oldquantity" + k; 
  var oqty1 = document.getElementById(oldqty).value; 
  var oqty = parseInt(oqty1);

  var qty = "quantity" + k; 
  var nqty1 = document.getElementById(qty).value;
  var nqty = parseInt(nqty1);

  // alert(oqty);
  // alert(nqty);
   if(nqty>oqty)
   {
       alert("Not Enough Stock!!!");
       document.getElementById(qty).value="";
       document.getElementById(qty).focus();
       return false;
   }
}
  </script>
  <script> 
function Calculation() 
{

var quantity1 = document.getElementById("quantity1");
var qty1 = quantity1.value;

var quantity2 = document.getElementById("quantity2");
var qty2 = quantity2.value;

var quantity3 = document.getElementById("quantity3");
var qty3 = quantity3.value;

var quantity4 = document.getElementById("quantity4");
var qty4 = quantity4.value;

var quantity5 = document.getElementById("quantity5");
var qty5 = quantity5.value;

var quantity6 = document.getElementById("quantity6");
var qty6 = quantity6.value;

var quantity7 = document.getElementById("quantity7");
var qty7 = quantity7.value;

// ROW AMOUNT CALC
var price1 = document.getElementById("price1");
var prc1 = $('#price1').val();

var price2 = document.getElementById("price2");
var prc2 = $('#price2').val();

var price3 = document.getElementById("price3");
var prc3 = $('#price3').val();

var price4 = document.getElementById("price4");
var prc4 = $('#price4').val();

var price5 = document.getElementById("price5");
var prc5 = $('#price5').val();

var price6 = document.getElementById("price6");
var prc6 = $('#price6').val();
var price7 = document.getElementById("price7");
var prc7 = $('#price7').val();
 var datepicker = document.getElementById("datepicker");
var sdate = datepicker.value;
var datepicker2 = document.getElementById("datepicker2");
var edate = datepicker2.value;


var start = $("#datepicker").datepicker("getDate");
var end = $("#datepicker2").datepicker("getDate");

if(start >= end)
   {
       //alert("Select End Date of Booking.");
       //$("#datepicker2").value='';
       $('#datepicker2').val('');
       //$("#datepicker2").focus();


       //$("#datepicker2").datepicker('setDate', null);
       return false;
   }
   
var days = (end - start) / (1000 * 60 * 60 * 24);


$("#rentDuration1").val(days);
$("#rentDuration2").val(days);
$("#rentDuration3").val(days);
$("#rentDuration4").val(days);
$("#rentDuration5").val(days);
$("#rentDuration6").val(days);
$("#rentDuration7").val(days);

var rentDuration1 = document.getElementById("rentDuration1");
var rntDuration1 = $('#rentDuration1').val();

var rentDuration2 = document.getElementById("rentDuration2");
var rntDuration2 = $('#rentDuration2').val();

var rentDuration3 = document.getElementById("rentDuration3");
var rntDuration3 = $('#rentDuration3').val();

var rentDuration4 = document.getElementById("rentDuration4");
var rntDuration4 = $('#rentDuration4').val();

var rentDuration5 = document.getElementById("rentDuration5");
var rntDuration5 = $('#rentDuration5').val();

var rentDuration6 = document.getElementById("rentDuration6");
var rntDuration6 = $('#rentDuration6').val();

var rentDuration7 = document.getElementById("rentDuration7");
var rntDuration7 = $('#rentDuration7').val();



var rowAmount1 = document.getElementById("rowAmount1");
rowAmount1.value = Number(qty1) * Number(prc1) * Number(rntDuration1);
var rowTotalAmt1 = rowAmount1.value;

var rowAmount2 = document.getElementById("rowAmount2");
rowAmount2.value = Number(qty2) * Number(prc2) * Number(rntDuration2);
var rowTotalAmt2 = rowAmount2.value;

var rowAmount3 = document.getElementById("rowAmount3");
rowAmount3.value = Number(qty3) * Number(prc3) * Number(rntDuration3);
var rowTotalAmt3 = rowAmount3.value;

var rowAmount4 = document.getElementById("rowAmount4");
rowAmount4.value = Number(qty4) * Number(prc4) * Number(rntDuration4);
var rowTotalAmt4 = rowAmount4.value;

var rowAmount5 = document.getElementById("rowAmount5");
rowAmount5.value = Number(qty5) * Number(prc5) * Number(rntDuration5);
var rowTotalAmt5 = rowAmount5.value;

var rowAmount6 = document.getElementById("rowAmount6");
rowAmount6.value = Number(qty6) * Number(prc6) * Number(rntDuration6);
var rowTotalAmt6 = rowAmount6.value;

var rowAmount7 = document.getElementById("rowAmount7");
rowAmount7.value = Number(qty7) * Number(prc7) * Number(rntDuration7);
var rowTotalAmt7 = rowAmount7.value;


// FOR ALL ROWS TO GET FINAL AMOUNT
var allRowTotal = document.getElementById("allRowAmount");
allRowAmount.value = Number(rowTotalAmt1) + Number(rowTotalAmt2)+Number(rowTotalAmt3) + Number(rowTotalAmt4)+Number(rowTotalAmt5)+Number(rowTotalAmt6) + Number(rowTotalAmt7);
var finalCst = allRowTotal.value; 



//  Discount Provided
        var discount = document.getElementById("discount");
        var discnt = discount.value;


         //  Discount Obtained Amount Calculated LIKE (Discount Obtained  = finalCst * No. Of % / 100)
        var discountAmount = document.getElementById("discountObtained");
        discountObtained.value = Number(finalCst) * Number(discnt) / 100;
        var disctamt =discountAmount.value;

  //  Cost With Discount Amount Calculated LIKE (Cost With Discount = finalCst -  Discount Obtained)
        var amt_with_discount = document.getElementById("finalamount");
        finalamount.value = Number(finalCst) - Number(disctamt);
        var discounted_total = amt_with_discount.value; 
}
</script>    
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() 
  {
   // $( "#datepicker" ).datepicker();
     $('#datepicker').datepicker({
       startDate: '1d',
      autoclose: true
    })     
    //$( "#datepicker2" ).datepicker();
    $('#datepicker2').datepicker({
       startDate: '+1d',
      autoclose: true
    })
  } );  
</script>
<script>
  function date()
  {
//  var datepicker = document.getElementById("datepicker");
// var sdate = datepicker.value;
// alert(sdate);
// var datepicker2 = document.getElementById("datepicker2");
// var edate = datepicker2.value;
// alert(edate);
// var start = $("#datepicker").datepicker("getDate");
// var end = $("#datepicker2").datepicker("getDate");
// var days = (end - start) / (1000 * 60 * 60 * 24);
// $("#rentDuration").val(days);
//  alert(days);
}
</script>