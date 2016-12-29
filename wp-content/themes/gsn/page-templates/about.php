<?php
/**
 * Template Name: About Template
 *
 * @package GSN
 * @since GSN 1.0
 */
get_header();
global $gsnSettingsClass;
$gsn_settings=$gsnSettingsClass->get();
?>
<main class="main main-content">
	<section class="page-top">
    <div class="container">
		<?php echo apply_filters('the_content',$gsn_settings->aboutStore); ?>
	</div>
</section>
</main>
<?php get_footer(); ?>