<?php
/*---------------------------------------*/
/* Bar graph
/*---------------------------------------*/

$tt_shortcodes['bar-graph'] = array(
	'no_preview' => true,
	'params'=> array(),
	'shortcode' => '[glg_short_bar_graph]{{child_shortcode}}[/glg_short_bar_graph]',
	
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('Bar graph Title', 'framework_localize'),
				'desc' => __('Add a title for this bar graph.', 'framework_localize'),
				'std' => ''
			),
			'linear_color' => array(
				'type' => 'select',
				'label' => __('Graph Color', 'framework_localize'),
				'options' => array(
					'emerald' => 'Emerald',
					'green-apple' => 'Green Apple',
					'river' => 'River',
					'midnight-blue' => 'Midnight Blue',
					'sunset' => 'Sunset',
					'carrot' => 'Carrot',
					'tango' => 'Tango',
					'silver' => 'Silver',
					'concrete' => 'Concrete',
					'dark' => 'Dark'
				)	
			),
			'content' => array(
				'std' => '90',
				'type' => 'text',
				'label' => __('Percent value', 'framework_localize'),
				'desc' => __('Enter the percent value.', 'framework_localize'),
			)
		),
		'shortcode' => '[glg_short_bar title="{{title}}" color="{{linear_color}}"]{{content}}[/glg_short_bar] ',
		'clone_button' => __('+ Add Another bar graph', 'framework_localize')
	),
);

/*---------------------------------------*/
/* Knob
/*---------------------------------------*/
$tt_shortcodes['knob'] = array(
	'params' => array(),
	'shortcode' => '[glg_short_knob_set] {{child_shortcode}}[/glg_short_knob_set]',
	'no_preview' => true,
	
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
					'type' => 'text',
					'label' => __('Circular graph Title', 'framework_localize'),
					'desc' => __('Add a title for this circular graph.', 'framework_localize'),
					'std' => ''
			),
			'circular_color' => array(
					'type' => 'select',
					'label' => __('Graph Color', 'framework_localize'),
					'options' => array(
						'emerald' => 'Emerald',
						'green-apple' => 'Green Apple',
						'river' => 'River',
						'midnight-blue' => 'Midnight Blue',
						'sunset' => 'Sunset',
						'carrot' => 'Carrot',
						'tango' => 'Tango',
						'silver' => 'Silver',
						'concrete' => 'Concrete',
						'dark' => 'Dark'
					)	
			),
			'content' => array(
					'std' => '90',
					'type' => 'text',
					'label' => __('Percent value', 'framework_localize'),
					'desc' => __('Enter the percent value.', 'framework_localize'),
			),
		),		
		'shortcode' => '[glg_knob title="{{title}}" color="{{circular_color}}"]{{content}}[/glg_knob]',
		'clone_button' => __('+ Add Another Circular graph', 'framework_localize')
	)
);

/*---------------------------------------*/
/* Accordions
/*---------------------------------------*/
$tt_shortcodes['accordions'] = array(
	'params' => array(),
	'shortcode' => '[glg_short_accordion_set] {{child_shortcode}}[/glg_short_accordion_set]',
	'no_preview' => true,
	
	// can be cloned and re-arranged
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('Accordion Title', 'framework_localize'),
				'desc' => __('Add a title for this accordion section.', 'framework_localize'),
				'std' => ''
			),
			
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Accordion Content', 'framework_localize'),
				'desc' => __('Enter the content for this accordion section.', 'framework_localize'),
			),
			
			'active' => array(
			'type' => 'select',
			'label' => __('Active Accordion?', 'framework_localize'),
			'desc' => __('Should this accordion section be active by default?', 'framework_localize'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)),
		),
		'shortcode' => '[glg_short_accordion title="{{title}}" active="{{active}}"] {{content}} [/glg_short_accordion] ',
		'clone_button' => __('+ Add Another Accordion Slide', 'framework_localize')
	)
);



/*---------------------------------------*/
/* Buttons
/*---------------------------------------*/
$tt_shortcodes['button'] = array(
	'params' => array(
		'size' => array(
			'type' => 'select',
			'label' => __('Size', 'framework_localize'),
			'options' => array(
				'small' => 'Small',
				'large' => 'Large',
				'jumbo' => 'Jumbo'
			)
		),
		
		'color' => array(
			'type' => 'select',
			'label' => __('Color', 'framework_localize'),
			'desc' => __('Select your color.', 'framework_localize'),
			'options' => array(
				'emerald' => 'Emerald',
				'green-apple' => 'Green Apple',
				'river' => 'River',
				'midnight-blue' => 'Midnight Blue',
				'sunset' => 'Sunset',
				'carrot' => 'Carrot',
				'tango' => 'Tango',
				'silver' => 'Silver',
				'concrete' => 'Concrete',
				'dark' => 'Dark',
			)
		),
		
		'content' => array(
			'std' => 'Button Label',
			'type' => 'text',
			'label' => __('Label', 'framework_localize'),
	),
	
	'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link URL', 'framework_localize'),
			'desc' => __('ie. http://www.themelovin.com', 'framework_localize')
		),
		
		'target' => array(
			'type' => 'select',
			'label' => __('Link Target', 'framework_localize'),
			'options' => array(
				'_self' => '_self',
				'_parent' => '_parent',
				'_blank' => '_blank',
				'_top' => '_top',
			)),
			
			'button_lightbox_content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Lightbox Content', 'framework_localize'),
			'desc' => __('Enter content URL or leave blank to disable lightbox.', 'framework_localize')
	),
	
	'button_lightbox_description' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Lightbox Text', 'framework_localize'),
			'desc' => __('Short description displayed within the lightbox.', 'framework_localize')
	),
),
		
	'shortcode' => '[glg_short_button url="{{url}}" class="glg_short-button" size="{{size}}" color="{{color}}" target="{{target}}" lightbox_content="{{button_lightbox_content}}" lightbox_description="{{button_lightbox_description}}"] {{content}} [/glg_short_button]',
);


