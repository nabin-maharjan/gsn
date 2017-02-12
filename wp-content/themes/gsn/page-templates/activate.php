<?php 
/**
 * Template Name: Activate
 *
 * @package GSN
 * @since GSN 1.0
 */
if(!empty($_GET['shop_id']) && !empty($_GET['activate_code'])){
	global $store;
	$activated=$store->activate_store_with_link();	
}
get_header();
?>
  <section>
      <div class="container"> 
    <?php if($activated=="activated"){ ?>    
    	You shop is activated now you can now manage you shop. <br>
        <a class="btn btn-primary" href="<?php echo site_url();?>">Go to website</a>
    <?php }else{ ?>
        Something wrong with activation code. May be this activation code is already been used. 
        <br>
       <a class="btn btn-primary" href="<?php echo site_url();?>">Go to website</a>
    <?php } ?>
    </div>
</section>
<?php get_footer() ?>