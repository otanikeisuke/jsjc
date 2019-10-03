<?php require_once 'functions.php'; ?>
<!DOCTYPE HTML>
<html lang="ja">
<?php get_header(); ?>
<body id="<?php echo get_post($wp_query->post->ID)->post_name; ?>">
<?php get_template_part('head'); ?>

<!-- ▼container -->
<div class="contents_wrapper">
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>
<!-- ▼main -->
<div class="main">
	<section class="case">
	<?php if (have_posts()) : while (have_posts()) : the_post(''); ?>
	<h2><?php the_title(); ?></h2>
	<p class="post-date"><?php echo get_the_date(); ?></p>
		<?php if($post->post_content=="") : ?>
		<!-- the_contentが空だった場合  -->
		<?php else : ?>
		<div class="case_txt">
			<?php the_content(); ?>
		</div><!-- //.case_txt -->
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>
	
	<div class="before">
		<?php $ccc = get_post_meta($post->ID, 'before_img_1', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('before_img_1') ) { ?>
					<?php $imgid = get_field('before_img_1');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
		
		<?php $ccc = get_post_meta($post->ID, 'before_img_2', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('before_img_2') ) { ?>
					<?php $imgid = get_field('before_img_2');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
		
		<?php $ccc = get_post_meta($post->ID, 'before_img_3', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('before_img_3') ) { ?>
					<?php $imgid = get_field('before_img_3');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
		
		<?php $ccc = get_post_meta($post->ID, 'before_img_4', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('before_img_4') ) { ?>
					<?php $imgid = get_field('before_img_4');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
		
		<?php $ccc = get_post_meta($post->ID, 'before_img_5', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('before_img_5') ) { ?>
					<?php $imgid = get_field('before_img_5');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
	</div><!-- //.before -->
	
	<div class="after">
	<?php $ccc = get_post_meta($post->ID, 'after_img_1', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('after_img_1') ) { ?>
					<?php $imgid = get_field('after_img_1');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
	<?php $ccc = get_post_meta($post->ID, 'after_img_2', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('after_img_2') ) { ?>
					<?php $imgid = get_field('after_img_2');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
	<?php $ccc = get_post_meta($post->ID, 'after_img_3', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('after_img_3') ) { ?>
					<?php $imgid = get_field('after_img_3');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
	<?php $ccc = get_post_meta($post->ID, 'after_img_4', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('after_img_4') ) { ?>
					<?php $imgid = get_field('after_img_4');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
		<?php $ccc = get_post_meta($post->ID, 'after_img_5', true);?>
					<!-- empty -->
					<?php if(empty($ccc)):?>
					<!-- 入力がある場合に表示する内容 -->
					<?php else:?>
		<figure>
					<?php if( get_field('after_img_5') ) { ?>
					<?php $imgid = get_field('after_img_5');
													$img = wp_get_attachment_image_src( $imgid , 'full' ); ?>
					<img src="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>" alt="<?php the_title_attribute(); ?>">
					<?php } ?>
			</figure>
					<?php endif;?>
	</div><!-- //.before -->
		
			
			<!-- ページナビ -->
			<div class="navigation">
				<?php if( get_previous_post() ): ?>
				<div class="alignleft"><?php previous_post_link('%link', '前へ'); ?></div>
				<?php endif; if( get_next_post() ): ?>
				<div class="alignright"><?php next_post_link('%link', '次へ'); ?></div>
				<?php endif; ?>
			</div>
			<!-- //ページナビ -->
		
		<!-- 一覧へ戻る -->
		<div class="back">
			<a href="/case/">交換工事例一覧に戻る</a>
		</div>
			<!-- //.back -->
		
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