/*---------------------------------------*/
/* Columns
/*---------------------------------------*/
$tt_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ',
	'no_preview' => true,
	
	
	// can be cloned and re-arrange
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'framework_localize'),
				'desc' => '',
				'options' => array(
					'one_half' => 'One Half',
					'one_third' => 'One Third',
					'one_fourth' => 'One Fourth',
					'one_fifth' => 'One Fifth',				
					'two_thirds' => 'Two Thirds',
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'framework_localize'),
				'desc' => '(you can also leave this field blank and insert the content later)',
			)
		),
		'shortcode' => '[glg_short_{{column}}] {{content}} [/glg_short_{{column}}] ',
		'clone_button' => __('+ Add Another Column', 'framework_localize')
	)
);


/*---------------------------------------*/
/* Content Boxes
/*---------------------------------------*/
$tt_shortcodes['content-boxes'] = array(
	'params' => array(		
		'style' => array(
			'type' => 'select',
			'label' => __('Color', 'framework_localize'),
			'desc' => __('Select available colors', 'framework_localize'),
			'options' => array(
				'emerald' => 'Emerald',
				'green-apple' => 'Green Apple',
				'river' => 'River',
				'midnight-blue' => 'Midnight Blue',
				'sunset' => 'Sunset',
				'carrot' => 'Carrot',
				'tango' => 'Tango',
				'silver' => 'Silver',
				'concrete' => 'Concrete',
				'dark' => 'Dark',
			)
		),
		
		
		'title' => array(
				'std' => __('Content box title', 'framework_localize'),
				'type' => 'text',
				'label' => __('Title', 'framework_localize'),
			),
		
		
		
		'content' => array(
				'std' => __('Awesome content goes here.', 'framework_localize'),
				'type' => 'textarea',
				'label' => __('Content', 'framework_localize'),
			)),
		
	'shortcode' => '[glg_short_content_box style="{{style}}" title="{{title}}"] <p>{{content}}</p> [/glg_short_content_box]',
);



/*---------------------------------------*/
/* Dividers
/*---------------------------------------*/
$tt_shortcodes['dividers'] = array(
	'params' => array(
		'divider_style' => array(
			'type' => 'select',
			'label' => __('Style', 'framework_localize'),
			'options' => array(
				'hr-dotted' => 'Dotted - Single line',
				'hr-dotted-double' => 'Dotted - Double line',
				'hr-solid' => 'Solid - Single line',
				'hr-solid-double' => 'Solid - Double line',
			)
		),
	),
		
	'shortcode' => '[glg_short_divider style="{{divider_style}}"]',
);


/*---------------------------------------*/
/* Email Encoder
/*---------------------------------------*/
$tt_shortcodes['mailto'] = array(
	'no_preview' => true,
	'params' => array(
		
		'email' => array(
				'std' => 'you@yourdomain.com',
				'type' => 'text',
				'label' => __('Email Address', 'framework_localize'),
				'desc' => __('Enter the email address to be encoded.', 'framework_localize'),
			)),
		
	'shortcode' => '[glg_short_mailto]{{email}}[/glg_short_mailto]',
);

