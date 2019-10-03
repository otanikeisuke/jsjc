<?php
/*
Template Name: 交換工事例用テンプレート
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
    <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>
<!-- ▼main -->
<div class="main">
	<section class="caselist">
		<h2><?php echo get_the_title(); ?></h2>
	<ul>
	<?php /* 投稿タイプ（case）を表示 */ ?>
	<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1 ; //ページの判定
$args =	array(
		'posts_per_page'   => 20, //表示件数
		'orderby'          => 'date', //ソートの基準
		'order'            => 'DESC', //DESC降順　ASC昇順
		'post_type'        => 'case', //投稿タイプ名postは通常の投稿
		'post_status'      => 'publish', //公開状態
		'caller_get_posts' => 1, //取得した記事の何番目から表示するか
		'paged'            =>  $paged //ページネーションに必要
);
$wp_query = new WP_Query($args);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

		<li>
			<div class="sub_box">
				<p class="post-date"><?php echo get_the_date(); ?></p>
				<!-- ページが存在する場合の指定 -->
				<div class="image">
					<!-- アイキャッチ呼び出し -->
					<?php if(get_the_post_thumbnail( $id )): //アイキャッチがある場合 ?>
					<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $id,'case_image', array('title' => get_the_title(), 'alt' => get_the_title())); ?></a>
					<?php else: //アイキャッチがない場合 ?>
					<?php endif; ?>
				</div><!-- //.image -->
				<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
				<a href="<?php the_permalink(); ?>" class="btn">詳細はこちら</a>
			</div><!-- //.sub_box -->
		</li>
		<?php endwhile; ?>
		</ul>
		
		
		<!-- ページネーション -->
		<div class="page_navigation">
	<?php
  global $wp_rewrite;
  $paginate_base = get_pagenum_link(1);
  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
  $paginate_format = '';
  $paginate_base = add_query_arg('paged','%#%');
  }
  else{
  $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
  user_trailingslashit('page/%#%/','paged');;
  $paginate_base .= '%_%';
  }
  echo paginate_links(array(
  'base' => $paginate_base,
  'format' => $paginate_format,
  'total' => $wp_query->max_num_pages,
  'type'  => 'list', //ul liで出力
  'mid_size' => 1, //カレントページの前後
  'end_size' => 0,
  'current' => ($paged ? $paged : 1),
  'prev_text' => '＜',
  'next_text' => '＞',
  ));
  ?>
			</div><!-- //.page_navigation -->
		<!-- //ページネーション -->
		
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