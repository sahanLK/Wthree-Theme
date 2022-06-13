<?php


require_once get_template_directory() . '/admin/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'wthree_register_required_plugins' );


function wthree_register_required_plugins() {

	$plugins = array(
        // The posts and page ordering Plugin
		array(
			'name'      => 'Simple Custom Post Order',
			'slug'      => 'simple-custom-post-order',
			'required'  => false,
		),
        // Envato Market plugin for update mechanism
		array(
			'name'               => 'Envato Market',
			'slug'               => 'envato-market',
			'source'             => '/envato-market.zip',
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

	);


    
	$config = array(
		'id'           => 'wthree-tgmpa',
		'default_path' => get_template_directory(). '/admin/tgm/plugins', 
		'menu'         => 'wthree-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '<h4>We recommand you to install these plugins to improve the functionalities of Wthree.</h4>',
	);

	tgmpa( $plugins, $config );
}
