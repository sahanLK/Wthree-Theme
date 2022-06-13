<?php

// Theme config
$wthree_theme = wp_get_theme();
$theme_name = $wthree_theme -> get( 'Name' );
$theme_version = $wthree_theme -> get( 'Version' );

//php config
$max_execution_time = ini_get('max_execution_time');
$max_input_vars = ini_get('max_input_vars');
$post_max_size = ini_get('post_max_size');
$php_version = phpversion();

//WP config
$wp_version = get_bloginfo( 'version' );


$welcome_message = '<b>Congratulations !</b> &nbsp; You have successfully installed '. $theme_name . ' theme. Enjoy building your website with more powerful wordpress theme.';

?>

<div class="welcome row">
    <h1>Welcome to <span class="theme-name">Wthree</span> <span class="theme-version"><?php echo 'Version '. $theme_version; ?></span></h1>
</div>
<hr>
<p class="welcome-message"><?php echo esc_attr( $welcome_message ); ?></p>


<div class="system-status-row">
    <table class="theme-config">
        <caption>Theme Configurations</caption>
        <tr>
            <td>Theme Name</td>
            <td><?php echo esc_attr( $theme_name ); ?></td>
        </tr>
        <tr>
            <td>Theme Version</td>
            <td><?php echo esc_attr( $theme_version ); ?></td>
        </tr>
    </table>
    
    <table class="php-config">
        <caption>PHP Configurations</caption>
        <tr>
            <td>PHP Version</td>
            <td><?php echo esc_attr( $php_version ); ?></td>
        </tr>
        <tr>
            <td>MYSQL Version</td>
            <td><?php echo esc_attr( $theme_version ); ?></td>
        </tr>
                <tr>
            <td>max_execution_time</td>
            <td><?php echo esc_attr( $max_execution_time ); ?></td>
        </tr>
        <tr>
            <td>max_input_var</td>
            <td><?php echo esc_attr( $max_input_vars ); ?></td>
        </tr>
        <tr>
            <td>post_max_size</td>
            <td><?php echo esc_attr( $post_max_size ); ?></td>
        </tr>
    </table>
    
    
    <table class="wp-config">
        <caption>Wordpress Configurations</caption>
        <tr>
            <td>Site Url</td>
            <td><?php echo esc_url( get_site_url() ); ?></td>
        </tr>
        <tr>
            <td>WP Language</td>
            <td><?php echo esc_attr( get_locale() ); ?></td>
        </tr>
        <tr>
            <td>WP Version</td>
            <td><?php echo esc_attr( $wp_version ); ?></td>
        </tr>
    </table>
</div>