/*---------------------------------------*/
/* Icons
/*---------------------------------------*/
$tt_shortcodes['icons'] = array(
	'params' => array(
		
		'style' => array(
			'type' => 'select',
			'label' => __('Icon', 'framework_localize'),
			'options' => array(
				'icon-phone' => 'Phone',
				'icon-mobile' => 'Mobile',
				'icon-mouse' => 'Mouse',
				'icon-address' => 'Address',
				'icon-mail' => 'Mail',
				'icon-paper-plane' => 'Paper plane',
				'icon-pencil' => 'Pencil',
				'icon-feather' => 'Feather',
				'icon-attach' => 'Attach',
				'icon-inbox' => 'Inbox',
				'icon-reply' => 'Reply',
				'icon-reply-all' => 'Reply all',
				'icon-forward' => 'Forward',
				'icon-user' => 'User',
				'icon-users' => 'Users',
				'icon-add-user' => 'Add users',
				'icon-vcard' => 'Vcard',
				'icon-export' => 'Export',
				'icon-location' => 'Location',
				'icon-map' => 'Map',
				'icon-compass' => 'Compass',
				'icon-direction' => 'Direction',
				'icon-hair-cross' => 'Hair cross',
				'icon-share' => 'Share',
				'icon-shareable' => 'Shareable',
				'icon-heart' => 'Heart',
				'icon-heart-empty' => 'Heart empty',
				'icon-star' => 'Star',
				'icon-star-empty' => 'Star empty',
				'icon-thumbs-up' => 'Thumbs up',
				'icon-thumbs-down' => 'Thumbs down',
				'icon-chat' => 'Chat',
				'icon-comment' => 'Comment',
				'icon-quote' => 'Quote',
				'icon-home' => 'Home',
				'icon-popup' => 'Popup',
				'icon-search' => 'Search',
				'icon-flashlight' => 'Flashlight',
				'icon-print' => 'Print',
				'icon-bell' => 'Bell',
				'icon-link' => 'Link',
				'icon-flag' => 'Flag',
				'icon-cog' => 'Cog',
				'icon-tools' => 'Tools',
				'icon-trophy' => 'Trophy',
				'icon-tag' => 'Tag',
				'icon-camera' => 'Camera',
				'icon-megaphone' => 'Megaphone',
				'icon-moon' => 'Moon',
				'icon-palette' => 'Palette',
				'icon-leaf' => 'Leaf',
				'icon-note' => 'Note',
				'icon-beamed-note' => 'Beamed note',
				'icon-new' => 'New',
				'icon-graduation-cap' => 'Graduation cap',
				'icon-book' => 'Book',
				'icon-newspaper' => 'Newspaper',
				'icon-bag' => 'Bag',
				'icon-airplane' => 'Airplane',
				'icon-lifebuoy' => 'Lifebuoy',
				'icon-eye' => 'Eye',
				'icon-clock' => 'Clock',
				'icon-mic' => 'Mic',
				'icon-calendar' => 'Calendar',
				'icon-flash' => 'Flash',
				'icon-thunder-cloud' => 'Thunder cloud',
				'icon-droplet' => 'Droplet',
				'icon-cd' => 'Cd',
				'icon-briefcase' => 'Briefcase',
				'icon-air' => 'Air',
				'icon-hourglass' => 'Hourglass',
				'icon-gauge' => 'Gauge',
				'icon-language' => 'Language',
				'icon-network' => 'Network',
				'icon-key' => 'Key',
				'icon-battery' => 'Battery',
				'icon-bucket' => 'Bucket',
				'icon-magnet' => 'Magnet',
				'icon-drive' => 'Drvie',
				'icon-cup' => 'Cup',
				'icon-rocket' => 'Rocket',
				'icon-brush' => 'Brush',
				'icon-suitcase' => 'Suitcase',
				'icon-traffic-cone' => 'Traffic cone',
				'icon-globe' => 'Globe',
				'icon-keyboard' => 'Keyboard',
				'icon-browser' => 'Browser',
				'icon-publish' => 'Publish',
				'icon-progress-3' => 'Progress 3',
				'icon-progress-2' => 'Progress 2',
				'icon-progress-1' => 'Progress 1',
				'icon-progress-0' => 'Progress 0',
				'icon-light-down' => 'Light down',
				'icon-light-up' => 'Light up',
				'icon-adjust' => 'Adjust',
				'icon-code' => 'Code',
				'icon-monitor' => 'Monitor',
				'icon-infinity' => 'Infinity',
				'icon-light-bulb' => 'Light bulb',
				'icon-credit-card' => 'Credit card',
				'icon-database' => 'Database',
				'icon-voicemail' => 'Voicemail',
				'icon-clipboard' => 'Clipboard',
				'icon-cart' => 'Cart',
				'icon-box' => 'Box',
				'icon-ticket' => 'Ticket',
				'icon-rss' => 'RSS',
				'icon-signal' => 'Signal',
				'icon-thermometer' => 'Thermometer',
				'icon-water' => 'Water',
				'icon-sweden' => 'Sweden',
				'icon-line-graph' => 'Line graph',
				'icon-pie-chart' => 'Pie chart',
				'icon-bar-graph' => 'Bar graph',
				'icon-area-graph' => 'Area graph',
				'icon-lock' => 'Lock',
				'icon-lock-open' => 'Lock open',
				'icon-logout' => 'Logout',
				'icon-login' => 'Login',
				'icon-check' => 'Check',
				'icon-cross' => 'Cross',
				'icon-squared-minus' => 'Squared minus',
				'icon-squared-plus' => 'Squared plus',
				'icon-squared-cross' => 'Squared cross',
				'icon-cirlced-minus' => 'Cirlced minus',
				'icon-cirlced-plus' => 'Cirlced plus',
				'icon-cirlced-cross' => 'Cirlced cross',
				'icon-minus' => 'Minus',
				'icon-plus' => 'Plus',
				'icon-erase' => 'Erase',
				'icon-block' => 'Block',
				'icon-info' => 'Info',
				'icon-circled-info' => 'Circled info',
				'icon-help' => 'Help',
				'icon-circled-help' => 'Circled help',
				'icon-warning' => 'Warning',
				'icon-cycle' => 'Cycle',
				'icon-cw' => 'Cw',
				'icon-ccw' => 'Ccw',
				'icon-shuffle' => 'Shuffle',
				'icon-back' => 'Back',
				'icon-level-down' => 'Level down',
				'icon-retweet' => 'Retweet',
				'icon-loop' => 'Loop',
				'icon-back-in-time' => 'Back in time',
				'icon-level-up' => 'Level up',
				'icon-switch' => 'Switch',
				'icon-numbered-list' => 'Numbered list',
				'icon-add-to-list' => 'Add to list',
				'icon-layout' => 'Layout',
				'icon-list' => 'List',
				'icon-text-doc' => 'Text doc',
				'icon-text-doc-inverted' => 'Text doc inverted',
				'icon-doc' => 'Doc',
				'icon-docs' => 'Docs',
				'icon-landscape-doc' => 'Landscape doc',
				'icon-picture' => 'Picture',
				'icon-video' => 'Video',
				'icon-music' => 'Music',
				'icon-folder' => 'Folder',
				'icon-archive' => 'Archive',
				'icon-trash' => 'Trash',
				'icon-upload' => 'Upload',
				'icon-download' => 'Download',
				'icon-save' => 'Save',
				'icon-install' => 'Install',
				'icon-cloud' => 'Cloud',
				'icon-upload-cloud' => 'Upload cloud',
				'icon-bookmark' => 'Bookmark',
				'icon-bookmarks' => 'Bookmarks',
				'icon-open-book' => 'Open book',
				'icon-play' => 'Play',
				'icon-paus' => 'Paus',
				'icon-record' => 'Record',
				'icon-stop' => 'Stop',
				'icon-ff' => 'Ff',
				'icon-fb' => 'Fb',
				'icon-to-start' => 'To start',
				'icon-to-end' => 'To end',
				'icon-resize-full' => 'Resize full',
				'icon-resize-small' => 'Resize small',
				'icon-volume' => 'Volume',
				'icon-sound' => 'Sound',
				'icon-mute' => 'Mute',
				'icon-flow-cascade' => 'Flow cascade',
				'icon-flow-branch' => 'Flow branch',
				'icon-flow-tree' => 'Flow tree',
				'icon-flow-line' => 'Flow line',
				'icon-flow-parallel' => 'Flow parallel',
				'icon-left-bold' => 'Left bold',
				'icon-down-bold' => 'Down bold',
				'icon-up-bold' => 'Up bold',
				'icon-right-bold' => 'Right bold',
				'icon-left' => 'Left',
				'icon-down' => 'Down',
				'icon-up' => 'Up',
				'icon-right' => 'Right',
				'icon-circled-left' => 'Circled left',
				'icon-circled-down' => 'Circled down',
				'icon-circled-up' => 'Circled up',
				'icon-circled-right' => 'Circled right',
				'icon-triangle-left' => 'Triangle left',
				'icon-triangle-down' => 'Triangle down',
				'icon-triangle-up' => 'Triangle up',
				'icon-triangle-right' => 'Triangle right',			
				'icon-chevron-left' => 'Chevron left',
				'icon-chevron-down' => 'Chevron down',
				'icon-chevron-up' => 'Chevron up',
				'icon-chevron-right' => 'Chevron right',
				'icon-chevron-small-left' => 'Chevron small left',
				'icon-chevron-small-down' => 'Chevron small down',
				'icon-chevron-small-up' => 'Chevron small up',
				'icon-chevron-small-right' => 'Chevron small right',
				'icon-chevron-thin-left' => 'Chevron thin left',
				'icon-chevron-thin-down' => 'Chevron thin down',
				'icon-chevron-thin-up' => 'Chevron thin up',
				'icon-chevron-thin-right' => 'Chevron thin right',
				'icon-left-thin' => 'Left thin',
				'icon-down-thin' => 'Down thin',
				'icon-up-thin' => 'Up thin',
				'icon-right-thin' => 'Right thin',
				'icon-arrow-combo' => 'Arrow combo',
				'icon-three-dots' => 'Three dots',
				'icon-two-dots' => 'Two dots',
				'icon-dot' => 'Dot',
				'icon-cc' => 'CC',
				'icon-cc-by' => 'CC by',
				'icon-cc-nc' => 'CC NC',
				'icon-cc-nc-eu' => 'CC NC EU',
				'icon-cc-nc-jp' => 'CC NC JP',
				'icon-cc-sa' => 'CC sa',
				'icon-cc-nd' => 'CC nd',
				'icon-cc-pd' => 'CC pd',
				'icon-cc-zero' => 'CC zero',
				'icon-cc-share' => 'CC share',
				'icon-cc-remix' => 'CC remix',
				'icon-db-logo' => 'Db logo',
				'icon-db-shape' => 'Db shape',				
				'icon-github' => 'Github',
				'icon-c-github' => 'C Github',
				'icon-flickr' => 'Flickr',
				'icon-c-flickr' => 'C Flickr',
				'icon-vimeo' => 'Vimeo',
				'icon-c-vimeo' => 'C Vimeo',
				'icon-twitter' => 'Twitter',
				'icon-c-twitter' => 'C Twitter',
				'icon-facebook' => 'Facebook',
				'icon-c-facebook' => 'C Facebook',
				'icon-google+' => 'Google+',
				'icon-c-google+' => 'C Google+',
				'icon-pinterest' => 'Pinterest',
				'icon-c-pinterest' => 'C Pinterest',
				'icon-tumblr' => 'Tumblr',
				'icon-c-tumblr' => 'C Tumblr',
				'icon-linkedin' => 'Linkedin',
				'icon-c-linkedin' => 'C Linkedin',
				'icon-dribbble' => 'Dribbble',
				'icon-c-dribbble' => 'C Dribbble',
				'icon-stumbleupon' => 'Stumbleupon',
				'icon-c-stumbleupon' => 'C Stumbleupon',
				'icon-lastfm' => 'Lastfm',
				'icon-c-lastfm' => 'C Lastfm',
				'icon-rdio' => 'Rdio',
				'icon-c-rdio' => 'C Rdio',
				'icon-spotify' => 'Spotify',
				'icon-c-spotify' => 'C Spotify',
				'icon-qq' => 'QQ',
				'icon-instagram' => 'Instagram',
				'icon-dropbox' => 'Dropbox',
				'icon-evernote' => 'Evernote',
				'icon-flattr' => 'Flattr',			
				'icon-skype' => 'Skype',
				'icon-c-skype' => 'C Skype',
				'icon-renren' => 'Renren',
				'icon-sina-weibo' => 'Sina weibo',
				'icon-paypal' => 'Paypal',
				'icon-picasa' => 'Picasa',
				'icon-soundcloud' => 'Soundcloud',
				'icon-mixi' => 'Mixi',
				'icon-behance' => 'Behance',
				'icon-google-circles' => 'Google circles',
				'icon-vk' => 'Vk',
				'icon-smashing' => 'Smashing',
			)
		),
	
	'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link URL', 'framework_localize'),
			'desc' => __('Enter a URL or leave blank to disable linking.<br />ie. http://www.yoursite.com/your-page', 'framework_localize')
		),
		
		
		'target' => array(
			'std' => '_self',
			'type' => 'select',
			'label' => __('Link Target', 'framework_localize'),
			'options' => array(
				'_self' => '_self',
				'_parent' => '_parent',
				'_blank' => '_blank',
				'_top' => '_top',
			)),
),
		
	'shortcode' => '[glg_short_icon style="{{style}}" url="{{url}}" target="{{target}}"][/glg_short_icon]',
);



