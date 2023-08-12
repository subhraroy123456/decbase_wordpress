<?php

// Register Menues

register_nav_menus(
	array(
		'main-nav' => __( 'Main Menu', 'finsweet' ),
		'footer1-nav' => __( 'Footer1 Menu', 'finsweet' ),
		'footer2-nav' => __( 'Footer2 Menu', 'finsweet' ),
	)
);

// Main Nav

function main_nav() {
	wp_nav_menu(array(
		'container'			=> '',
        'container_class'   => false,
		'menu_id'			=> false,
		'menu_class'		=> 'main-menu list-unstyled p-0 m-0',
		'theme_location'	=> 'main-nav',
		'depth'				=> 0,
		'fallback_cb'		=> '',
        // 'walker'			=> new Main_Walker()
	));
}

function footer1_nav() {
	wp_nav_menu(array(
		'container'			=> '',
        'container_class'   => false,
		'menu_id'			=> false,
		'menu_class'		=> 'list-unstyled p-0 m-0 footer-top-links',
		'theme_location'	=> 'footer1-nav',
		'depth'				=> 0,
		'fallback_cb'		=> '',
        // 'walker'			=> new Main_Walker()
	));
}

function footer2_nav() {
	wp_nav_menu(array(
		'container'			=> '',
        'container_class'   => false,
		'menu_id'			=> false,
		'menu_class'		=> 'list-unstyled p-0 m-0',
		'theme_location'	=> 'footer2-nav',
		'depth'				=> 0,
		'fallback_cb'		=> '',
        // 'walker'			=> new Main_Walker()
	));
}

function be_arrows_in_menus( $item_output, $item, $depth, $args ) {

	if( in_array( 'menu-item-has-children', $item->classes ) ) {
		$arrow = 0 == $depth ? '<i class="fa-solid fa-angle-down"></i>' : '';
		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );

// Main Walker

// class Main_Walker extends Walker_Nav_Menu {
// 	function start_el(&$output, $item, $depth, $args) {
// 		if($depth == 0) {
// 			$output .= '<li class="'.implode(" ", $item->classes).'"><a href="'.$item->url.'">'.$item->title;
// 			if($args->walker->has_children) {
// 				$output .= '<i class="fal fa-angle-down"></i>';
// 			}
//             $output .= '</a>';
// 		} elseif($depth == 1) {
// 			$output .= '<li class="'.implode(" ", $item->classes).'"><a href="'.$item->url.'" class="title">'.$item->title.'</a>';
// 		}
// 	}
// }
