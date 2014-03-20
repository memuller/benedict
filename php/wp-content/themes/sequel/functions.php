<?php
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */
	
	// Add your custom functions here, or overwrite existing ones. Read more how to use:
	// http://codex.wordpress.org/Child_Themes
	
// Implement Custom Header features.
require get_stylesheet_directory() . '/inc/custom-header.php';

if ( ! function_exists( 'sequel_setup' ) ) :
function sequel_setup() {
    
	load_child_theme_textdomain( 'sequel', get_stylesheet_directory() . '/languages' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'social'   => __( 'Social Profile menu in left sidebar', 'sequel' ),
	) );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'sequel_setup' );


function sequel_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'sequel_home_options' , array(
       'title'      => __('TwentyFourteen Home Options','sequel'),
	   'description' => sprintf( __( 'Use the following settings to set home options. A screen refresh may be required to see some of the changes in the customizer!', 'fourteenxt' )),
       'priority'   => 32,
    ) );
	
	// Add support for Fourteen Extended options - this section is only visible if fourteen Extended is active.
	// Option changes the site header image height on Appearance >> Header and on output at front end.
	// Requires image re-upload for new values to take place - new cropping of image.
	$wp_customize->add_setting(
       'sequel_maximum_header_height',
    array(
        'default' => '240',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
       'sequel_maximum_header_height',
    array(
        'label' => __('Set Overall Header max-height (numbers only!) - Default is 240.','sequel'),
        'section' => 'fourteenxt_general_options',
		'priority' => 3,
        'type' => 'text',
    ));
	
	//  Logo Image Upload
    $wp_customize->add_setting('sequel_logo_image', array(
        'default-image'  => ''
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'sequel_logo',
            array(
               'label'    => __( 'Upload a logo', 'sequel' ),
               'section'  => 'title_tagline',
			   'priority' => 11,
               'settings' => 'sequel_logo_image',
            )
        )
    );
	
	$wp_customize->add_setting(
        'sequel_logo_alt_text', array (
		'sanitize_callback' => 'sanitize_text_field',
    ));
	
	$wp_customize->add_control(
    'sequel_logo_alt_text',
    array(
        'type' => 'text',
		'default' => '',
        'label' => __('Enter Logo Alt Text Here', 'sequel'),
        'section' => 'title_tagline',
		'priority' => 12,
        )
    );
	
	// Extend on the Featured Section
	$wp_customize->add_setting( 'featured_content_location', array(
		'default'           => 'default',
		'sanitize_callback' => 'sequel_sanitize_location',
	) );

	$wp_customize->add_control( 'featured_content_location', array(
		'label'   => __( 'Featured Location', 'sequel' ),
		'section' => 'featured_content',
		'priority' => 1,
		'type'    => 'select',
		'choices' => array(
			'default'   => __( 'Default - Above Content/Sidebar',   'sequel' ),
			'fullwidth' => __( 'Below Menu - Fullwidth', 'sequel' ),
		),
	) );
	
	$wp_customize->add_setting( 'sequel_blog_feed_layout', array(
		'default'           => 'standard',
		'sanitize_callback' => 'sequel_sanitize_home_layout',
	) );

	$wp_customize->add_control( 'sequel_blog_feed_layout', array(
		'label'   => __( 'Blog Feed Layout', 'sequel' ),
		'section' => 'sequel_home_options',
		'priority' => 1,
		'type'    => 'radio',
		'choices' => array(
			'standard'   => __( 'Default Layout',   'sequel' ),
			'home-grid' => __( 'Grid Layout', 'sequel' ),
		),
	) );
	
	$wp_customize->add_setting(
        'sequel_home_grid_columns', array (
			'sanitize_callback' => 'sequel_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'sequel_home_grid_columns',
        array(
            'type'     => 'checkbox',
            'label'    => __('Switch Home Grid Columns to 4?', 'sequel'),
            'section'  => 'sequel_home_options',
	        'priority' => 2,
        )
    );
	
	$wp_customize->add_setting(
        'sequel_home_excerpts', array (
			'sanitize_callback' => 'sequel_sanitize_checkbox',
		)
    );

    $wp_customize->add_control(
        'sequel_home_excerpts',
        array(
            'type'     => 'checkbox',
            'label'    => __('Switch Child theme home feed to excerpts?', 'sequel'),
            'section'  => 'sequel_home_options',
	        'priority' => 3,
        )
    );
	
	$wp_customize->add_setting(
    'sequel_excerpt_length',
    array(
        'default' => 55,
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
    'sequel_excerpt_length',
    array(
        'label' => __('Enter desired home excerpt length for this child theme (numbers only!). - default is 55.','sequel'),
        'section' => 'sequel_home_options',
		'priority' => 4,
        'type' => 'text',
    ));
		
}
add_action( 'customize_register', 'sequel_customize_register' );

function sequel_sanitize_location( $location ) {
	if ( ! in_array( $location, array( 'default', 'fullwidth' ) ) ) {
		$location = 'default';
	}
	return $location;
}

function sequel_sanitize_home_layout( $home_layout ) {
	if ( ! in_array( $home_layout, array( 'standard', 'home-grid' ) ) ) {
		$home_layout = 'standard';
	}
	return $home_layout;
}

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'sequel_sanitize_checkbox' ) ) :
	function sequel_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

