<?php 
	global $store, $gsnSettingsClass;
	$gsn_settings=$gsnSettingsClass->get();
	$selected_theme=$gsn_settings->selected_theme;
	$theme_setting=get_post_meta($selected_theme);
	$header_background_color=array_shift($theme_setting['header_background_color']);
	$footer_background_color=array_shift($theme_setting['footer_background_color']);
	$top_footer_background_color=array_shift($theme_setting['top_footer_background_color']);
	$primary_color=array_shift($theme_setting['primary_color']);
	$seconday_color=array_shift($theme_setting['seconday_color']);
	$font_color=array_shift($theme_setting['font_color']);
	$light_color=array_shift($theme_setting['light_color']);
	$lighter_color=array_shift($theme_setting['lighter_color']);
?>
<noscript>
	
	<?php var_dump($gsn_settings); ?>
</noscript>
<style>
.btn-submit:hover,
.landing__tab li,
footer {
background:<?php echo  $footer_background_color;?>;
}
.product-list-cntr ul.products li.product-list-item .product-info-cntr span.price del,
.woocommerce .single-product-details #content .related.products .product-info-cntr .price del span {
color:<?php echo $light_color;?>;
}
.btn-submit,
.dashboard-main-cntr h3,
.top-footer,
.slick-slider .slick-arrow,
.inner-page-cntr .form-top-info,
.woocommerce-checkout h3,
.cart-wrap table.shop_table td.actions,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li::before,
.woocommerce .single-product-details #content .related.products h2 {
background-color:<?php echo $top_footer_background_color;?>;
}
.custom-file-control,
.custom-file-control::before,
.list-group-item-action,
.list-group-item-action:focus,
.list-group-item-action:hover,
.page__top-desc,
.woocommerce-page .woocommerce-breadcrumb {
color:<?php echo $top_footer_background_color;?>;
}
.product-list-cntr ul.products li.product-list-item .product-info-cntr span.price del,
.woocommerce .single-product-details #content .related.products .product-info-cntr .price del span {
color:<?php echo $light_color;?>;
}
.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar {
background-color:<?php echo $light_color;?>;
}
.entry-content .woocommerce-info a,
.woocommerce .single-product-details #content .product_meta a,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li strong {
color:<?php echo $light_color;?>;
}
.category-lists .children li,
.page-hero,
.item-list-cntr,
.woocommerce-checkout #payment,
.woocommerce-checkout-review-order table.shop_table thead,
.cart-wrap table.shop_table thead {
background-color:<?php echo $light_color; ?>;
}
.bottom-footer a,
.slider-content span {
color:<?php echo $light_color; ?>;
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
border-color:<?php echo $light_color; ?>;
}
.products__list-cntr .filter__items,
.orders .order-list-item .order-detail-top,
.orders .order-list-item .order-detail-bottom,
.category-lists li,
.category-lists .children li .children li,
.product-block .product-image {
background-color:<?php echo $lighter_color;?>;
}
.orders .order-list-item .order-details-list,
.search-auto-result-cntr ul li {
border-color:<?php echo $lighter_color;?>;
}
.woocommerce .single-product-details #content .woocommerce-tabs .panel,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li,
.woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li span {
border-color:<?php echo $light_color;?>;
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
.woocommerce .woocommerce-message a, .btn-primary{
background-color:<?php echo $primary_color;?>;
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
color:<?php echo $primary_color;?>;
}
.product-block .cart-btn>a:hover {
border-color:<?php echo $primary_color;?>;
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
.woocommerce .woocommerce-message a:hover, .btn-primary:hover {
background-color:<?php echo $seconday_color;?>;
}
.woocommerce .woocommerce-message::before {
color:<?php echo $seconday_color;?>;
}
.woocommerce .star-rating a::before,
.woocommerce .star-rating span::before,
.woocommerce .stars a::before,
.woocommerce .stars span::before {
	color: #ffae00
}
.woocommerce .woocommerce-message {
border-color:<?php echo $seconday_color;?>;
}
.modal-backdrop,
.bottom-footer,
.header__top,
.dropdown__menu {
background-color:<?php echo $footer_background_color;?>;
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
color:<?php echo $footer_background_color;?>;
}
.btn>.caret,
.dropup>.btn>.caret,
.tag {
border-color:<?php echo $footer_background_color;?>;
}
 body, .img-thumbnail, .form-control:focus, select.form-control:focus::-ms-value, .has-warning .input-group-addon, .btn-secondary, .btn-secondary.disabled.focus, .btn-secondary.disabled:focus, .btn-secondary.disabled:hover, .btn-secondary:disabled.focus, .btn-secondary:disabled:focus, .btn-secondary:disabled:hover, .dropdown-menu, .custom-select:focus::-ms-value, .custom-file-control, .nav-tabs .nav-item.open .nav-link, .nav-tabs .nav-item.open .nav-link:focus, .nav-tabs .nav-item.open .nav-link:hover, .nav-tabs .nav-link.active, .nav-tabs .nav-link.active:focus, .nav-tabs .nav-link.active:hover, .card, .page-item.disabled .page-link, .page-item.disabled .page-link:focus, .page-item.disabled .page-link:hover, .page-link, .list-group-item, .modal-content, .dashboard-hamburger span, .header__bottom, .toggle__content, .search-auto-result-cntr ul li, .woocommerce .single-product-details #content .woocommerce-tabs .panel ul.specification-list li, .woocommerce .single-product-details #content .woocommerce-tabs .panel .woocommerce-Reviews ol .comment-text {
background-color:$white;
}
kbd,
/*.form-control,*/
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
color:<?php echo $header_background_color;?>;
}
.dashboard-header,
.dashboard__nav,
.header-profile-cntr .profile__links {
background-color:<?php echo $footer_background_color;?>;
}
.dashboard-header,
.dashboard__nav,
.header-profile-cntr .profile__links {
color:<?php echo $lighter_color;?>;
}
</style>