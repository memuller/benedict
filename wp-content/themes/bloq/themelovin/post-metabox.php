<?php

add_action('add_meta_boxes', 'glg_metabox_posts');
function glg_metabox_posts(){
	
	/* Create extra metabox -------------------------------------------------------*/
	$meta_box = array(
		'id' => 'glg-image-pos',
		'title' => 'Slideshow options',
		'description' => '',
		'pages' => array('portfolio', 'post'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => 'Use in slideshow',
				'id' => 'glg_slideshow',
				'type' => 'radio',
				'std' => 'no',
				'options' => array(
					array('name' => 'Yes', 'value' => 'yes'),
					array('name' => 'No', 'value' => 'no')
			))
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create portfolio hover metabox -------------------------------------------------------*/
	$meta_box = array(
		'id' => 'glg-port-metabox',
		'title' => 'Portfolio extras',
		'description' => 'Portfolio specific options.',
		'pages' => array('portfolio'),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'Current portfolio cover color',
				'id' => 'glg_hover_color',
				'type' => 'text',
				'std' => '#000000'
			),
			array(
				'name' => 'Current portfolio title color',
				'id' => 'glg_font_color',
				'type' => 'text',
				'std' => '#ffffff'
			),
			array(
				'name' => 'Starting "Love-it" number',
				'id' => 'glg_love_it',
				'type' => 'text',
				'std' => '0'
			),
			array(
				'name' => 'Page layout',
				'id' => 'glg_port_layout',
				'type' => 'radio',
				'std' => 'full',
				'options' => array(
					array('name' => 'Full-width', 'value' => 'full', 'id' => 'full'),
					array('name' => 'Sidebar', 'value' => 'side', 'id' => 'side')
			))
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create extra metabox -------------------------------------------------------*/
	$meta_box = array(
		'id' => 'glg-port-sidebar',
		'title' => 'Portfolio item sidebar',
		'description' => '',
		'pages' => array('portfolio'),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'Add optional sidebar text',
				'id' => 'glg_port_sidebar',
				'type' => 'textarea',
				'std' => ''
			)
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create header metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'glg-header-metabox',
		'title' => 'Header settings',
		'description' => 'Enable or disable post header image.',
		'pages' => array('post', 'portfolio', 'page'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => 'Enable header image',
				'id' => 'glg_header',
				'type' => 'radio',
				'std' => 'simple',
				'options' => array(
					array('name' => 'Enable image header', 'value' => 'header'),
					array('name' => 'Disable image header', 'value' => 'simple')
				),
			),
			array(
				'name' => 'Header image',
				'id' => 'glg_header_img',
				'type' => 'file',
				'std' => ''
			)
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create page metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'glg-page-subtitle',
		'title' => 'Claim',
		'description' => '',
		'pages' => array('portfolio', 'page'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => 'Insert claim',
				'id' => 'glg_page_subtitle',
				'type' => 'text',
				'std' => ''
			),
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create video metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'glg-video-metabox',
		'title' => 'Video settings',
		'description' => 'Settings to embed videos into your portfolio items.',
		'pages' => array('portfolio', 'post'),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'Video embed code (Youtube / Vimeo)',
				'id' => 'glg_video',
				'type' => 'textarea',
				'std' => ''
			),
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create quote metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'glg-quote-metabox',
		'title' => 'Quote settings',
		'description' => 'Insert the quote.',
		'pages' => array('portfolio', 'post'),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'Quote author',
				'id' => 'glg_author',
				'type' => 'text',
				'std' => ''
			)
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create link metabox -------------------------------------------------------*/
    $meta_box = array(
		'id' => 'glg-link-metabox',
		'title' => 'Link settings',
		'description' => 'Insert the URL.',
		'pages' => array('portfolio', 'post'),
		'context' => 'normal',
		'priority' => 'low',
		'fields' => array(
			array(
				'name' => 'Link URL',
				'id' => 'glg_link',
				'type' => 'text',
				'std' => ''
			)
		)
    );
    glg_add_meta_box($meta_box);
    
    /* Create team metabox -------------------------------------------------------*/
	$meta_box = array(
		'id' => 'glg-contact-team',
		'title' => 'Member details',
		'description' => 'Insert team member details.',
		'pages' => array('team'),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => 'Team details',
				'id' => 'glg_team_details',
				'type' => 'textarea',
				'std' => ''
			),
			array(
				'name' => 'e-Mail address',
				'id' => 'glg_team_mail',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Behance',
				'id' => 'glg_team_behance',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Dribbble',
				'id' => 'glg_team_dribbble',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Facebook',
				'id' => 'glg_team_facebook',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Flickr',
				'id' => 'glg_team_flickr',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Google +',
				'id' => 'glg_team_google',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Instagram',
				'id' => 'glg_team_instagram',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Linkedln',
				'id' => 'glg_team_linkedln',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Pinterest',
				'id' => 'glg_team_pinterest',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Tumblr',
				'id' => 'glg_team_tumblr',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Twitter',
				'id' => 'glg_team_twitter',
				'type' => 'text',
				'std' => ''
			),
			array(
				'name' => 'Vimeo',
				'id' => 'glg_team_vimeo',
				'type' => 'text',
				'std' => ''
			)
		)
    );
    glg_add_meta_box($meta_box);
}

?>