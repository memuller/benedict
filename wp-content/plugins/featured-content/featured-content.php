<?php
/*
Plugin Name: Featured Content
Plugin URI: http://wordpress.org/plugins/wp-featured-content/
Description: Allows users to spotlight their posts and have them uniquely displayed by a theme.
Version: 1.0
Author: The WordPress Team
Author URI: http://wordpress.org/
License: GNU General Public License v2 or later
*/

/**
 * Things to test:
 * 
 * Creating / Deleting
 * 1. Add a post with featured area(s), make sure featured item(s) are created
 * 2. Trash the post, delete permanently, make sure featured item(s) are deleted
 * 3. Featured item should not have a title when created, it should inherit from
 *   the parent post when empty - view in list tables to verify
 * 4. If a featured item's title is edited, it should show that in the list table,
 *	  unless it is empty
 * 5. Add a post with a featured area, item is created. Edit post to belong to a 
 *	   featured area, 2nd featured item should be created.
 * 6. Delete one of the featured items, the other should remain, the post should
 *     be linked to only one featured area.
 * 
 * Transitioning Post Status
 * 1. Add a post in draft status, make sure featured item is in draft status
 * 2. Move a post in draft to publish, make sure featured item is moved as well
 * 3. If a post was created with 2 featured items and one is trashed, if the term
 *    is re-linked to the post, the item in the trash should be untrashed, instead of
 *    creating a 3rd item
 * 
 * Trash / Untrash
 * 1. Trash a post, make sure the featured item(s) are deleted
 * 2. Untrash a post, make sure the featured item(s) are not created
 * 3. Trash an existing featured item, make sure post loses tax association 
 * 4. Untrash an existing featured item, make sure post regains tax association 
 * 5. Permanently delete existing featured item, make sure post loses tax association 
 * 
 * Quick Edit
 * 1. The Taxonomy box for featured items should be present in Quick Edit
 * 2. All saving logic should fire in AJAX sav routine for Quick Edit
 * 
 * Sorting
 * 1. All featured items should be re-orderable via the Re-order items screen
 * 2. menu_order should be set when items are reordered, only those that change should be sent
 * 3. When new items are added to a featured area, they should appended to the end, not the beginning
 * 
 * Returning Data
 * 1. By default, featured item contains the post data of the post it belongs to
 * 2. If any fields have been overridden, the post data is a merge of the 2
 * 3. The ID of the posts returned should match the featured item, so that images and meta
 *		can be overridden as well
 * 
 */

class WP_Featured_Content {
	const POST_TYPE = 'featured_item';
	const TAXONOMY  = 'featured_area';
	/**
	 * The lone instance
	 * 
	 * @var WP_Featured_Content 
	 */
	static $instance = null;

