<?php
/*
	Custom Search Form (Widget)
	For the Blog Page
*/
?>

<form 
	role="search" 
	method="get" 
	class="searchform" 
	action="<?php echo home_url( '/blog/' ); ?>">
   
    <label>
       
        <span class="searchform-label screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        
        <input 
        	type="search"
        	class="searchform-input"
            placeholder="Search..."
            value="<?php echo get_search_query() ?>"
            name="sq"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />

    </label>


    <input 
    	type="submit"
    	class="searchform-submit" 
    	value="&#xf002;" 

         />
</form>

