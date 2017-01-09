<?php 
global $store;
$store->check_access_store();
//echo "<pre>";
//var_dump($store); die;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head profile="http://www.w3.org/2005/10/profile">
<title>
<?php wp_title(); ?>
</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon"  type="image/ico"  href="<?php echo get_template_directory_uri(); ?>/favicn.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
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
<style>
.btn-submit:hover,
.landing__tab li,
footer {
background:$gray_bg;
}
.product-list-cntr ul.products li.product-list-item .product-info-cntr span.price del,
.woocommerce .single-product-details #content .related.products .product-info-cntr .price del span {
color:$space_gray;
}
.btn-submit,
.dashboard-main-cntr h3,
.top-footer,
.slick-slider .slick-arrow,
.inner-page-cntr .form-top-info,
.woocommerce-checkout h3,
.cart-wrap table.shop_table td.actions,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li::before,
.woocommerce .single-product-details #content .related.products h2,
.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-3d.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-3d.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-3d.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-3d.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar {
background-color:$dark_gray;
}
.custom-file-control,
.custom-file-control::before,
.list-group-item-action,
.list-group-item-action:focus,
.list-group-item-action:hover,
.page__top-desc,
.woocommerce-page .woocommerce-breadcrumb {
color:$dark_gray;
}
.product-list-cntr ul.products li.product-list-item .product-info-cntr span.price del,
.woocommerce .single-product-details #content .related.products .product-info-cntr .price del span {
color:$space_gray;
}
.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar {
background-color:$mid_gray;
}
.entry-content .woocommerce-info a,
.woocommerce .single-product-details #content .product_meta a,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li strong {
color:$mid_gray;
}
.category-lists .children li,
.page-hero,
.item-list-cntr,
.woocommerce-checkout #payment,
.woocommerce-checkout-review-order table.shop_table thead,
.cart-wrap table.shop_table thead {
background-color:$light_gray;
}
.bottom-footer a,
.slider-content span {
color:$light_gray;
}
.wp-editor-container,
.order_status_change_form select,
.cart__prices,
.search-select select,
.search-input input,
.section-divider,
.woocommerce-checkout input,
.woocommerce-checkout textarea,
.woocommerce .single-product-details #content div.product .thumbnails a img,
.woocommerce .single-product-details #content .summary.entry-summary p.stock.in-stock,
.woocommerce .single-product-details #content .woocommerce-tabs .panel .woocommerce-Reviews h3 {
border-color:$light_gray;
}
.products__list-cntr .filter__items,
.orders .order-list-item .order-detail-top,
.orders .order-list-item .order-detail-bottom,
.category-lists li,
.category-lists .children li .children li,
.product-block .product-image {
background-color:$lighter_gray;
}
.orders .order-list-item .order-details-list,
.search-auto-result-cntr ul li {
border-color:$lighter_gray;
}
.woocommerce .single-product-details #content .woocommerce-tabs .panel,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li span {
border-color:$border-gray;
}
.landing__tab li.active,
.dashboard-hamburger:hover span,
.dashboard__nav ul li a::before,
.header-profile-cntr .profile-info:hover,
.header-profile-cntr .profile__links li a:hover,
.summary-cards-cntr .summary__card .summary-info,
.footer-map-cntr,
.back-to-top a,
.cart__icon .cart-indicator,
.cart__buttons a:hover,
.search-button button,
.product-block .label-top.label-sale,
.slick-slider .slick-arrow:hover,
.slider-content .slider-btn a,
.item-list-cntr li a,
.woocommerce-checkout #payment input.button.alt,
.cart-wrap table.shop_table a.remove:hover,
.cart-wrap table.shop_table .button,
.cart-wrap .cart-collaterals a.wc-forward,
.woocommerce .single-product-details #content .summary.entry-summary form.cart button.button.alt,
.woocommerce .single-product-details #content .woocommerce-tabs ul.tabs li,
.woocommerce .single-product-details #content .woocommerce-tabs .panel .form-submit #submit,
.woocommerce .woocommerce-message a {
background-color:$brick_red;
}
.attachment-span i:hover,
.products__list-cntr .product-list-cntr ul.products li.product-list-item .product-info-cntr h4 a:hover,
.category-lists li .toggle-cat-drop:hover,
.category-lists li a:hover,
.category-lists li .toggle-cat-drop.active,
.footer__items a:hover,
.bottom-footer a:hover,
.nav__links li.active,
.nav__links li:hover>a,
.top a:hover,
.cart__icon a:hover,
.search a:hover,
.product-list-cntr ul.products li.product-list-item .product-info-cntr h3 a:hover,
.woocommerce-page .woocommerce-breadcrumb a:hover,
.entry-content .woocommerce-info a:hover,
.cart-wrap table.shop_table a.remove,
.woocommerce .single-product-details #content .product_meta a:hover,
.woocommerce .single-product-details #content .woocommerce-tabs .panel .woocommerce-Reviews label .required,
.woocommerce .single-product-details #content .related.products .product-info-cntr h3 a:hover {
color:$brick_red;
}
.product-block .cart-btn>a:hover {
border-color:$brick_red;
}
.landing__tab li:hover,
.summary-cards-cntr .summary__card .summary-info:after,
.summary-cards-cntr .summary__card.active .summary-info,
.back-to-top a:hover,
.search-button button:hover,
.search-auto-result-cntr ul li:hover,
.product-block .label-top,
.product-block .cart-btn>a:hover,
.slider-content .slider-btn a:hover,
.item-list-cntr li a:hover,
.woocommerce-checkout #payment input.button.alt:hover,
.cart-wrap table.shop_table .button:hover,
.cart-wrap .cart-collaterals a.wc-forward:hover,
.woocommerce .single-product-details #content .summary.entry-summary form.cart button.button.alt:hover,
.woocommerce .single-product-details #content .woocommerce-tabs ul.tabs li.active,
.woocommerce .single-product-details #content .woocommerce-tabs ul.tabs li:hover,
.woocommerce .single-product-details #content .woocommerce-tabs .panel .form-submit #submit:hover,
.woocommerce .woocommerce-message a:hover {
background-color:$petal_green;
}
.woocommerce .woocommerce-message::before {
color:$petal_green;
}
.woocommerce .star-rating a::before,
.woocommerce .star-rating span::before,
.woocommerce .stars a::before,
.woocommerce .stars span::before {
	color: $petal_green;
}
.woocommerce .woocommerce-message {
border-color:$petal_green;
}
.modal-backdrop,
.bottom-footer,
.header__top,
.dropdown__menu,
.mCSB_scrollTools .mCSB_draggerRail,
.mCS-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-dark-2.mCSB_scrollTools .mCSB_draggerRail,
.mCS-dark-2.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-dark-2.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-dark-2.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-dark-2.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-dark-thick.mCSB_scrollTools .mCSB_draggerRail,
.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-dark-thin.mCSB_scrollTools .mCSB_draggerRail,
.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-rounded-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-3d.mCSB_scrollTools .mCSB_draggerRail,
.mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-3d-thick.mCSB_scrollTools .mCSB_draggerContainer,
.mCS-minimal-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-minimal-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-minimal-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-dark-3.mCSB_scrollTools .mCSB_draggerRail,
.mCS-light-3.mCSB_scrollTools .mCSB_draggerRail,
.mCS-dark-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-dark-3.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-dark-3.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-dark-3.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-dark-3.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-2.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-3.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-3-dark.mCSB_scrollTools .mCSB_draggerRail,
.mCS-inset-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCS-inset-3.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
.mCS-inset-3.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
.mCS-inset-3.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar {
background-color:$black;
}
mark,
.close,
.close:focus,
.close:hover,
.category-lists li,
.product-list-cntr ul.products li.product-list-item .product-info-cntr span.price,
.page__top-info h1,
.woocommerce .single-product-details #content .related.products .product-info-cntr .price,
.woocommerce .single-product-details #content .related.products .product-info-cntr .price ins,
header h1,
.datepicker table tr td.today,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today.disabled:hover,
.datepicker table tr td.today:hover,
.datepicker table tr td.today:hover:hover {
color:$black;
}
.btn>.caret,
.dropup>.btn>.caret,
.tag,
.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail {
border-color:$black;
}
 body, .img-thumbnail, .form-control:focus, select.form-control:focus::-ms-value, .has-warning .input-group-addon, .btn-secondary, .btn-secondary.disabled.focus, .btn-secondary.disabled:focus, .btn-secondary.disabled:hover, .btn-secondary:disabled.focus, .btn-secondary:disabled:focus, .btn-secondary:disabled:hover, .dropdown-menu, .custom-select:focus::-ms-value, .custom-file-control, .nav-tabs .nav-item.open .nav-link, .nav-tabs .nav-item.open .nav-link:focus, .nav-tabs .nav-item.open .nav-link:hover, .nav-tabs .nav-link.active, .nav-tabs .nav-link.active:focus, .nav-tabs .nav-link.active:hover, .card, .page-item.disabled .page-link, .page-item.disabled .page-link:focus, .page-item.disabled .page-link:hover, .page-link, .list-group-item, .modal-content, .dashboard-hamburger span, .header__bottom, .toggle__content, .search-auto-result-cntr ul li, .woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li, .woocommerce .single-product-details #content .woocommerce-tabs .panel .woocommerce-Reviews ol .comment-text {
