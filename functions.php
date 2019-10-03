<?php
add_theme_support('post-thumbnails');
add_image_size('case_image', 400, 300 ,true );
add_filter('wp_calculate_image_srcset_meta', '__return_null'); // imgソースを整理

//固定ページではビジュアルエディタを利用できないようにする
function disable_visual_editor_in_page(){
	global $typenow;
	if( $typenow == 'page' ){
	add_filter('user_can_richedit', 'disable_visual_editor_filter');
	}
}
function disable_visual_editor_filter(){
	return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );

//HTML内の画像パスを変更する
function replaceImagePath($arg) {
	$content = str_replace('"images/', '"' . get_bloginfo('template_directory') . '/images/', $arg);
	return $content;
}
add_action('the_content', 'replaceImagePath');

//ショートコードを使ったphpファイルの呼び出し方法
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');



//******************************************************
// 2018.9交換工事例のカスタム登校タイプを設置
//******************************************************

// カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {

register_post_type( 'case', // 投稿タイプ名の定義
	array(
	'labels'=> array(
		'name' => __( '交換工事例' ), // 表示する投稿タイプ名
		'singular_name' => __( 'case' ),
		'add_new_item' => __( '交換工事例の新規投稿' ),
					),
	'public' => true,
	'menu_position' =>5,
	'supports' => array('title','editor','thumbnail'),
	'rewrite' => array('slug' => 'case'),
	)
				 );
	}

// カスタム投稿タイプのパーマリンクを投稿idにする
add_action('init', 'myposttype_rewrite');
function myposttype_rewrite() {
    global $wp_rewrite;
	
		// その他投稿
    $queryarg = 'post_type=case&p=';
    $wp_rewrite->add_rewrite_tag('%case_id%', '([^/]+)',$queryarg);
    $wp_rewrite->add_permastruct('case', '/case/%case_id%', false);
	}

add_filter('post_type_link', 'myposttype_permalink', 1, 3);
function myposttype_permalink($post_link, $id = 0, $leavename) {
    global $wp_rewrite;
    $post = &get_post($id);
    if ( is_wp_error( $post ) )
        return $post;
    $newlink = $wp_rewrite->get_extra_permastruct($post->post_type);
    $newlink = str_replace('%'.$post->post_type.'_id%', $post->ID, $newlink);
    $newlink = home_url(user_trailingslashit($newlink));
    return $newlink;
}
add_filter( 'enter_title_here', 'custom_enter_title_here', 10, 2 );
function custom_enter_title_here( $enter_title_here, $post ) {
    $post_type = get_post_type_object( $post->post_type );
    if ( isset( $post_type->labels->enter_title_here ) && $post_type->labels->enter_title_here && is_string( $post_type->labels->enter_title_here ) ) {
        $enter_title_here = esc_html( $post_type->labels->enter_title_here );
    }
    return $enter_title_here;
}

// 投稿一覧にサムネイルカラム追加
function customize_manage_posts_columns($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}
add_filter( 'manage_posts_columns', 'customize_manage_posts_columns' );
 
//投稿一覧にサムネイル画像表示
function customize_manage_posts_custom_column($column_name, $post_id) {
    if ( 'thumbnail' == $column_name) {
        $thum = get_the_post_thumbnail($post_id, 'small', array( 'style'=>'width:100px;height:auto;' ));
    } if ( isset($thum) && $thum ) {
        echo $thum;
    } else {
        echo __('None');
    }
}
add_action( 'manage_posts_custom_column', 'customize_manage_posts_custom_column', 10, 2 );

// Wordpress投稿画面のタイトル文字数をカウントする
function count_title_characters() {?>
<script type="text/javascript">
jQuery(document).ready(function($){
    //全角を1、半角を0.5として数える
    function count_zen_han_characters(str) {
      len = 0;
      str = escape(str);
      for (i=0;i<str.length;i++,len++) {
        if (str.charAt(i) == "%") {
          if (str.charAt(++i) == "u") {
            i += 3;
            len++;
          }
          i++;
        }
      }
      return len / 2;
    }

  //in_selの文字数をカウントしてout_selに出力する
  function count_characters(in_sel, out_sel) {
    $(out_sel).html( count_zen_han_characters($(in_sel).val()) );
  }

  //ページ表示に表示エリアを出力
  $('#titlewrap').after('<div style="position:absolute;top:-24px;right:0;color:#666;background-color:#f7f7f7;padding:1px 2px;border-radius:5px;border:1px solid #ccc;">文字数<span class="wp-title-count" style="margin-left:5px;">0</span></div>');

  //ページ表示時に数える
  count_characters('#title', '.wp-title-count');

  //入力フォーム変更時に数える
  $('#title').bind("keydown keyup keypress change",function(){
    count_characters('#title', '.wp-title-count');
  });

});
</script><?php
}
add_action( 'admin_head-post-new.php', 'count_title_characters' );
add_action( 'admin_head-post.php', 'count_title_characters' );

?>