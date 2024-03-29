<?php


class Wthree_Main_Menu_Walker extends Walker_Nav_menu {
    
    function start_lvl( &$output, $depth = 0, $args = NULL ) {
        
        $indent = str_repeat( "\t", $depth );
        $submenu = ( $depth > 0 ) ? "deep-menu" : "";
        $output .= "\n$indent <ul class=\"dropdown-menu $submenu depth-$depth \">\n";
        
    }
    
    function start_el( &$output, $item, $depth=0, $args=array(), $id=0 ) {
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        $classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
//        $classes[] = ( $item->current || $item->current_item_anchestor ) ? 'active' : '';
        $classes[] = 'primary-menu-item menu-item-' . $item->ID;
        if ( $depth && $args->walker->has_children ) {
            $classes[] = 'dropdown-submenu';
        }
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' .esc_attr( $class_names ) . '"';
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '' ;
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '' ;
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '' ;
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '' ;
        
        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"' : '';
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        
        if ( $depth == 0 && $args->walker->has_children ) {
            $item_output .= '  <i class="fa fa-caret-down"></i></a>';
        } elseif ( $depth > 0 && $args->walker->has_children ) {
            $item_output .= '&emsp;<i class="fa fa-caret-right expand"></i></a>';
        } else {
            $item_output .= '</a>';
        }
        
        $item_output .= $args->after;
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
    }
    
}


class Wthree_Side_Menu_Walker extends Walker_Nav_menu {
    
    function start_lvl( &$output, $depth = 0, $args = NULL ) {
        
        $indent = str_repeat( "\t", $depth );
        $submenu = ( $depth > 0 ) ? "deep-menu" : "";
        $output .= "\n$indent <ul class=\"getdown-menu $submenu depth-$depth \">\n";
    }
    
    function start_el( &$output, $item, $depth=0, $args=array(), $id=0 ) {        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        
        $classes[] = ( $args->walker->has_children ) ? 'getdown' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if ( $depth && $args->walker->has_children ) {
            $classes[] = 'getdown-submenu';
        }
        
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' .esc_attr( $class_names ) . '"';
        
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '' ;
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '' ;
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '' ;
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '' ;
        
        $attributes .= ( $args->walker->has_children ) ? ' class="getdown-toggle"' : '';
        
        $item_output = $args->before;
        
        if ( $depth >= 0 && $args->walker->has_children ) {
            $item_output .= '<div class="expandable"><div class="flex-div"><a' . $attributes . '>';
        } else {
            $item_output .= '<a' . $attributes . '>';
        }
        
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        
        if ( $depth >= 0 && $args->walker->has_children ) {
            $item_output .= '</a><button class="show-dropdown"><i class="fa fa-angle-down float-right" aria-hidden="true"></i></button></div>';
        } else {
            $item_output .= '</a>';
        }
        
        $item_output .= $args->after;
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
    }
    
}




?>