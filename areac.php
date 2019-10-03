※長野県どこでも24時間対応いたします！
<?php
$postslist = get_posts('numberposts=1&category=11');
//$postslistにget_postsで取得したデータを入れる
foreach ($postslist as $post) : setup_postdata($post);
//foreach文で繰り返し出力する
?> 
<?php the_content(); ?></a>

<?php endforeach; ?>