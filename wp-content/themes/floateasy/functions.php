<?php 


// configure style/script registration/enqueing, menu registration, after_setup_theme filter
show_admin_bar( false );

add_action( 'after_setup_theme', function(){
	add_theme_support( 'html5' );
	add_theme_support( 'post-thumbnails' );
});

add_action( 'init', function(){
	clean_head();
	register_nav_menu( 'main-nav', 'Main Navigation');
	register_nav_menu( 'footer-nav', 'Footer Navigation');
});

add_action( 'wp_enqueue_scripts', function(){
	register_styles();
	enqueue_styles();
	register_javascript();
	enqueue_javascript();		
});

function enqueue_javascript(){
	wp_enqueue_script( 'theme' );
}
function enqueue_styles(){
	wp_enqueue_style( 'theme' );
}

function register_javascript(){
	wp_register_script( 'theme', get_template_directory_uri() . '/build/js/build.js');
}

function register_styles(){
	wp_register_style( 'theme', get_template_directory_uri() . '/build/css/build.css' );
}

function clean_head(){
	// removes generator tag
	remove_action( 'wp_head' , 'wp_generator' );
	// removes dns pre-fetch
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	// removes weblog client link
	remove_action( 'wp_head', 'rsd_link' );
	// removes windows live writer manifest link
	remove_action( 'wp_head', 'wlwmanifest_link');	
}

// make areas served zips available to javascript
// function localize_areas_served(){
// 	$fields = get_field('locations', 'option');
// 	$fields_array = [];
// 	if(!empty($fields)){
// 		foreach($fields as $field) {
// 			array_push($fields_array, $field['zip']);
// 		}	
// 	}
// 	wp_localize_script( 'theme', 'AreasServed', $fields_array );
// }

// make contact lat lng available to javascript
function localize_contact_address(){
	$fields = [];
	$locations_query = new Locations_Query();
	foreach($locations_query->query->posts as $row){
		// variable
		$infowindow = '';
		// wrapper
		$infowindow .= '<div class="windowinfo-content">';
			// name
			$infowindow .= '<h2 class="locations-sidebar-grid-item-name">' . get_field('addresses-name', $row->ID) . '</h2>';	
			// address
			$infowindow .= '<p class="locations-sidebar-grid-item-address">' . get_field('addresses-gmap', $row->ID)['address'] . '</p>';
			// tel#
			$infowindow .= '<a href="tel:' . filter_var(get_field('contact-office', $row->ID), FILTER_SANITIZE_NUMBER_INT) . '" class="locations-sidebar-grid-item-phone">' . get_field('contact-office', $row->ID) . '</a>';
			// hours
			if(!have_rows('addresses-hours-repeater', $row->ID)):
				$infowindow .= '<div class="locations-sidebar-grid-item-hours">Open 24/7</div>';
			endif;
			if(have_rows('addresses-hours-repeater', $row->ID)): 
				$infowindow .= '<div class="locations-sidebar-grid-item-hours">';
				while(have_rows('addresses-hours-repeater', $row->ID)): the_row();
					$infowindow .= '<div class="locations-sidebar-grid-item-hours-row">';
						$infowindow .= '<span class="locations-sidebar-grid-item-hours-row-daystart">' . get_sub_field('addresses-hours-day-start') . '</span>';
						if( !empty(get_sub_field('addresses-hours-day-end')) ): 
							$infowindow .= '<span class="locations-sidebar-grid-item-hours-row-dayend">- ' . get_sub_field('addresses-hours-day-end') . '</span>';
						endif; 
						if( empty(get_sub_field('addresses-hours-time-start')) && empty(get_sub_field('addresses-hours-time-end')) && get_sub_field('addresses-hours-closed') == false): 
							$infowindow .= '<span class="locations-sidebar-grid-item-hours-row-openallday">: all day</span>';
						endif; 
						if( get_sub_field('addresses-hours-closed') ): 
							$infowindow .= '<span class="locations-sidebar-grid-item-hours-row-closed">: closed</span>';
						else: 
							if( !empty(get_sub_field('addresses-hours-time-start')) ): 
							$infowindow .= '<span class="locations-sidebar-grid-item-hours-row-timestart">: ' . get_sub_field('addresses-hours-time-start') . ' -</span>';
							endif; 
							if( !empty(get_sub_field('addresses-hours-time-end')) ): 
							$infowindow .= '<span class="locations-sidebar-grid-item-hours-row-timeend"> ' . get_sub_field('addresses-hours-time-end') . '</span>';
							endif; 
						endif;
					$infowindow .= '</div>';
				endwhile;
				$infowindow .= '</div>';
			endif;
			// get directions;
			$infowindow .= '<a target="_blank" href="' . 'https://maps.google.com/?q=' . htmlentities(get_field('addresses-gmap')['address']) . '">Get Directions</a>';

			// visit location;
			$infowindow .= '<a href="<?php the_permalink(); ?>" class="locations-sidebar-grid-item-locationlink">Visit Location Page</a>';

			// end wrapper
		$infowindow .= '</div>';

		$field = array(
			get_field('addresses-gmap', $row->ID),
			array(
				'infowindow' => $infowindow,
			),
		);
		array_push($fields, $field);
	}

	global $pagename;
	if( $pagename == 'locations' ):
		wp_localize_script( 'theme', 'Locations', $fields );
	endif;
}

