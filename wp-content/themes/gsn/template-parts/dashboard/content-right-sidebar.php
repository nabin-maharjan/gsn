<?php 
	global $store;
	global $gsnSettingsClass;
$packages=$gsnSettingsClass->store_packages();

$selected_package="normal";
if(!empty($store->storePackage)){
	$selected_package=$store->storePackage;
}

?>
   <div class="dashboard__info-content">
    <?php /*?><h3>Plans &amp; Limits</h3><?php */?>
    <div class="plan__user">
      <h5>Your current plan is <span><?php echo $selected_package; ?></span></h5>
      <div class="plan-info--user">
       <?php 
			  $package_product=get_option($selected_package.'_package_product');
			  $package_product_image=get_option($selected_package.'_package_product_image');
			  $package_sale_product=get_option($selected_package.'_package_sale_product');
			  $package_gsn_ad=get_option($selected_package.'_package_gsn_ad');
			  $package_theme_number=get_option($selected_package.'_package_theme_number');
			  $package_gsn_feature_shop=get_option($selected_package.'_package_gsn_feature_shop');
	?>
        <ul>
          <li>Products: <span><?php echo $package_product; ?> </span> </li>
            <li>Product image: <span><?php echo $package_product_image; ?> </span> </li>
            <li>Sale Product: <span><?php echo $package_sale_product; ?> </span> </li>
            <li>Ads: <span><?php echo $package_gsn_ad; ?> </span> </li>
            <li>Theme number: <span><?php echo $package_theme_number; ?> </span> </li>
            <li>Featured shop: <span><?php echo $package_gsn_feature_shop; ?> </span> </li>
        </ul>
      </div>
      <?php if($selected_package!=="platinum"){ ?>
		<div class="user__upgrade--btn"><a href="#" class="btn  btn-primary">Upgrade your plan!</a></div>
	<?php } ?>
		
      
    </div>
    <!-- /.plan__user -->
    <?php /*?>
    <div class="plan__upgrade-wrapper">
      <h5>Upgrade your plan to:</h5>
      <?php foreach($packages as $package){
			  $package_product=get_option($package['slug'].'_package_product');
			  $package_product_image=get_option($package['slug'].'_package_product_image');
			  $package_sale_product=get_option($package['slug'].'_package_sale_product');
			  $package_gsn_ad=get_option($package['slug'].'_package_gsn_ad');
			  $package_theme_number=get_option($package['slug'].'_package_theme_number');
			  $package_gsn_feature_shop=get_option($package['slug'].'_package_gsn_feature_shop');
	?>
      <div class="plan__upgrade plan--basic">
        <h5><a href="#"><?php echo ucfirst($package['slug']); ?></a></h5>
        <div class="plan-info--user">
          <ul>
            <li><span><?php echo $package_product; ?> </span> Products</li>
            <li><span><?php echo $package_product_image; ?> </span> Product image.</li>
            <li><span><?php echo $package_sale_product; ?> </span> Sale Product</li>
            <li><span><?php echo $package_gsn_ad; ?> </span> Ads</li>
            <li><span><?php echo $package_theme_number; ?> </span> Theme number</li>
            <li><span><?php echo $package_gsn_feature_shop; ?> </span> Featured shop</li>
          </ul>
        </div>
      </div>
      <!-- /.plan__upgrade.plan -->
      <?php } ?>

    </div><?php */?>
  </div>