<?php
/**
 * The "News Extra" template to show post's content
 *
 * Used in the widget Recent News.
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.0
 */
 
$widget_args = get_query_var('trx_addons_args_recent_news');
$style = $widget_args['style'];
$number = $widget_args['number'];
$count = $widget_args['count'];
$columns = $widget_args['columns'];
$featured = $widget_args['featured'];
$post_format = get_post_format();
$post_format = empty($post_format) ? 'standard' : str_replace('post-format-', '', $post_format);
$animation = apply_filters('trx_addons_blog_animation', '');
$post_link = get_permalink();

if ($number==$featured+1 && $number > 1 && $featured < $count && $featured!=$columns-1) {
	?><div class="post_delimiter<?php if ($columns > 1) echo ' '.esc_attr(trx_addons_get_column_class(1, 1)); ?>"></div><?php
}
if ($columns > 1 && !($featured==$columns-1 && $number>$featured+1)) {
	?><div class="<?php echo esc_attr(trx_addons_get_column_class(1, $columns)); ?>"><?php
}
?><article 
	<?php post_class( 'post_item post_layout_'.esc_attr($style)
					.' post_format_'.esc_attr($post_format)
					.' post_accented_'.($number<=$featured ? 'on' : 'off')
					.($featured == $count && $featured > $columns ? ' post_accented_border' : '')
					); ?>
	<?php echo (!empty($animation) ? ' data-animation="'.esc_attr($animation).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}
	
	trx_addons_get_template_part('templates/tpl.featured.php',
								'trx_addons_args_featured',
								apply_filters('trx_addons_filter_args_featured', array(
												'post_info' => '',
												'thumb_size' => trx_addons_get_thumb_size($number<=$featured ? 'big' : 'medium')
												), 'recent_news-extra')
								);

	if ( !in_array($post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php

            if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
                ?><div class="post_meta"><span class="post_date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span><?php
                if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
                    trx_addons_get_template_part('templates/tpl.post-counters.php',
                                                    'trx_addons_args_post_counters',
                                                    array(
                                                        'counters' => 'comments'
                                                    )
                                                );
                }
                ?></div><?php
            }
    		the_title( ($number<=$featured ? '<h5' : '<h6').' class="post_title entry-title"><a href="'.esc_url(get_permalink()).'" rel="bookmark">', '</a>'.($number<=$featured ? '</h5>' : '</h6>') );

            ?><div class="post_content entry-content">
                <?php echo wpautop(get_the_excerpt());?>
            </div><!-- .entry-content -->

            <div class="sc_recent_news_item_button sc_item_button"><a href="<?php echo esc_url($post_link); ?>" class="sc_button sc_button_default"><?php esc_html_e('Read more', 'shaha'); ?></a></div><?php
        ?></div><!-- .entry-header -->
		<?php
	}
?>
</article><?php

if ($columns > 1 && !($featured==$columns-1 && $featured<$number && $number<$count)) {
	?></div><?php
}