add_action('wp_enqueue_scripts', 'localize_contact_address');


function enqueue_login_scripts(){
	update_login_styles();
	wp_enqueue_style('custom-login', get_template_directory_uri() . '/build/css/login.css' ); 
}
add_action( 'login_enqueue_scripts', 'enqueue_login_scripts' );

// make nav-fadein-toggle available in javascript
function localize_home_dir(){
	wp_localize_script( 'theme', 'Home_URL', get_site_url());
}
add_action('wp_enqueue_scripts', 'localize_home_dir');


function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

function update_login_styles(){
	if(is_login_page()){?>
		<style type="text/css">
			.login{
				background-image: url('<?php echo get_field('general-admin-bg', 'option'); ?>');
				background-size: cover;
				background-repeat: no-repeat;
			}
			#login h1 a, .login h1 a {
	            background-image: url('<?php echo  get_field('general-logo', 'option'); ?>');
	            min-width: 300px;
	            background-size: contain;
	        }
		</style>
	<?php }
}

// add gmap to pages that need it
add_action('wp_enqueue_scripts', 'add_gmaps_script');

function add_gmaps_script(){
	if(get_field('gmaps-api-key', 'option') !== ''){
		wp_enqueue_script('gmaps','https://maps.googleapis.com/maps/api/js?key=' . get_field('gmaps-api-key', 'option') . '&callback=window._initLocationsMap', array(), null, true);	
	}
	else{
		wp_enqueue_script('gmaps','https://maps.googleapis.com/maps/api/js?key=AIzaSyBrRJwJFfNCdVLJwa6yhR8UBZR1m2A018Q&callback=window._initLocationsMap', array(), null, true);	
	}
	// localize_areas_served();
}


// register ACF fields
require('acf.php');


// setup editor and author admin backend
function setup_editor_admin(){
    $user = wp_get_current_user();
    $allowed_roles = array('editor', 'author');

    if ( array_intersect($allowed_roles, $user->roles ) ) {
		$user->add_cap('gform_full_access');
		remove_menu_page( 'edit.php?post_type=page' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'profile.php' );
		remove_menu_page( 'edit-comments.php' );
		// remove_menu_page( 'edit.php' );

		add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
    }
    if ( array_intersect( array('author'), $user->roles ) ) {
    	remove_menu_page( 'edit.php?post_type=coupon' );
    	$user->remove_cap('gform_full_access');
    }
}

add_action('admin_init','setup_editor_admin');


function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

// prevent redirect after login to user.php
add_filter( 'login_redirect', create_function( '$url,$query,$user', 'return site_url("wp-admin");' ), 10, 3 );

// change login screen logo url
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


