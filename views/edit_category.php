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
              <h3 class="box-title">category</h3>                  
            </div>
            
            <p><div class="form-group">
                    <div class="col-sm-1" style="float: right;">                      
                      <a href="<?php echo base_url('category/categories/');?>"><button class="btn btn-block btn-primary" type="button" name="Back">Back</button></a>
                    </div>
                  </div>
                </p>
                <br>
            <!-- /.box-header -->
            <!-- form start -->
            <form name ="categoryForm" class="form-horizontal" action="<?php echo base_url('category/editcategory/'.base64_encode($result->category_id));?>" method="post">                    
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Super category Name</label>
                    <div class="col-sm-7">
                     <select class="form-control" name="supercategoryName"> 
                                <option >Select Super Category</option>
                               <?php 
                               foreach ($super_category_result as $value) 
                            {
                            ?>
                                <option value="<?php echo $value->super_category_name;?>" 
                                <?php if($value->super_category_name == $result->super_category_name)
                                {?>selected<?php } ?>><?php echo $value->super_category_name;?></option>
                                <?php
                                }
                                ?>
                               </select>
                          <span style="color:red"><?php echo form_error('supercategoryName');?></span>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">category Name</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Enter category Name" value="<?php echo $result->category_name?>">
                      <span style="color:red"><?php echo form_error('categoryName');?></span>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">category Description</label>
                    <div class="col-sm-7">
                      <textarea name="categoryDescription" id="categoryDescription" rows="10" cols="80">
                        <?php echo $result->category_description; ?>
                          
                      </textarea>
                       <span style="color:red"><?php echo form_error('categoryDescription');?></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-2 control-label"></div>
                    <div class="col-sm-3">
                  <button type="submit" name="categoryUpdate" value="UPDATE" class="btn btn-block btn-primary">Update</button> 

                  </div>
                  <div class="col-sm-3">                      
                      <button class="btn btn-block btn-primary" type="reset" value="Clear">Reset</button>
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
