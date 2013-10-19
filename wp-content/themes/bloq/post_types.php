<?php 
function glg_post_type_portfolio() {

	$labels = array(
        'name' => _x( 'Portfolio items', 'post type general name', 'themelovin' ),
        'singular_name' => _x( 'Portfolio item', 'post type singular name', 'themelovin' ),
        'add_new' => __( 'Add New', 'themelovin' ),
        'add_new_item' => __( 'Add New portfolio item', 'themelovin' ),
        'edit_item' => __( 'Edit portfolio item', 'themelovin' ),
        'new_item' => __( 'New portfolio item', 'themelovin' ),
        'view_item' => __( 'View portfolio item', 'themelovin' ),
        'search_items' => __( 'Search Portfolio items', 'themelovin' ),
        'not_found' =>  __( 'No portfolio items found', 'themelovin' ),
        'not_found_in_trash' => __( 'No portfolio items found in Trash', 'themelovin' ), 
        'parent_item_colon' => ''
    );

	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio','with_front' => FALSE),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail', 'post-formats')
	);
	
	register_post_type( 'portfolio', $args );
	flush_rewrite_rules();
}
add_action( 'init', 'glg_post_type_portfolio', 1 );

function glg_post_type_team() {

	$labels = array(
        'name' => _x( 'Team members', 'post type general name', 'themelovin' ),
        'singular_name' => _x( 'Team member', 'post type singular name', 'themelovin' ),
        'add_new' => __( 'Add New', 'themelovin' ),
        'add_new_item' => __( 'Add New Team member', 'themelovin' ),
        'edit_item' => __( 'Edit Team member', 'themelovin' ),
        'new_item' => __( 'New Team member', 'themelovin' ),
        'view_item' => __( 'View Team member', 'themelovin' ),
        'search_items' => __( 'Search Team members', 'themelovin' ),
        'not_found' =>  __( 'No Team members found', 'themelovin' ),
        'not_found_in_trash' => __( 'No Team members found in Trash', 'themelovin' ), 
        'parent_item_colon' => ''
    );

	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array( 'slug' => 'team','with_front' => FALSE),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','thumbnail')
	);
	
	register_post_type( 'team', $args );
	flush_rewrite_rules();
}
add_action( 'init', 'glg_post_type_team', 1 );

/* Add Custom Taxonomy ----------------------------------------------------------*/
function glg_taxonomy_portfolio_type(){
	
	$labels = array(
        'name' => _x( 'Skills', 'taxonomy general name', 'themelovin' ),
        'singular_name' => _x( 'Skill', 'taxonomy singular name', 'themelovin' ),
        'search_items' =>  __( 'Search skills', 'themelovin' ),
        'popular_items' => __( 'Popular skills', 'themelovin' ),
        'all_items' => __( 'All skills', 'themelovin' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit skill', 'themelovin' ), 
        'update_item' => __( 'Update skill', 'themelovin' ),
        'add_new_item' => __( 'Add New skill', 'themelovin' ),
        'new_item_name' => __( 'New skill Name', 'themelovin' ),
        'separate_items_with_commas' => __( 'Separate skills with commas', 'themelovin' ),
        'add_or_remove_items' => __( 'Add or remove skills', 'themelovin' ),
        'choose_from_most_used' => __( 'Choose from the most used skills', 'themelovin' )
    ); 
	
	register_taxonomy(
		'skill', 
		array('portfolio'), 
		array(
			'hierarchical' => true, 
			'labels' => $labels, 
			'rewrite' => array('slug' => 'skill', 'hierarchical' => true)
		)
	);
	flush_rewrite_rules();
}
add_action( 'init', 'glg_taxonomy_portfolio_type', 1 );

function glg_taxonomy_team_type(){
	
	$labels = array(
        'name' => _x( 'Job positions', 'taxonomy general name', 'themelovin' ),
        'singular_name' => _x( 'Job position', 'taxonomy singular name', 'themelovin' ),
        'search_items' =>  __( 'Search job positions', 'themelovin' ),
        'popular_items' => __( 'Popular job positions', 'themelovin' ),
        'all_items' => __( 'All job positions', 'themelovin' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit job position', 'themelovin' ), 
        'update_item' => __( 'Update job position', 'themelovin' ),
        'add_new_item' => __( 'Add New job position', 'themelovin' ),
        'new_item_name' => __( 'New job position Name', 'themelovin' ),
        'separate_items_with_commas' => __( 'Separate job positions with commas', 'themelovin' ),
        'add_or_remove_items' => __( 'Add or remove job positions', 'themelovin' ),
        'choose_from_most_used' => __( 'Choose from the most used job positions', 'themelovin' )
    ); 
	
	register_taxonomy(
		'job-position', 
		array('team'), 
		array(
			'hierarchical' => true, 
			'labels' => $labels, 
			'rewrite' => array('slug' => 'job-position', 'hierarchical' => true)
		)
	);
	flush_rewrite_rules();
} ?>