// get the phone number for headers & footers
function get_the_phone($phonetel = 'phone'){
	$social_phone = get_field('social-phone-number', 'option');
	$contact_office = get_field('social-fax-number', 'option');

	$the_phone = null;
	if(!empty($social_phone)){
		$the_phone = $social_phone;
	}
	else{
		if(!empty($contact_office)){
			$the_phone = $contact_office;
		}
		else{
			$the_phone = '(555) 555-5555';
		}
	}

	$search_for = array('(',')','-',' ','.');
	$replace_with = array('','','','','');
	$tel = str_replace($search_for, $replace_with, $the_phone);
	if($phonetel == 'tel'){
		return $tel;
	}
	else{
		return $the_phone;
	}
}
function get_tel($the_phone){
	$search_for = array('(',')','-',' ','.');
	$replace_with = array('','','','','');
	$tel = str_replace($search_for, $replace_with, $the_phone);
	return $tel;
}
// get the email address for footers
function get_the_email(){
	$social_email = get_field('social-email-address', 'option');
	$the_email = null;
	if( !empty($social_email) ){
		$the_email = $social_email;
	}
	else{
		$the_email = 'example@domain.com';
	}
	return $the_email;
}

// get the fax number for footers
function get_the_fax($phonetel = 'phone'){
	$social_fax = get_field('social-fax-number', 'option');
	$the_fax = null;

	if(!empty($social_fax)){
		$the_fax = $social_fax;
	}

	$rows = get_field('addresses-repeater', 'option');

	foreach($rows as $row){
		if( !empty($row['contact-fax']) && empty($social_fax) ){
			$the_fax = $row['contact-fax'];
		}
	}

	if($the_fax == null){
		$the_fax = '555-555-5555';
	}

	$search_for = array('(',')','-',' ','.');
	$replace_with = array('','','','','');
	$tel = str_replace($search_for, $replace_with, $the_fax);
	if($phonetel == 'tel'){
		return $tel;
	}
	else{
		return $the_fax;
	}
}


function render_post_social_links($post_id, $link_class, $icon_class){
	$social_links_string = '';
	$permalink = get_permalink($post_id);

	$facebook_url = 'https://www.facebook.com/dialog/feed?app_id=209491889470337&link=' . rawurlencode($permalink);
	$twitter_url = 'https://twitter.com/home?status=' . urlencode($permalink);
	$googleplus_url = 'https://plus.google.com/share?url=' . $permalink;
	$pinterest_url = '//pinterest.com/pin/create/link/?url=' . rawurlencode($permalink) . '&media=' . wp_get_attachment_url( get_post_thumbnail_id($post_id) ) . '&description=' . rawurlencode(get_post($post_id)->post_title);
	$tumblr_url = 'http://www.tumblr.com/share/link?url=' . urlencode($permalink);
	$mailto_url = "mailto:your@friend.com?&body=I%20think%20you'll%20like%20this%20page%3A%20" . rawurlencode($permalink);

	// facebook (doesnt work on localhost but works on production url)
	$social_links_string .= '<a target="_blank" class="sociallink ' . $link_class . '" href="' . $facebook_url . '"><i class="fa fa-facebook ' . $icon_class . ' sociallink-icon"></i></a>';
	// twitter
	$social_links_string .= '<a target="_blank" class="sociallink ' . $link_class . '" href="' . $twitter_url . '"><i class="fa fa-twitter ' . $icon_class . ' sociallink-icon"></i></a>';
	// googleplus (doesnt work on localhost but works on production url)
	$social_links_string .= '<a target="_blank" class="sociallink ' . $link_class . '" href="' . $googleplus_url . '"><i class="fa fa-google-plus ' . $icon_class . ' sociallink-icon"></i></a>';
	// pinterest
	$social_links_string .= '<a target="_blank" class="sociallink ' . $link_class . '" href="' . $pinterest_url . '"><i class="fa fa-pinterest-p ' . $icon_class . ' sociallink-icon"></i></a>';
	// tumblr (doesnt work on localhost but works with production url)
	$social_links_string .= '<a target="_blank" class="sociallink ' . $link_class . '" href="' . $tumblr_url . '"><i class="fa fa-tumblr ' . $icon_class . ' sociallink-icon"></i></a>';
	// mailto
	$social_links_string .= '<a class="sociallink ' . $link_class . '" href="' . $mailto_url . '"><i class="fa fa-envelope ' . $icon_class . ' sociallink-icon"></i></a>';

	echo $social_links_string;
}

