<?php 
global $store;
global $gsnCart;
global $gsnSettingsClass;
global $gsnProduct;
$storeProducts=$gsnProduct->get_new_product_list(-1);
$gsnSettings=$gsnSettingsClass->get($store->user_id);
$store->check_access_store();
$logo_img=array_shift(wp_get_attachment_image_src($gsnSettings->logo,"full"));
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" <?php  if(is_singular('product')) { ?>itemtype="http://schema.org/Product" <?php } ?>>
<head profile="http://www.w3.org/2005/10/profile">
 <?php  if(!is_singular('product')) { ?>
	<title><?php echo $store->storeName; ?></title>
	<?php } ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">    
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon"  type="image/ico"  href="<?php echo get_template_directory_uri(); ?>/favicn.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    
   <?php  if(is_singular('product')) { 
        $current_product=wc_get_product(get_the_ID());
   ?>

    <!-- Place this data between the <head> tags of your website -->
    <title><?php echo get_the_title();?></title>
    <meta name="description" content="<?php echo strip_tags(get_the_excerpt());?>" />
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo get_the_title();?>">
    <meta itemprop="description" content="<?php echo strip_tags(get_the_excerpt());?>">
    <meta itemprop="image" content="<?php the_post_thumbnail_url( 'medium' ); ?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@<?php echo $store->domainName;?>">
    <meta name="twitter:title" content="<?php echo get_the_title();?>">
    <meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt());?>">
    <meta name="twitter:creator" content="@<?php echo $store->firstName;?>_<?php echo $store->lastName;?>">
    <meta name="twitter:image" content="<?php the_post_thumbnail_url( 'medium' ); ?>">
    <meta name="twitter:data1" content="<?php echo $current_product->get_price();?>">
    <meta name="twitter:label1" content="Price">
    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo get_the_title();?>" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?php the_permalink();?>" />
    <meta property="og:image" content="<?php the_post_thumbnail_url( 'medium' ); ?>" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt());?>" />
    <meta property="og:site_name" content="<?php echo $store->storeName;?>" />
    <meta property="og:price:amount" content="<?php echo $current_product->get_price();?>" />
    <meta property="og:price:currency" content="<?php echo get_woocommerce_currency(); ?>" />
    <!--meta property="og:retailer_item_id" content="<?php echo get_the_ID(); ?>" /-->
    <meta property="og:availability" content="instock" />
    <meta property="og:condition" content="new" />
    <?php 
	$cate =  get_the_terms( get_the_ID(), 'product_cat' );
		$parent = get_term_by('id', $cate[0]->term_id, 'product_cat');
            // climb up the hierarchy until we reach a term with parent = '0'
            $term_parent[] = $parent->name;
		
            if (isset($parent->parent) && sizeof($parent->parent) > 0) {
                while ($parent->parent != '0') {
                    $parent = get_term_by('id', $parent->parent, 'product_cat');
					if($parent->parent!=0){					
						$term_parent[] = $parent->name;
					}
                }
                $term_parent = array_reverse($term_parent);
			}
                ?>
    <meta property="og:category" content="<?php echo implode(' > ',$term_parent) ?>" />
    
    
     <?php }  ?>
	<script>
        var ajaxUrl="<?php echo admin_url( 'admin-ajax.php' ); ?>";
        var location_Lat=0;
		var location_Lan=0;
        <?php if($store->id!=NULL){?>
       	 location_Lat=<?php echo $store->latitute;?>;
		 location_Lan=<?php echo $store->lognitute; ?>;
       <?php } ?>
    </script>
    <?php wp_head(); ?>
    <?php get_template_part( 'template-parts/header/header','style');   ?>
    <script>
	
	<?php global $gsnProduct;
	 $storeProducts=$gsnProduct->get_all_store_product(-1); 
	 ?>
	
  $( function() {
    var projects = [
	<?php while( $storeProducts->have_posts() ) : $storeProducts->the_post(); 
		$post_thumnail_url="";
		if(has_post_thumbnail(get_the_ID())){
				$post_thumbnail_id = get_post_thumbnail_id( get_the_ID());
				$post_thumnail_url=get_the_post_thumbnail_url(get_the_ID(), 'thumbnail' );
			}
	?>
      {
        value: "<?php the_title();?>",
        label: "<?php the_title();?>",
        img: "<?php echo $post_thumnail_url;?>",
        link: "<?php the_permalink();?>"
      },
	   <?php wp_reset_postdata(); endwhile; ?>

    ];
	$('#search-parent').on('change',function(){
		var cat_id=jQuery(this).val();
     jQuery('ul.autocomple-search').html('');
		var data= {action: "gsn_filtered_product_list", cat_id : cat_id};
		  var response=ajax_call_post(data,'','',function(response){
			  projects=response.list;
			 return false;
		 },function(){
			  auto_complete(projects);
			  jQuery('#product_search').val('');
		 });
	})
	
	
	
	function auto_complete($projects){
		 $( "#product_search" ).autocomplete({
		  minLength: 0,
      position: { my : "right top", at: "right bottom" },
		  source: projects,
		  focus: function( event, ui ) {
		  	$( "#product_search" ).val( ui.item.label );
		  	return false;
		  },
		  select: function( event, ui ) {
		  	window.location.href=ui.item.link;
		  },
      response: function(event, ui) {
        if (!ui.content.length) {
            jQuery('ul.autocomple-search').html('<li class="no-result">No result found.</li>')
        }else{
            jQuery('ul.autocomple-search').html('');
        }
    }
		})
		.autocomplete( "instance" )._renderItem = function( ul, item ) {
		  return $( "<li>" ).addClass('autocomplete-item')
		  .data('link',item.link)
			.append( "<div class=\"autocomplete-search-item clearfix\"><img src='"+item.img+"' width='50'><span>" + item.label + "</span></div>" )
			.appendTo(jQuery('ul.autocomple-search'));
		};
    // if($('.autocomple-search').length > 0) {
    //   $('.autocomple-search').mCustomScrollbar();
    // }	
	}
	auto_complete(projects);
	jQuery(document).on('click','.autocomple-search li.autocomplete-item',function(){
		window.location.href=jQuery(this).data('link');
	})
  });
  </script>