/*---------------------------------------*/
/* Icons - Mini
/*---------------------------------------*/
$tt_shortcodes['icons-mono'] = array(
	'params' => array(
		
		'style' => array(
			'type' => 'select',
			'label' => __('Icon', 'framework_localize'),
			'options' => array(
				'icon-phone' => 'Phone',
				'icon-mobile' => 'Mobile',
				'icon-mouse' => 'Mouse',
				'icon-address' => 'Address',
				'icon-mail' => 'Mail',
				'icon-paper-plane' => 'Paper plane',
				'icon-pencil' => 'Pencil',
				'icon-feather' => 'Feather',
				'icon-attach' => 'Attach',
				'icon-inbox' => 'Inbox',
				'icon-reply' => 'Reply',
				'icon-reply-all' => 'Reply all',
				'icon-forward' => 'Forward',
				'icon-user' => 'User',
				'icon-users' => 'Users',
				'icon-add-user' => 'Add users',
				'icon-vcard' => 'Vcard',
				'icon-export' => 'Export',
				'icon-location' => 'Location',
				'icon-map' => 'Map',
				'icon-compass' => 'Compass',
				'icon-direction' => 'Direction',
				'icon-hair-cross' => 'Hair cross',
				'icon-share' => 'Share',
				'icon-shareable' => 'Shareable',
				'icon-heart' => 'Heart',
				'icon-heart-empty' => 'Heart empty',
				'icon-star' => 'Star',
				'icon-star-empty' => 'Star empty',
				'icon-thumbs-up' => 'Thumbs up',
				'icon-thumbs-down' => 'Thumbs down',
				'icon-chat' => 'Chat',
				'icon-comment' => 'Comment',
				'icon-quote' => 'Quote',
				'icon-home' => 'Home',
				'icon-popup' => 'Popup',
				'icon-search' => 'Search',
				'icon-flashlight' => 'Flashlight',
				'icon-print' => 'Print',
				'icon-bell' => 'Bell',
				'icon-link' => 'Link',
				'icon-flag' => 'Flag',
				'icon-cog' => 'Cog',
				'icon-tools' => 'Tools',
				'icon-trophy' => 'Trophy',
				'icon-tag' => 'Tag',
				'icon-camera' => 'Camera',
				'icon-megaphone' => 'Megaphone',
				'icon-moon' => 'Moon',
				'icon-palette' => 'Palette',
				'icon-leaf' => 'Leaf',
				'icon-note' => 'Note',
				'icon-beamed-note' => 'Beamed note',
				'icon-new' => 'New',
				'icon-graduation-cap' => 'Graduation cap',
				'icon-book' => 'Book',
				'icon-newspaper' => 'Newspaper',
				'icon-bag' => 'Bag',
				'icon-airplane' => 'Airplane',
				'icon-lifebuoy' => 'Lifebuoy',
				'icon-eye' => 'Eye',
				'icon-clock' => 'Clock',
				'icon-mic' => 'Mic',
				'icon-calendar' => 'Calendar',
				'icon-flash' => 'Flash',
				'icon-thunder-cloud' => 'Thunder cloud',
				'icon-droplet' => 'Droplet',
				'icon-cd' => 'Cd',
				'icon-briefcase' => 'Briefcase',
				'icon-air' => 'Air',
				'icon-hourglass' => 'Hourglass',
				'icon-gauge' => 'Gauge',
				'icon-language' => 'Language',
				'icon-network' => 'Network',
				'icon-key' => 'Key',
				'icon-battery' => 'Battery',
				'icon-bucket' => 'Bucket',
				'icon-magnet' => 'Magnet',
				'icon-drive' => 'Drive',
				'icon-cup' => 'Cup',
				'icon-rocket' => 'Rocket',
				'icon-brush' => 'Brush',
				'icon-suitcase' => 'Suitcase',
				'icon-traffic-cone' => 'Traffic cone',
				'icon-globe' => 'Globe',
				'icon-keyboard' => 'Keyboard',
				'icon-browser' => 'Browser',
				'icon-publish' => 'Publish',
				'icon-progress-3' => 'Progress 3',
				'icon-progress-2' => 'Progress 2',
				'icon-progress-1' => 'Progress 1',
				'icon-progress-0' => 'Progress 0',
				'icon-light-down' => 'Light down',
				'icon-light-up' => 'Light up',
				'icon-adjust' => 'Adjust',
				'icon-code' => 'Code',
				'icon-monitor' => 'Monitor',
				'icon-infinity' => 'Infinity',
				'icon-light-bulb' => 'Light bulb',
				'icon-credit-card' => 'Credit card',
				'icon-database' => 'Database',
				'icon-voicemail' => 'Voicemail',
				'icon-clipboard' => 'Clipboard',
				'icon-cart' => 'Cart',
				'icon-box' => 'Box',
				'icon-ticket' => 'Ticket',
				'icon-rss' => 'RSS',
				'icon-signal' => 'Signal',
				'icon-thermometer' => 'Thermometer',
				'icon-water' => 'Water',
				'icon-sweden' => 'Sweden',
				'icon-line-graph' => 'Line graph',
				'icon-pie-chart' => 'Pie chart',
				'icon-bar-graph' => 'Bar graph',
				'icon-area-graph' => 'Area graph',
				'icon-lock' => 'Lock',
				'icon-lock-open' => 'Lock open',
				'icon-logout' => 'Logout',
				'icon-login' => 'Login',
				'icon-check' => 'Check',
				'icon-cross' => 'Cross',
				'icon-squared-minus' => 'Squared minus',
				'icon-squared-plus' => 'Squared plus',
				'icon-squared-cross' => 'Squared cross',
				'icon-cirlced-minus' => 'Cirlced minus',
				'icon-cirlced-plus' => 'Cirlced plus',
				'icon-cirlced-cross' => 'Cirlced cross',
				'icon-minus' => 'Minus',
				'icon-plus' => 'Plus',
				'icon-erase' => 'Erase',
				'icon-block' => 'Block',
				'icon-info' => 'Info',
				'icon-circled-info' => 'Circled info',
				'icon-help' => 'Help',
				'icon-circled-help' => 'Circled help',
				'icon-warning' => 'Warning',
				'icon-cycle' => 'Cycle',
				'icon-cw' => 'Cw',
				'icon-ccw' => 'Ccw',
				'icon-shuffle' => 'Shuffle',
				'icon-back' => 'Back',
				'icon-level-down' => 'Level down',
				'icon-retweet' => 'Retweet',
				'icon-loop' => 'Loop',
				'icon-back-in-time' => 'Back in time',
				'icon-level-up' => 'Level up',
				'icon-switch' => 'Switch',
				'icon-numbered-list' => 'Numbered list',
				'icon-add-to-list' => 'Add to list',
				'icon-layout' => 'Layout',
				'icon-list' => 'List',
				'icon-text-doc' => 'Text doc',
				'icon-text-doc-inverted' => 'Text doc inverted',
				'icon-doc' => 'Doc',
				'icon-docs' => 'Docs',
				'icon-landscape-doc' => 'Landscape doc',
				'icon-picture' => 'Picture',
				'icon-video' => 'Video',
				'icon-music' => 'Music',
				'icon-folder' => 'Folder',
				'icon-archive' => 'Archive',
				'icon-trash' => 'Trash',
				'icon-upload' => 'Upload',
				'icon-download' => 'Download',
				'icon-save' => 'Save',
				'icon-install' => 'Install',
				'icon-cloud' => 'Cloud',
				'icon-upload-cloud' => 'Upload cloud',
				'icon-bookmark' => 'Bookmark',
				'icon-bookmarks' => 'Bookmarks',
				'icon-open-book' => 'Open book',
				'icon-play' => 'Play',
				'icon-paus' => 'Paus',
				'icon-record' => 'Record',
				'icon-stop' => 'Stop',
				'icon-ff' => 'Ff',
				'icon-fb' => 'Fb',
				'icon-to-start' => 'To start',
				'icon-to-end' => 'To end',
				'icon-resize-full' => 'Resize full',
				'icon-resize-small' => 'Resize small',
				'icon-volume' => 'Volume',
				'icon-sound' => 'Sound',
				'icon-mute' => 'Mute',
				'icon-flow-cascade' => 'Flow cascade',
				'icon-flow-branch' => 'Flow branch',
				'icon-flow-tree' => 'Flow tree',
				'icon-flow-line' => 'Flow line',
				'icon-flow-parallel' => 'Flow parallel',
				'icon-left-bold' => 'Left bold',
				'icon-down-bold' => 'Down bold',
				'icon-up-bold' => 'Up bold',
				'icon-right-bold' => 'Right bold',
				'icon-left' => 'Left',
				'icon-down' => 'Down',
				'icon-up' => 'Up',
				'icon-right' => 'Right',
				'icon-circled-left' => 'Circled left',
				'icon-circled-down' => 'Circled down',
				'icon-circled-up' => 'Circled up',
				'icon-circled-right' => 'Circled right',
				'icon-triangle-left' => 'Triangle left',
				'icon-triangle-down' => 'Triangle down',
				'icon-triangle-up' => 'Triangle up',
				'icon-triangle-right' => 'Triangle right',			
				'icon-chevron-left' => 'Chevron left',
				'icon-chevron-down' => 'Chevron down',
				'icon-chevron-up' => 'Chevron up',
				'icon-chevron-right' => 'Chevron right',
				'icon-chevron-small-left' => 'Chevron small left',
				'icon-chevron-small-down' => 'Chevron small down',
				'icon-chevron-small-up' => 'Chevron small up',
				'icon-chevron-small-right' => 'Chevron small right',
				'icon-chevron-thin-left' => 'Chevron thin left',
				'icon-chevron-thin-down' => 'Chevron thin down',
				'icon-chevron-thin-up' => 'Chevron thin up',
				'icon-chevron-thin-right' => 'Chevron thin right',
				'icon-left-thin' => 'Left thin',
				'icon-down-thin' => 'Down thin',
				'icon-up-thin' => 'Up thin',
				'icon-right-thin' => 'Right thin',
				'icon-arrow-combo' => 'Arrow combo',
				'icon-three-dots' => 'Three dots',
				'icon-two-dots' => 'Two dots',
				'icon-dot' => 'Dot',
				'icon-cc' => 'CC',
				'icon-cc-by' => 'CC by',
				'icon-cc-nc' => 'CC NC',
				'icon-cc-nc-eu' => 'CC NC EU',
				'icon-cc-nc-jp' => 'CC NC JP',
				'icon-cc-sa' => 'CC sa',
				'icon-cc-nd' => 'CC nd',
				'icon-cc-pd' => 'CC pd',
				'icon-cc-zero' => 'CC zero',
				'icon-cc-share' => 'CC share',
				'icon-cc-remix' => 'CC remix',
				'icon-db-logo' => 'Db logo',
				'icon-db-shape' => 'Db shape',				
				'icon-github' => 'Github',
				'icon-c-github' => 'C Github',
				'icon-flickr' => 'Flickr',
				'icon-c-flickr' => 'C Flickr',
				'icon-vimeo' => 'Vimeo',
				'icon-c-vimeo' => 'C Vimeo',
				'icon-twitter' => 'Twitter',
				'icon-c-twitter' => 'C Twitter',
				'icon-facebook' => 'Facebook',
				'icon-c-facebook' => 'C Facebook',
				'icon-google+' => 'Google+',
				'icon-c-google+' => 'C Google+',
				'icon-pinterest' => 'Pinterest',
				'icon-c-pinterest' => 'C Pinterest',
				'icon-tumblr' => 'Tumblr',
				'icon-c-tumblr' => 'C Tumblr',
				'icon-linkedin' => 'Linkedin',
				'icon-c-linkedin' => 'C Linkedin',
				'icon-dribbble' => 'Dribbble',
				'icon-c-dribbble' => 'C Dribbble',
				'icon-stumbleupon' => 'Stumbleupon',
				'icon-c-stumbleupon' => 'C Stumbleupon',
				'icon-lastfm' => 'Lastfm',
				'icon-c-lastfm' => 'C Lastfm',
				'icon-rdio' => 'Rdio',
				'icon-c-rdio' => 'C Rdio',
				'icon-spotify' => 'Spotify',
				'icon-c-spotify' => 'C Spotify',
				'icon-qq' => 'QQ',
				'icon-instagram' => 'Instagram',
				'icon-dropbox' => 'Dropbox',
				'icon-evernote' => 'Evernote',
				'icon-flattr' => 'Flattr',			
				'icon-skype' => 'Skype',
				'icon-c-skype' => 'C Skype',
				'icon-renren' => 'Renren',
				'icon-sina-weibo' => 'Sina weibo',
				'icon-paypal' => 'Paypal',
				'icon-picasa' => 'Picasa',
				'icon-soundcloud' => 'Soundcloud',
				'icon-mixi' => 'Mixi',
				'icon-behance' => 'Behance',
				'icon-google-circles' => 'Google circles',
				'icon-vk' => 'Vk',
				'icon-smashing' => 'Smashing',
			)
		),
		
	
	'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link URL', 'framework_localize'),
			'desc' => __('Enter a URL or leave blank to disable linking. (ie. http://www.themelovin.com)', 'framework_localize')
		),
		
		
		'target' => array(
			'std' => '_self',
			'type' => 'select',
			'label' => __('Link Target', 'framework_localize'),
			'options' => array(
				'_self' => '_self',
				'_parent' => '_parent',
				'_blank' => '_blank',
				'_top' => '_top',
			)),		
),
		
	'shortcode' => '[glg_short_mini_icon style="{{style}}" url="{{url}}" target="{{target}}"][/glg_short_mini_icon]',
);


