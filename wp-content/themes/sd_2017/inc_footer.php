            </div><!-- #main -->

        </div><!-- #main_wrapper -->
        
        <div id="footer_wrapper">

            <div id="footer">
    
                <div id="footer_menu">
    
                    <?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
                
                </div><!-- #footer_menu -->

            </div><!-- #footer -->
        
        </div><!-- #footer_wrapper -->

	</div><!-- #site_wrapper -->
    
    <div id="mobile_menu_off_menu_click_layer"></div>
    
    <div id="mobile_menu_wrapper">
    
    	<div id="mobile_menu">
        
			<?php wp_nav_menu(array('theme_location' => 'mobile_menu')); ?>
        
        </div><!-- mobile_menu -->
        
        <a id="mobile_menu_trigger"><i class="fa fa-bars"></i></a>
    
    </div><!-- #mobile_menu_wrapper -->

</div><!-- #global_wrapper -->