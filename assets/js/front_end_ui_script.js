
jQuery(document).ready(function() {
	jQuery('.activated_sn_plugin .sn_main_fe_ui').slideToggle('slow');
	jQuery('.activated_sn_plugin .sn_main_fe_ui .close_box').click(function(){
	jQuery('.activated_sn_plugin .sn_main_fe_ui').slideToggle('slow');
	jQuery('.activated_sn_plugin .sn_popup').fadeOut('slow');
	});
});