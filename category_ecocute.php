<?php
/*
Template Name: エコキュート商品カテゴリー
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
<figure><img src="<?php bloginfo('template_url'); ?>/images/other/ecocute.png" class="fluid_image tel" alt="オール電化がチャンス"></figure>
<p class="section_head">エコキュート・IHクッキングヒーターのセットはもちろんのこと、床暖房（電気ヒーター）も組み合わせたオール電化にすると驚きの節電効果が発揮します！さらに、太陽光発電による自家発電システムも導入することで「電力自由化」を最大限に活かされます。ご家庭によっては年間光熱費を88％以上も削減されるなど、史上最大級の光熱費削減効果が得られる魅力的な時代へと進んでいます。</p>
	
<p class="ecocute"><a href="https://www.ecocute-nagano.com/"  target="_blank">↓↓ 長野のエコキュート・オール電化なら専門店【エコキュート長野.com】をご覧ください。<img src="<?php bloginfo('template_url'); ?>/images/other/ecocute_banner.png" class="fluid_image tel" alt="長野のエコキュート専門店へ"></a></p>
	
<?php $page_slug = get_post($wp_query->post->ID)->post_name;?>
<?php query_posts('category_name='.$page_slug); ?>
<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
該当記事はありません
<?php endif; ?>

<p class="ecocute"><a href="https://www.ecocute-nagano.com/"  target="_blank">↓↓ 長野のエコキュート・オール電化なら専門店【エコキュート長野.com】をご覧ください。<img src="<?php bloginfo('template_url'); ?>/images/other/ecocute_banner.png" class="fluid_image tel" alt="長野のエコキュート専門店へ"></a></p>
	
<?php /*get_template_part('contact'); */?>
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