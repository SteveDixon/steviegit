<?php

/* Adds featured image support */
add_theme_support('post-thumbnails'); 

add_image_size( '300_300', 300, 300, true);
add_image_size( '300_9999', 300, 9999, false);

