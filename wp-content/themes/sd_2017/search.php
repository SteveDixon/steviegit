<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage sd_2017
 */
 


get_header(); ?>

<?php

	global $query_string;
	
	$query_args = explode("&", $query_string);
	$search_query = array();
	
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
	
	$search = new WP_Query($search_query);

?>

        <div id="breadcrumbs">
        
            <a href="<?php echo site_url(); ?>">Home</a> &raquo; Search results for: "<?php echo $s; ?>"
        
        </div><!-- #breadcrumbs -->

    
        <div class="wysiwyg_panel search">

            <h1>Search results: "<?php echo $s; ?>"</h1>
        
            <?php if ($search->have_posts()) { ?>
            
                <div id="search_results">  
            
                    <?php while ($search->have_posts()) : $search->the_post(); ?>
                    
                        <div class="search_results_item">

                            <h2>
                            
                                <?php if ($post->post_type == 'post') { ?><span>News article: </span><?php } ?>
                                
                                <?php if ($post->post_type == 'project') { ?><span>Project: </span><?php } ?>
                                
                                <?php if ($post->post_type == 'product') { ?><span>Product: </span><?php } ?>
                                
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            
                            </h2>
                            

                                <?php if ($post->post_type == 'page') { ?>
                                
                                    <p class="search_extract">[<a href="<?php the_permalink(); ?>">read more</a>]</p>
                                
                                <?php } // if ($post->post_type == 'page') { ?>
                                
                                
                                <?php if ($post->post_type == 'post') { ?>
                                
                                    <p class="search_extract"><?php echo trim_text(get_field('excerpt', $post->ID), '250'); ?> [<a href="<?php the_permalink(); ?>">read more</a>]</p>
                                
                                <?php } // if ($post->post_type == 'post') { ?>     
                                
                                
                                <?php if ($post->post_type == 'project') { ?>
                                    
                                    <p class="search_extract"><?php echo trim_text(get_field('about', $post->ID), '250'); ?> [<a href="<?php the_permalink(); ?>">read more</a>]</p>

                                <?php } // if ($post->post_type == 'project') { ?>
                                
                                
                                <?php if ($post->post_type == 'product') { ?>
                                
                                   <p class="search_extract">[<a href="<?php the_permalink(); ?>">read more</a>]</p>

                                <?php } // if ($post->post_type == 'product') { ?>        

                        </div><!-- .search_results_item -->
                    
                    <?php endwhile; ?>
                
                </div><!-- #search_results -->
                    
                <?php } else { ?>
                
                    <div id="search_results"> 
                
                        <p>Sorry, no search results results for "<?php echo $s; ?>"</p>
                    
                    </div><!-- #search_results -->
            
            <?php } // if ($search->have_posts()) { ?>
        
            <?php wp_pagenavi(); ?>
            
            <?php wp_reset_postdata(); ?>

        </div><!-- wysiwyg_panel -->

    
<?php get_footer(); ?>