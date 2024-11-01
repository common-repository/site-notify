<?php //Admin UI start ?>

<div class="sn-main">



    <div class="sn-wrapper">



        <div class="sn-welcome">



            
            <h1><?php echo esc_html('Welcome to Site Notification'); ?></h1>
            



        </div>



        <div class="sn_tabs">



            <ul class="lft_tabs">



                <li><a href="<?php echo esc_url('#tab1')?>"><?php echo esc_html('General Settings'); ?></a></li>



                <li><a href="<?php echo esc_url('#tab2')?>"><?php echo esc_html('Headline Settings'); ?></a></li>



                <li><a href="<?php echo esc_url('#tab3')?>"><?php echo esc_html('Sub Headline Settings'); ?></a></li>



                <li><a href="<?php echo esc_url('#tab4')?>"><?php echo esc_html('Content Settings'); ?></a></li>



                <li><a href="<?php echo esc_url('#tab5')?>"><?php echo esc_html('Advance Settings'); ?></a></li>



            </ul>



            <ul class="right_tabs">



                <li><a href="<?php echo esc_url('#tab6')?>"><?php echo esc_html('Overview'); ?></a></li>



                <li><a href="<?php echo esc_url('#tab7')?>"><?php echo esc_html('Samples'); ?></a></li>



            </ul>



        </div>



        <div class="admin_main">



            <div class="form-data">



                <form method="post" id="sn-settings-form" enctype="multipart/form-data" action="javaScript:;">



                    <div class="sn-general-tab common tab-content" id="tab1">



                        <h1><?php echo esc_html('General Settings:'); ?></h1>



                        <table class="sn-tbl form-table">



                            <?php



                                global $wpdb;

                                $result = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->options WHERE option_name = %s","siteNotify_options")); 

                                // Get all data from the DB

                                $un_data = unserialize($result[0]->option_value); // Data unserialize



                                $notify_on_off = $un_data['notify_on_off'];



                                $notify_type = $un_data['notify_type'];



                                $open_in = $un_data['open_in'];



                                $notify_position = $un_data['notify_position'];



                                $close_btn_type = $un_data['close_btn_type'];



                                $head_tags = $un_data['head_tags'];



                                $subhead_tags = $un_data['subhead_tags'];



                                $display_in = $un_data['display_in'];



                                $user_roles = $un_data['user_roles'];



                                $notify_time = $un_data['notify_time'];



                                $toggle_popup = $un_data['toggle_popup'];



                                $bg_color_opacity = $un_data['bg_color_opacity'];

                                

                            ?>



                            <tr>



                                <th><?php echo esc_html('Notify On/Off:'); ?></th>



                                <td>



                                    <select name="notify_on_off-sn-input" id="notify_on_off">



                                        <option value="Off" <?php echo $resultOff = $notify_on_off == 'Off' ? 'selected' : ''; ?> >Off</option>



                                        <option value="On" <?php echo $resultOn = $notify_on_off == 'On' ? 'selected' : ''; ?> >On</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo esc_html('Notify Type:'); ?></th>
                                <td>
                                    <select name="notify_type-sn-input" id="notify_type">
                                        <option value="Success" <?php echo $resultSuccess = $notify_type == 'Success' ? 'selected' : ''; ?> >Success</option>



                                        <option value="Warning" <?php echo $resultWarning = $notify_type == 'Warning' ? 'selected' : ''; ?> >Warning</option>



                                        <option value="Info" <?php echo $resultInfo = $notify_type == 'Info' ? 'selected' : ''; ?> >Info</option>



                                        <option value="Danger" <?php echo $resultDanger = $notify_type == 'Danger' ? 'selected' : ''; ?> >Danger</option>



                                        <option value="Simple" <?php echo $resultSimple = $notify_type == 'Simple' ? 'selected' : ''; ?> >Simple</option>



                                        <option value="Custom" id="custom_design" <?php echo $resultCustom = $notify_type == 'Custom' ? 'selected' : ''; ?> >Custom</option>



                                    </select>



                                </td>



                            </tr>



                            <tr class="sn_samples" <?php echo $resultImgCustom = $notify_type == 'Custom' ? 'style="display:none"' : ''; ?> >



                                <td colspan="2">



                                    <img class="success_img" src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/success_notify.png'); ?>" alt="Success Sample" <?php echo $resultImgSuccess = ($notify_type == 'Success' || $notify_type == '') ? 'style="display:block"' : ''; ?> >



                                    <img class="warning_img" src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/warning_notify.png'); ?>" alt="Warning Sample" <?php echo $resultImgWarning = $notify_type == 'Warning' ? 'style="display:block"' : ''; ?> >



                                    <img class="info_img" src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/info_notify.png'); ?>" alt="Info Sample" <?php echo $resultImgInfo = $notify_type == 'Info' ? 'style="display:block"' : ''; ?> >



                                    <img class="danger_img" src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/danger_notify.png'); ?>" alt="Danger Sample" <?php echo $resultImgDanger = $notify_type == 'Danger' ? 'style="display:block"' : ''; ?> >



                                    <img class="simple_img" src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/simple_notify.png'); ?>" alt="Simple Sample" <?php echo $resultImgSimple = $notify_type == 'Simple' ? 'style="display:block"' : ''; ?> >



                                </td>



                            </tr>



                            <tr class="none <?php echo $resultBgCustom = $notify_type != 'Custom' ? 'hidden' : ''; ?>">



                                <th><?php echo esc_html('Background Color:'); ?></th>



                                <td><input type="color" name="bg_color-sn-input" id="bg_color" value="<?php echo esc_attr($un_data['bg_color']); ?>"></td>



                            </tr>



                            <tr class="none <?php echo $notify_typeCustom = $notify_type != 'Custom' ? 'hidden' : ''; ?>">
                                <th><?php echo esc_html('BG Color Opacity:'); ?></th>
                                <td>



                                    <input type="range" name="bg_color_opacity-sn-input" id="bg_color_opacity" min="1" max="10" oninput="range_weight_disp.value = bg_color_opacity.value" value="<?php echo $resultOpt = $bg_color_opacity != '' ? esc_attr($bg_color_opacity) : esc_attr('6'); ?>">



                                    <output id="range_weight_disp"><?php echo $resultOpt = $bg_color_opacity != '' ? esc_attr($bg_color_opacity) : esc_attr('6'); ?></output>



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Notify Link:'); ?></th>



                                <td>



                                    <input type="text" name="notify_link-sn-input" id="notify_link" placeholder="www.example.com" value="<?php echo esc_attr($un_data['notify_link']); ?>"></td>



                                </tr>



                            <tr>



                                <th><?php echo esc_html('Open In:'); ?></th>



                                <td>



                                    <select name="open_in-sn-input" id="open_in">



                                        <option value="">Same Window</option>



                                        <option value="_blank" <?php echo $resultOpen = $open_in == '_blank' ? 'selected' : ''; ?> >New Window</option>



                                    </select>



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Notify Position:'); ?></th>



                                <td>



                                    <select name="notify_position-sn-input" id="notify_position">



                                        <option value="Above Header">Above Header</option>



                                        <option value="On Header" <?php echo $resultPos = $notify_position == 'On Header' ? 'selected' : ''; ?> >On Header</option>



                                    </select>



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Close Button Type:'); ?></th>



                                <td>



                                    <select name="close_btn_type-sn-input" id="close_btn_type">



                                        <option value="X">x</option>



                                        <option value="Close" <?php echo $resultBtnType = $close_btn_type == 'Close' ? 'selected' : '' ?> >Close</option>



                                    </select>



                                </td>



                            </tr>



                        </table>



                    </div>



                    <div class="sn-headline-tab common tab-content" id="tab2">



                        <h1><?php echo esc_html('Headline Settings:'); ?></h1>



                        <table class="sn-tbl form-table">



                            <tr>



                                <th><?php echo esc_html('Headline:'); ?></th>



                                <td>



                                    <input type="text" name="notify_head-sn-input" id="notify_head" placeholder="Type here..." value="<?php echo $resultNotifyHead = $un_data['notify_head'] == '' ? esc_attr('Welcome to Site Notify') : esc_attr($un_data['notify_head']); ?>">



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Headline Tag:'); ?></th>



                                <td>



                                    <select name="head_tags-sn-input" id="head_tags">



                                        <option value="h1" <?php echo $resultHeadTagsh1 = $head_tags == 'h1' ? 'selected' : ''; ?> >H1</option>



                                        <option value="h2" <?php echo $resultHeadTagsh2 = ($head_tags == 'h2' || $head_tags == '') ? 'selected' : ''; ?>>H2</option>



                                        <option value="h3" <?php echo $resultHeadTagsh3 = $head_tags == 'h3' ? 'selected' : ''; ?> >H3</option>



                                        <option value="h4" <?php echo $resultHeadTagsh4 = $head_tags == 'h4' ? 'selected' : ''; ?> >H4</option>



                                        <option value="h5" <?php echo $resultHeadTagsh5 = $head_tags == 'h5' ? 'selected' : ''; ?> >H5</option>



                                        <option value="h6" <?php echo $resultHeadTagsh6 = $head_tags == 'h6' ? 'selected' : ''; ?>>H6</option>



                                    </select>



                                </td>



                            </tr>



                            <tr class="none <?php echo $resNotType = $notify_type != 'Custom' ? 'hidden' : ''; ?>">



                                <th><?php echo esc_html('Color:'); ?></th>



                                <td>



                                    <input type="color" name="headline_color-sn-input" id="headline_color" value="<?php echo esc_attr($un_data['headline_color']); ?>">



                                </td>



                            </tr>



                            <tr class="space">



                                <th><?php echo esc_html('Margin:'); ?></th>



                                <td>



                                    <input type="number" name="head_top_mar-sn-input" id="head_top_mar" placeholder="Top" value="<?php echo esc_attr($un_data['head_top_mar']); ?>">



                                    <input type="number" name="head_btm_mar-sn-input" id="head_btm_mar" placeholder="Bottom" value="<?php echo esc_attr($un_data['head_btm_mar']); ?>">



                                    <input type="number" name="head_lft_mar-sn-input" id="head_lft_mar" placeholder="Left" value="<?php echo esc_attr($un_data['head_lft_mar']); ?>">



                                    <input type="number" name="head_rgt_mar-sn-input" id="head_rgt_mar" placeholder="Right" value="<?php echo esc_attr($un_data['head_rgt_mar']); ?>">&nbsp;px;



                                </td>



                            </tr>



                            <tr class="space">



                                <th><?php echo esc_html('Padding:'); ?></th>



                                <td>



                                    <input type="number" name="head_top_pad-sn-input" id="head_top_pad" placeholder="Top" value="<?php echo $head_top_pad = $un_data['head_top_pad'] == '' ? esc_attr('40') : esc_attr($un_data['head_top_pad']); ?>">



                                    <input type="number" name="head_btm_pad-sn-input" id="head_btm_pad" placeholder="Bottom" value="<?php echo esc_attr($un_data['head_btm_pad']); ?>">



                                    <input type="number" name="head_lft_pad-sn-input" id="head_lft_pad" placeholder="Left" value="<?php echo esc_attr($un_data['head_lft_pad']); ?>">



                                    <input type="number" name="head_rgt_pad-sn-input" id="head_rgt_pad" placeholder="Right" value="<?php echo esc_attr($un_data['head_rgt_pad']); ?>">&nbsp;px;



                                </td>



                            </tr>



                        </table>



                    </div>



                    <div class="sn-subhead-tab common tab-content" id="tab3">



                        <h1><?php echo esc_html('Sub Headline Settings:'); ?></h1>



                        <table class="sn-tbl form-table">



                            <tr>



                                <th><?php echo esc_html('Sub Headline:'); ?></th>



                                <td>



                                    <textarea name="notify_subhead-sn-input" id="notify_subhead" placeholder="Type here..." rows="4"><?php echo $resultNotifySubhead = $un_data['notify_subhead'] == '' ? esc_attr('Have a nice day') : esc_attr($un_data['notify_subhead']); ?></textarea>



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Sub Headline Tag:'); ?></th>



                                <td>



                                    <select name="subhead_tags-sn-input" id="subhead_tags">



                                        <option value="h1" <?php echo $subhead_tagsh1 = $subhead_tags == 'h1' ? 'selected' : ''; ?> >H1</option>



                                        <option value="h2" <?php echo $subhead_tagsh2 = $subhead_tags == 'h2' ? 'selected' : ''; ?> >H2</option>



                                        <option value="h3" <?php echo $subhead_tagsh3 = $subhead_tags == 'h3' ? 'selected' : ''; ?> >H3</option>



                                        <option value="h4" <?php echo $subhead_tagsh4 = $subhead_tags == 'h4' ? 'selected' : ''; ?>>H4</option>



                                        <option value="h5" <?php echo $subhead_tagsh5 = ($subhead_tags == 'h5' || $subhead_tags == '') ? 'selected' : ''; ?>>H5</option>



                                        <option value="h6" <?php echo $subhead_tagsh6 = $subhead_tags == 'h6' ? 'selected' : ''; ?> >H6</option>



                                    </select>



                                </td>



                            </tr>



                            <tr class="none <?php echo $resultNotify_type = $notify_type != 'Custom' ? 'hidden' : ''; ?>">



                                <th><?php echo esc_html('Color:'); ?></th>



                                <td>



                                    <input type="color" name="subhead_color-sn-input" id="subhead_color" value="<?php echo esc_attr($un_data['subhead_color']); ?>">



                                </td>



                            </tr>



                            <tr class="space">



                                <th><?php echo esc_html('Margin:'); ?></th>



                                <td>



                                    <input type="number" name="subhead_top_mar-sn-input" id="subhead_top_mar" placeholder="Top" value="<?php echo esc_attr($un_data['subhead_top_mar']); ?>">



                                    <input type="number" name="subhead_btm_mar-sn-input" id="subhead_btm_mar" placeholder="Bottom" value="<?php echo esc_attr($un_data['subhead_btm_mar']); ?>">



                                    <input type="number" name="subhead_lft_mar-sn-input" id="subhead_lft_mar" placeholder="Left" value="<?php echo esc_attr($un_data['subhead_lft_mar']); ?>">



                                    <input type="number" name="subhead_rgt_mar-sn-input" id="subhead_rgt_mar" placeholder="Right" value="<?php echo esc_attr($un_data['subhead_rgt_mar']); ?>">&nbsp;px;



                                </td>



                            </tr>



                            <tr class="space">



                                <th><?php echo esc_html('Padding:'); ?></th>



                                <td>



                                    <input type="number" name="subhead_top_pad-sn-input" id="subhead_top_pad" placeholder="Top" value="<?php echo esc_attr($un_data['subhead_top_pad']); ?>">



                                    <input type="number" name="subhead_btm_pad-sn-input" id="subhead_btm_pad" placeholder="Bottom" value="<?php echo esc_attr($un_data['subhead_btm_pad']); ?>">



                                    <input type="number" name="subhead_lft_pad-sn-input" id="subhead_lft_pad" placeholder="Left" value="<?php echo esc_attr($un_data['subhead_lft_pad']); ?>">



                                    <input type="number" name="subhead_rgt_pad-sn-input" id="subhead_rgt_pad" placeholder="Right" value="<?php echo esc_attr($un_data['subhead_rgt_pad']); ?>">&nbsp;px;



                                </td>



                            </tr>



                        </table>



                    </div>



                    <div class="sn-content-tab common tab-content" id="tab4">



                        <h1><?php echo esc_html('Content Settings:'); ?></h1>



                        <table class="sn-tbl form-table">



                            <tr>



                                <th><?php echo esc_html('Content:'); ?></th>



                                <td>



                                    <textarea name="notify_content-sn-input" id="notify_content-sn-input" rows="6"><?php echo $resultNotify_content = $un_data['notify_content'] == '' ? esc_html('Thank you..! to using this plugin. and I hope enjoy this, this is a very useful plugin for any type of role user to notify notice. There are pre-defined templates and lots of features.') : esc_html($un_data['notify_content']); ?></textarea>



                                </td>



                            </tr>



                            <tr class="none <?php echo $resultNotifyTypeCustom = $notify_type != 'Custom' ? 'hidden' : ''; ?>">



                                <th><?php echo esc_html('Text Color:'); ?></th>



                                <td><input type="color" name="text_color-sn-input" id="text_color" value="<?php echo esc_attr($un_data['text_color']); ?>"></td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Font Size:'); ?></th>



                                <td><input type="number" name="font_size-sn-input" id="font_size" max="99" placeholder="Type here.." value="<?php echo $resultfont_size = $un_data['font_size'] == '' ? esc_attr('18') : esc_attr($un_data['font_size']); ?>"></td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Line Height:'); ?></th>



                                <td><input type="number" name="line_height-sn-input" id="line_height" max="109" placeholder="Type here.." value="<?php echo $resultLineHeight = $un_data['line_height'] == '' ? esc_attr('28') : esc_attr($un_data['line_height']); ?>"></td>



                            </tr>



                            <tr class="space">



                                <th><?php echo esc_html('Margin:'); ?></th>



                                <td>



                                    <input type="number" name="content_top_mar-sn-input" id="content_top_mar" placeholder="Top" value="<?php echo esc_attr($un_data['content_top_mar']); ?>">



                                    <input type="number" name="content_btm_mar-sn-input" id="content_btm_mar" placeholder="Bottom" value="<?php echo esc_attr($un_data['content_btm_mar']); ?>">



                                    <input type="number" name="content_lft_mar-sn-input" id="content_lft_mar" placeholder="Left" value="<?php echo esc_attr($un_data['content_lft_mar']); ?>">



                                    <input type="number" name="content_rgt_mar-sn-input" id="content_rgt_mar" placeholder="Right" value="<?php echo esc_attr($un_data['content_rgt_mar']); ?>">&nbsp;px;



                                </td>



                            </tr>



                            <tr class="space">



                                <th><?php echo esc_html('Padding:'); ?></th>



                                <td>



                                    <input type="number" name="content_top_pad-sn-input" id="content_top_pad" placeholder="Top" value="<?php echo $content_top_pad = $un_data['content_top_pad'] == '' ? esc_attr('10') : esc_attr($un_data['content_top_pad']); ?>">



                                    <input type="number" name="content_btm_pad-sn-input" id="content_btm_pad" placeholder="Bottom" value="<?php echo $content_btm_pad = $un_data['content_btm_pad'] == '' ? esc_attr('20') : esc_attr($un_data['content_btm_pad']); ?>">



                                    <input type="number" name="content_lft_pad-sn-input" id="content_lft_pad" placeholder="Left" value="<?php echo $content_lft_pad = $un_data['content_lft_pad'] == '' ? esc_attr('15') : esc_attr($un_data['content_lft_pad']); ?>">



                                    <input type="number" name="content_rgt_pad-sn-input" id="content_rgt_pad" placeholder="Right" value="<?php echo $content_rgt_pad = $un_data['content_rgt_pad'] == '' ? esc_attr('15') : esc_attr($un_data['content_rgt_pad']); ?>">&nbsp;px;



                                </td>



                            </tr>



                        </table>



                    </div>



                    <div class="sn-advance-tab common tab-content" id="tab5">



                        <h1><?php echo esc_html('Advance Settings:'); ?></h1>



                        <table class="sn-tbl form-table">



                            <tr>



                                <th><?php echo esc_html('Display In:'); ?></th>



                                <td>



                                    <select name="display_in-sn-input" id="display_in">



                                        <option value="Front Page">Front Page</option>



                                        <option value="All Pages" <?php echo $resultDisplayIn = $display_in == 'All Pages' ? 'selected' : ''; ?>>All Pages</option>



                                    </select>



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('User Role:'); ?></th>



                                <td>



                                    <select name="user_roles-sn-input" id="user_roles">



                                        <option value="">No role</option><?php



                                        global $wp_roles;



                                        foreach($wp_roles->roles as $row){ // fetch user roles ?>



                                            <option value="<?php echo esc_attr($row['name']); ?>" <?php echo $resultUser_roles = $row['name'] == $user_roles ? 'selected' : ''; ?> ><?php echo esc_html($row['name']); ?></option>



                                        <?php } ?> 



                                    </select>



                                </td>



                            </tr>



                            <tr>



                                <th><?php echo esc_html('Notify Time:'); ?></th>



                                <td>



                                    <select name="notify_time-sn-input" id="notify_time">



                                        <option value="Every Time On Page Load">Every Time On Page Load</option>



                                        <option value="1 Time On Page Load" <?php echo $resultNotify_time = $notify_time == '1 Time On Page Load' ? 'selected' : ''; ?> >1 Time On Page Load</option>



                                    </select>



                                </td>



                            </tr>



                            <tr class="sn_popup">



                                <th><?php echo esc_html('Toggle/ Popup:'); ?></th>



                                <td>



                                    <select name="toggle_popup-sn-input" id="toggle_popup">



                                        <option value="Popup" <?php echo $resultToggle_popup = $toggle_popup == 'Popup' ? 'selected' : ''; ?> >Popup</option>


                                        <option value="Toggle">Toggle</option>



                                    </select><br>



                                    <span><strong>*</strong> <i>If you choose <strong>"Popup"</strong> so <strong>"Notify Position"</strong> will not work.</i></span>



                                </td>



                            </tr>



                        </table>



                    </div>



                    <table class="sn-tbl form-table submit">



                        <th></th>



                        <td>



                            <input class="button-primary" type="submit" name="data_send" value="Save">



                            <div class="aftr_submit">



                                <img src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/loading.gif'); ?>" class="submit_loading" alt="Loading" style="display: none;">



                                <span class="updtd_txt" style="display: none;">Saved</span>



                                <span class="error_txt" style="display: none;">Your settings have not been updated.</span>



                            </div>



                        </td>



                    </table>            



                </form>



            </div>



            <div class="overview_samples">
                <div class="overview_inner">
                    <div class="overview_sec tab-content" id="tab6">
                        <h1><?php echo esc_html('Overview'); ?></h1>
                        <div class="desc">
                            <p>Our “Site Notify plugin” gives you custom notifications and alerts without any struggle. Notify anyone about any action in your WordPress. You can customize your messages without any difficulty. You can quickly set up notifications in your WordPress admin through the “Site notify” settings. Generally, Notifications appear at the top of the screen and center of the page. They carry important announcements or messages and alert for users. They can be used for offers, discounts, messages, or important announcements and can effectively notify message to users. If your website is built with WordPress, you must use our Site Notify plugin.
                            </p>
                            <h1><?php echo esc_html('Description'); ?></h1>
                            <p>Site Notify plugin has 5 easy custom settings and is very easy to configure.</p><br><b>1. General Settings:</b><br><p>In a general setting, the user can simply toggle notifications on or off and provide different types of notifications "Success, Danger, Info, Simple, Warning and Custom Types" as per the requirement either above the header or below the header Can be set and can be opened in a new window or in the same window.</p><br><b>2. Title Settings:</b><br><p>Headline settings allow you to customize “headline text, headline tags, margins, and padding”.</p><br><b>3. Sub Headline Settings:</b><br><p> Sub Headline Settings allow you to customize the Sub headline text, Sub headline tags, margins, and padding.</p><br><b>4. Content Settings:</b><br><p>Content settings allow you to customize the content text you want to change, and also change the font size, line height, margins, and padding.</p><br><b>5. Advance Settings:</b><br><p>Advance settings allow to display the notification whether the message in the website is displayed in the entire site or on the front/home page.</p><p>Set the notification by user role to which user to show the notification “Contributor, Author, Editor, Administrator, Subscriber etc. These user role show default in <b>Site Notify plugin</b> and change automatically as per website uses example if website is e-commerce user role name is change as per rule.</p><p>In advance setting, you can easily display the notification on every page load or only once on page load and toggle or popup notification also.</p><br><b>Note:</b><br><p>After installing this plugin go to the WordPress plugin option, activate this plugin, and click on the setting for turning on notifications in general setting.</p><br><b>Features:</b><br><ul><li>1. Different user role set</li><li>2. Show notification on entire site or on Home page.</li><li>3. 5 different type of alert or notify message.</li><li>4. Set notify time load on every time or on one time.</li><li>5. Change heading, subheading text and tags easily.</li><li>6. Change content text easily.</li><li>7. Set margin or padding.</li><li>8. Toggle or popup notification</li></ul>
                        </div>
                    </div>
                    <div class="samples_sec tab-content" id="tab7">
                        <h1><?php echo esc_html('Samples'); ?></h1>
                        <div class="samples">
                            <ul>
                                <li>
                                    <img src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/success_notify.png'); ?>" alt="Success Sample">
                                </li>
                                <li>
                                    <img src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/warning_notify.png'); ?>" alt="Warning Sample">
                                </li>
                                <li>
                                    <img src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/info_notify.png'); ?>" alt="Info Sample">
                                </li>
                                <li>
                                    <img src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/danger_notify.png'); ?>" alt="Danger Sample">
                                </li>
                                <li>
                                    <img src="<?php echo esc_url(SITE_NOTIFY_PLUGIN_PATH.'assets/images/simple_notify.png'); ?>" alt="Simple Sample">
                                </li>    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //Admin UI end ?>