function get_blog_image($post_id){
	$image_url = '';

	if( !empty( wp_get_attachment_url( get_post_thumbnail_id($post_id) ) ) ){
		$image_url = wp_get_attachment_url( get_post_thumbnail_id($post_id) );
	}
	else{
		$image_url = get_field('featured-placeholder', 'option');
	}

	return $image_url;
}




function get_logo(){
	return get_field('general-logo', 'option');	
}

function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


function wpse_233129_admin_menu_items() {
    global $menu;

    foreach ( $menu as $key => $value ) {
        if ( 'edit.php' == $value[2] ) {
            $oldkey = $key;
        }
    }

    $newkey = 86; // use whatever index gets you the position you want
    // if this key is in use you will write over a menu item!
    $menu[$newkey]=$menu[$oldkey];
    $menu[$oldkey]=array();

}
// add_action('admin_menu', 'wpse_233129_admin_menu_items');


if(!function_exists('rows_empty')){
	function rows_empty($key, $src = 'option'){
		try {
			$rows = get_field($key, $src);
			$count = [];
			foreach( $rows as $row ){
				array_values($row)[0] == false ? array_push($count, false) : array_push($count, true);
			}
			if( in_array(true, $count) ){
				return false;
			}
			else{
				return true;
			}
		} catch (Exception $e) {
			echo $e;
		}
	}
}


if(!function_exists('the_bg')){
	function the_bg($slug, $useslug = true){
		if(!$useslug){
			$bg = get_field($slug, 'option');
		}
		else{
			$bg = get_field($slug . '-bg', 'option');	
		}
		$output = '';
		if( !empty($bg) ){
			$output .= '<div class="parallax">';
			$output .=     '<img class="parallax-image" src="' . $bg . '">';
			$output .= '</div>';
			echo $output;
		}
	}
}


/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function register_location_post_type() {

	$labels = array(
		'name'                => 'Locations',
		'singular_name'       => 'Location',
		'add_new'             => 'Add New Location',
		'add_new_item'        => 'Add New Location',
		'edit_item'           => 'Edit Location',
		'new_item'            => 'New Location',
		'view_item'           => 'View Location',
		'search_items'        => 'Search Locations',
		'not_found'           => 'No Locations found',
		'not_found_in_trash'  => 'No Locations found in Trash',
		'parent_item_colon'   => 'Parent Location:',
		'menu_name'           => 'Locations',
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 86,
		'menu_icon'           => 'dashicons-location-alt',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'location', $args );
}

add_action( 'init', 'register_location_post_type' );


require get_template_directory() . '/partials/NavWalker.php';






