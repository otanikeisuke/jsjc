<?php
/*
Template Name: 下層ページ
*/
?>

<?php require_once 'functions.php'; ?>
<!DOCTYPE HTML>
<html lang="ja">
<?php get_header(); ?>
<body id="<?php echo get_post($wp_query->post->ID)->post_name; ?>" class="subpage">
<?php get_template_part('head'); ?>

<!-- ▼container -->
<div class="contents_wrapper">
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<!-- ▼main -->
<div class="main">

	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	the_content();
	endwhile;
	endif;
	?>
<?php get_template_part('contact'); ?>
<?php get_template_part('area'); ?>
</div>       
<!-- ▲main --> 
<!-- ▼aside -->
<?php get_sidebar(); ?>
<!-- ▲aside -->
</div>
<!-- ▲container -->
<!-- ▼footer -->
<?php get_footer(); ?>
<!-- ▲footer -->
<?php wp_footer(); ?>
</body>
</html>