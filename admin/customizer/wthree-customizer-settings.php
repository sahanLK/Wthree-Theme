<?php

function wthree_customizer_register( $wp_customize ) {
    
    /*
    *  Failsafe is safe
    */
    if ( ! isset( $wp_customize ) ) {
        return;
    }
    
    
    /* Social Media Section */
    
    $wp_customize -> add_section( 'social_media', array(
        'title'     => esc_html__( 'Social Media Information', 'wthree' ),
        'priority'  => 160,
    ) );
    
    $wp_customize -> add_setting( 'facebook_handler', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'esc_url',
    ) );
    
    $wp_customize -> add_control( 'facebook_handler', array(
        'label'         => esc_html__( 'Facebook', 'wthree' ),
        'section'       => 'social_media',
        'description'   => '',
        'settings'      => 'facebook_handler',
        'priority'      => 10,
        'type'          => 'url',
    ) );
    
    
    $wp_customize -> add_setting( 'twitter_handler', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'esc_url',
    ) );
    
    $wp_customize -> add_control( 'twitter_handler', array(
        'label'         => esc_html__( 'Twitter', 'wthree' ),
        'section'       => 'social_media',
        'description'   => '',
        'settings'      => 'twitter_handler',
        'priority'      => 20,
        'type'          => 'url',
    ) ); 
    
    
    $wp_customize -> add_setting( 'linkedin_handler', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'esc_url',
    ) );
    
    $wp_customize -> add_control( 'linkedin_handler', array(
        'label'         => esc_html__( 'Linkedin', 'wthree' ),
        'section'       => 'social_media',
        'description'   => '',
        'settings'      => 'linkedin_handler',
        'priority'      => 30,
        'type'          => 'url',
    ) );
    
    
    $wp_customize -> add_setting( 'gplus_handler', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'esc_url',
    ) );
    
    $wp_customize -> add_control( 'gplus_handler', array(
        'label'         => esc_html__( 'Google +', 'wthree' ),
        'section'       => 'social_media',
        'description'   => '',
        'settings'      => 'gplus_handler',
        'priority'      => 40,
        'type'          => 'url',
    ) );
    
    
    $wp_customize -> add_setting( 'youtube_handler', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'esc_url',
    ) );
    
    $wp_customize -> add_control( 'youtube_handler', array(
        'label'         => esc_html__( 'Youtube', 'wthree' ),
        'section'       => 'social_media',
        'description'   => '',
        'settings'      => 'youtube_handler',
        'priority'      => 50,
        'type'          => 'url',
    ) );
    
    
    /* Mega Menu Section */
    
    $wp_customize -> add_section( 'mega_menu', array( 
        'title'     => esc_html__( 'Mega Menu', 'wthree' ),
        'priority'  => 150,
    ) );
    
    $wp_customize -> add_setting( 'mega_menu_deactivation', array( 
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'mega_menu_deactivation', array( 
        'label'         => esc_html__( 'Deactivate Mega Menu', 'wthree' ),
        'section'       => 'mega_menu',
        'description'   => '',
        'settings'      => 'mega_menu_deactivation',
        'priority'      => 35,
        'type'          => 'checkbox',
    ) );
    
    $wp_customize -> add_setting( 'mega_menu_icon_text', array( 
        'type'          => 'theme_mod',
    ) );
    
    $wp_customize -> add_control( 'mega_menu_icon_text', array( 
        'label'             => esc_html__( 'Label for mega menu icon', 'wthree' ),
        'section'           => 'mega_menu',
        'description'       => '',
        'settings'          => 'mega_menu_icon_text',
        'priority'          => '',
        'type'              => 'text',
        'input_attrs'       => array(
            'placeholder'   => 'dafault is "MORE"',
        ),
    ) );
    
    
                                    /* Footer Section  */
    
    $wp_customize -> add_panel( 'footers', array(
        'title'     => esc_html__( 'Footers', 'wthree' ),
        'priority'  => 200,
    ) );
    
    $wp_customize -> add_section( 'light_mode' , array(
        'title' => esc_html__( 'Light Mode', 'wthree' ),
        'panel' => 'footers',
    ) );
    
    
    /* Light Style Deactivation */
    $wp_customize -> add_setting( 'lf_deactivation', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'lf_deactivation', array(
        'type'      => 'checkbox',
        'label'     => 'Deactivate',
        'settings'  => 'lf_deactivation',
        'section'   => 'light_mode',
    ) );
    
    /* First Footer Description */
    $wp_customize -> add_setting( 'lf_description', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_text',
        'transport'             => 'postMessage',
    ) );
    
    $wp_customize -> add_control( 'lf_description', array(
        'label'         => esc_html__( 'Description', 'wthree' ),
        'section'       => 'light_mode',
        'settings'      => 'lf_description',
        'type'          => 'textarea',
    ) );
    
    /* First Footer Social Media  */
    $wp_customize -> add_setting( 'lf_facebook', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'lf_facebook', array(
        'type'      => 'checkbox',
        'label'     => 'Facebook',
        'settings'  => 'lf_facebook',
        'section'   => 'light_mode',
    ) );
    
    
    $wp_customize -> add_setting( 'lf_twitter', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'lf_twitter', array(
        'type'      => 'checkbox',
        'label'     => 'Twitter',
        'settings'  => 'lf_twitter',
        'section'   => 'light_mode',
    ) );
    
    
    $wp_customize -> add_setting( 'lf_linkedin', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'lf_linkedin', array(
        'type'      => 'checkbox',
        'label'     => 'Linkedin',
        'settings'  => 'lf_linkedin',
        'section'   => 'light_mode',
    ) );
    
    
    $wp_customize -> add_setting( 'lf_youtube', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'lf_youtube', array(
        'type'      => 'checkbox',
        'label'     => 'Youtube',
        'settings'  => 'lf_youtube',
        'section'   => 'light_mode',
    ) );
    
    $wp_customize -> add_setting( 'lf_copyright_info', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_text',
        'transport'             => 'postMessage',
    ) );
    
    $wp_customize -> add_control( 'lf_copyright_info', array( 
        'label'         => esc_html__( 'Copyright Information', 'wthree' ),
        'section'       => 'light_mode',
        'settings'      => 'lf_copyright_info',
        'type'          => 'textarea',
    ) );
    
    if ( $wp_customize->is_preview() && ! is_admin() ) {
        add_action( 'wp_footer', 'wthree_customize_preview', 21);
    }
    
    function wthree_customize_preview() {  ?>
            
        <script type="text/javascript">
        ( function( $ ){
            /* Light Footer Copyright Info */
            wp.customize('lf_copyright_info',function( value ) {
                value.bind(function( to ) {
                    $('#lf-copyright-info').html( to );
                });
            });
            
            /* Light Footer description */
            wp.customize('lf_description', function( value ) {
                value.bind(function( to ) {
                    $( '#lf-description' ).html(to);
                });
            });
            
            /* Dark Footer Description */
            wp.customize( 'df_description', function( value ) {
                value.bind( function( to ) {
                    $( '#df-description' ).html( to );
                } )
            } );
            
            /* Dark Footrer Copyright Info */
            wp.customize( 'df_copyright_info', function( value ) {
                value.bind( function( to ) {
                    $( '#df-copyright-info' ).html( to );
                } )
            } );
            
            
        } )( jQuery )
        </script>
        <?php 
    }
    
    
    $wp_customize -> add_section( 'dark_mode', array(
        'title' => esc_html__( 'Dark Mode', 'wthree' ),
        'panel' => 'footers',
    ) );
    
        /* Dark Style Deactivation */
    $wp_customize -> add_setting( 'df_deactivation', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'df_deactivation', array(
        'type'      => 'checkbox',
        'label'     => 'Deactivate',
        'section'   => 'dark_mode',
    ) );
    
    /* Second Footer Description */
    $wp_customize -> add_setting( 'df_description', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_text',
        'transport'             => 'postMessage',
    ) );
    
    $wp_customize -> add_control( 'df_description', array(
        'label'     => esc_html__( 'Description', 'wthree' ),
        'section'   => 'dark_mode',
        'settings'  => 'df_description',
        'type'      => 'textarea',
        'input_attrs'   => array(
            'placeholder'   => 'Description',
        ),
    ) );
    
    $wp_customize -> add_setting( 'df_facebook', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'df_facebook', array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Facebook', 'wthree' ),
        'settings'  => 'df_facebook',
        'section'   => 'dark_mode',
    ) );
    
    
    $wp_customize -> add_setting( 'df_twitter', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'sf_twitter', array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Twitter', 'wthree' ),
        'settings'  => 'df_twitter',
        'section'   => 'dark_mode',
    ) );
    
    
    $wp_customize -> add_setting( 'df_linkedin', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'df_linkedin', array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Linkedin', 'wthree' ),
        'settings'  => 'df_linkedin',
        'section'   => 'dark_mode',
    ) );
    
    
    $wp_customize -> add_setting( 'df_youtube', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
    ) );
    
    $wp_customize -> add_control( 'df_youtube', array(
        'type'      => 'checkbox',
        'label'     => esc_html__( 'Youtube', 'wthree' ),
        'settings'  => 'df_youtube',
        'section'   => 'dark_mode',
    ) );

    $wp_customize -> add_setting( 'df_copyright_info', array(
    'type'                  => 'theme_mod',
    'sanitize_callback'     => 'wthree_sanitize_text',
    'transport'             => 'postMessage',
    ) );
    
    $wp_customize -> add_control( 'df_copyright_info', array( 
        'label'         => esc_html__( 'Copyright Information', 'wthree' ),
        'section'       => 'dark_mode',
        'settings'      => 'df_copyright_info',
        'type'          => 'textarea',
    ) );

    
    
    /* Theme Settings Section */
    
    $wp_customize -> add_section( 'wthree_settings', array(
        'title'     => 'Theme Settings',
    ) );
    
    $wp_customize -> add_setting( 'enable_blog_mode', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
        'transport'             => 'refresh',
    ) );
    
    $wp_customize -> add_control( 'enable_blog_mode', array(
        'label'     => esc_html__( 'Enable Blog Mode', 'wthree' ),
        'section'   => 'wthree_settings',
        'settings'  => 'enable_blog_mode',
        'type'      => 'checkbox',
    ) );
    
    
    $wp_customize -> add_setting( 'enable_tutorials_loader', array(
        'type'                  => 'theme_mod',
        'sanitize_callback'     => 'wthree_sanitize_checkbox',
        'transport'             => 'refresh',
    ) );
    
    $wp_customize -> add_control( 'enable_tutorials_loader', array(
        'label'     => esc_html__( 'Enable Tutorials Loader', 'wthree' ),
        'section'   => 'wthree_settings',
        'settings'  => 'enable_tutorials_loader',
        'type'      => 'checkbox',
    ) );
    
    

    
    
    /* Sanitizations */
    
    function wthree_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( esc_html( $input ) ) );
    }
    
    function wthree_sanitize_radio( $input, $setting ) {
        // Ensure input is a slug.
        $input = sanitize_key( $input );
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;
        // If the input is a valid key, return it; otherwise, return the default.
	   return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
    function wthree_sanitize_checkbox( $input ) {
        $checkbox_output = ( $input == 1 ) ? 1 : '';
        return $checkbox_output;
    }
 

}

add_action( 'customize_register', 'wthree_customizer_register' );
