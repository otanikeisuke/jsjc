<?php 
/*
Template Name: エコキュート‗大谷テスト
*/
?>

<?php 
$args = array(
'post_type' => 'post',
'category_name' => 'ecocute',
'posts_per_page' => -1,
);
$the_query = new WP_Query( $args );
while ( $the_query->have_posts() ) : $the_query->the_post();
?>
 	
<article class="article-list">
  <!--記事へのリンクを出力-->
  <a href="<?php the_permalink(); ?>">
  <!--サムネイル(アイキャッチ)画像を出力-->
    <?php
    if( has_post_thumbnail()){
      the_post_thumbnail('medium');
    }
    ?>
    <div class="text">
      <!--投稿のタイトルを出力-->
      <h2><?php the_title(); ?></h2>
      <!--投稿のカテゴリを一つだけ出力-->
      <?php if( has_category() ){ ?>
        <span class="cat-data">
          <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
        </span>
      <?php } ?>
      <!--抜粋欄に記述した内容を出力-->
      <?php the_excerpt(); ?>
    </div><!-- end text -->
  </a>
</article><!-- end article-list -->
 
<?php endwhile; wp_reset_postdata(); ?>
