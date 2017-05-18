<?php
/**
 * The main template file.
 *
 * @package WordPress
 * @subpackage sd_2017
 */

get_header(); ?>

<div id="news_header_wrapper">
        
    <div id="news_header wysiwyg">
    
        <?php if (is_archive()) { ?>

            <?php if (is_tag()) { ?>

                <h2><strong>Tag:</strong> <?php echo get_queried_object()->name; ?></h2>
            
            <?php } // if (is_tag()) ?>
    
            <?php if (is_category()) { ?>
            
                <h2><strong>Category:</strong> <?php echo get_queried_object()->name; ?></h2>

            <?php } // if (is_category()) ?>
            
            <?php if (is_author()) { ?>

                <h2><strong>Posts by author:</strong> <?php echo $wp_query->query_vars['author_name']; ?></h2>

            <?php } // if (is_author()) ?>
    
            <?php if (is_date()) { ?>

                <h2><strong>News Archive:</strong> <?php echo date("F", mktime(0, 0, 0, $wp_query->query_vars['monthnum'], 10)); ?> <?php echo $wp_query->query_vars['year']; ?></h2>

            <?php } // if (is_date()) ?>
        
        <?php } else { ?>

            <h2>News</h2>
        
        <?php } ?>

    </div><!-- #news_header -->

</div><!-- #news_header_wrapper -->

<div class="news_wrapper wysiwyg">
        
    <?php if (have_posts()) { ?>
    
        <?php while (have_posts()) : the_post(); ?>
        
            <div class="excerpt_image">
        
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                
                <p><span>By:</span> <?php the_author_posts_link(); ?><br />
                <span>Date:</span> <?php echo get_the_time('F jS Y', $post->ID); ?> &nbsp;&nbsp;
                
                <?php $category_array = wp_get_object_terms( $post->ID, 'category');
                
                    $number_of_items = count($category_array);
                    
                    $incrementer = 0;
                    
                    if ($number_of_items == 1) { echo '<span>Category:</span>'; } else { echo '<span>Categories:</span>'; } ?>
                    
                    <?php
                
                    foreach ($category_array as $category) {
                    
                        $incrementer++;
                        
                        ?><a href="<?php echo site_url(); ?>/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a><?php
                        
                        if ($incrementer != $number_of_items) { echo ', '; }
                        
                        } // foreach ($category_array as $category) ?>
                        
                        
                    <?php $tag_array = wp_get_object_terms( $post->ID, 'post_tag');
                    
                        $number_of_items = count($tag_array);
                        
                        $incrementer = 0;
                        
                        if ($tag_array) { ?>&nbsp;&nbsp; <span><?php if ($number_of_items == 1) { echo 'Tag:'; } else { echo 'Tags:'; } ?></span>
                        
                        <?php
                    
                        foreach ($tag_array as $tag) {
                        
                            $incrementer++;
                            
                            ?><a href="<?php echo site_url(); ?>/tag/<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a><?php
                            
                            if ($incrementer != $number_of_items) { echo ', '; }
                            
                            } // foreach ($tag_array as $tag) ?>
                            
                            <?php } // if ($tag_array) ?>
    
                        </p>
                        
    
            
            </div><!-- .excerpt_image -->
        
            <div class="excerpt_content">
            
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
                <div class="excerpt">
        
                    <?php the_excerpt(); ?>
                
                </div><!-- .excerpt -->
                        
                <p class="read_more"><a href="<?php the_permalink(); ?>">Read more ...</a></p>
    
            </div><!-- .excerpt_content -->
        
        <?php endwhile; ?>
        
    <?php } else { ?>
    
        <?php if (is_search()) { ?>	
    
            <p>Sorry, no news stories matched your search</p>
            
        <?php } else { ?>
        
            <p>Sorry, there are no matching news stories</p>
        
        <?php } ?>

    <?php } // if (have_posts()) { ?>
    
    <?php wp_pagenavi(); ?>

    <div class="blog_sidebar_item archive">
    
        <h3 class="title">Archive</h3>
        
        <ul>
        
            <?php
            
                $monthly_args = array(
                                    'type'				=>	'monthly',
                                    'show_post_count'	=>	false,
                                    
                            );
        
                 wp_get_archives($monthly_args); ?>
        
        </ul>
    
    </div><!-- .blog_sidebar_item archive -->
    
    <div class="blog_sidebar_item categories">
    
        <h3 class="title">Categories</h3>
        
        <ul>
        
            <?php $category_list_args = array(
                                                'title_li'           	=>	__( '' ),
                                                'show_count'			=>	0,
                                                'hide_empty'			=>	1,
                                                'orderby'				=>	'count',
                                                'order'					=>	'DESC',
                                                'number'				=>	null
                                            );
            
                wp_list_categories($category_list_args); ?>
        
        </ul>
    
    </div><!-- .blog_sidebar_item categories -->
    
    <div class="blog_sidebar_item tags">
    
        <h3 class="title">Tags</h3>
        
            <?php
            
                $tag_cloud_args = array(
                                            'smallest'   	=> 	14, 
                                            'largest'		=> 	14,
                                            'unit' 			=> 	'px',
                                            'number'		=>	null,
                                            'orderby'		=>	'count',
                                            'order'			=>	'DESC',
                                            'format'		=>	'list'
                                                
                                        );
            
                wp_tag_cloud( $tag_cloud_args );
                
            ?> 
    
    </div><!-- .blog_sidebar_item tag -->

</div><!-- .news_wrapper wysiwyg -->

    
<?php get_footer(); ?>