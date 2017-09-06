<?php 

wp_head();

echo '<h1 class="terms-header">Terms &amp; Conditions</h1>';

echo '<div class="terms">' . apply_filters('the_content', $post->post_content) . '</div>';

wp_footer();

?>