/*---------------------------------------*/
/* Notification Boxes
/*---------------------------------------*/
$tt_shortcodes['notifications'] = array(
	'params' => array(		
		'style' => array(
			'type' => 'select',
			'label' => __('Style', 'framework_localize'),
			'options' => array(
				'success' => 'Success',
				'error' => 'Error',
				'warning' => 'Warning',
				'tip' => 'Tip',
				'neutral' => 'Neutral',
			)
		),
		
		'size' => array(
			'std' => '12px',
			'type' => 'text',
			'label' => __('Font Size', 'framework_localize'),
	),
	
	'closeable' => array(
			'type' => 'select',
			'label' => __('Closeable?', 'framework_localize'),
			'desc' => __('Select True to make this box closeable on click.', 'framework_localize'),
			'options' => array(
				'true' => 'True',
				'false' => 'False',
			)
		),
		
		'content' => array(
				'std' => 'Awesome content goes here.',
				'type' => 'textarea',
				'label' => __('Content', 'framework_localize'),
			)),
		
	'shortcode' => '[glg_short_notification style="{{style}}" font_size="{{size}}" closeable="{{closeable}}"] {{content}} [/glg_short_notification]',
);



/*---------------------------------------*/
/* Pricing Boxes
/*---------------------------------------*/
$tt_shortcodes['pricing-box'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ',
	'no_preview' => true,
	
	// can be cloned and re-arrange
	'child_shortcode' => array(
		'params' => array(
		
		'column' => array(
				'type' => 'select',
				'label' => __('Width', 'framework_localize'),
				'desc' => 'Select a width for this pricing box.',
				'options' => array(
					'one_half' => 'One Half',
					'one_third' => 'One Third',
					'one_fourth' => 'One Fourth',
					'one_fifth' => 'One Fifth',
				)
			),
		
	
		'style' => array(
				'type' => 'select',
				'label' => __('Style', 'framework_localize'),
				'desc' => 'Select preferred style.',
				'options' => array(
					'style-1' => 'Style 1',
					'style-2' => 'Style 2',
				)
			),

			
		'color' => array(
			'type' => 'select',
			'label' => __('Highlight Color', 'framework_localize'),
			'desc' => __('Select available colors', 'framework_localize'),
			'options' => array(
				'emerald' => 'Emerald',
				'green-apple' => 'Green Apple',
				'river' => 'River',
				'midnight-blue' => 'Midnight Blue',
				'sunset' => 'Sunset',
				'carrot' => 'Carrot',
				'tango' => 'Tango',
				'silver' => 'Silver',
				'concrete' => 'Concrete',
				'dark' => 'Dark',
			)
		),
		
		
		'plan' => array(
			'std' => 'pro',
			'type' => 'text',
			'label' => __('Plan', 'framework_localize'),
			'desc' => __('ie. basic, pro, premium', 'framework_localize')
	),
	
	'currency' => array(
			'std' => '$',
			'type' => 'text',
			'label' => __('Currency Symbol', 'framework_localize'),
			'desc' => __('ie. $, &euro;', 'framework_localize')
	),
	
	'price' => array(
			'std' => '29',
			'type' => 'text',
			'label' => __('Price', 'framework_localize'),
			'desc' => __('ie. 29', 'framework_localize')
	),
	
	'term' => array(
			'std' => 'per month',
			'type' => 'text',
			'label' => __('Term', 'framework_localize'),
			'desc' => __('ie. per month, per year', 'framework_localize')
	),
	
	'button_label' => array(
			'std' => 'Sign up',
			'type' => 'text',
			'label' => __('Button Label', 'framework_localize'),
			'desc' => __('ie. sign up, learn more', 'framework_localize')
	),
	
	'button_size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'framework_localize'),
			'options' => array(
				'small' => 'Small',
				'large' => 'Large',
				'jumbo' => 'Jumbo'
			)
		),
		
		'button_color' => array(
			'type' => 'select',
			'label' => __('Button Color', 'framework_localize'),
			'options' => array(
				'emerald' => 'Emerald',
				'green-apple' => 'Green Apple',
				'river' => 'River',
				'midnight-blue' => 'Midnight Blue',
				'sunset' => 'Sunset',
				'carrot' => 'Carrot',
				'tango' => 'Tango',
				'silver' => 'Silver',
				'concrete' => 'Concrete',
				'dark' => 'Dark',	
			)
		),
	
	'button_url' => array(
			'std' => 'http://www.',
			'type' => 'text',
			'label' => __('Button URL', 'framework_localize'),
			'desc' => __('ie. http://www.your-website.com/purchase', 'framework_localize')
		),
		
		'button_target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'framework_localize'),
			'desc' => __('"_self" opens URL in same window &nbsp; / &nbsp; "_blank" opens URL in new window', 'framework_localize'),
			'options' => array(
				'_self' => '_self',
				'_parent' => '_parent',
				'_blank' => '_blank',
				'_top' => '_top',
			)),
			
			
			'description' => array(
			'std' => '<ul>
<li><strong>50 GB</strong> Sample item 1</li>
<li><strong>100 Emails</strong> Sample item 2</li>
</ul>',
			'type' => 'textarea',
			'label' => __('Description', 'framework_localize'),
	),		
			
		),
		
		'shortcode' => '[glg_short_{{column}}] [glg_short_pricing_box style="{{style}}" color="{{color}}" plan="{{plan}}" currency="{{currency}}" price="{{price}}" term="{{term}}" button_label="{{button_label}}" button_size="{{button_size}}" button_color="{{button_color}}" button_url="{{button_url}}" button_target="{{button_target}}"] {{description}} [/glg_short_pricing_box][/glg_short_{{column}}]',
		'clone_button' => __('+ Add Another Pricing Box', 'framework_localize')
	)
);


