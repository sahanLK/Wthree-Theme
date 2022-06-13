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


$welcome_message = '<b>Wthree</b> is ready to use. To enjoy with full features and updates please complete the registration.';

?>


<!-- Registration Data -->
<?php

$verfied_stat = 0;

require_once get_template_directory(). '/admin/class-envato-app.php';
$zea = new Wthree_envato_api;
$verfied_stat = $zea->verify_purchase();

$valid_stat = 0;
$token = '';

if( !empty( $verfied_stat ) && $verfied_stat == 'invalid' ) {
    $valid_stat = 0;
    $token = '';
} elseif( !empty( $verfied_stat ) ) {
    $token = $verfied_stat;
    $valid_stat = 1;
}

?>


<div class="welcome row">
    <h1>Welcome to <span class="theme-name">Wthree</span> <span class="theme-version"><?php echo esc_attr( 'Version '. $theme_version ); ?></span></h1>
</div>
<hr>
<p class="registration-message"><?php echo esc_attr( $welcome_message ); ?></p>

<div class="registration-form">
    <p class="enter-token">Please enter your <b>Envato Token</b> to complete registration.</p>
    
    <form class="registration-form" method="post">
        <?php settings_errors(); ?>
        <input type="text" class="token-field" name="user_token" value="<?php echo esc_attr( $token ); ?>">
        <input type="submit" value="submit" class="submit-token">
    </form>
</div>