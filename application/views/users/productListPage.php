<!DOCTYPE html>
<html lang="en">
    <head>
         <?php
include_once'header.php';
?>
   <style>
       .cart-sucess, .cart-failure{
    z-index: 100789;
    position: fixed;
    top: 0px;
    color: #fff;
    width: 40% !important;
    background: #fff !important;
    top: 50% !important;
    left: 50% !important;
    -webkit-transform: translate(-50%,-50%) !important;
    -ms-transform: translate(-50%,-50%) !important;
    transform: translate(-50%,-50%) !important;
    padding: 10px;
       }
       @media only screen and (max-device-width: 760px) and (min-device-width: 320px){
           .mobile-align-bottom{
               align-items: flex-end !important;
           }
           .cart-sucess, .cart-failure{
                 width: 90% !important;  
           }
       }
   </style>   
    </head>
    <body>
      
        <div id="fb-root"></div>
        <section class="abt-banner p-0">
          
            <div class="container h-100">
                <div class="row m-0 h-100 justify-content-center align-items-center mobile-align-bottom">
                    <div class="col-md-12 text-center">
                       
                        <h2 class="heading-inner-page"> Explore Menu</h2>
                        <h6 class="heading-inner-page-sub"> Choose our Menu option to order</h6>
                    </div>
                </div>
            </div> 
        </section>
        <section id="product-list-grid">
            <div class="container">
                <div class="row ">
                    <div class="col-md-3 ">
                        <div class="menu-category-box">
                            <h4 class="cat-heading">Categories</h4>
                            <ul class="mneu-list-product">
                                <?php
                                                                foreach($category_menu as $category_menu_row ){
                                                                ?>
                                <li><a href="javascript:void(0)" class="spicy_cat" catId="<?php echo $category_menu_row['id']; ?>"><?php echo $category_menu_row['category_name']; ?></a></li>
                                <?php
                                                                }
                                                                ?>
                            </ul>
                        </div>
                        <!--    <div class="menu-category-box">
<h4 class="cat-heading mb-4">Price</h4>

</div>-->
                    </div>
                    <div class="col-md-9 ">
                        <div class="product-lader" style="display:none"><div class="loader-inside"><div class="item">
                                <div class="spinner1"></div>
                                <h5>Loading<span class="dot">.</span></h5>
                                </div>
                                <h6>Please Wait.products  are loading</h6>
                                </div>
                            </div>
                        <div class="row mbm-0 allcategory_products" style="min-height:500px;">
                            
                            
                             <?php
                                $CI = & get_instance(); 
                                $CI->load->model('items_model','items');
                                $item=$CI->items->item_list_rand1(); 
                                $i=0;
                                foreach($item as  $row_item){
                                $i++;  
                                 if($row_item->item_image=='' || $row_item->item_image=='null' || $row_item->item_image=='NULL'){
                                    $imgsrc='uploads/items/noimage.png';
                                }else{
                                     $imgsrc=$row_item->item_image;
                                }
                                 $itemimage =base_url().$imgsrc;
								 
								 $cartId = $this->session->userdata('CART_TEMP_RANDOM')!=""?$this->session->userdata('CART_TEMP_RANDOM'):'';
                                 $cardProductId = $row_item->id;
                                 $dataCart=(" * FROM grocery_cart WHERE product_id='$cardProductId'  AND session_cart_id='$cartId'");
                                 $CI->db->select($dataCart);
                                $query = $CI->db->get();
                                if($query->num_rows() > 0){
                                $cardRow=$query->result_array();
                                $selectBoxDisplay="";
                                $cardHide="cardHide";
                                $product_quantity = $cardRow[0]['product_quantity'];
                                
                                }else{
                                $selectBoxDisplay="hideSelect ";
                                $cardHide="";
                                $product_quantity=0;
                                
                                }
                                if($this->session->userdata('select_order_type')!=""){
                                if($this->session->userdata('select_order_type')==1){
                                $saleprice=$row_item->price3;
                                }else if($this->session->userdata('select_order_type')==2){
                                $saleprice=$row_item->price4;
                                }else if($this->session->userdata('select_order_type')==3){
                                $saleprice=$row_item->price2;
                                }else{
                                $saleprice=$row_item->price3;
                                }
                                }else{
                                $saleprice=$row_item->price3;
                                }
                                


                                ?> 
                            
                            
                            
                            
                            
                            
                            <div class="col-md-4 mb5" style="margin-bottom:5px">
                                  <input type="hidden" class="cat_id_<?php echo $row_item->id; ?>" value="<?php echo $row_item->category_id; ?>">
                                     <input type="hidden" class="sub_cat_id_<?php echo $row_item->id; ?>" value="<?php echo $row_item->category_id; ?>">
                                     <input type="hidden" class="pro_name_<?php echo $row_item->id; ?>" value="<?php echo $row_item->item_name; ?>">
    							     <input type="hidden" class="get_pr_price_<?php echo $row_item->id; ?>" value="<?php echo $row_item->unit_name; ?>,<?php echo $saleprice; ?>,<?php echo $row_item->id; ?>">
                                <div class="product-box">
                                    <div class="product_sale d-none">
                                        <p>On Sale</p>
                                    </div>
                                    <div class="product-img">
                                        <span class="product-offer-discount d-none">30%</span>
                                        <img src="<?php echo $itemimage ?>" class="img-fluid" />
                                    </div>
                                    <h3 class="product-title text-truncate"><?php echo ucwords(strtolower($row_item->item_name)); ?></h3>
                                    <?php
                                    $CI =& get_instance();
                                    ?>
                                    <h5 class="price-user"><?= $CI->currency(app_number_format($saleprice)); ?><span class="strike d-none"><?= $CI->currency(app_number_format($saleprice)); ?></span></h5>
                                    <p class="option-ava text-center d-none">&nbsp;<span>Option available</span></p>
                                    <div class="text-center">
                                        <div class="row justify-content-center" >
                                    <div class="col-8 col-md-8 col-sm-8 col-sx-8" >
                                    <div  class="<?php echo $selectBoxDisplay; ?> buttonCart_<?php echo $row_item->id; ?>">
                                    
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <a onClick="show_cart_option(<?php echo $row_item->id; ?>,1)" class="btn btn-secondary btn-number btn-cartplus"  data-type="minus" data-field="quant[2]">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                        </a>
                                        </span>
                                        <input type="text" name="quant[2]"    class="input-number form-control qtyBox1 product_quantity_<?php echo $row_item->id; ?>" value="<?php echo $product_quantity; ?>" min="0" style="height:32px;text-align:center;outline:none;border:none;" readonly="readonly">
                                        <span class="input-group-btn">
                                        <a onClick="show_cart_option(<?php echo $row_item->id; ?>,0)"  class="btn btn-secondary btn-number btn-cartminus" data-type="plus" data-field="quant[2]">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                        </span>
                                    </div>
                                    
                                    </div>
                                    <div class="input-group justify-content-center">
                                        <button style="text-align:center;position:relative"    type="button"  class="<?php echo $cardHide; ?> addtocart  buttonAdd_<?php echo $row_item->id; ?>" onClick="show_cart(<?php echo $row_item->id; ?>,0)"> Add To Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                                    </div>										
                                    
                                    
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <?php
include_once'footer.php';
?>
 
        <!-- The Product Modal -->
        <div class="modal fade" id="myModalmodifier">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Product Details -->
                    <div class="modal-body ">
                      <div class="modal-body p-2">
<div class="productDetailModal">



</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      
    </body>
</html>
