<?php 
	get_header(); 
	$page_id = get_page_by_path( '/book-an-appointment/' )->ID;
	if( get_field('redirect_or_widget', $page_id ) == true && $post->post_name == 'book-an-appointment' ){
		header( 'Location: ' . get_field('redirect_url', $page_id) ) ;
	}
?>
	<section class="section page">
		<h1 class="section-header page-header"><?php echo $post->post_title; ?></h1>
		<div class="page-content">
			<?php echo apply_filters( 'the_content', $post->post_content );?>
		</div>
	</section>
<?php get_footer(); ?>