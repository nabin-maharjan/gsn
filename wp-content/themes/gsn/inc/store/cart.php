<?php
/*
Class GsnCart

*/
class GsnCart{
	public function __construct(){
		//add ajax function for make product feature
		add_action( 'wp_ajax_gsn_remove_item_from_cart', array($this,'remove_item_from_cart') );
		add_action( 'wp_ajax_nopriv_gsn_remove_item_from_cart', array($this,'remove_item_from_cart') );
		
		// filter to update header cart when remove item from cart
		add_filter( 'woocommerce_add_to_cart_fragments', array($this,'woocommerce_header_add_to_cart_fragment') );
		
		//add filter payment gateway 
		add_filter( 'woocommerce_available_payment_gateways', 'gsn_payment_gateway_edit');
	}
	
	
	
	/**
 * Only show Cash on Delivery for checkout, and only Stripe for order-pay
 *
 * @param   array   $available_gateways    an array of the enabled gateways
 * @return  array                          the processed array of enabled gateways
 */
function gsn_payment_gateway_edit($available_gateways) {
    global $woocommerce;
    $endpoint = $woocommerce->query->get_current_endpoint();
unset($available_gateways['esewa']);
    if ($endpoint == 'order-pay') {
        unset($available_gateways['esewa']);
    }
    return $available_gateways;
}

	
	
	
	
	
	/*
	* Function to get formated html for cart list
	*/
	public function get_cart_list_html(){
		
		global $woocommerce;
    	$items = $woocommerce->cart->get_cart();
		$html="";
		if(count($items)>0){		
			foreach($items as $item => $values) { 
			 $_product = $values['data']->post;
			$getProductDetail = wc_get_product( $values['product_id'] );
			$price = get_post_meta($values['product_id'] , '_price', true);
			 $html.="<li class=\"cart-item clearfix\">";
				  $html.="<a href=\"".get_the_permalink($values['product_id'])."\" class=\"cart-image\">".$getProductDetail->get_image(array( 70, 90 ))."</a>";
				  $html.="<div class=\"cart-product-info\">";
					$html.="<div class=\"product__name\">";
					  $html.="<span class=\"product__quantity\">";
						$html.="<span class=\"quantity\">".$values['quantity']."</span>X";
					  $html.="</span>";
					 $html.=" <a href=\"".get_the_permalink($values['product_id'])."\">".$_product->post_title."</a>";
					$html.="</div>";
					$html.="<div class=\"product__attributes\">";
					 $html.=" <a href=\"#\">Price: </a>";
					  $html.="<span class=\"product__price\">".get_woocommerce_currency_symbol()." ".$price."</span>";
					$html.="</div>";
				  $html.="</div>";
				  $html.="<div class=\"cart-product-remove\">";
					$html.="<a href=\"#\" class=\"remove-link\" data-cart-item-key=\"".$item."\">";
					 $html.=" <i class=\"fa fa-trash-o\"></i>";
					$html.="</a>";
				 $html.=" </div>";
				$html.="</li>";
			}
		}else{
			 $html.="<li class=\"cart-item clearfix\">Sorry! cart is empty :( :(</li>";
		}
		return $html;
		
	}
	/*
	*Function to remove item form cart
	*/
	public function remove_item_from_cart(){
		$response= array();
		try{
			if(!empty($_POST['item_key'])){
				WC()->cart->remove_cart_item($_POST['item_key']);
			}
			$response['status']="success";
			$response['code']='200';
			$response['item_html']=$this->get_cart_list_html();
			$response['cart_total']=get_woocommerce_currency_symbol()." ".WC()->cart->cart_contents_total;
			$response['qty']=WC()->cart->cart_contents_count;
		}catch(Exception $e){
			$response['status']="error";
			$response['code']=$e->getCode();
			$response['msg']=$e->getMessage();
		}
		echo json_encode($response);die();
	}
	
	/*
	* Ensure cart contents update when products are added to the cart via AJAX 
	*/

public function woocommerce_header_add_to_cart_fragment( $fragments ) {
	$fragments['ul.cart__list'] ="<ul class=\"cart__list\">".$this->get_cart_list_html()."</ul>";
	$fragments['span.price.total__cost'] = "<span class=\"price total__cost\">".get_woocommerce_currency_symbol()." ".WC()->cart->cart_contents_total."</span>";
	$fragments['span.cart-indicator'] = "<span class=\"cart-indicator\">".WC()->cart->cart_contents_count."</span>";
	return $fragments;
}
	
}
global $gsnCart;
$gsnCart =new gsnCart();