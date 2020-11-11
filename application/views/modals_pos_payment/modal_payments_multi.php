<div class="modal fade" id="multiple-payments-modal">
  
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Payments</h4>
      </div>
      <div class="modal-body">
        
    <div class="row">
      <!-- LEFT HAND -->
      <div class="col-md-5">
        <div>

        <?php 
          $atleast_one_payments = 'true';
          if(isset($sales_id) && $sales_id!='') { //For Save Operation or for new entry

          $q22=$this->db->query("select payment,payment_type,payment_note from db_salespayments where sales_id='$sales_id'");
       if($q22->num_rows()>0){
        $atleast_one_payments = 'false';
        $i=0;
        foreach ($q22->result() as $res22) {
          $i++;
      ?>   
            <div class="col-md-12  payments_div">
            <div class="box box-solid bg-gray">
              <div class="box-body">
                <div class="row">
           
                  <div class="col-md-6">
                    <div class="" >
                    <label style="display:none"  for="amount_<?= $i;?>">Amount</label>
                      <input type="text" class="form-control text-right payment only_currency" value='<?= $res22->payment;?>' id="amount_<?= $i;?>" name="amount_<?= $i;?>" placeholder="" onkeyup="calculate_payments()">
                        <span id="amount_<?= $i;?>_msg" style="display:none" class="text-danger"></span>
                  </div>
                 </div>
                  <div class="col-md-6">
                    <div class="">
                      <label style="display:none"  for="payment_type_<?= $i;?>">Payment Type</label>
                      <select class="form-control" id='payment_type_<?= $i;?>' name="payment_type_<?= $i;?>">
                        <?php
                          $q1=$this->db->query("select * from db_paymenttypes where status=1");
                           if($q1->num_rows()>0){
                               foreach($q1->result() as $res1){
                                $selected=($res22->payment_type==$res1->payment_type) ? 'selected' : '';
                               echo "<option $selected value='".$res1->payment_type."'>".$res1->payment_type ."</option>";
                             }
                           }
                           else{
                              echo "No Records Found";
                           }
                          ?>
                      </select>
                      <span id="payment_type_<?= $i;?>_msg" style="display:none" class="text-danger"></span>
                    </div>
                  </div>
              <div class="clearfix"></div>
          </div>  
          <div class="row" style="display:none">
                 <div class="col-md-12">
                    <div class="">
                      <label for="payment_note_<?= $i;?>">Payment Note</label>
                      <textarea type="text" class="form-control" id="payment_note_<?= $i;?>" name="payment_note_<?= $i;?>" placeholder="" ><?= $res22->payment_note;?></textarea>
                      <span id="payment_note_<?= $i;?>_msg" style="display:none" class="text-danger"></span>
                    </div>
                 </div>
                  
              <div class="clearfix"></div>
          </div>   
          </div>
          </div>
        </div><!-- col-md-12 -->
        <?php } //foreach() ?>

         <input type="hidden" data-var='inside_forech' name="payment_row_count" id='payment_row_count' value="<?= $i;?>">
         
      <?php } //num_rows if() 
            else{
              $atleast_one_payments ='true';
            }
      ?>
         
    <?php 
     } 
     if($atleast_one_payments=='true'){ ?>
        <input type="hidden" data-var='inside_else' name="payment_row_count" id='payment_row_count' value="1">
        <div class="col-md-12  payments_div">
          <div class="box box-solid bg-gray">
            <div class="box-body">
              <div class="row">
         
                <div class="col-md-6">
                  <div class="">
                  <label style="display:none" for="amount_1">Amount</label>
                    <input type="text" class="form-control text-right payment" id="amount_1" name="amount_1" placeholder="" onkeyup="calculate_payments()">
                      <span id="amount_1_msg" style="display:none" class="text-danger"></span>
                </div>
               </div>
                <div class="col-md-6">
                  <div class="">
                    <label for="payment_type_1">Payment Type</label>
                    <select class="form-control" id='payment_type_1' name="payment_type_1">
                      <?php
                        $q1=$this->db->query("select * from db_paymenttypes where status=1");
                         if($q1->num_rows()>0){
                             foreach($q1->result() as $res1){
                             echo "<option value='".$res1->payment_type."'>".$res1->payment_type ."</option>";
                           }
                         }
                         else{
                            echo "No Records Found";
                         }
                        ?>
                    </select>
                    <span id="payment_type_1_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
            <div class="clearfix"></div>
        </div>  
        <div class="row d-none" style="display:none">
               <div class="col-md-12">
                  <div class="">
                    <label for="payment_note_1">Payment Note</label>
                    <textarea type="text" class="form-control" id="payment_note_1" name="payment_note_1" placeholder="" ></textarea>
                    <span id="payment_note_1_msg" style="display:none" class="text-danger"></span>
                  </div>
               </div>
                
            <div class="clearfix"></div>
            
        </div>  
        
        <div class="row">
            <div class="col-md-12">
            <table border="1" width="100%" class="box box-solid bg-blue"> 
        <tr> 
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('1')" id="don5" don="1">1</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('2')"  id="don5" don="2">2</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('3')"  id="don5" don="3">3</a>
</div></td> 
<td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('+')" id="don60" don="+">+</a>
</div></td>            
         </tr> 
<tr> 
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('4')" id="don5" don="4">4</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('5')" id="don5" don="5">5</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" onclick="dis('6')" id="don5" don="6">6</a>
</div></td> 
        <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don60" onclick="dis('-')"  don="-">-</a>
</div></td>   
         </tr> 

         <tr> 
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don5" onclick="dis('7')"  don="7">7</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don5" onclick="dis('8')" don="8">8</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don5" onclick="dis('9')" don="9">9</a>
</div></td> 
             <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don60" onclick="dis('*')" don="*">*</a>
</div></td>  
         </tr> 
        <tr> 
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don5" onclick="dis('.')"  don=".">.</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don5" onclick="dis('0')" don="0">0</a>
</div></td> 
            <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don5" onclick="solve()" don="=">=</a>
</div></td> 
         <td><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don605" onclick="dis('/')"  don="/">/</a>
</div></td>    
         </tr> 
         <tr> 
            <!-- create button and assign value to each button -->
            <!-- dis("1") will call function dis to display value -->
            
         <td colspan="4"><div class="col-md-12 border-custom-bottom">
<a style="color:#fff;cursor:pointer" class="col-md-12 donamnt_cal  text-bold text-center text-white" id="don605" onclick="clr()"  don="C">Clear</a>
</div></td>    
         </tr> 
      </table> 
        </div>
       </div> 
        
        
        
        
        
        
        
        </div>
        </div>
      </div><!-- col-md-12 -->
    <?php } ?>

    </div>
      


      <div class="row">
              <div class="col-md-12">
              <div class="col-md-12">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-block" id="add_payment_row">Add Payment Row</button>
              </div>
              </div>
            </div>
            </div>
      </div><!-- col-md-9 -->
     <div class="col-md-3">
         
