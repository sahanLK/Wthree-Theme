<?php
/*
@package wthree

    ==================================
        MEGA MENU TEMPLATE PART
    ==================================

*/

?>

<div class="mega-menu"><!--  mega menu  -->
    <li class="dropdown"><!--  dropdown li  -->
        <a href="javascript:void(0);">MORE
            <i class=" fa fa-caret-down"></i>
        </a>
        <div class="dropdown-contents" id="dropdown-content"><!--  dropdown content  -->
            <div class="row"><!--  row  -->
                <div class="column" id="column">
                    <p class="section-title"><?php echo esc_attr( $first_section_title ); ?></p>
                    <?php 
                    $mega_menu_first_chapter = array(
                        'menu'                => 'mega_menu_first_chapter',
                        'container'           => '',
                        'theme_location'      => 'mega_menu_first_chapter',
                        'container_class'     => '',
                        'items_wrap'          => '%3$s',
                        'echo'                => false,
                        'before'              => '',
                        'after'               => '',
                        'link_before'         => '',
                        'link-after'          => '',
                        'depth'               => 0,
                        'walker'              => '',
                    );

                    if (has_nav_menu( 'mega_menu_first_chapter' )) {
                        echo strip_tags( wp_nav_menu( $mega_menu_first_chapter ), '<a>' );
                    }
                    ?>
                </div>
                <div class="column" id="column">
                    <p class="section-title"><?php echo esc_attr( $second_section_title ); ?></p>
                    <?php 
                    $mega_menu_second_chapter = array(
                        'theme_location'  => 'mega_menu_second_chapter',
                        'menu'            => 'mega_menu_second_chapter',
                        'container'       => '',
                        'container_class' => '',
                        'items_wrap'      => '%3$s',
                        'echo'            => false,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link-after'      => '',
                        'depth'           => 0,
                        'walker'          => '',
                    );

                    if (has_nav_menu( 'mega_menu_second_chapter' )) {
                        echo strip_tags( wp_nav_menu( $mega_menu_second_chapter ), '<a>' );
                    }
                    ?>
                </div>
                <div class="column" id="column">
                    <p class="section-title"><?php echo esc_attr( $third_section_title ); ?></p>
                    <?php 
                    $mega_menu_third_chapter = array(
                        'theme_location'      => 'mega_menu_third_chapter',
                        'menu'                => 'mega_menu_third_chapter',
                        'container'           => '',
                        'container_class'     => '',
                        'items_wrap'          => '%3$s',
                        'echo'                => false,
                        'before'              => '',
                        'after'               => '',
                        'link_before'         => '',
                        'link-after'          => '',
                        'depth'               => 0,
                        'walker'              => '',
                    );

                    if ( has_nav_menu( 'mega_menu_third_chapter' ) ) {
                        echo strip_tags( wp_nav_menu( $mega_menu_third_chapter ), '<a>' );
                    }
                    ?>
                </div>
                <div class="column" id="column">
                    <p class="section-title"><?php echo esc_attr( $fourth_section_title ); ?></p>
                    <?php 
                    $mega_menu_fourth_chapter = array(
                        'theme_location'  => 'mega_menu_fourth_chapter',
                        'menu'            => 'mega_menu_fourth_chapter',
                        'container'       => '',
                        'container_class' => '',
                        'items_wrap'      => '%3$s',
                        'echo'            => false,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link-after'      => '',
                        'depth'           => 0,
                        'walker'          => '',
                    );

                    if ( has_nav_menu( 'mega_menu_fourth_chapter' ) ) {
                        echo strip_tags( wp_nav_menu( $mega_menu_fourth_chapter ), '<a>' );
                    }
                    ?>
                </div>
                <div class="column" id="column">
                    <p class="section-title"><?php echo esc_attr( $fifth_section_title ); ?></p>
                    <?php 
                    $mega_menu_fifth_chapter = array(
                        'theme_location'  => 'mega_menu_fifth_chapter',
                        'menu'            => 'mega_menu_fifth_chapter',
                        'container'       => '',
                        'container_class' => '',
                        'items_wrap'      => '%3$s',
                        'echo'            => false,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link-after'      => '',
                        'depth'           => 0,
                        'walker'          => '',
                    );

                    if ( has_nav_menu( 'mega_menu_fifth_chapter' ) ) {
                        echo strip_tags( wp_nav_menu( $mega_menu_fifth_chapter), '<a>' );
                    }
                    ?>
                </div>
                <div class="column" id="column">
                    <p class="section-title"><?php echo esc_attr( $sixth_section_title ); ?></p>
                    <?php 
                        $mega_menu_sixth_chapter = array(
                            'theme_location'      => 'mega_menu_sixth_chapter',
                            'menu'                => 'mega_menu_sixth_chapter',
                            'container'           => '',
                            'container_class'     => '',
                            'items_wrap'          => '%3$s',
                            'echo'                => false,
                            'before'              => '',
                            'after'               => '',
                            'link_before'         => '',
                            'link-after'          => '',
                            'depth'               => 0,
                            'walker'              => '',
                        );

                        if ( has_nav_menu( 'mega_menu_sixth_chapter' ) ) {
                            echo strip_tags( wp_nav_menu( $mega_menu_sixth_chapter ), '<a>' );
                        }
                    ?>
                </div>
            </div> <!--  row  -->
        </div><!--  dropdown content  -->
    </li><!--  dropdown li  -->
</div><!--  mega menu  -->