/*---------------------------------------*/
/* Social Icons
/*---------------------------------------*/
$tt_shortcodes['social-icons'] = array(
	'params' => array(		
		'design' => array(
			'type' => 'select',
			'label' => __('Design Style', 'framework_localize'),
			'desc' => __('Note: \'Default\' pulls in your theme\'s default link styling.', 'framework_localize'),
			'options' => array(
				'default' => 'Default',
				'color' => 'Color',
				'png' => 'PNG',
				'square' => 'Square',
			)
		),
		
	
	'icon_style' => array(
			'std' => 'normal',
			'type' => 'select',
			'label' => __('Icon Type', 'framework_localize'),
			'options' => array(
				'normal' => 'Normal',
				'round' => 'Round',
			)
		),
		
		'twitter' => array(
				'std' => 'http://twitter.com/your-user-name',
				'type' => 'text',
				'label' => __('Twitter', 'framework_localize'),
				'desc' => __('Enter the full URL to any social account that you\'d like to display', 'framework_localize')
			),
			
		'facebook' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Facebook', 'framework_localize'),
			),
			
		'dribbble' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Dribbble', 'framework_localize'),
			),
			
		'linkedin' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Linkedin', 'framework_localize'),
			),
			
		'vimeo' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Vimeo', 'framework_localize'),
			),
			
		'flickr' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Flickr', 'framework_localize'),
			),
			
		'youtube' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('YouTube', 'framework_localize'),
			),
			
		'pinterest' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Pinterest', 'framework_localize'),
			),
			
		'google' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Google+', 'framework_localize'),
			),
			
		'rss' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('RSS', 'framework_localize'),
			),
			
		'mail' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Email', 'framework_localize'),
				'desc' => __('URL example: mailto:you@yourdomain.com', 'framework_localize')
			),
			
		'skype' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Skype', 'framework_localize'),
			),
			
		'wordpress' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Wordpress', 'framework_localize'),
			),
			
		'instagram' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Instagram', 'framework_localize'),
			)),
	
		
	'shortcode' => '[glg_short_social design="{{design}}" icon_style="{{icon_style}}" twitter="{{twitter}}" facebook="{{facebook}}" dribbble="{{dribbble}}" linkedin="{{linkedin}}" vimeo="{{vimeo}}" flickr="{{flickr}}" youtube="{{youtube}}" pinterest="{{pinterest}}" google="{{google}}" rss="{{rss}}" mail="{{mail}}" skype="{{skype}}" wordpress="{{wordpress}}" instagram="{{instagram}}"]',
);


