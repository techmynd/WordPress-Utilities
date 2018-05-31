<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'mjk_layout',
        'title'       => 'Layout'
      ),
      array(
        'id'          => 'mjk_colors',
        'title'       => 'Colors'
      ),
      array(
        'id'          => 'mjk_fonts',
        'title'       => 'Fonts'
      ),
      array(
        'id'          => 'mjk_topbar',
        'title'       => 'TopBar'
      ),
      array(
        'id'          => 'mjk_header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'mjk_footer',
        'title'       => 'Footer'
      ),
      array(
        'id'          => 'mjk_social_links',
        'title'       => 'Social Links'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'topbar_width',
        'label'       => 'TopBar',
        'desc'        => 'Choose Twitter Bootstrap \'container\' or \'container-fluid\' class for Topbar. Default is \'container\'.<br>
Fixed &gt; container<br>
Wide &gt; container-fluid',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'mjk_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'fixed',
            'label'       => 'Fixed',
            'src'         => ''
          ),
          array(
            'value'       => 'wide',
            'label'       => 'Wide',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'header_navigation_width',
        'label'       => 'Header Navigation',
        'desc'        => 'Default is \'container-fluid\'.<br>
Fixed &gt; container<br>
Wide &gt; container-fluid',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'mjk_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'wide',
            'label'       => 'Wide',
            'src'         => ''
          ),
          array(
            'value'       => 'fixed',
            'label'       => 'Fixed',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'footer_width',
        'label'       => 'Footer',
        'desc'        => 'Default is \'container-fluid\'.<br>
Fixed &gt; container<br>
Wide &gt; container-fluid',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'mjk_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'wide',
            'label'       => 'Wide',
            'src'         => ''
          ),
          array(
            'value'       => 'fixed',
            'label'       => 'Fixed',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'blog_style',
        'label'       => 'Blog',
        'desc'        => 'Default View &gt; Single Column<br>
Grid View &gt; Multiple Columns / Boxed',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'mjk_layout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'default_blog_view',
            'label'       => 'Default View',
            'src'         => ''
          ),
          array(
            'value'       => 'grid_blog_view',
            'label'       => 'Grid View',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'body_background_color',
        'label'       => 'Body Background',
        'desc'        => 'Select website background color.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_background_color',
        'label'       => 'Content Background',
        'desc'        => 'Select content area background color.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_links_color',
        'label'       => 'Content Links Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'content_links_hover_color',
        'label'       => 'Content Links Hover Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_widgets_heading_color',
        'label'       => 'Sidebar Widgets Heading Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_widgets_heading_background_color',
        'label'       => 'Sidebar Widgets Heading Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_widgets_content_color',
        'label'       => 'Sidebar Widgets Content Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_widgets_content_link_color',
        'label'       => 'Sidebar Widgets Content Link Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_widgets_content_link_hover_color',
        'label'       => 'Sidebar Widgets Content Link Hover Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'sidebar_widgets_content_background_color',
        'label'       => 'Sidebar Widgets Content Background',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_background_color',
        'label'       => 'Footer Background Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_text_color',
        'label'       => 'Footer Text Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_links_color',
        'label'       => 'Footer Links Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_links_hover_color',
        'label'       => 'Footer Links Hover Color',
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'mjk_colors',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'general_font_url_body',
        'label'       => 'General Font URL (Body Font)',
        'desc'        => 'Google Font URL<br>
Will be applied to whole body<br>
google.com/fonts',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'associated_font_family_general',
        'label'       => 'Associated Font Family (Body)',
        'desc'        => 'e.g. font-family: \'Open Sans\', sans-serif;',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'heading_font_url_heading',
        'label'       => 'Heading Font URL (Heading Font)',
        'desc'        => 'Google Font URL<br>
Will be applied to Headings e.g. H1, H2, H3<br>
google.com/fonts',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'associated_font_family_heading',
        'label'       => 'Associated Font Family (Heading)',
        'desc'        => 'e.g. font-family: \'Roboto\', sans-serif;',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'mjk_show_topbar',
        'label'       => 'Show TopBar',
        'desc'        => 'Topbar is area above header navigation.<br>
On &gt; Show<br>
Off &gt; Hide',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'mjk_topbar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'phone_show_mjk',
        'label'       => 'Phone',
        'desc'        => 'e.g. +1234567890',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_topbar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'email_address_show_mjk',
        'label'       => 'Email Address',
        'desc'        => 'e.g. info@example.com',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_topbar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'business_address_show_mjk',
        'label'       => 'Business Address',
        'desc'        => 'e.g. Honey Business 24 Fifth st., Los Angeles, USA',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_topbar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_links_show_top_mjk',
        'label'       => 'Social Links',
        'desc'        => 'In right corner of Topbar, beautiful social links will show if you have provided their URLs in \'Social Links\' section.<br>
On &gt; Show<br>
Off &gt; Hide',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'mjk_topbar',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'upload_logo_mjk',
        'label'       => 'Upload Logo',
        'desc'        => 'Upload logo image. If logo is not provided, system will display website name (text) in header.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'mjk_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_code_css_header_mjk',
        'label'       => 'Custom CSS Code',
        'desc'        => 'CSS Code (at top of the site in head). Add custom CSS code here. This will override site css styles. Do not use \'style\' tag in this. Just type css rules.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'mjk_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'site_verification_extra_tags',
        'label'       => 'Site Verification &amp; Other Extra Tags',
        'desc'        => 'Enter site verification code or extra tags. It will show in homepage head.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'mjk_header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'social_links_footer_mjk',
        'label'       => 'Social Links',
        'desc'        => 'Show social links in footer? Add social URLs in \'Social Links\' section also.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'mjk_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_text_copyrights',
        'label'       => 'Footer Text',
        'desc'        => 'Copyright information and such text in footer.',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'mjk_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'footer_code_js_mjk',
        'label'       => 'Footer Code (JS)',
        'desc'        => 'Google Analytics Code, Visitor Tracking Code, Raw JavaScript (to push in bottom of footer). This code will appear at bottom of the site after all javascript codes. Paste your JS code here. Do not use \'script\' tag in it.',
        'std'         => '',
        'type'        => 'javascript',
        'section'     => 'mjk_footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'facebook_link_mjk',
        'label'       => 'Facebook Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'twitter_link_mjk',
        'label'       => 'Twitter Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'linkedin_link_mjk',
        'label'       => 'Linkedin Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'google_link_mjk',
        'label'       => 'Google+ Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'youtube_link_mjk',
        'label'       => 'Youtube Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'vimeo_link_mjk',
        'label'       => 'Vimeo Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'flickr_link_mjk',
        'label'       => 'Flickr Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'pinterest_link_mjk',
        'label'       => 'Pinterest Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'instagram_link_mjk',
        'label'       => 'Instagram Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'show_rss_link_mjk',
        'label'       => 'Show RSS Link',
        'desc'        => 'On &gt; Show<br>
Off &gt; Hide',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'mjk_social_links',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $ot_has_custom_theme_options;
  $ot_has_custom_theme_options = true;
  
}