// retrieve and return locations search results/errors/messages
class Locations_Query{
	public $search_query;
	private $states = array(
		'AL'=>'ALABAMA',
		'AK'=>'ALASKA',
		'AZ'=>'ARIZONA',
		'AR'=>'ARKANSAS',
		'CA'=>'CALIFORNIA',
		'CO'=>'COLORADO',
		'CT'=>'CONNECTICUT',
		'DE'=>'DELAWARE',
		'DC'=>'DISTRICT OF COLUMBIA',
		'FL'=>'FLORIDA',
		'GA'=>'GEORGIA',
		'HI'=>'HAWAII',
		'ID'=>'IDAHO',
		'IL'=>'ILLINOIS',
		'IN'=>'INDIANA',
		'IA'=>'IOWA',
		'KS'=>'KANSAS',
		'KY'=>'KENTUCKY',
		'LA'=>'LOUISIANA',
		'ME'=>'MAINE',
		'MD'=>'MARYLAND',
		'MA'=>'MASSACHUSETTS',
		'MI'=>'MICHIGAN',
		'MN'=>'MINNESOTA',
		'MS'=>'MISSISSIPPI',
		'MO'=>'MISSOURI',
		'MT'=>'MONTANA',
		'NE'=>'NEBRASKA',
		'NV'=>'NEVADA',
		'NH'=>'NEW HAMPSHIRE',
		'NJ'=>'NEW JERSEY',
		'NM'=>'NEW MEXICO',
		'NY'=>'NEW YORK',
		'NC'=>'NORTH CAROLINA',
		'ND'=>'NORTH DAKOTA',
		'OH'=>'OHIO',
		'OK'=>'OKLAHOMA',
		'OR'=>'OREGON',
		'PA'=>'PENNSYLVANIA',
		'PR'=>'PUERTO RICO',
		'RI'=>'RHODE ISLAND',
		'SC'=>'SOUTH CAROLINA',
		'SD'=>'SOUTH DAKOTA',
		'TN'=>'TENNESSEE',
		'TX'=>'TEXAS',
		'UT'=>'UTAH',
		'VT'=>'VERMONT',
		'VI'=>'VIRGIN ISLANDS',
		'VA'=>'VIRGINIA',
		'WA'=>'WASHINGTON',
		'WV'=>'WEST VIRGINIA',
		'WI'=>'WISCONSIN',
		'WY'=>'WYOMING',
	);
	private $json_response;
	public $json_results;
	private $geocoder_prefix = 'http://maps.googleapis.com/maps/api/geocode/json?address=';
	private $search_results = [];
	public $query;
	public function __construct(){

		$this->query = new WP_Query(array(
			'post_type' => 'location',
			'posts_per_page' => -1,
			'orderby' => 'name',
			'order' => 'ASC',
		));

		if( !empty($_GET) && isset($_GET['q']) ){
			$this->search_query = $_GET['q'];	

			$this->curl_response($this->geocoder_prefix . urlencode($this->search_query));

			if( $this->json_response->status !== 'OK' ){
				$this->is_error = true;
				$this->error_msg = 'Could not connect to Google Maps Geocoder. Error code: ' + $this->json_response->status + '. Please check your internet connection and try again or contact your site administrator.';
				return $this;
			}
			else{
				$this->json_results = $this->json_response->results[0];
				
				$latlong = $this->json_results->geometry->location;

				foreach($this->query->posts as $post){
					$post_meta = get_field('addresses-gmap', $post->ID);

					// is a state search
					if( in_array( strtoupper($this->search_query), array_values($this->states) ) || in_array( strtoupper($this->search_query), array_keys($this->states) ) ){
						// if used abbreviation
						if( in_array( strtoupper($this->search_query), array_keys($this->states) ) ){
							$abbreviation = array_keys($this->states)[array_search(strtoupper($this->search_query), array_keys($this->states))];
							if( strpos($post_meta['address'], ' ' . $abbreviation . ' ') !== false ){
								array_push($this->search_results, $post);
							}
						}
						// if used full state name
						else if ( in_array( strtoupper($this->search_query), array_values($this->states) ) ) {
							$abbreviation = array_keys($this->states)[array_search(strtoupper($this->search_query), array_values($this->states))];
							if( strpos($post_meta['address'], ' ' . $abbreviation . ' ') !== false ){
								array_push($this->search_results, $post);
							}
						}
					}
					// is a zip code search
					else{
						if( $this->distance($latlong->lat, $latlong->lng, $post_meta['lat'], $post_meta['lng']) < get_field('locations-search-radius', 'option') ){
							array_push($this->search_results, $post);
						}
					}
				}
				$this->query->posts = $this->search_results;
				$this->query->found_posts = count($this->search_results);
				$this->query->post_count = $this->query->found_posts;
				return $this;
			}
		}
		else{
			// return wp_query with all results
			return $this;
		}
	}
	private function curl_response($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url );
		$this->json_response = json_decode(curl_exec($ch));
		curl_close($ch);
	}

	private function distance($lat1, $lon1, $lat2, $lon2, $unit = 'M') {

		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} 
		else if ($unit == "N") {
			return ($miles * 0.8684);
		} 
		else {
			return $miles;
		}
	}
}

























?>