background-color:$white;
}
kbd,
.form-control,
.btn-primary.focus,
.btn-primary:focus,
.btn-primary:hover,
.btn-primary.active,
.btn-primary:active,
.open>.btn-primary.dropdown-toggle,
.btn-primary.active.focus,
.btn-primary.active:focus,
.btn-primary.active:hover,
.btn-primary:active.focus,
.btn-primary:active:focus,
.btn-primary:active:hover,
.open>.btn-primary.dropdown-toggle.focus,
.open>.btn-primary.dropdown-toggle:focus,
.open>.btn-primary.dropdown-toggle:hover,
.btn-info,
.btn-info.focus,
.btn-info:focus,
.btn-info:hover,
.btn-info.active,
.btn-info:active,
.open>.btn-info.dropdown-toggle,
.btn-info.active.focus,
.btn-info.active:focus,
.btn-info.active:hover,
.btn-info:active.focus,
.btn-info:active:focus,
.btn-info:active:hover,
.open>.btn-info.dropdown-toggle.focus,
.open>.btn-info.dropdown-toggle:focus,
.open>.btn-info.dropdown-toggle:hover,
.btn-success,
.btn-success.focus,
.btn-success:focus,
.btn-success:hover,
.btn-success.active,
.btn-success:active,
.open>.btn-success.dropdown-toggle,
.btn-success.active.focus,
.btn-success.active:focus,
.btn-success.active:hover,
.btn-success:active.focus,
.btn-success:active:focus,
.btn-success:active:hover,
.open>.btn-success.dropdown-toggle.focus,
.open>.btn-success.dropdown-toggle:focus,
.open>.btn-success.dropdown-toggle:hover,
.btn-warning,
.btn-warning.focus,
.btn-warning:focus,
.btn-warning:hover,
.btn-warning.active,
.btn-warning:active,
.open>.btn-warning.dropdown-toggle,
.btn-warning.active.focus,
.btn-warning.active:focus,
.btn-warning.active:hover,
.btn-warning:active.focus,
.btn-warning:active:focus,
.btn-warning:active:hover,
.open>.btn-warning.dropdown-toggle.focus,
.open>.btn-warning.dropdown-toggle:focus,
.open>.btn-warning.dropdown-toggle:hover,
.btn-danger,
.btn-danger.focus,
.btn-danger:focus,
.btn-danger:hover,
.btn-danger.active,
.btn-danger:active,
.open>.btn-danger.dropdown-toggle,
.btn-danger.active.focus,
.btn-danger.active:focus,
.btn-danger.active:hover,
.btn-danger:active.focus,
.btn-danger:active:focus,
.btn-danger:active:hover,
.open>.btn-danger.dropdown-toggle.focus,
.open>.btn-danger.dropdown-toggle:focus,
.open>.btn-danger.dropdown-toggle:hover,
.btn-outline-primary.active,
.btn-outline-primary.focus,
.btn-outline-primary:active,
.btn-outline-primary:focus,
.btn-outline-primary:hover,
.open>.btn-outline-primary.dropdown-toggle,
.btn-outline-primary.active.focus,
.btn-outline-primary.active:focus,
.btn-outline-primary.active:hover,
.btn-outline-primary:active.focus,
.btn-outline-primary:active:focus,
.btn-outline-primary:active:hover,
.open>.btn-outline-primary.dropdown-toggle.focus,
.open>.btn-outline-primary.dropdown-toggle:focus,
.open>.btn-outline-primary.dropdown-toggle:hover,
.btn-outline-secondary.active,
.btn-outline-secondary.focus,
.btn-outline-secondary:active,
.btn-outline-secondary:focus,
.btn-outline-secondary:hover,
.open>.btn-outline-secondary.dropdown-toggle,
.btn-outline-secondary.active.focus,
.btn-outline-secondary.active:focus,
.btn-outline-secondary.active:hover,
.btn-outline-secondary:active.focus,
.btn-outline-secondary:active:focus,
.btn-outline-secondary:active:hover,
.open>.btn-outline-secondary.dropdown-toggle.focus,
.open>.btn-outline-secondary.dropdown-toggle:focus,
.open>.btn-outline-secondary.dropdown-toggle:hover,
.btn-outline-secondary.disabled.focus,
.btn-outline-secondary.disabled:focus,
.btn-outline-secondary.disabled:hover,
.btn-outline-secondary:disabled.focus,
.btn-outline-secondary:disabled:focus,
.btn-outline-secondary:disabled:hover,
.btn-outline-info.active,
.btn-outline-info.focus,
.btn-outline-info:active,
.btn-outline-info:focus,
.btn-outline-info:hover,
.open>.btn-outline-info.dropdown-toggle,
.btn-outline-info.active.focus,
.btn-outline-info.active:focus,
.btn-outline-info.active:hover,
.btn-outline-info:active.focus,
.btn-outline-info:active:focus,
.btn-outline-info:active:hover,
.open>.btn-outline-info.dropdown-toggle.focus,
.open>.btn-outline-info.dropdown-toggle:focus,
.open>.btn-outline-info.dropdown-toggle:hover,
.btn-outline-success.active,
.btn-outline-success.focus,
.btn-outline-success:active,
.btn-outline-success:focus,
.btn-outline-success:hover,
.open>.btn-outline-success.dropdown-toggle,
.btn-outline-success.active.focus,
.btn-outline-success.active:focus,
.btn-outline-success.active:hover,
.btn-outline-success:active.focus,
.btn-outline-success:active:focus,
.btn-outline-success:active:hover,
.open>.btn-outline-success.dropdown-toggle.focus,
.open>.btn-outline-success.dropdown-toggle:focus,
.open>.btn-outline-success.dropdown-toggle:hover,
.btn-outline-warning.active,
.btn-outline-warning.focus,
.btn-outline-warning:active,
.btn-outline-warning:focus,
.btn-outline-warning:hover,
.open>.btn-outline-warning.dropdown-toggle,
.btn-outline-warning.active.focus,
.btn-outline-warning.active:focus,
.btn-outline-warning.active:hover,
.btn-outline-warning:active.focus,
.btn-outline-warning:active:focus,
.btn-outline-warning:active:hover,
.open>.btn-outline-warning.dropdown-toggle.focus,
.open>.btn-outline-warning.dropdown-toggle:focus,
.open>.btn-outline-warning.dropdown-toggle:hover,
.btn-outline-danger.active,
.btn-outline-danger.focus,
.btn-outline-danger:active,
.btn-outline-danger:focus,
.btn-outline-danger:hover,
.open>.btn-outline-danger.dropdown-toggle,
.btn-outline-danger.active.focus,
.btn-outline-danger.active:focus,
.btn-outline-danger.active:hover,
.btn-outline-danger:active.focus,
.btn-outline-danger:active:focus,
.btn-outline-danger:active:hover,
.open>.btn-outline-danger.dropdown-toggle.focus,
.open>.btn-outline-danger.dropdown-toggle:focus,
.open>.btn-outline-danger.dropdown-toggle:hover,
.dropdown-item.active,
.dropdown-item.active:focus,
.dropdown-item.active:hover,
.custom-control-input:checked~.custom-control-indicator,
.custom-control-input:active~.custom-control-indicator,
.nav-link.active:focus,
.nav-pills .nav-link.active:hover,
.navbar-toggler:hover,
.card-inverse .card-blockquote,
.card-inverse .card-footer,
.card-inverse .card-header,
.card-inverse .card-title,
.navbar-dark .navbar-nav .active>.nav-link,
.navbar-dark .navbar-nav .active>.nav-link:focus,
.navbar-dark .navbar-nav .active>.nav-link:hover,
.navbar-dark .navbar-nav .nav-link.active,
.navbar-dark .navbar-nav .nav-link.active:focus,
.navbar-dark .navbar-nav .nav-link.active:hover,
.navbar-dark .navbar-nav .nav-link.open,
.navbar-dark .navbar-nav .nav-link.open:focus,
.navbar-dark .navbar-nav .nav-link.open:hover,
.navbar-dark .navbar-nav .open>.nav-link,
.navbar-dark .navbar-nav .open>.nav-link:focus,
.navbar-dark .navbar-nav .open>.nav-link:hover,
.card-inverse .card-link:focus,
.card-inverse .card-link:hover,
.page-item.active .page-link,
.page-item.active .page-link:focus,
.page-item.active .page-link:hover,
.list-group-item.active,
.list-group-item.active:focus,
.list-group-item.active:hover,
a.list-group-item-success.active,
a.list-group-item-success.active:focus,
a.list-group-item-success.active:hover,
button.list-group-item-success.active,
button.list-group-item-success.active:focus,
button.list-group-item-success.active:hover,
a.list-group-item-info.active,
a.list-group-item-info.active:focus,
a.list-group-item-info.active:hover,
button.list-group-item-info.active,
button.list-group-item-info.active:focus,
button.list-group-item-info.active:hover,
a.list-group-item-warning.active,
a.list-group-item-warning.active:focus,
a.list-group-item-warning.active:hover,
button.list-group-item-warning.active,
button.list-group-item-warning.active:focus,
button.list-group-item-warning.active:hover,
a.list-group-item-danger.active,
a.list-group-item-danger.active:focus,
a.list-group-item-danger.active:hover,
button.list-group-item-danger.active,
button.list-group-item-danger.active:focus,
button.list-group-item-danger.active:hover,
.btn-submit,
.landing__tab li a,
#pac-input,
#type-selector,
.dashboard-header,
.dashboard-hamburger span,
.summary-cards-cntr .summary__card .summary-info,
.footer,
.back-to-top a,
.header__top,
.top,
.dropdown__menu,
.cart__icon .cart-indicator,
.cart__buttons a:hover,
.search-auto-result-cntr ul li:hover,
.product-block>.product-image-cntr p,
.product-block .label-top,
.product-block .cart-btn,
.product-block .cart-btn>a,
.product-block .cart-btn>a:hover,
.slick-slider .slick-arrow,
.slider-content,
.inner-page-cntr .form-top-info,
.item-list-cntr li a,
.woocommerce-checkout h3,
.cart-wrap table.shop_table .button,
.cart-wrap .cart-collaterals a.wc-forward,
.woocommerce .single-product-details #content .woocommerce-tabs ul.tabs li,
.woocommerce .single-product-details #content .woocommerce-tabs ul.tabs li a,
.woocommerce .single-product-details #content .woocommerce-tabs .panel .form-submit #submit,
.woocommerce .single-product-details #content .related.products h2,
.woocommerce .woocommerce-message a,
.woocommerce .woocommerce-message a:hover {
color:$white;
}
.dashboard-header,
.dashboard__nav,
.header-profile-cntr .profile__links {
background-color:$dark__gray;
}
.dashboard-header,
.dashboard__nav,
.header-profile-cntr .profile__links {
background-color:$white_smoke;
}
.woocommerce .star-rating a::before,
.woocommerce .star-rating span::before,
.woocommerce .stars a::before,
.woocommerce .stars span::before {
color:$rating_color;
}
</style>
</head>

