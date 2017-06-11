<?php 
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'read_private_posts',
		'icon_url'      => 'dashicons-admin-settings',
		'redirect'		=> false,
		'position'      => 7,
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Terms & Conditions',
		'menu_title'	=> 'Terms & Conditions',
		'menu_slug' 	=> 'terms-settings',
		'capability'	=> 'activate_plugins',
		'icon_url'      => 'dashicons-list-view',
		'redirect'		=> false,
		'position'      => 88,
	));


	acf_add_options_page(array(
		'page_title' 	=> 'Testimonials',
		'menu_title'	=> 'Testimonials',
		'menu_slug' 	=> 'testimonials-settings',
		'capability'	=> 'read_private_posts',
		'icon_url'      => 'dashicons-format-quote',
		'redirect'		=> false,
		'position'      => 87,
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Benefits',
		'menu_title'	=> 'Benefits',
		'menu_slug' 	=> 'benefits-settings',
		'capability'	=> 'read_private_posts',
		'icon_url'      => 'dashicons-smiley',
		'redirect'		=> false,
		'position'      => 83,
	));

}


function add_acf_fields() {
	

	// Benefits Settings

	acf_add_local_field_group(array(
		'key' => 'group_1032af32afhfd',
		'title' => ' ',
		'fields' => array (
			array (
				'key' => 'field_89a',
				'label' => 'Home Page',
				'type' => 'tab',
			),
			array(
				'key' => 'field_n217sdtg12',
				'label' => '<h1>Section 1</h1>',
				'type' => 'message',
			),
			array(
				'key' => 'field_n217dsag',
				'label' => 'Section 1 Header',
				'name' => 'benefits-section-1-header',
				'type' => 'text',
			),
			array(
				'key' => 'field_pfh32213',
				'label' => 'Section 1 List',
				'name' => 'benefits-section-1-repeater',
				'type' => 'repeater',
				'button_label' => 'Add List Item',
				'sub_fields' => array(
					array(
						'key' => 'field_mpfhaaa21af',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
					),
				),
				'layout' => 'row',
			),
			array(
				'key' => 'field_n217sddddddtg12',
				'label' => '<h1>Section 2</h1>',
				'type' => 'message',
			),
			array(
				'key' => 'field_n21aa7dsag',
				'label' => 'Section 2 Header',
				'name' => 'benefits-section-2-header',
				'type' => 'text',
			),
			array(
				'key' => 'field_pfh3aa2213',
				'label' => 'Section 2 List',
				'name' => 'benefits-section-2-repeater',
				'type' => 'repeater',
				'button_label' => 'Add List Item',
				'sub_fields' => array(
					array(
						'key' => 'field_mpfhzzz21af',
						'label' => 'Text',
						'type' => 'text',
						'name' => 'text',
					),
				),
				'layout' => 'row',
			),
			array(
				'key' => 'field_n21zzfeefef7sdtg12',
				'label' => '<h1>Section 3</h1>',
				'type' => 'message',
			),
			array(
				'key' => 'field_n217aaffddsag',
				'label' => 'Section 3 Header',
				'name' => 'benefits-section-3-header',
				'type' => 'text',
			),
			array(
				'key' => 'field_pfffh32213',
				'label' => 'Section 3 List',
				'name' => 'benefits-section-3-repeater',
				'type' => 'repeater',
				'button_label' => 'Add List Item',
				'sub_fields' => array(
					array(
						'key' => 'field_mpfhf2zc1af',
						'label' => 'Text',
						'type' => 'text',
						'name' => 'text',
					),
				),
				'layout' => 'row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'benefits-settings',
				),
			),
		),
	));

	// FAQ Settings

	acf_add_local_field_group(array(
		'key' => 'group_1032hf0329238d',
		'title' => ' ',
		'fields' => array (
			array (
				'key' => 'field_89fffo',
				'label' => '<h1>FAQ Items</h1>',
				'name' => 'faq-repeater',
				'type' => 'repeater',
				'button_label' => 'Add FAQ Item',
				'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'field_nczohewg',
						'label' => 'Header',
						'type' => 'text',
						'name' => 'header',
					),
					array(
						'key' => 'field_nzp12gadf',
						'label' => 'Content',
						'type' => 'textarea',
						'new_lines' => 'br',
						'name' => 'content',
					),
				),
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => 1846,
				),
			),
		),
	));



	// Terms & Conditions Settings

	acf_add_local_field_group(array(
		'key' => 'group_1032hfd',
		'title' => ' ',
		'fields' => array (
			array (
				'key' => 'field_89ahzbdjao',
				'label' => 'Content',
				'name' => 'terms-content',
				'type' => 'wysiwyg',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'terms-settings',
				),
			),
		),
	));


	// Terms & Conditions Settings

	acf_add_local_field_group(array(
		'key' => 'group_10aefuahi32hfd',
		'title' => ' ',
		'fields' => array (
			array (
				'key' => 'field_89ahzbdjao',
				'label' => 'Why become a member WYSIWYG',
				'name' => 'whymemmber-content',
				'type' => 'wysiwyg',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => 1838,
				),
			),
		),
	));


	// General Settings 

	acf_add_local_field_group(array(
		'key' => 'group_5',
		'title' => ' ',
		'fields' => array (
			array(
				'key' => 'field_8b7ahnwfe',
				'message' => '<h1>Click on a tab below to see its corresponding settings. Click "Update" in the top right to save.</h1>',
				'type' => 'message',
			),
			array(
				'key' => 'field_876646',
				'label' => 'Sitewide Misc.',
				'name' => 'sitewide-misc',
				'type' => 'tab',
			),	
			array(
				'key' => 'field_2343135',
				'label' => 'Site Logo',
				'name' => 'general-logo',
				'type' => 'image',
				'return_format' => 'url',
			),
			array(
				'key' => 'field_13366',
				'label' => 'Login Background Image URL',
				'name' => 'general-admin-bg',
				'type' => 'url',
			),
			array(
				'key' => 'field_83nbjd',
				'label' => 'Image Placeholder',
				'instructions' => 'This is the image that will pop up if there\'s no featured image provided in a blog post.',
				'type' => 'image',
				'return_format' => 'url',
				'preview_size' => 'medium',
				'name' => 'featured-placeholder',
			),
			array(
				'key' => 'field_23436',
				'label' => 'Google Maps API Key',
				'type' => 'text',
				'name' => 'gmaps-api-key',
				'instructions' => 'Anything here but a Google API Key won\'t work. Please make sure that on your project on console.developers.google.com has the Google Maps Geocode API and the Google Maps Javascript API enabled and it\'s restrictions are set appropriately.',
			),
			array(
				'key' => 'field_128372613bad21',
				'label' => 'Nav',
				'type' => 'tab',
			),
			array(
				'key' => 'field_bdsh8fbds12',
				'label' => 'Book Appointment URL',
				'type' => 'url',
				'name' => 'book-appointment-url',
			),
			array(
				'key' => 'field_218372173',
				'label' => 'Home',
				'name' => 'home-settings',
				'type' => 'tab',
			),
			array(
				'key' => 'field_bn210yfhad',
				'type' => 'message',
				'label' => 'The placeholder field is a fallback if none of the videos load and while the videos load.<br/> The reason for multiple video formats is for maximizing cross-browser compatibility.<br/>If you\'re converting files on your own use handbrake (cross-platform) or miro if you\'re on a mac.',
			),
			array(
				'key' => 'field_323412fadfcza',
				'label' => 'Video Placeholder Image',
				'name' => 'hero-placeholder',
				'type' => 'image',
				'return_format' => 'url',
			),
			array(
				'key' => 'field_71bzhdg2afe',
				'label' => 'Video MP4',
				'name' => 'hero-mp4',
				'type' => 'file',
				'return_format' => 'url',
			),
			array(
				'key' => 'field_7afjbhdg2afe',
				'label' => 'Video WebM',
				'name' => 'hero-webm',
				'type' => 'file',
				'return_format' => 'url',
			),
			array(
				'key' => 'field_218372012173',
				'label' => 'Blog',
				'name' => 'blog-settings',
				'type' => 'tab',
			),
			array(
				'key' => 'field_218372012112173',
				'label' => '404',
				'name' => 'general-404-settings',
				'type' => 'tab',
			),
			array(
				'key' => 'field_16',
				'label' => '404 Background Image',
				'name' => 'general-404-bg',
				'type' => 'image',
				'return_format' => 'url',
				'preview_size' => 'medium',
				'instructions' => '404 is the page that shows up when a page can\'t be found',
			),
			array(
				'key' => 'field_217710',
				'label' => '404 Header Text',
				'name' => 'general-404-header',
				'type' => 'text',
				'instructions' => 'If left blank this defaults to "404"',
				'default_value' => '404',
			),
			array(
				'key' => 'field_217752110',
				'label' => '404 Subheader Text',
				'name' => 'general-404-subheader',
				'type' => 'textarea',
				'new_lines' => 'br',
				'instructions' => 'If left blank this defaults to "The requested page is not available. Click here to return home."',
			),
			array(
				'key' => 'field_8712000',
				'label' => 'Social',
				'name' => 'social-settings',
				'type' => 'tab',
			),
			array(
				'key' => 'field_833',
				'label' => 'Facebook Page Link',
				'name' => 'social-facebook-link',
				'type' => 'url',
				'instructions' => 'Put the link to your facebook page here. Leave this field blank if you don\'t want this social link to show up.',
			),
			array(
				'key' => 'field_834',
				'label' => 'Twitter Page Link',
				'name' => 'social-twitter-link',
				'type' => 'url',
				'instructions' => 'Put the link to your twitter page here. Leave this field blank if you don\'t want this social link to show up.',
			),
			array(
				'key' => 'field_835',
				'label' => 'Instagram Page Link',
				'name' => 'social-instagram-link',
				'type' => 'url',
				'instructions' => 'Put the link to your instagram page here. Leave this field blank if you don\'t want this social link to show up.',
			),
			array(
				'key' => 'field_836',
				'label' => 'YouTube Page Link',
				'name' => 'social-youtube-link',
				'type' => 'url',
				'instructions' => 'Put the link to your youtube page here. Leave this field blank if you don\'t want this social link to show up.',
			),
			array(
				'key' => 'field_87bnzkap3k',
				'label' => 'Google+ Page Link',
				'name' => 'social-googleplus-link',
				'type' => 'url',
				'instructions' => 'Put the link to your google plus page here. Leave this field blank if you don\'t want this social link to show up.',
			),
			array(
				'key' => 'field_bdaa98',
				'label' => 'Headquarters Address',
				'name' => 'social-address',
				'type' => 'google_map',
				'center_lat' => '40.141256',	
				'center_lng' => '-97.681034',
				'instructions' => 'This is the address that appears in the footer. If left blank it will default to the first address in the contact page then a fake address.',
			),
			array(
				'key' => 'field_zifhef',
				'label' => 'Headquarters Address Line 2',
				'name' => 'social-address-line2',
				'type' => 'text',
				'instructions' => 'This is the second line of the address provided above which will be inserted before the first comma. Useful for suite number, apartment number, floor number etc.',
			),
			array(
				'key' => 'field_8378888',
				'label' => 'Headquarters Phone Number',
				'name' => 'social-phone-number',
				'type' => 'text',
			),
			array(
				'key' => 'field_8378ddf888',
				'label' => 'Headquarters Fax Number',
				'name' => 'social-fax-number',
				'type' => 'text',
			),
			array(
				'key' => 'field_n16SDtg21',
				'label' => 'Locations',
				'type' => 'tab',
			),
			array(
				'key' => 'field_87dfab12d',
				'label' => 'Locations Search Radius',
				'name' => 'locations-search-radius',
				'type' => 'number',
				'default' => 50,
				'wrapper' => array(
					'width' => '50',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'general-settings',
				),
			),
		),
	));


	// Testimonials Settings 

	acf_add_local_field_group(array(
		'key' => 'group_6',
		'title' => ' ',
		'fields' => array (
			array(
				'key' => 'field_19',
				'label' => 'Background Image',
				'name' => 'testimonials-bg',
				'type' => 'image',
				'preview_size' => 'medium',
				'return_format' => 'url',
			),	
			array(
				'key' => 'field_17',
				'label' => 'Testimonials',
				'name' => 'testimonials-repeater',
				'type' => 'repeater',
				'button_label' => 'Add Testimonial',
				'sub_fields' => array(
					array(
						'key' => 'field_9fda',
						'label' => 'Personal Testimonial or YouTube Embed?',
						'type' => 'select',
						'name' => 'testimonials-repeater-select',
						'choices' => array(
							'personal' => 'Written Testimonial',
							'youtube' => 'Video Testimonial',
						),
					),
					array(
						'key' => 'field_18',
						'label' => 'Image',
						'name' => 'testimonials-repeater-image',
						'type' => 'image',
						'preview_size' => 'medium',
						'return_format' => 'url',
						'required' => true,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_9fda',
									'operator' => '==',
									'value' => 'personal',
								),
							),
						),
					),
					array(
						'key' => 'field_20',
						'label' => 'Testimonial',
						'name' => 'testimonials-repeater-quote',
						'type' => 'textarea',
						'instructions' => 'Boundary quotes will be added for you. Also, you can\'t create new lines here',
						'required' => true,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_9fda',
									'operator' => '==',
									'value' => 'personal',
								),
							),
						),
					),
					array(
						'key' => 'field_21',
						'label' => 'Customer',
						'name' => 'testimonials-repeater-name',
						'type' => 'text',
						'required' => true,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_9fda',
									'operator' => '==',
									'value' => 'personal',
								),
							),
						),
					),
					array(
						'key' => 'field_a9d7bh',
						'label' => 'YouTube Embed',
						'type' => 'text',
						'name' => 'testimonials-repeater-youtube',
						'instructions' => 'Click on "Share" on the YouTube video page and you\'ll find a link like this: https://youtu.be/QPFGfr664og then select & copy the part after the last "/" (in this case: QPFGfr664og) and paste it here.',
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_9fda',
									'operator' => '==',
									'value' => 'youtube',
								),
							),
						),
					),
					array(
						'key' => 'field_n2107dag',
						'label' => 'Social Links',
						'name' => 'testimonials-social-repeater',
						'type' => 'repeater',
						'button_label' => 'Add Social Link',
						'layout' => 'row',
						'sub_fields' => array(
							array(
								'key' => 'field_2721h12',
								'label' => 'Social Link Type',
								'name' => 'testimonials-social-repeater-linktype',
								'type' => 'select',
								'choices' => array(
									'yelp' => 'Yelp',
									'facebook' => 'Facebook',
									'google-plus' => 'Google +',
								),
							),
							array(
								'key' => 'field_nzvvh8y213',
								'label' => 'Social Link URL',
								'name' => 'testimonials-social-repeater-linkurl',
								'type' => 'url',
							),
						),
					),
				),
				'layout' => 'row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'testimonials-settings',
				),
			),
		),
	));


	// Locations Settings 

	acf_add_local_field_group(array(
		'key' => 'group_7',
		'title' => ' ',
		'fields' => array (
			array(
				'key' => 'field_93717167122',
				'label' => 'General',
				'type' => 'tab',
			),
			array(
				'key' => 'field_3771721fda',
				'label' => 'Location Name',
				'type' => 'text',
				'name' => 'addresses-name',
				'instructions' => 'If there\'s no official name try providing something about the address eg: "Main St. Location".',
				'required' => true,
			),
			array(
				'key' => 'field_1817262',
				'label' => 'Map',
				'type' => 'google_map',
				'name' => 'addresses-gmap',
				'center_lat' => '40.141256',	
				'center_lng' => '-97.681034',
				'required' => true,
			),
			array(
				'key' => 'field_86fdas',
				'label' => 'Address Line 2',
				'type' => 'text',
				'name' => 'addresses-extra',
				'instructions' => 'Suite number, apt number, floor number etc. Will be applied before the first comma in the address',
			),
			array(
				'key' => 'field_937171vff',
				'label' => "Hours",
				'type' => 'tab',
			),
			array(
				'key' => 'field_3876f',
				'label' => 'Hours',
				'name' => 'addresses-hours-repeater',
				'type' => 'repeater',
				'button_label' => 'Add Hours',
				'instructions' => 'Leave blank if you want "24/7" to appear instead.',
				'sub_fields' => array(
					array(
						'key' => 'field_877aa6ff8',
						'label' => 'Day Start',
						'name' => 'addresses-hours-day-start',
						'type' => 'select',
						'choices' => array(
							'sun' => 'Sun',
							'mon' => 'Mon',
							'tues' => 'Tues',
							'wed' => 'Wed',
							'thurs' => 'Thurs',
							'fri' => 'Fri',
							'sat' => 'Sat',
						),
						'required' => true,
						'allow_null' => true,
					),
					array(
						'key' => 'field_8776ff8',
						'label' => 'Day End',
						'name' => 'addresses-hours-day-end',
						'type' => 'select',
						'instructions' => 'Leave this blank if you want these hours to be applied to one day instead of a range of days',
						'choices' => array(
							'sun' => 'Sun',
							'mon' => 'Mon',
							'tues' => 'Tues',
							'wed' => 'Wed',
							'thurs' => 'Thurs',
							'fri' => 'Fri',
							'sat' => 'Sat',
						),
						'allow_null' => true,
					), 
					array(
						'key' => 'field_983y112',
						'name' => 'addresses-hours-time-start',
						'type' => 'time_picker',
						'label' => 'Time Start',
						'instructions' => 'Leave both Time Start and Time End blank if you want "All Day" to appear instead.',
					),
					array(
						'key' => 'field_983y11b12',
						'name' => 'addresses-hours-time-end',
						'type' => 'time_picker',
						'label' => 'Time End',
						'instructions' => 'Leave both Time Start and Time End blank if you want "All Day" to appear instead.',
					),
					array(
						'key' => 'field_983y1a1b12',
						'name' => 'addresses-hours-closed',
						'type' => 'true_false',
						'label' => 'Closed?',
						'instructions' => 'If you are closed this day tick this box-sizing.',
					),
				),
			),
			array(
				'key' => 'field_8937ffdsa',
				'label' => 'Phone Numbers',
				'type' => 'tab',
			),
			array(
				'key' => 'field_26',
				'label' => 'Office Phone Number',
				'type' => 'text',
				'name' => 'contact-office',
			),
			array(
				'key' => 'field_27',
				'label' => 'Fax Number',
				'type' => 'text',
				'name' => 'contact-fax',
			),
			array(
				'key' => 'field_27bafgg1',
				'label' => 'Gallery/Video',
				'type' => 'tab',
			),	
			array(
				'key' => 'field_72b1gsdagfew',
				'label' => 'Gallery',
				'type' => 'gallery',
				'name' => 'gallery',
			),
			array(
				'key' => 'field_n21gfgh123',
				'label' => 'Videos',
				'type' => 'repeater',
				'name' => 'videos_repeater',
				'button_label' => 'Add Video',
				'sub_fields' => array(
					array(
						'key' => 'field_n21126dtafg',
						'label' => 'Video',
						'type' => 'oembed',
						'name' => 'video',
					),
				),
			),
			array(
				'key' => 'field_721b3hdafhe',
				'label' => 'Team',
				'type' => 'tab',
			),	
			array(
				'key' => 'field_n21hdgzgaaef',
				'label' => 'Members',
				'type' => 'repeater',
				'name' => 'members_repeater',
				'button_label' => 'Add Member',
				'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'field_21312yghfae',
						'label' => 'Name',
						'type' => 'text',
						'name' => 'name',
					),
					array(
						'key' => 'field_21312adfayghfae',
						'label' => 'Title',
						'type' => 'text',
						'name' => 'title',
						'instructions' => 'eg. Manager',
					),
					array(
						'key' => 'field_nzhdaf',
						'label' => 'Photo',
						'type' => 'image',
						'return_format' => 'url',
						'name' => 'image',
					),
					array(
						'key' => 'field_nvzvbudsufh',
						'label' => 'Bio',
						'type' => 'wysiwyg',
						'name' => 'wysiwyg',
					),
				),
			),
			array(
				'key' => 'field_721yadgfgew',
				'label' => 'Social',
				'type' => 'tab',
			),
			array(
				'key' => 'field_n21nppadfhhe',
				'label' => 'Yelp Page',
				'type' => 'url',
				'name' => 'yelp',
				'instructions' => 'This is used to generate the "Write a Review" button',
			),
			array(
				'key' => 'field_n21n12fhahhe',
				'label' => 'Mindbody Link',
				'type' => 'url',
				'name' => 'mindbody',
				'instructions' => 'This is used to generate the "Book an Appointment" button',
			),
			array(
				'key' => 'field_nzpuewhf123',
				'label' => 'Other Social Links',
				'type' => 'repeater',
				'name' => 'social_repeater',
				'button_label' => 'Add Social Link',
				'sub_fields' => array(
					array(
						'key' => 'field_7213hfapzcxuh',
						'label' => 'Network',
						'name' => 'network',
						'type' => 'select',
						'choices' => array(
							'facebook' => 'Facebook',
							'twitter' => 'Twitter',
							'google-plus' => 'Google Plus',
							'instagram' => 'Instagram',
							'youtube-play' => 'YouTube',
						),
						'wrapper' => array(
							'width' => '50',
						),
					),
					array(
						'key' => 'field_721ghadfgjkef',
						'label' => 'URL',
						'name' => 'url',
						'type' => 'url',
						'wrapper' => array(
							'width' => '50',
						),
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'location',
				),
			),
		),
	));
}

