// Add current class on click tab start
jQuery(document).ready(function(){
  jQuery(".sn_tabs .lft_tabs li").click(function(){
    jQuery('.sn_tabs .lft_tabs li.current').removeClass('current');
    jQuery(this).addClass('current');
  });

  jQuery(".sn_tabs .right_tabs li").click(function(){
    jQuery('.sn_tabs .right_tabs li.current').removeClass('current');
    jQuery(this).addClass('current');
  });
// Add current class on click tab end

// Site notify admin left side menus JS start
  jQuery('.sn_tabs .lft_tabs li:first-child').addClass('current');
  jQuery('#sn-settings-form .tab-content').hide();
  jQuery('#sn-settings-form .tab-content:first').show();

  jQuery('.sn_tabs .lft_tabs li').click(function(){
    jQuery('.sn_tabs .lft_tabs li').removeClass('current');
    jQuery(this).addClass('current');
    jQuery('#sn-settings-form .tab-content').hide();
    var activeTab = jQuery(this).find('a').attr('href');
    jQuery(activeTab).fadeIn();
    return false;
  });
// Site notify admin left side menus JS end


// Site notify admin right side menus JS start

  jQuery('.sn_tabs .right_tabs li:first-child').addClass('current');
  jQuery('.overview_samples .tab-content').hide();
  jQuery('.overview_samples .tab-content:first').show();

  jQuery('.sn_tabs .right_tabs li').click(function(){
    jQuery('.sn_tabs .right_tabs li').removeClass('current');
    jQuery(this).addClass('current');
    jQuery('.overview_samples .tab-content').hide();
    var activeTab = jQuery(this).find('a').attr('href');
    jQuery(activeTab).fadeIn();
    return false;
  });
  // Site notify admin right side menus JS end

// Change pre-define templates via JS start
  jQuery("#notify_type").change(function(){
    var choosen = jQuery(this).val();

    if(choosen == 'Custom'){
      jQuery('.sn_samples').hide();
    }else if(choosen == 'Success'){
      jQuery('#bg_color').removeAttr('value');
      jQuery('.sn_samples, .success_img').show();
      jQuery('.warning_img, .info_img, .danger_img, .simple_img').hide();
    }else if(choosen == 'Warning'){
      jQuery('#bg_color').removeAttr('value');
      jQuery('.sn_samples, .warning_img').show();
      jQuery('.success_img, .info_img, .danger_img, .simple_img').hide();
    }else if(choosen == 'Info'){
      jQuery('#bg_color').removeAttr('value');
      jQuery('.sn_samples, .info_img').show();
      jQuery('.success_img, .warning_img, .danger_img, .simple_img').hide();
    }else if(choosen == 'Danger'){
      jQuery('#bg_color').removeAttr('value');
      jQuery('.sn_samples, .danger_img').show();
      jQuery('.success_img, .warning_img, .info_img, .simple_img').hide();
    }else{
      jQuery('#bg_color').removeAttr('value');
      jQuery('.sn_samples, .simple_img').show();
      jQuery('.success_img, .warning_img, .info_img, .danger_img').hide();
    }

  });

  jQuery("select#notify_type").change(function(){
      var custom_design = jQuery(this).val();
      if(custom_design != 'Custom'){
          jQuery('.settings_page_siteNotify .sn-tbl tr.none').addClass('hidden');
      }else{
          jQuery('.settings_page_siteNotify .sn-tbl tr.none').removeClass('hidden');
      }
  });
// Change pre-define templates via JS end


// Submit data to DB start

  jQuery('#sn-settings-form input[type="submit"]').click(function(){
    var inValue = [];
      jQuery("[name$='-sn-input']").each(function(){
        gteValue = {val: jQuery(this).val(),id: jQuery(this).attr("id")};
        inValue.push(gteValue);
      });
      jQuery.ajax({
        type: 'POST',
        url: ajaxurl,
        data : {action: 'siteNotify_add_items_into_post','formValue':inValue },
        beforeSend: function() {
          jQuery('img.submit_loading').show();
        },
        success: function(sn_updt_escaped) {
          jQuery('img.submit_loading').hide();
          if(sn_updt_escaped == true){
            jQuery('.aftr_submit .updtd_txt').show();
            jQuery('.aftr_submit .updtd_txt').fadeOut(4000);
          }else{
            jQuery('.aftr_submit .error_txt').show();
            jQuery('.aftr_submit .error_txt').fadeOut(4000);
          }
        }
      });
  });
// Submit data to DB end
});