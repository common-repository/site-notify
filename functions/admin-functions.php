<?php	
	// Create Option page in the admin
	function siteNotify_admin_menu() {
	    add_options_page('Site Notification', 'Site Notification', 'manage_options','siteNotify','siteNotify_admin_screen' );
	}

	// Include the template for the admin UI
	function siteNotify_admin_screen() {
		$ds = DIRECTORY_SEPARATOR;
		$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
		$file = "{$base_dir}functions{$ds}admin-ui.php"; 
		include($file);
	}

	// Setting page URL
	function siteNotify_settings_link( $links ) {
	    $settings_link = '<a href="options-general.php?page=siteNotify">' . __( 'Settings' ) . '</a>';
	    array_push( $links, $settings_link );
	  	return $links;
	}

	// Enqueue scripts & styles
	function siteNotify_backend_enqueue() {
		wp_enqueue_style('siteNotify', SITE_NOTIFY_URL . 'assets/css/style.css', array(), SITE_NOTIFY_VERSION);
		wp_enqueue_style('siteNotify', SITE_NOTIFY_URL . 'assets/css/responsive.css', array(), SITE_NOTIFY_VERSION);
		wp_enqueue_script('siteNotify', SITE_NOTIFY_URL .'assets/js/main.js', array('jquery'), SITE_NOTIFY_VERSION);
		wp_localize_script('siteNotify', 'sitenotify', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));	
	}

	// Add additional class on body tag
	function siteNotify_body_class( $classes ) {
		global $wpdb;
        $result = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->options WHERE option_name = %s",'siteNotify_options')); 
        $un_data = unserialize($result[0]->option_value);
        $notify_on_off = $un_data['notify_on_off'];
        if($notify_on_off != 'Off'){
	    	$classes[] = 'activated_sn_plugin';
	    }
	    return $classes;
	}

	// Add options
	function siteNotify_add_items_into_post() {
		if(isset($_REQUEST['formValue'])){ // Get all options by AJAX
		
		
			$time = current_time('mysql'); // Get current time
		
			$siteNotify_options = array(
						'notify_on_off' => sanitize_text_field($_REQUEST['formValue'][0]['val']),
						'notify_type' => sanitize_text_field($_REQUEST['formValue'][1]['val']),
						'bg_color' => sanitize_hex_color($_REQUEST['formValue'][2]['val']),
						'bg_color_opacity' => intval($_REQUEST['formValue'][3]['val']),
						'notify_link' => sanitize_text_field($_REQUEST['formValue'][4]['val']),
						'open_in' => sanitize_text_field($_REQUEST['formValue'][5]['val']),
						'notify_position' => sanitize_text_field($_REQUEST['formValue'][6]['val']),
						'close_btn_type' => sanitize_text_field($_REQUEST['formValue'][7]['val']),
						'notify_head' => sanitize_text_field($_REQUEST['formValue'][8]['val']),
						'head_tags' => sanitize_text_field($_REQUEST['formValue'][9]['val']),
						'headline_color' => sanitize_hex_color($_REQUEST['formValue'][10]['val']),
						'head_top_mar' => intval($_REQUEST['formValue'][11]['val']),
						'head_btm_mar' => intval($_REQUEST['formValue'][12]['val']),
						'head_lft_mar' => intval($_REQUEST['formValue'][13]['val']),
						'head_rgt_mar' => intval($_REQUEST['formValue'][14]['val']),
						'head_top_pad' => intval($_REQUEST['formValue'][15]['val']),
						'head_btm_pad' => intval($_REQUEST['formValue'][16]['val']),
						'head_lft_pad' => intval($_REQUEST['formValue'][17]['val']),
						'head_rgt_pad' => intval($_REQUEST['formValue'][18]['val']),
						'notify_subhead' => sanitize_textarea_field($_REQUEST['formValue'][19]['val']),
						'subhead_tags' => sanitize_text_field($_REQUEST['formValue'][20]['val']),
						'subhead_color' => sanitize_hex_color($_REQUEST['formValue'][21]['val']),
						'subhead_top_mar' => intval($_REQUEST['formValue'][22]['val']),
						'subhead_btm_mar' => intval($_REQUEST['formValue'][23]['val']),
						'subhead_lft_mar' => intval($_REQUEST['formValue'][24]['val']),
						'subhead_rgt_mar' => intval($_REQUEST['formValue'][25]['val']),
						'subhead_top_pad' => intval($_REQUEST['formValue'][26]['val']),
						'subhead_btm_pad' => intval($_REQUEST['formValue'][27]['val']),
						'subhead_lft_pad' => intval($_REQUEST['formValue'][28]['val']),
						'subhead_rgt_pad' => intval($_REQUEST['formValue'][29]['val']),
						'notify_content' => sanitize_textarea_field($_REQUEST['formValue'][30]['val']),
						'text_color' => sanitize_hex_color($_REQUEST['formValue'][31]['val']),
						'font_size' => intval($_REQUEST['formValue'][32]['val']),
						'line_height' => intval($_REQUEST['formValue'][33]['val']),
						'content_top_mar' => intval($_REQUEST['formValue'][34]['val']),
						'content_btm_mar' => intval($_REQUEST['formValue'][35]['val']),
						'content_lft_mar' => intval($_REQUEST['formValue'][36]['val']),
						'content_rgt_mar' => intval($_REQUEST['formValue'][37]['val']),
						'content_top_pad' => intval($_REQUEST['formValue'][38]['val']),
						'content_btm_pad' => intval($_REQUEST['formValue'][39]['val']),
						'content_lft_pad' => intval($_REQUEST['formValue'][40]['val']),
						'content_rgt_pad' => intval($_REQUEST['formValue'][41]['val']),
						'display_in' => sanitize_text_field($_REQUEST['formValue'][42]['val']),
						'user_roles' => sanitize_text_field($_REQUEST['formValue'][43]['val']),
						'notify_time' => sanitize_text_field($_REQUEST['formValue'][44]['val']),
						'toggle_popup' => sanitize_text_field($_REQUEST['formValue'][45]['val']),
						'last_updated' => $time);


			$keys = array_keys($siteNotify_options);
			$keys = array_map('sanitize_key', $keys);

			$values = array_values($siteNotify_options);
			$values = array_map('sanitize_text_field', $values);

			$siteNotify_options = array_combine($keys, $values);

			if(get_option('siteNotify_options') !== false){
				$sn_updt_escaped = update_option('siteNotify_options', $siteNotify_options);
				print_r($sn_updt_escaped);
				die(0);
			}else{
				$sn_updt_escaped = add_option('siteNotify_options', $siteNotify_options);
				print_r($sn_updt_escaped);
				die(0);
			}
			
		} 
	}
?>