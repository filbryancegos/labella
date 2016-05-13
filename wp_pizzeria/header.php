<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<?php global $smof_data,$wp_pizzeria_meta; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-74589515-1', 'auto');
ga('send', 'pageview');
</script>

<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
<link rel="icon" type="image/png" href="<?php echo esc_url($smof_data['favicon_icon']['url']); ?>"/>
<link href="/wp-content/themes/wp_pizzeria/stylesheets/app.css" rel="stylesheet">
<?php endif;
wp_head();
?>
<link href="/wp-content/themes/wp_pizzeria/stylesheets/app.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300italic,100italic,500,500italic,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
</head>
<body <?php body_class(); ?>>
<?php wp_pizzeria_get_page_loading(); ?>
<div id="page" >
	<div id="screen-cover" class=""></div>
	<header id="masthead" class="site-header <?php if(isset($wp_pizzeria_meta->_cms_header) && !empty($wp_pizzeria_meta->_cms_header) && !empty($wp_pizzeria_meta->_cms_header_sticky) ) echo 'page-header-normal'; ?>" >
		<?php wp_pizzeria_header(); ?>
	</header><!-- #masthead -->
    <?php wp_pizzeria_page_title(); ?>
	<div id="main">