add_action('acf/init', 'add_acf_fields');



// update google map api key
function set_acf_google_api_key(){
	if(get_field('gmaps-api-key', 'option') !== ''){
		acf_update_setting('google_api_key', get_field('gmaps-api-key', 'option'));	
	}
	else{
		acf_update_setting('google_api_key', 'AIzaSyBrRJwJFfNCdVLJwa6yhR8UBZR1m2A018Q');
	}

}

add_action('acf/init', 'set_acf_google_api_key');


function my_acf_input_admin_footer() {
	
?>
	<script type="text/javascript">
		
		acf.add_filter('color_picker_args', function( args, $field ){
			
			// do something to args
			args = {
				color: false,
			    mode: 'hsl',
			    controls: {
			        horiz: 's', // horizontal defaults to saturation
			        vert: 'h', // vertical defaults to lightness
			        strip: 'l' // right strip defaults to hue
			    },
			    hide: true, // hide the color picker by default
			    border: true, // draw a border around the collection of UI elements
			    target: false, // a DOM element / jQuery selector that the element will be appended within. Only used when called on an input.
			    width: 400, // the width of the collection of UI elements
			    palettes: false // show a palette of basic colors beneath the square.
			}
			
			
			// return
			return args;
					
		});
		
	</script>
<?php
		
}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

?>