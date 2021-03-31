<?php get_header(); ?>
<div class="row">
	<div class="small-12 columns">
		<a class="not-found" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/404.png"></a>
		<h5><?php _e('404: Page Not Found','foundation'); ?></h5>
		<h1><?php _e('Keep on looking...','foundation'); ?></h1> <!--Change inner text-->
		<p><?php printf(__('Double check the URL or head back to the <a href="%1s">HOMEPAGE</a>','foundation'), get_bloginfo('url')); ?></p><!--Change inner text-->
	</div>
</div>
<?php get_footer(); ?>


