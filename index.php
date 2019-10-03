<?php
/*
Template Name: インディックスページ
*/
?>

<?php require_once 'functions.php'; ?>
<!DOCTYPE HTML>
<html lang="ja">
<?php get_header(); ?>
<body id="<?php echo get_post($wp_query->post->ID)->post_name; ?>">
<?php get_template_part('head'); ?>

<!-- ▼container -->
<div class="contents_wrapper"> 

<!-- ▼main -->
<div class="main">
<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
<section>
<h2>NOT FOUND</h2>
<p>	
 該当のページはありません<br><br><br><br><br><br><br><br></p><br><br><br><br>
</section>
<?php endif; ?>       
</div>        
<!-- ▲main --> 
<!-- ▼aside -->
<!-- ▲aside -->
</div>
<!-- ▲container -->
<!-- ▼footer -->
<?php get_footer(); ?>
<!-- ▲footer -->

</body>
</html>