<div class="box box-solid bg-blue">
               <?php
              $CI =& get_instance();
               ?>
              <div class="box-body">
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center" id="don1" don='1'><?= $CI->currency();?>1</a>
                    
                  </div>
                </div>
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center text-white" id="don2" don="2"><?= $CI->currency();?>2</a>
                    
                  </div>
                </div>
                <!--  -->
               
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center text-white" id="don5" don='5'><?= $CI->currency();?>5</a>
                    
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center text-white" id="don10" don="10"><?= $CI->currency();?>10</a>
                    
                  </div>
                </div>
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center" id="don20" don='20'><?= $CI->currency();?>20</a>
                    
                  </div>
                </div>
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center text-white" id="don50" don='50'><?= $CI->currency();?>50</a>
                    
                  </div>
                </div>
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12 donamnt  text-bold text-center text-white" id="don100" don='100'><?= $CI->currency();?>100</a>
                    
                  </div>
                </div>
                
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <a style="color:#fff;cursor:pointer" class="col-md-12  donamnt  text-bold text-center text-white" id="donclear" don='c'>Clear</a>
                    
                  </div>
                </div>
                <!--  -->
                                      
              </div>
                    <!-- /.box-body -->
                  </div>
     </div>         

      <!-- RIGHT HAND -->
      <div class="col-md-4">

        
        

        <div class="col-md-12">

          <div class="box box-solid bg-blue">
              <div class="box-body">
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <span class="col-md-6 text-right text-bold ">Total Items:</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_qty">0.00</span>
                  </div>
                </div>

                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <span class="col-md-6 text-right text-bold ">Total:</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_amt">0.00</span>
                  </div>
                </div>
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <span class="col-md-6 text-right text-bold ">Discount(-):</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_discount">0.00</span>
                  </div>
                </div>
                <!--  -->
                <div class="row bg-red">
                  <div class="col-md-12 border-custom-bottom">
                    <span class="col-md-6 text-right text-bold ">Total Payable:</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_payble">0.00</span>
                  </div>
                </div>
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <span class="col-md-6 text-right text-bold ">Total Paying:</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_paid">0.00</span>
                  </div>
                </div>
                <!--  -->
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 border-custom-bottom">
                    <span class="col-md-6 text-right text-bold ">Balance:</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_tot_balance">0.00</span>
                  </div>
                </div>
                <!--  -->
                <div class="row ">
                  <div class="col-md-12 bg-orange">
                    <span class="col-md-6 text-right text-bold ">Change Return:</span>
                    <span class="col-md-6 text-right text-bold  custom-font-size sales_div_change_return">0.00</span>
                  </div>
                </div>
                <!--  -->
                                      
              </div>
                    <!-- /.box-body -->
                  </div>
        </div>
      </div>
    </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Back</button>
        <button style="display:none" type="button" class="btn bg-maroon btn-lg make_sale btn-lg" onclick="save()"><i class="fa  fa-save "></i> Save</button>
        <button type="button" class="btn btn-success btn-lg make_sale btn-lg" onclick="save(true)"><i class="fa  fa-print "></i> Enter</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>