<?php /*
Template Name: PostsByTag
*/ ?>

<?php get_header(); ?>

<div id="content">
<div id="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
		<br/>
		<?php the_content(); ?>
	<?php endwhile; else: endif; ?>
	
	<?php posts_by_tag(get_the_title(), $options);
	query_posts('category_name='.get_the_title().'&post_status=publish,future');?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<p><?php the_content(); ?></p><br/>
	<?php endwhile; else: endif; ?>

</div>
</div>

<?php get_footer(); ?>