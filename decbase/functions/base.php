<?php

// Theme Support

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
// Logo Header
add_theme_support( 'custom-header' );

// Allow SVG-Upload

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Styles / Scripts

function custom_search ($query) {
	if($query->is_main_query() && !is_admin() && $query->is_search()) {
		$query->set('post_type', array('post', 'news'));
		$query->set('posts_per_page', -1);
	}
}

add_action('pre_get_posts', 'custom_search');

function maisano_styles_scripts() {
   wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.min.css',false,false,'all');
   
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/styles/style.css',false,false,'all');
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/styles/responsive.css',false,false,'all');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,false,'all');
    wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.7', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '6.2.0', 'all');
    wp_enqueue_style( 'sen', 'https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap', false ); 
    wp_enqueue_style( 'inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', false ); 
    wp_enqueue_script('jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', null, null, true);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',false,false,true);
    wp_enqueue_script( 'iconify', 'https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js',false,false,true);
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',array(), '8.4.7', 'all', true);
    wp_enqueue_script( 'aos', 'https://unpkg.com/aos@next/dist/aos.js',array(), '', 'all', true);
    //wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/sticky.js', '', '', true);
    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/custom.js',false,false,true);
    

}
add_action( 'wp_enqueue_scripts', 'maisano_styles_scripts' );


// Theme Options

if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}


// Favicon

function favicon() {
    echo   '<link rel="apple-touch-icon" sizes="60x60" href="'.get_template_directory_uri().'/assets/icons/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="'.get_template_directory_uri().'/assets/icons/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="'.get_template_directory_uri().'/assets/icons/favicon-16x16.png">
            <link rel="manifest" href="'.get_template_directory_uri().'/assets/icons/site.webmanifest">
            <link rel="mask-icon" href="'.get_template_directory_uri().'/assets/icons/safari-pinned-tab.svg" color="#727779">
            <meta name="msapplication-TileColor" content="#b91d47">
            <meta name="theme-color" content="#ffffff">';
}
add_action( 'wp_head', 'favicon' );

/**
 * disable for posts.
 */
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
/**
 * disable for post types.
 */
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );