<?php 

get_header();

$modules = array(
	'hero',
	'benefits',
	'testimonials',
	'pricing'
);

foreach($modules as $module){
	include( locate_template('modules/home-' . $module . '.php') );
}

get_footer();

?>