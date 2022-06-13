<?php

final class Wthree_Theme_Customizer {
    
    public static $_instance = null;
    
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }
    
    public function __construct() {
        $this->init();
    }
    
    public function init() {
        // Initiate custom fields
        $this->initiate_customizer_fields();
    }
    
    public function initiate_customizer_fields() {
        //Panels and sections
        require_once WTHREE_ADMIN. '/customizer/wthree-customizer-settings.php';
    }
    
}

Wthree_Theme_Customizer::instance();

?>