/*---------------------------------------*/
/* Tabs
/*---------------------------------------*/
$tt_shortcodes['tabs'] = array(
	'params' => array(),
	'shortcode' => '[glg_short_tabset] {{child_shortcode}}[/glg_short_tabset]',
	'no_preview' => true,
	
	// can be cloned and re-arranged
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('Tab Title', 'framework_localize'),
				'std' => ''
			),
			
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Tab Content', 'framework_localize'),
			),
			
			'active' => array(
			'type' => 'select',
			'label' => __('Active Tab?', 'framework_localize'),
			'desc' => __('Should this tab be active by default?', 'framework_localize'),
			'options' => array(
				'no' => 'No',
				'yes' => 'Yes',
			)),
		),
		'shortcode' => '[glg_short_tab title="{{title}}" active="{{active}}"] {{content}} [/glg_short_tab] ',
		'clone_button' => __('+ Add Another Tab', 'framework_localize')
	)
);

/*---------------------------------------*/
/* Team
/*---------------------------------------*/
$tt_shortcodes['team'] = array(
	'no_preview' => true,
	'params' => array(),		
	'shortcode' => '[glg_short_team][/glg_short_team]',
);

/*---------------------------------------*/
/* Testimonials
/*---------------------------------------*/
$tt_shortcodes['testimonials'] = array(
	'params' => array(),
	'shortcode' => '[glg_short_testimonial_set] {{child_shortcode}} [/glg_short_testimonial_set]',
	'no_preview' => true,
	
	
	// can be cloned and re-arrange
	'child_shortcode' => array(
		'params' => array(
			
			'client' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Customer/Client\'s Name', 'framework_localize'),
			),
			
			'testimonialtext' => array(
					'type' => 'textarea',
					'label' => __('Testimonial', 'framework_localize'),
			)

		),
		'shortcode' => '[glg_short_testimonial client="{{client}}"]{{testimonialtext}}[/glg_short_testimonial]',
		'clone_button' => __('+ Add Another Testimonial', 'framework_localize')
	)
);

?>