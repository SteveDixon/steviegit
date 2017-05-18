<?php get_header(); ?>

<div id="news_header_wrapper" class="single">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
        <div id="news_header">
        
            <span>
            
                <h2><?php the_title(); ?></h2>
                
                <p><?php the_field('subtitle'); ?></p>

            </span>
        
        </div><!-- #news_header -->
    
    </div><!-- #news_header_wrapper -->
    
    <div class="news_wrapper single">
                
        <div class="date">
        
            <span class="title"><?php the_title(); ?></span>
            
            <div id="date_panel">
            
                <span class="month"><?php echo get_the_time('F'); ?></span>
                
                <span class="day"><?php echo get_the_time('j'); ?></span>
                
                <span class="year"><?php echo get_the_time('Y'); ?></span>

            </div><!-- #date_panel -->

        </div><!-- .date -->
    
        <div class="content">
    
            <?php the_content(); ?>
        
        </div><!-- .content -->
        
        <div id="next_story">

            <?php previous_post_link('%link &raquo;', 'Next story'); ?> 
            
        </div><!-- #next_story -->
    
        <div class="single_post_sidebar">

            <?php
            
                $category_array = wp_get_object_terms( $post->ID, 'category');
            
                if ($category_array) {
                    
                    ?><p class="blog_categories"><strong><?php
                    
                    if (count($category_array) == 1) {
                        
                        echo 'Category: ';
                        
                    } else {
                        
                        echo 'Categories: ';
                        
                    } // if (count($category_array) == 1) {
                    
                    ?></strong><?php 
            
                    foreach ($category_array as $key => $category) {
                        
                        ?><a href="<?php echo site_url(); ?>/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a><?php
                    
                        if (($key + 1) != count($category_array)) { echo ', '; }
                    
                    } // foreach ($category_array as $key => $category)
                    
                    ?></p><?php
                    
                } // if ($category_array)
                
            ?>
            
            
        
        
        <?php $tag_array = wp_get_object_terms( $post->ID, 'post_tag');
        
            $number_of_items = count($tag_array);
            
            $incrementer = 0;
            
            if ($tag_array) { ?><p class="blog_tags"><strong><?php if ($number_of_items == 1) { echo 'Tag:'; } else { echo 'Tags:'; } ?></strong>
            

            
            <?php
        
            foreach ($tag_array as $tag) {
            
                $incrementer++;
                
                ?><a href="<?php echo site_url(); ?>/tag/<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a><?php
                
                if ($incrementer != $number_of_items) { echo ', '; }
                
                } // foreach ($tag_array as $tag) ?></p><!-- .blog_tags -->
                
                <?php } // if ($tag_array) ?>   

        </div><!-- .single_post_sidebar -->

    <?php endwhile; endif; ?>

</div><!-- .news_wrapper -->

<?php get_footer(); ?>