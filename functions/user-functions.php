<?php
	// register scripts & styles
	function siteNotify_frontend_enqueue() {	
		wp_enqueue_script('notify_slugs', SITE_NOTIFY_URL .'assets/js/front_end_ui_script.js', array('jquery'));
		wp_enqueue_style('notify_slug', SITE_NOTIFY_URL . 'assets/css/front_end_ui.css', array(), SITE_NOTIFY_VERSION);
	}

	// Get back-end fields data to the front-end
	function siteNotify_frontend_ui(){
		global $wpdb;
        $result = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->options WHERE option_name = %s", 'siteNotify_options'));

        $un_data = unserialize($result[0]->option_value);

        // Get all options
        $notify_on_off = $un_data['notify_on_off'];
        $notify_link = $un_data['notify_link'];
        $open_in = $un_data['open_in'];
        $close_btn_type = $un_data['close_btn_type'];
        $notify_type = $un_data['notify_type'];
        $head_tags = $un_data['head_tags'];
        $notify_head = $un_data['notify_head'];
        $subhead_tags = $un_data['subhead_tags'];
        $notify_subhead = $un_data['notify_subhead'];
        $font_size = $un_data['font_size'];
        $line_height = $un_data['line_height'];
        $notify_content = $un_data['notify_content'];
        $user_roles = $un_data['user_roles'];
        $notify_position = $un_data['notify_position'];
        $toggle_popup = $un_data['toggle_popup'];
        $notify_time = $un_data['notify_time'];        
        $bg_color_opacity = $un_data['bg_color_opacity'];

        // Get heading CSS options
	    $headline_color = $un_data['headline_color'];
        if($un_data['head_top_mar'] != ''){$head_top_mar = $un_data['head_top_mar'];}else{$head_top_mar = 0;}
        if($un_data['head_btm_mar'] != ''){$head_btm_mar = $un_data['head_btm_mar'];}else{$head_btm_mar = 0;}
        if($un_data['head_lft_mar'] != ''){$head_lft_mar = $un_data['head_lft_mar'];}else{$head_lft_mar = 0;}
        if($un_data['head_rgt_mar'] != ''){$head_rgt_mar = $un_data['head_rgt_mar'];}else{$head_rgt_mar = 0;}
        if($un_data['head_top_pad'] != ''){$head_top_pad = $un_data['head_top_pad'];}else{$head_top_pad = 0;}
        if($un_data['head_btm_pad'] != ''){$head_btm_pad = $un_data['head_btm_pad'];}else{$head_btm_pad = 0;}
        if($un_data['head_lft_pad'] != ''){$head_lft_pad = $un_data['head_lft_pad'];}else{$head_lft_pad = 0;}
        if($un_data['head_rgt_pad'] != ''){$head_rgt_pad = $un_data['head_rgt_pad'];}else{$head_rgt_pad = 0;}
        $head_margin = $head_top_mar.'px '.$head_rgt_mar.'px '.$head_btm_mar.'px '.$head_lft_mar.'px;';
        $head_padding = $head_top_pad.'px '.$head_rgt_pad.'px '.$head_btm_pad.'px '.$head_lft_pad.'px;';

        // Get subheading CSS options
        $subhead_color = $un_data['subhead_color'];
        if($un_data['subhead_top_mar'] != ''){$subhead_top_mar = $un_data['subhead_top_mar'];}else{$subhead_top_mar = 0;}
        if($un_data['subhead_btm_mar'] != ''){$subhead_btm_mar = $un_data['subhead_btm_mar'];}else{$subhead_btm_mar = 0;}
        if($un_data['subhead_lft_mar'] != ''){$subhead_lft_mar = $un_data['subhead_lft_mar'];}else{$subhead_lft_mar = 0;}
        if($un_data['subhead_rgt_mar'] != ''){$subhead_rgt_mar = $un_data['subhead_rgt_mar'];}else{$subhead_rgt_mar = 0;}
        if($un_data['subhead_top_pad'] != ''){$subhead_top_pad = $un_data['subhead_top_pad'];}else{$subhead_top_pad = 0;}
        if($un_data['subhead_btm_pad'] != ''){$subhead_btm_pad = $un_data['subhead_btm_pad'];}else{$subhead_btm_pad = 0;}
        if($un_data['subhead_lft_pad'] != ''){$subhead_lft_pad = $un_data['subhead_lft_pad'];}else{$subhead_lft_pad = 0;}
        if($un_data['subhead_rgt_pad'] != ''){$subhead_rgt_pad = $un_data['subhead_rgt_pad'];}else{$subhead_rgt_pad = 0;}
        $subhead_margin = $subhead_top_mar.'px '.$subhead_rgt_mar.'px '.$subhead_btm_mar.'px '.$subhead_lft_mar.'px;';
        $subhead_padding = $subhead_top_pad.'px '.$subhead_rgt_pad.'px '.$subhead_btm_pad.'px '.$subhead_lft_pad.'px;';

        // Get content CSS options
        $text_color = $un_data['text_color'];
        if($un_data['content_top_mar'] != ''){$content_top_mar = $un_data['content_top_mar'];}else{$content_top_mar = 0;}
        if($un_data['content_btm_mar'] != ''){$content_btm_mar = $un_data['content_btm_mar'];}else{$content_btm_mar = 0;}
        if($un_data['content_lft_mar'] != ''){$content_lft_mar = $un_data['content_lft_mar'];}else{$content_lft_mar = 0;}
        if($un_data['content_rgt_mar'] != ''){$content_rgt_mar = $un_data['content_rgt_mar'];}else{$content_rgt_mar = 0;}
        if($un_data['content_top_pad'] != ''){$content_top_pad = $un_data['content_top_pad'];}else{$content_top_pad = 0;}
        if($un_data['content_btm_pad'] != ''){$content_btm_pad = $un_data['content_btm_pad'];}else{$content_btm_pad = 0;}
        if($un_data['content_lft_pad'] != ''){$content_lft_pad = $un_data['content_lft_pad'];}else{$content_lft_pad = 0;}
        if($un_data['content_rgt_pad'] != ''){$content_rgt_pad = $un_data['content_rgt_pad'];}else{$content_rgt_pad = 0;}
        $content_margin = $content_top_mar.'px '.$content_rgt_mar.'px '.$content_btm_mar.'px '.$content_lft_mar.'px;';
        $content_padding = $content_top_pad.'px '.$content_rgt_pad.'px '.$content_btm_pad.'px '.$content_lft_pad.'px;';
        if($font_size != ''){$cont_fs = 'font-size:'.$font_size.'px;';}else{$cont_fs = '';}
        if($line_height != ''){$cont_lh = 'line-height:'.$line_height.'px;';}else{$cont_lh = '';}

		if($notify_link != ''){$href = esc_url($notify_link);}else{$href = '';} // For anchor href
	    if($open_in != ''){$target = 'target='.esc_attr($open_in);}else{$target = '';} // For anchor target

        if($notify_type == 'Custom'){
        	if($bg_color_opacity != 10){ // For opacity
	        	$full_op = '0.';
	        }else{
	        	$full_op = '';
	        }

        	$bg_color = $un_data['bg_color'];
			$color = trim($bg_color, "#"); 
		    if( strlen($color) == 6 ){
		    	// Convert HEXA to rgba
		        $r = hexdec( substr($color, 0, 2) );
		        $g = hexdec( substr($color, 2, 2) );
		        $b = hexdec( substr($color, 4, 2) );
		        $bg_color_main = 'rgba('.$r.','.$g.','.$b.','.$full_op.''.$bg_color_opacity.')';
		    }
        }else{
        	$bg_color_main = '';
        }

        // For dynamic CSS
        ?>
    	<style type="text/css">
			.sn_main_fe_ui.sn_type_Custom{
				background-color: <?php echo esc_html($bg_color_main); ?>;
			}
			.sn_main_fe_ui.sn_type_Custom span{
				color: <?php echo esc_html($bg_color_main); ?>;
				background-color: <?php echo esc_html($headline_color); ?>;
			}
			.sn_main_fe_ui.sn_type_Custom .notify_inner .notify_head .tmp_clr{
				color: <?php echo esc_html($headline_color); ?>;
			}
			.sn_main_fe_ui.sn_type_Custom .notify_inner .notify_subhead .tmp_clr{
				color: <?php echo esc_html($subhead_color); ?>;
			}
			.sn_main_fe_ui.sn_type_Custom .notify_inner .content.tmp_clr{
				color: <?php echo esc_html($text_color); ?>;
			}
			.sn_main_fe_ui .notify_inner .notify_head .tmp_clr{
				margin: <?php echo esc_html($head_margin); ?>;
				padding: <?php echo esc_html($head_padding); ?>;
			}
			.sn_main_fe_ui .notify_inner .notify_subhead .tmp_clr{
				margin: <?php echo esc_html($subhead_margin); ?>;
				padding: <?php echo esc_html($subhead_padding); ?>;
			}
			.sn_main_fe_ui .notify_inner .content.tmp_clr{
				margin: <?php echo esc_html($content_margin); ?>;
				padding: <?php echo esc_html($content_padding); ?>;
				<?php echo esc_html($cont_fs); ?>;
				<?php echo esc_html($cont_lh); ?>;
			}
		</style>
        <?php

	    // For change position of nofity start
		if(($notify_position === 'Above Header' || $notify_position === 'On Header') && $toggle_popup === 'Popup'){
			$add_class = 'sn_popup';
		}elseif($notify_position === 'On Header' && $toggle_popup ==='Toggle'){
			$add_class = 'sn_fixed';
		}
		// For change position of nofity end

		$display_in = $un_data['display_in']; // For set pages
		if($display_in === 'Front Page'){
			$frnt_pg = is_front_page();
		}else{
			$frnt_pg = '';
		}

	    $user_role = strtolower($user_roles); // check user role

	    // Set & unset COOKIE start
	    $cookie_name = "one_tym";
		$cookie_value = "only_one_tym";
		if($notify_time == '1 Time On Page Load'){
			setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
		}else{
			unset($_COOKIE[$cookie_name]);
		}
		// Set & unset COOKIE end

		$user = wp_get_current_user(); // check current user
	    if (($user->roles[0] == $user_role || $user_role == '') && $notify_on_off == 'On') {
	    	if(!isset($_COOKIE[$cookie_name])) {
		    	if($frnt_pg){ // Only for front page
		          ?>
		          	<div class="sn_main_ui_wrap <?php echo esc_attr($add_class); ?>">
	          			<div class="sn_main_fe_ui sn_type_<?php echo esc_attr($notify_type); ?>" style="display:none;">
	          				<span class="close_box"><?php echo esc_html($close_btn_type); ?></span>
	          				<a href="<?php echo esc_url($href); ?>" <?php echo esc_attr($target); ?>>	                    	
		                    	<div class="notify_middle_wrap">
		                        	<div class="notify_inner">
											<?php 	
									if($notify_head != ''){ ?>
											<div class="notify_head">
											<<?php echo esc_html($head_tags);?> class="tmp_clr"><?php echo esc_html($notify_head);?> </<?php echo esc_html($head_tags);?>>
										</div>
										<?php
									}
									if($notify_subhead != ''){ ?>
									
										<div class="notify_subhead">
					                        <<?php echo esc_html($subhead_tags);?> class="tmp_clr"> <?php echo esc_html($notify_subhead);?></ <?php esc_html($subhead_tags);?> >
					                    </div> <?php  
									}
									if($notify_content != ''){	?>
		                        		
		                        		<div class="content tmp_clr">
											<?php echo esc_html($notify_content);?>
										</div>
										<?php 	
									}
									?>
		                        	</div>
		                    	</div>
	                		</a>
	                	</div>
	                </div>
		          <?php
		    	}elseif($display_in === 'All Pages'){ // For All pages
		    	  ?>
		          	<div class="sn_main_ui_wrap <?php echo esc_attr($add_class); ?>">
	          			<div class="sn_main_fe_ui sn_type_<?php echo esc_attr($notify_type); ?>" style="display:none;">
	          				<span class="close_box"><?php echo esc_html($close_btn_type); ?></span>
	          				<a <?php echo esc_url($href); ?> <?php echo esc_attr($target); ?>>	                    	
		                    	<div class="notify_middle_wrap">
		                        	<div class="notify_inner">
									<?php 	
									if($notify_head != ''){ ?>
											<div class="notify_head">
											<<?php echo esc_html($head_tags);?> class="tmp_clr"><?php echo esc_html($notify_head);?> </<?php echo esc_html($head_tags);?>>
										</div>
										<?php
									}
									if($notify_subhead != ''){ ?>
									
										<div class="notify_subhead">
					                        <<?php echo esc_html($subhead_tags);?> class="tmp_clr"> <?php echo esc_html($notify_subhead);?></ <?php esc_html($subhead_tags);?> >
					                    </div> <?php  
									}
									if($notify_content != ''){	?>
		                        		
		                        		<div class="content tmp_clr">
											<?php echo esc_html($notify_content);?>
										</div>
										<?php 	
									}
									?>
		                        	</div>
		                    	</div>
	                		</a>
	                	</div>
	                </div>
		          <?php
		    	}
		    }
	    }
	}
?>