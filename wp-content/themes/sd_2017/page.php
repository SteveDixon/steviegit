<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage sd_2017
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php include('inc_flexible_content.php'); ?>

<?php endwhile; else: ?>

<?php endif; ?>
    
<?php get_footer(); ?>