	/**
	 * Insure that only one instance is loaded
	 * 
	 * @return WP_Featured_Content
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof WP_Featured_Content )
			self::$instance = new self;

		return self::$instance;
	}

	/**
	 * Add all hooks
	 * 
	 */
	private function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme' ) );
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'save_post', array( $this, 'save_post' ), 10, 2 );
		add_action( 'transition_post_status', array( $this, 'transition_post_status' ), 10, 3 );
		add_action( 'current_screen', array( $this, 'current_screen' ) );
		add_action( 'wp_trash_post', array( $this, 'trash' ) );
		add_action( 'untrash_post', array( $this, 'untrash' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_ajax_save-order', array( $this, 'save_order' ) );

		add_filter( 'post_updated_messages', array( $this, 'post_updated_messages' ) );
		add_filter( 'the_title', array( $this, 'the_title' ), 10, 2 );
		add_filter( 'wp_insert_post_empty_content', array( $this, 'wp_insert_post_empty_content' ), 10, 2 );
		add_filter( 'twentyfourteen_get_featured_posts', array( $this, 'get_featured_content' ) );
	}
	
	/**
	 * Register messages for this post type that don't contain View Post links
	 * 
	 * @param array $messages
	 * @return array
	 */
	function post_updated_messages( $messages ) {
		$messages[self::POST_TYPE] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Post updated.' ),
			6 => __( 'Post published.' ),
			7 => __( 'Post saved.' ),
			8 => __( 'Post submitted.' ),
			10 => __( 'Post draft updated.' ),
		);
		return $messages;
	}
	
	/**
	 * Enqueue global admin styles to hide unwanted elements
	 * 
	 */
	function admin_enqueue_scripts() {
		wp_enqueue_style( 'wp-featured-content', WP_PLUGIN_URL . '/wp-featured-content/featured-content.css' );
	}

	/**
	 * Create the page for reordering
	 * 
	 */
	function admin_menu() {
		$slug = add_submenu_page(
			'edit.php?post_type=' . self::POST_TYPE,
			__( 'Re-order Items' ),
			__( 'Re-order Items' ),
			'edit_posts',
			'reorder-featured_items',
			array( $this, 'reorder_featured_items_page' )
		);
		add_action( "load-$slug", array( $this, 'reorder_featured_items_load' ) );
	}
	
	/**
	 * Load the re-order scripts
	 * 
	 */
	function reorder_featured_items_load() {
		wp_enqueue_script( 'wp-featured-content', WP_PLUGIN_URL . '/wp-featured-content/featured-content.js', array( 'jquery-ui-sortable' ) );
	}	
	
	/**
	 * AJAX handler for saving new sort orders and returning an updated UI
	 * Updates all applicable rows in one db query #win
	 * 
	 * @global wpdb $wpdb
	 */	
	function save_order() {
		if ( empty( $_POST['changes'] ) )
			exit( -1 );
		
		global $wpdb;
		$sets = array();
		$post_ids = array_keys( $_POST['changes'] );
		foreach ( $_POST['changes'] as $post_id => $menu_order )
			$sets[] = $wpdb->prepare( "WHEN %d THEN %d", $post_id, $menu_order );
		
		$sql = "UPDATE $wpdb->posts SET menu_order = CASE ID " . 
			join( ' ', $sets ) . ' END WHERE ID IN (' . join( ',', $post_ids ) . ')';
 
		$wpdb->query( $sql );
		array_map( 'clean_post_cache', $post_ids );
		
		$this->featured_area_list( $_POST['featured_area'] );
		exit();
	}
	
	/**
	 * Filter the title so that the featured item can inherit its parent title
	 *    in list tables.
	 * 
	 * @param string $title
	 * @param int $id
	 * @return string
	 */
	function the_title( $title, $id ) {
		$post = get_post( $id );
		if ( self::POST_TYPE === $post->post_type && empty( $post->post_title ) && 0 < $post->post_parent ) {		
			$title = get_post( $post->post_parent )->post_title;
			// use this code from the_title() for now to avoid infinite recursion, may not be a problem
			if ( ! empty( $post->post_password ) ) {
				$protected_title_format = apply_filters( 'protected_title_format', __( 'Protected: %s' ) );
				$title = sprintf( $protected_title_format, $title );
			} else if ( isset( $post->post_status ) && 'private' == $post->post_status ) {
				$private_title_format = apply_filters( 'private_title_format', __( 'Private: %s' ) );
				$title = sprintf( $private_title_format, $title );
			}			
		}
		
		return $title;
	}
	
	/**
	 * Prints the UI for re-ordering, used by AJAX reponse as well
	 * 
	 */
	function featured_area_list( $area ) {
		$type = get_term_by( 'slug', $area, self::TAXONOMY );
		
		$posts = new WP_Query( array( 
			'post_type' => self::POST_TYPE, 
			'orderby' => 'menu_order', 
			'order' => 'ASC',
			'posts_per_page' => -1,
			self::TAXONOMY => $area
		) );		
		?>
<div id="featured-area-list-<?php echo $area ?>" class="featured-area-list">
	<h3><?php echo $type->name ?></h3>
	<?php if ( $posts->have_posts() ): ?>
	<ul class="feature-group" data-featured-area="<?php echo $area ?>">
	<?php while ( $posts->have_posts() ): $posts->the_post(); ?>
		<li data-id="<?php the_ID() ?>" data-orig-menu-order="<?php echo $posts->post->menu_order ?>">
			<dl class="menu-item-bar">
				<dt class="menu-item-handle">
					<span class="item-title">
						<span class="menu-item-title"><?php 
							the_title(); 
							if ( 'publish' !== $posts->post->post_status )
								printf( ' - <em>%s</em>', ucwords( $posts->post->post_status ) );
						?></span>
					</span>
					<span class="item-controls">
						<span class="item-type"><?php echo $posts->post->menu_order ?></span>
					</span>						
				</dt>
			</dl>
		</li>
	<?php endwhile; ?>
	</ul>
	<a class="button button-primary button-disabled save-featured-order">Save Order</a>
</div>		
		<?php endif;
	}	

	/**
	 * Build the UI for re-ordering Featured Items
	 * 
	 */
	function reorder_featured_items_page() {
		$terms = get_terms( self::TAXONOMY );
	?>
<style type="text/css">
#featured-content-order h3, .save-featured-order {margin-top: 30px;}
</style>
<div class="wrap" id="featured-content-order">
	<h2>Re-Order Featured Items</h2>
	<?php
	if ( ! empty( $terms ) ):
		foreach ( $terms as $term )
			$this->featured_area_list( $term->slug );
	endif; ?>
</div>
	<?php
	}

	/**
	 * Turns theme support on when plugin is installed
	 */
	function theme() {
		// temporary hack
		add_theme_support( 'featured-content' );
	}

	/**
	 * If the theme supports it, register post_type and taxonomy to make all of this work
	 * 
	 */
	function init() {
		if ( ! current_theme_supports( 'featured-content' ) )
			return;

		register_post_type( self::POST_TYPE, array(
			'public'               => false,
			'show_ui'              => true,
			'show_in_menu'         => true,
			'taxonomies'           => array( self::TAXONOMY ),
			'supports'             => array( 'title', 'thumbnail', 'excerpt' ),
			'register_meta_box_cb' => array( $this, 'featured_item_add_box' ),
			'labels'               => array(
				'name'               => _x( 'Featured Items', 'post type general name' ),
				'singular_name'      => _x( 'Featured Item', 'post type singular name' ),
				'add_new'            => _x( 'Add New', 'Featured Item' ),
				'add_new_item'       => __( 'Add New Featured Item' ),
				'edit_item'          => __( 'Edit Featured Item' ),
				'new_item'           => __( 'New Featured Item' ),
				'view_item'          => __( 'View Featured Item' ),
				'search_items'       => __( 'Search Featured Items' ),
				'not_found'          => __( 'No Featured Items found' ),
				'not_found_in_trash' => __( 'No Featured Items found in Trash' ),
			),
		) );

		register_taxonomy( self::TAXONOMY, array( self::POST_TYPE, 'post' ), array(
			'public'            => false,
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_menu'      => false,
			'description'       => __( 'This is some text explaining that the theme has this featured location.' ),
			'labels'            => array(
				'name'              => _x( 'Featured Area', 'taxonomy general name' ),
				'singular_name'     => _x( 'Featured Area', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Featured Areas' ),
				'all_items'         => __( 'All Featured Areas' ),
				'parent_item'       => __( 'Parent Featured Area' ),
				'parent_item_colon' => __( 'Parent Featured Area:' ),
				'edit_item'         => __( 'Edit Featured Area' ),
				'update_item'       => __( 'Update Featured Area' ),
				'add_new_item'      => __( 'Add New Featured Area' ),
				'new_item_name'     => __( 'New Featured Area Name' ),
				'menu_name'         => __( 'Featured Area' ),
			),
		) );
	}

	/**
	 * The UI should be hidden for Featured Items, exposed for post_types that support it
	 * 
	 * @global array $wp_taxonomies
	 * @param WP_Screen $screen
	 */
	function current_screen( $screen ) {
		global $wp_taxonomies;
		$wp_taxonomies[ self::TAXONOMY ]->show_ui = ( self::POST_TYPE !== $screen->post_type );
	}

	/**
	 * Handle tax cleanup when a post is trashed
	 * 
	 * @global wpdb $wpdb
	 * @param int $post_id
	 */
	function trash( $post_id ) {
		global $wpdb;

		$post = get_post( $post_id );
		if ( ! is_object_in_taxonomy( $post->post_type, self::TAXONOMY ) )
			return;

		if ( self::POST_TYPE !== $post->post_type ) {
			$item_ids = get_posts( array(
				'fields'      => 'ids',
				'post_type'   => self::POST_TYPE,
				'post_parent' => $post_id,
				'post_status' => get_post_stati(),
			) );

			$wpdb->query( "DELETE FROM $wpdb->posts WHERE ID IN (" . join( ',', $item_ids ) . ")"  );
			$wpdb->query( "DELETE FROM $wpdb->term_relationships WHERE object_id IN (" . join( ',', $item_ids ) . ")"  );

			array_map( 'clean_post_cache', $item_ids );
		} else {
			$item_terms = get_the_terms( $post_id, self::TAXONOMY );
			if ( empty( $item_terms ) )
				$item_terms = array();

			$post_terms = get_the_terms( $post->post_parent, self::TAXONOMY );
			if ( empty( $post_terms ) )
				$post_terms = array();

			$post_extra_ids = array_diff( wp_list_pluck( $post_terms, 'slug' ), wp_list_pluck( $item_terms, 'slug' ) );
			wp_set_object_terms( $post->post_parent, $post_extra_ids, self::TAXONOMY );
		}
	}

	/**
	 * Handle a Featured Item being untrashed
	 * 
	 * @param int $post_id
	 */
	function untrash( $post_id ) {
		$post = get_post( $post_id );
		if ( ! is_object_in_taxonomy( $post->post_type, self::TAXONOMY ) )
			return;

		if ( self::POST_TYPE === $post->post_type ) {
			$item_terms = get_the_terms( $post_id, self::TAXONOMY );
			if ( empty( $item_terms ) )
				return;

			wp_set_object_terms( $post->post_parent, wp_list_pluck( $item_terms, 'slug' ), self::TAXONOMY, true );
		}
	}

	/**
	 * For new items in a featured area, set the menu_order to max() + 1 so it
	 * gets added to the end, instead of being bumped to the top when 0
	 * 
	 * @param type $term_id
	 * @return int
	 */
	function get_max_menu_order_for_term( $term_id ) {
		$tax_posts = new WP_Query( array(
			'post_type'   => self::POST_TYPE,
			'tax_query'   => array(
				array(
					'taxonomy' => self::TAXONOMY,
					'field'    => 'term_id',
					'terms'    => array( $term_id ),
				),
			),
		) );
		
		if ( ! empty( $tax_posts->posts ) )
			return max( wp_list_pluck( $tax_posts->posts, 'menu_order' ) );
		
		return 0;
	}
	
	function wp_insert_post_empty_content( $maybe_empty, $postarr ) {
		if ( self::POST_TYPE === $postarr['post_type'] )
			return false;
		
		return $maybe_empty;
	}
	
	/**
	 * Create featured items when posts in supported types are saved
	 * Delete orphans when areas are unchecked
	 * 
	 * @global wpdb $wpdb
	 * @param int $id
	 * @param WP_Post $post
	 */
	function save_non_item_areas( $id, $post ) {
		global $wpdb;

		$post_term_ids = array();

		clean_object_term_cache( $id, $post->post_type );
		/**
		 * All of the terms in the taxonomy that the post belongs to
		 */
		$terms = get_the_terms( $id, self::TAXONOMY );
		if ( ! empty( $terms ) )
			$post_term_ids = wp_list_pluck( $terms, 'term_id' );
		
		/**
		 * All of the terms in the taxonomy
		 */
		$all_terms = get_terms( self::TAXONOMY );
		$all_term_ids = wp_list_pluck( $all_terms, 'term_id' );

		foreach ( (array) $terms as $term ) {
			// All of the featured_item ids in the current_term belonging to the current post
			$tax_posts = new WP_Query( array(
				'fields'      => 'ids',
				'post_type'   => self::POST_TYPE,
				'post_parent' => $id,
				'post_status' => get_post_stati(),
				self::TAXONOMY => $term->slug
			) );

			if ( empty( $tax_posts->posts ) ) {
				$sql = $wpdb->prepare(
					"INSERT INTO $wpdb->posts " .
						"(post_date, post_date_gmt, post_type, post_parent, post_status, menu_order) " .
						"VALUES (%s, %s, %s, %d, %s, %d)",
					$post->post_date,
					$post->post_date_gmt,
					self::POST_TYPE,
					$id,
					$post->post_status, 
					$this->get_max_menu_order_for_term( $term->term_id ) + 1	
				);
				$wpdb->query( $sql );
				wp_set_object_terms( $wpdb->insert_id, array( $term->slug ), self::TAXONOMY );
			} else {
				$sql = $wpdb->prepare( "UPDATE $wpdb->posts SET post_status = %s WHERE ID IN (" . join( ',', $tax_posts->posts ) . ")", $post->post_status );
				$wpdb->query( $sql );
				array_map( 'clean_post_cache', $tax_posts->posts );
			}
		}

		$orpan_term_ids = array_diff( $all_term_ids, $post_term_ids );

		if ( ! empty( $orpan_term_ids ) ) {
			$tt_ids = array();
			foreach ( $orpan_term_ids as $orpan_term_id ) {
				$term     = get_term( $orpan_term_id, self::TAXONOMY );
				$tt_ids[] = $term->term_taxonomy_id;
			}

			$orphan = new WP_Query( array(
				'fields'      => 'id=>parent',
				'post_type'   => self::POST_TYPE,
				'post_status' => 'any',
				'tax_query'   => array(
					array(
						'taxonomy' => self::TAXONOMY,
						'field'    => 'term_taxonomy_id',
						'terms'    => $tt_ids,
					),
				),
			) );

			$post_sql = $wpdb->prepare( "DELETE FROM $wpdb->posts WHERE ID IN (%s)", join( ',', wp_list_pluck( $orphan->posts, 'ID' ) ) );
			$wpdb->query( $post_sql );
			$orphan_ids = wp_list_pluck( $orphan->posts, 'post_parent' );
			$relationship_sql = $wpdb->prepare(
				"DELETE FROM $wpdb->term_relationships WHERE term_taxonomy_id IN (%s) AND object_id IN (%s)",
				join( ',', $tt_ids ),
				join( ',', $orphan_ids )
			);
			$wpdb->query( $relationship_sql );

			array_map( 'wp_cache_delete', $orphan_ids );

			clean_term_cache( $orpan_term_ids );
		}
	}
	
	/**
	 * Transition post_status of linked items when post is transitioning
	 * 
	 * @global wpdb $wpdb
	 * @param string $new_status
	 * @param string $old_status
	 * @param WP_Post $post
	 */
	function transition_post_status( $new_status, $old_status, $post ) {
		if ( self::POST_TYPE === $post->post_type || wp_is_post_autosave( $post ) || wp_is_post_revision( $post ) )
			return; 
			
		global $wpdb;
		$post_ids = get_posts( array( 
			'fields' => 'ids', 
			'post_type' => self::POST_TYPE,
			'post_status' => 'any',
			'post_parent' => $post->ID
		) );
		
		if ( empty( $post_ids ) )
			return;
		
		$sql = $wpdb->prepare( "UPDATE $wpdb->posts SET post_status = %s " .
			"WHERE ID IN (" . join( ',', $post_ids ) . ')', $new_status );
 
		$wpdb->query( $sql );
		array_map( 'clean_post_cache', $post_ids );		
	}

	/**
	 * Determine if a post should save / delete featured items
	 * 
	 * @param int $id
	 * @param WP_Post $post
	 */
	function save_post( $id, $post ) {
		if ( ! is_object_in_taxonomy( $post->post_type, self::TAXONOMY ) )
			return;
		
		if ( isset( $_POST['tax_input'][ self::TAXONOMY ] ) && self::POST_TYPE !== $post->post_type )
			$this->save_non_item_areas( $id, $post );
	}

	/**
	 * Build the custom admin UI for a featured item
	 * 
	 * @param WP_Post $post
	 */
	function featured_item_meta_box( $post ) {
		if ( ! empty( $post->ID ) ): ?>
		<p>The post parent is: <strong><?php echo get_the_title( $post->post_parent ); ?></strong>. 
			<a href="<?php echo get_permalink( $post->post_parent ) ?>">View Post</a>&nbsp;
			<?php echo edit_post_link( _( 'Edit Post' ), '', '', $post->post_parent ) ?>
		</p>
		<?php endif;
	}	
	
	/**
	 * Add the custom admin UI for featured item
	 */
	function featured_item_add_box() {
		add_meta_box( 'featured-item', __( 'Featured Item Data' ), array( $this, 'featured_item_meta_box' ), 'featured_item' );
	}

	/**
	 * Return featured content for 2014 theme
	 * 
	 * @param string $area
	 * @return array
	 */
	function get_featured_content( $area = '' ) {
		if ( ! did_action( 'init' ) ) {
			_doing_it_wrong( 'wp_get_featured_content()', "Cannot be called before the 'init' action.", '3.8' );
			return array();
		}
		
		$args = array(
			'post_type' => self::POST_TYPE,
			'orderby'   => 'menu_order',
			'order'		=> 'ASC',
		);

		if ( ! empty( $area ) )
			$args[self::TAXONOMY] = $area;
		
		$query = new WP_Query( $args );

		if ( empty( $query->posts ) )
			return array();

		$indexed = array();
		foreach ( $query->posts as $p )
			$indexed[$p->post_parent] = $p;
			
		$posts = get_posts( array(
			'post__in'  => array_keys( $indexed ),
			'post_type' => 'any',
			'orderby'   => 'post__in',
		) );
		
		$overrides = array( 'post_title', 'post_excerpt' );
		foreach ( $posts as &$post ) {
			foreach ( $overrides as $field ) {
				if ( ! empty( $indexed[$post->ID]->$field ) )
					$post->$field = $indexed[$post->ID]->$field;				
			}
			
			$featured_item_id = $indexed[$post->ID]->ID;
			if ( has_post_thumbnail( $featured_item_id ) )
				$post->image_id = get_post_thumbnail_id( $featured_item_id ); 
		}
		
		return $posts;
	}
}
WP_Featured_Content::get_instance();

/**
 * Return a list of posts designated as featured content for term $area
 * 
 * @param string $area
 * @return array
 */
function wp_get_featured_content( $area = '' ) {
	return WP_Featured_Content::get_instance()->get_featured_content( $area );
}