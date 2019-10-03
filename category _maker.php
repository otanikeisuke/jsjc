<?php
/*
Template Name: メーカーカテゴリー
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
<section>
<h2><?php the_title(); ?></h2>
<?php
$parentId = get_post($wp_query->post->ID)->post_name;
$get_page_id = get_page_by_path("$parentId");
$get_page_id = $get_page_id->ID;
$my_pages = get_posts(array(
	'post_type' => 'page',
	'posts_per_page' => '-1',
	'post_parent' => $get_page_id,
	'orderby' => 'menu_order',
	'order' => 'ASC'
));
?>
<ul class="maker_all">
<?php if($my_pages):
	foreach ($my_pages as $post):
		setup_postdata($post);
?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endforeach;
wp_reset_postdata();
endif; ?>
</ul>


</section>
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