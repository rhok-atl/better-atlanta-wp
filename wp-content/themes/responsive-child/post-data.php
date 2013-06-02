<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Post Data Template-Part File
 *
 * @file           post-data.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/post-data.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
?>

<?php if ( ! is_page() && ! is_search() ) { ?>

	<div class="post-data">
		<?php 
			global $wp_query;
			$postid = $wp_query->post->ID;
			if ( get_post_meta($postid, 'Github', true)) { ?><a href="<?php echo get_post_meta($postid, 'Github', true); ?>"><strong>Github repo</strong></a><br/><?php
			} 
		?>
		
		<?php the_tags(__('Tags:', 'responsive') . ' ', ', ', '&nbsp; &#124; &nbsp;'); ?> 
		<?php printf(__('Posted in %s', 'responsive'), get_the_category_list(', ')); ?> 
	</div><!-- end of .post-data --> 
 
<?php } ?>           

<div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>  