</head>
<body <?php body_class(); ?>>
  <header class="header gsn-header">
    <div class="header__top desktop">
      <div class="container">
        <div class="row">
          <div class="top top-icons clearfix p15">
            <div class="top__left-icons fl">
              <ul>
                <li><a href="tel:<?php echo $store->mobileNumber;?>"><i class="fa fa-phone"></i> <?php echo $store->mobileNumber;?></a></li>
                <li><i class="fa fa-map-marker"></i><?php echo $store->storeFullAddress;?></li>
              </ul>
            </div>
            <!-- /.top__left-icons -->
            <!--div class="top__right-icons fr">
              <ul>
                <li><a href="#"><i class="fa fa-sign-in"></i> Login</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i> Register</a></li>
              </ul>
            </div-->
            <!-- /.top__right-icons -->
          </div>
          <!-- /.top-icons -->
        </div>
      </div>
    </div>
    <!-- /.header__top -->
    <div class="header__bottom clearfix">
      <div class="container">
        <div class="row">
          <div class="col-md-3 header__logo">
            <h1 class="logo">
              <a href="<?php echo site_url();?>">
                <div class="logo__image" style="background-image: url(<?php echo $logo_img; ?>);"></div>
                <img src="<?php echo $logo_img; ?>" alt="<?php echo $store->storeName;?>">
              </a>
            </h1>
          </div>
          <!-- /.header__logo -->
          <div class="col-md-9 header__main-items">
            <div class="item__nav fl">
              <div class="navbar-toggle nav__mobile-trigger mobile theme-hamburger">
                <a id="hamburger-icon" class="hamburger-icon theme__hamburger--icon" href="#" title="Menu">
                  <span class="line line-1"></span>
                  <span class="line line-2"></span>
                  <span class="line line-3"></span>
                </a>
              </div>
              <nav class="main-nav" id="theme-main-nav">
                <?php wp_nav_menu( array( 
          				'theme_location' => 'store-header-menu',
          				'menu_class' => 'nav navbar-nav nav__links',
          				'walker' => new Wp_Bootstrap_Navwalker ()
          				 ) ); 
                ?>
              </nav>
            </div>
            <!-- /.item__nav -->            
            <div class="item__cart fr">
              <div class="cart cart-cntr">
                <div class="cart__icon">                
               	<?php $cart_count = WC()->cart->cart_contents_count;?>
                  <a href="#"><i class="fa fa-shopping-cart"></i><span class="cart-indicator"><?php echo $cart_count;?></span></a>
                </div>                
                <div class="cart__content toggle__content">
                  <div class="cart__block">
                    <div class="cart__list-cntr">
                      <ul class="cart__list"><?php echo $gsnCart->get_cart_list_html();?></ul>
                      <!-- /.cart__list -->
                      <p class="cart__no-products hidden">No Products</p>
                      <div class="cart__prices">
                       <!-- <div class="cart-price price-shipping clearfix">
                          <span class="price shipping__cost">
                            $5.00
                          </span>
                          <span>Shipping</span>
                        </div> -->
                        <div class="cart-price price-total clearfix">
                          <span class="price total__cost"><?php echo get_woocommerce_currency_symbol();?> <?php echo WC()->cart->cart_contents_total;?></span>
                          <span>Total</span>
                        </div>
                      </div>
                      <!-- /.cart__prices -->
                      <div class="cart__buttons clearfix">
                      <a href="<?php echo site_url("/cart/");?>" class="btn btn-submit red-btn checkout-btn">Cart</a>
                        <a href="<?php echo site_url("/checkout/");?>" class="btn btn-submit red-btn checkout-btn">Checkout</a>
                      </div>
                    </div>
                  </div>
                  <!-- /.cart__block -->  
                </div>
                <!-- /.cart__content -->
              </div>
            </div>
            <!-- /.item-cart -->
            <div class="item__search fr">
              <div class="search search-cntr">
                <div class="search-icon">
                  <a href="#"><i class="fa fa-search"></i></a>
                </div>
                <div class="search__content toggle__content">
                  <div class="search__block">
                    <form action="" type="search" name="search" class="clearfix">
                      <div class="search-select fl">                        
                        <?php 
						$storeParentCatName=$store->storeName." ". $store->user_id;
						$storeParentCat=get_term_by( 'name',$storeParentCatName ,'product_cat');
						
						 ?>          
                        <?php 
							if($storeParentCat){
							  $args = array(
								'hierarchical' => 1,
								'child_of' =>$storeParentCat->term_id,
								'taxonomy'     => 'product_cat',
								'hide_empty' => true,
								'name'               => 'search-parent',
								'id'                 => 'search-parent',
								'class'              => 'form-control form-control-sm',
								'show_option_none'    => 'Select Category'
							  );                  
							  wp_dropdown_categories( $args );  
							}
                        ?>
                      </div>
                      <div class="search-input fl">
                        <input type="text" placeholder="Search product" id="product_search" class="form-control form-control-sm">
                      </div>
                      <div class="search-auto-result-cntr">                        
                        <ul class="autocomple-search"></ul>
                      </div>
                      <!-- /.search-auto-result-cntr -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.item-search -->
          </div>
          <!-- /.header__main-items -->
        </div>
      </div>
    </div>
    <!-- /.header__bottom -->
  </header>
  <!-- /.header -->