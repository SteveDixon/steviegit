<div id="global_wrapper">

    <div id="site_wrapper">
    
        <div id="header_wrapper">

            <div id="header">
                    
                <div id="header_logo">
                
                    <a href="<?php echo site_url(); ?>">[site title]</a>
                
                </div><!-- #header_logo -->

                <div id="header_search">
                
                    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
                
                        <input type="text" value="" name="s" id="s" />
                        
                        <span id="search_button"><i class="fa fa-search"></i></span>
                
                    </form>          
                    
                    
                    <script type="text/javascript">
                    
                        $('#searchform input').keypress(function(event) {
                            if (event.which == 13) {
                                event.preventDefault();
                                $('#searchform').submit();
                            }
                        });
                        
                        $('#search_button').click(function() { $(this).prev('form').toggleClass('show_searchform'); });
                
                    </script> 
                
                </div><!-- #header_search -->
                    
                <div id="header_menu">
                
                    <?php
                    
                        // Creates and inserts the Header Menu
                    
                        $header_menu_args = array(
                                                            'theme_location'  	=>	'header_menu',
                                                            'container'       	=> 	'div',
                                                            'container_class' 	=> 	'',
                                                            'container_id'    	=> 	'header_menu_wrapper',
                                                            'menu_class'     	=> 	'menu',
                                                            'menu_id'         	=> 	'header_menu',
                                                        );
                    
                        wp_nav_menu($header_menu_args);
                    
                    ?>
                
                </div><!-- #header_menu -->
            
            </div><!-- #header -->

        </div><!-- #header_wrapper -->
        
        <div id="main_wrapper">

            <div id="main">