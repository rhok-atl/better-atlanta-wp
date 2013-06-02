<?php

if ( function_exists( 'add_theme_support' ) )
	add_theme_support('post-thumbnails');



// Register Custom Taxonomy
function custom_taxonomy()  {
	$labels = array(
		'name'                       => _x( 'People', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'People', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Person', 'text_domain' ),
		'all_items'                  => __( 'All People', 'text_domain' ),
		'parent_item'                => __( 'Parent Genre', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'text_domain' ),
		'new_item_name'              => __( 'New Person', 'text_domain' ),
		'add_new_item'               => __( 'Add New Person', 'text_domain' ),
		'edit_item'                  => __( 'Edit Person', 'text_domain' ),
		'update_item'                => __( 'Update Person', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate people with commas', 'text_domain' ),
		'search_items'               => __( 'Search people', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove people', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used people', 'text_domain' ),
	);

	$rewrite = array(
		'slug'                       => 'person',
		'with_front'                 => true,
		'hierarchical'               => true,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'person',
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'people', 'post', $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );

function organization_init() {
	// create a new taxonomy
	register_taxonomy(
		'organizations',
		'post',
		array(
			'label' => __( 'Organizations' ),
			'rewrite' => array( 'slug' => 'organization' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'organization_init' );

function technology_init() {
	// create a new taxonomy
	register_taxonomy(
		'technologies',
		'post',
		array(
			'label' => __( 'Technologies' ),
			'rewrite' => array( 'slug' => 'technology' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'technology_init' );

function timeline_init() {
	// create a new taxonomy
	register_taxonomy(
		'timeline',
		'post',
		array(
			'label' => __( 'Timeline' ),
			'rewrite' => array( 'slug' => 'stage' ),
			'hierarchical' => false
		)
	);
}
add_action( 'init', 'timeline_init' );


function topic_init() {
	// create a new taxonomy
	register_taxonomy(
		'topics',
		'post',
		array(
			'label' => __( 'Topics' ),
			'rewrite' => array( 'slug' => 'topic' ),
			'hierarchical' => true
		)
	);
}
add_action( 'init', 'topic_init' );


function responsive_post_meta_data() {
	printf( __( '<span class="%1$s">Initiated: </span>%2$s', 'responsive' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="../%3$s/?post_type" title="%3$s" rel="bookmark"><span class="timestamp updated">%3$s</span></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_html( get_the_date() )
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
		esc_attr( get_the_author() )
		)
	);
}

add_action('after_setup_theme','adjust_responsive_wp_title');

function adjust_responsive_wp_title() {
	remove_filter( 'wp_title', 'responsive_wp_title', 10, 2 );
	add_filter( 'wp_title', 'responsive_wp_title', 10, 2 );
}

function responsive_wp_title( $title, $sep ) {
	global $paged, $page;
/*your wp_title code here*/
	$title = $title . " Research | OneBusAway";
	return $title;
}
?>

<?php
add_action('init', 'my_custom_init');
function my_custom_init() {
	add_post_type_support( 'page', 'excerpt' );
}
?>