<body <?php body_class(); ?>>
<?php if(!is_page("Register")){ ?>
<header class="dashboard-header clearfix">
	<div class="dashboard__header-right fr">
		<div class="header-profile-cntr"> <a href="#" class="profile-info"> <i class="fa fa-user"></i> <span><?php echo $store->firstName ." " . $store->lastName;?></span> </a>
			<div class="profile__links">
				<ul>
					<li><a href="#">Your account</a></li>
					<li><a href="#">Account setting</a></li>
					<li><a href="javascript:void(0)"  id="logoutBtn">Log out</a></li>
				</ul>
			</div>
		</div>
		<?php /* if($store->id!=NULL){?>  
        <button type="button" id="logoutBtn" class="btn btn-secondary btn-sm">Logout<i class="fa fa-sign-out" aria-hidden="true"></i></button>
      <?php }  */?>
	</div>
	<!-- /.dashboard__header-right -->
	<div class="dashboard__header-left fl">
		<div class="dashboard-hamburger"> <span></span> </div>
		<h1><a href="<?php echo site_url(); ?>/dashboard">Dashboard</a></h1>
	</div>
	<!-- /.dashboard__header-left -->
	
	<nav class="dashboard__nav" id="dashboard-nav">
		<ul>
			<li> <a href="<?php echo site_url("/dashboard/settings/shop/");?>">
				<div class="dashboard-tooltip"><span>Store Setting</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Store Setting</span> </a> </li>
			<li> <a href="<?php echo site_url("/dashboard/settings/profile/");?>">
				<div class="dashboard-tooltip"><span>Profile Setting</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Profile Setting</span> </a> </li>
			<li> <a href="<?php echo site_url("/dashboard/product/");?>">
				<div class="dashboard-tooltip"><span>Product</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Product</span> </a> </li>
			<li> <a href="<?php echo site_url("/dashboard/order/");?>">
				<div class="dashboard-tooltip"><span>Order</span></div>
				<i class="fa fa-dashboard dashboard-icons"></i> <span class="nav-text">Order</span> </a> </li>
		</ul>
	</nav>
	<!-- /.dashboard__nav -->
	<div class="dashboard-nav-overlay"></div>
	<!-- /.dashboard-nav-overlay -->
	
	<?php /* wp_nav_menu( array( 
    'theme_location' => 'store-header-menu',
    'menu_class' => 'nav navbar-nav nav__links',
    'walker'=>new wp_bootstrap_navwalker ()
     ) ); */ ?>
</header>
<?php } ?>
<!-- /.dashboard-header -->