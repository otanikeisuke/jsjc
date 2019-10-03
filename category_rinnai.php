<?php
/*
Template Name: リンナイ商品カテゴリー
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
<ul class="maker_navi">
<li><a href="<?php echo bloginfo('url'); ?>/rinnai/rinnai_gas">ガス給湯器</a></li>
<li><a href="<?php echo bloginfo('url'); ?>/rinnai/rinnai_eco">エコジョーズ</a></li>
<li><a href="<?php echo bloginfo('url'); ?>/rinnai/rinnai_icon">マーク説明</a></li>
</ul>
<?php $page_slug = get_post($wp_query->post->ID)->post_name;?>
<?php query_posts('category_name='.$page_slug); ?>
<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
該当記事はありません
<?php endif; ?>
<?php get_template_part('contact'); ?>

</section>
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