function sequel_body_classes( $classes ) {
    if ( is_home() && 'home-grid' == get_theme_mod( 'sequel_blog_feed_layout' ) ) {
		$classes[] = 'home-grid';
	}
	return $classes;
}
add_filter( 'body_class', 'sequel_body_classes' );

/**
 * Add filter to the_content.
 *
 * @since Fourteen Extended 1.1.2
 */
if ( get_theme_mod( 'sequel_home_excerpts' ) != 0 ) {
function sequel_excerpts($content = false) {

// If is the home page, an archive, or search results
	if(is_home() ) :
		global $post;
		$content = $post->post_excerpt;

	// If an excerpt is set in the Optional Excerpt box
		if($content) :
		$content = apply_filters('the_excerpt', $content);

	// If no excerpt is set
		else :
			$content = $post->post_content;
			if (get_theme_mod( 'sequel_excerpt_length' )) :
			$excerpt_length = esc_html(get_theme_mod( 'sequel_excerpt_length' ));
			else : 
			$excerpt_length = 30;
			endif;
			$words = explode(' ', $content, $excerpt_length + 1);
			$more = ( sequel_read_more() );
			if(count($words) > $excerpt_length) :
				array_pop($words);
				array_push($words, $more);
				$content = implode(' ', $words);
			endif;
			
			// If post format is video use first video as excerpt
            $postcustom = get_post_custom_keys();
            if ($postcustom){
                $i = 1;
                foreach ($postcustom as $key){
                    if (strpos($key,'oembed')){
                        foreach (get_post_custom_values($key) as $video){
                            if ($i == 1){
                            $content = $video;
                            }
                            $i++;
                        }
                    }  
                }
            }
			$content = $content;
		endif;
	endif;

// Make sure to return the content
	return $content;
}
add_filter('the_content', 'sequel_excerpts');

/**
 * Returns a "Continue Reading" link for excerpts
 */
function sequel_read_more() {
    return '&hellip; <a href="' . get_permalink() . '">' . __('Continue Reading &#8250;&#8250;', 'sequel') . '</a><!-- end of .read-more -->';
}
//End filter to the_content
}

// Lets do a separate excerpt length for the alternative recent post widget
// Lets do a separate excerpt length for the alternative recent post widget
function sequel_grid_excerpt () {
	$theContent = trim(strip_tags(get_the_content()));
		$output = str_replace( '"', '', $theContent);
		$output = str_replace( '\r\n', ' ', $output);
		$output = str_replace( '\n', ' ', $output);
			$limit = '15';
			$content = explode(' ', $output, $limit);
			array_pop($content);
		$content = implode(" ",$content)."  ";
	return strip_tags($content, ' ');
}

if ( ! function_exists( 'sequel_the_author' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since Sequel 1.0
 *
 * @return void
 */
function sequel_the_author() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="contributor the-author">
			<div class="contributor-info the-author" style="">
				<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
				<div class="contributor-summary">
					<h1 class="archive-title"><?php printf( __( 'All Articles by %s', 'sequel' ), get_the_author() ); ?></h1>
					<p class="author-description">
					    <?php echo get_the_author_meta( 'description', $contributor_id ); ?>
					</p>
					<span class="contributor-posts-link">
						<?php printf( _n( '%d Article', '%d Articles', $post_count, 'sequel' ), $post_count ); ?>
				    </span>
				</div><!-- .contributor-summary -->
			</div><!-- .contributor-info -->
		</div><!-- .contributor -->
	</article><!-- #post-## -->
<?php endforeach;
}
endif;


function sequel_featured_css() {
if ( get_theme_mod( 'featured_content_location' ) == 'fullwidth' && twentyfourteen_has_featured_posts() ) {
// Apply custom settings to appropriate element ?>
    <style>@media screen and (min-width: 1080px){.featured-content{margin-top:0;padding-left:0px;padding-right:0px;z-index:3;}}</style>
<?php }

if ( get_theme_mod( 'sequel_home_grid_columns' ) ) {
	// Apply custom settings to appropriate element ?>
    <style>
	    @media screen and (min-width: 1008px) {
		    .home-grid .grid-content .hentry {
		        width: 24.999999975%;
	        }
	        .home-grid .grid-content .hentry:nth-child( 3n+1 ) {
		        clear: none;
	        }
	        .home-grid .grid-content .hentry:nth-child( 4n+1 ) {
		        clear: both;
	        }
	    }
	</style>
<?php }

}
add_action( 'wp_head', 'sequel_featured_css', 210 );