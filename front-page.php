<?php
/*
Template Name: フロントページ
*/
?>

<?php require_once 'functions.php'; ?>
<!DOCTYPE HTML>
<html lang="ja">
<?php get_header(); ?>
<body id="<?php echo get_post($wp_query->post->ID)->post_name; ?>">
<?php get_template_part('head'); ?>

<!-- ▼キービジュアル-->
<!-- <div class="key_visual_bg">
<div class="kv">
<div class="kv_left">
<ul class="bxslider">
<li class="hover_img"><a href="<?php echo bloginfo('url'); ?>//staff"><img src="<?php bloginfo('template_url'); ?>/images/index/slider00.png" class="fluid_image" alt="長野給湯器交換実績ナンバーワン"></a></li>
<li class="hover_img"><img src="<?php bloginfo('template_url'); ?>/images/index/slider01.png" class="fluid_image tel" alt="長野の給湯器でお困りの方、お急ぎの方‼︎給湯器緊急ダイヤル24時間年中無休受付中！"></li>
<li class="hover_img"><a href="<?php echo bloginfo('url'); ?>/contact"><img src="<?php bloginfo('template_url'); ?>/images/index/slider02.jpg" class="fluid_image" alt="長野ノーリツ石油給湯器キャンペーン"></a></li>
</ul>   
</div>
<ul class="kv_right">
<li>人気メーカー<br>石油・ガス給湯器<br><span class="fcRed"><span class="fs120">長野最安値挑戦</span></span></li> 
<li>お問合せ<br><span class="fs140 fcRed">24</span>時間<span class="fs140 fcRed">受付中!</span><br><span class="fs80">（日曜・祭日定休）</span></li> 
<li><span>・見積り<br>・現地調査<br>・出張</span><p class="fs140 fcRed">無料!</p></li> 
<li>長野県内<br><span class="fs140 fcRed">全域対応!!</span><br><span class="fs80">（状況により応相談）</span></li>  
</ul>
</div>
</div> -->
<!-- ▲キービジュアル --> 

<!-- ▼container -->
<div class="contents_body">
<div class="contents_wrapper"> 

<!-- ▼main -->
<div class="main">

	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	the_content();
	endwhile;
	endif;
	?>	
 <?php get_template_part('area'); ?>	   
 <?php get_template_part('contact'); ?>   

</div>        
<!-- ▲main --> 
<!-- ▼aside -->
<?php get_sidebar(); ?>
<!-- ▲aside -->
</div>
</div>
<!-- ▲container -->
<!-- ▼footer -->
<?php get_footer(); ?>
<!-- ▲footer -->
<?php wp_footer(); ?>
</body>
</html>