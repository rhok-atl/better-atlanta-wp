<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/single.php
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">
        <?php  if (has_post_thumbnail()){the_post_thumbnail( 'full', array( 'class' => 'main-image' ) );} ?> 

	<?php get_template_part( 'loop-header' ); ?>
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
				<?php responsive_entry_top(); ?>
		
                <?php get_template_part( 'post-meta' ); ?>
	<h3>Project Description:</h3>
                <div class="post-entry">
			      


			<?php the_content(__('Read more &#8250;', 'responsive')); ?>
                    
                    <?php if ( get_the_author_meta('description') != '' ) : ?>
                    
                    <div id="author-meta">
                    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                        <div class="about-author"><?php _e('About','responsive'); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta('description') ?></p>
                    </div><!-- end of #author-meta -->
                    
                    <?php endif; // no description, no author's meta ?>
                    
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
                
		<hr>
		<?php 
			global $wp_query;
			$postid = $wp_query->post->ID;
			if ( get_post_meta($postid, 'Problem', true)) { ?><h3>Problem:</h3><p><?php echo get_post_meta($postid, 'Problem', true); ?></p><?php
			} 
		?>
		<hr>
		<?php 
			global $wp_query;
			$postid = $wp_query->post->ID;
			if ( get_post_meta($postid, 'Solution', true)) { ?><h3>Solution:</h3><p><?php echo get_post_meta($postid, 'Problem', true); ?></p><?php
			} 
		?>
		
		<?php 
			global $wp_query;
			$postid = $wp_query->post->ID;
			if ( get_post_meta($postid, 'website', true)) { ?><?php echo get_post_meta($postid, 'website', true); ?><?php
			} 
		?>
		<hr>
		<?php 
			global $wp_query;
			$postid = $wp_query->post->ID;
			if ( get_post_meta($postid, 'dataset', true)) { ?><h3>Dataset(s):</h3><div class="btn"><?php echo get_post_meta($postid, 'dataset', true); ?></div><?php
			} 
		?>
		
                <?php
// Let's find out if we have taxonomy information to display
// Something to build our output in
$taxo_text = "";

// Variables to store each of our possible taxonomy lists
// This one checks for an Operating System classification
$org_list = get_the_term_list( $post->ID, 'organizations', '<h3>Organization(s):</h3> ', ', ', '' );
$people_list = get_the_term_list( $post->ID, 'people', '<h3>Team Member(s):</h3> ', ', ', '' );
$tech_list = get_the_term_list( $post->ID, 'technologies', '<h3>Technology:</h3> ', ', ', '' );

// Add Organizations list if this post was so tagged
if ( '' != $org_list ) {
    $taxo_text .= "$org_list<br />\n";
}
// Add RAM list if this post was so tagged
if ( '' != $people_list ) {
    $taxo_text .= "$people_list<br />\n";
}
// Add HD list if this post was so tagged
if ( '' != $tech_list ) {
    $taxo_text .= "$tech_list<br />\n";
}

// Output taxonomy information if there was any
// NOTE: We won't even open a div if there's nothing to put inside it.
if ( '' != $taxo_text ) {
?>
<div class="entry-utility">
<?php
echo $taxo_text;
?>
</div>
<?
} // endif
?>

<div class="navigation">
			        <div class="previous"><?php previous_post_link( '&#8249; %link' ); ?></div>
                    <div class="next"><?php next_post_link( '%link &#8250;' ); ?></div>
		        </div><!-- end of .navigation -->
                <?php get_template_part( 'post-data' ); ?>
			

				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>            
            
			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
