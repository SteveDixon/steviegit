<?php

	$flexible_content = get_field('flexible_content');

	if ($flexible_content) {

		foreach ($flexible_content as $flexible_content_array) {
	
			if ($flexible_content_array['acf_fc_layout'] == 'wysiwyg') { include('inc_flexible_content_wysiwyg.php');
				
				} elseif ($flexible_content_array['acf_fc_layout'] == 'xxx') { include('inc_flexible_content_xxx.php');


				} // if ($flexible_content_array['... 
	
		} // foreach ($flexible_content as $flexible_content_array) {
	
	} // if ($flexible_content) {
	
?>