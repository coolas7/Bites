<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {  // tikrina ar esam admino aplinkoje

        wp_deregister_script('jquery');
		//		wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery-2.1.1.js', false, '2.1.1', true);
			// <script src="assets/js/jquery.min.js"></script>
			// <script src="assets/js/jquery.scrollex.min.js"></script>
			// <script src="assets/js/jquery.scrolly.min.js"></script>
			// <script src="assets/js/skel.min.js"></script>
			// <script src="assets/js/util.js"></script>
			// <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			// <script src="assets/js/main.js"></script>

        wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery-3.3.1.min.js', array(), false, true);
        wp_register_script('video', ASSETS_URL . '/assets/js/video.js', array('jquery'), false, true);
        // wp_register_script('smooth', ASSETS_URL . '/assets/js/smooth.js', array('jquery', 'video'), false, true);
        wp_register_script('map', ASSETS_URL . '/assets/js/map.js', array('jquery', 'video'), false, true);
        wp_register_script('galerija', ASSETS_URL . '/assets/js/galerija.js', array('jquery', 'video', 'map'), false, true);
        wp_register_script('map2', ASSETS_URL . '/assets/js/map2.js', array('jquery', 'video', 'map', 'galerija'), false, true);
        // wp_register_script('main-js', ASSETS_URL . '/assets/js/main.js', array('jquery', 'jquery-scrollex', 'jquery-scrolly', 'skel','util'), false, true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('video');
        // wp_enqueue_script('smooth');
        wp_enqueue_script('map');
        wp_enqueue_script('galerija');
        wp_enqueue_script('map2');
        // wp_enqueue_script('util');
        // wp_enqueue_script('main-js');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/style.css';

	if( $styles_path ) {
	
		wp_register_style('style-css', ASSETS_URL . '/assets/css/style.css', array(), false, 'all');
		wp_enqueue_style('style-css');
			wp_register_style('font-awesome-all', ASSETS_URL . '/assets/css/fontawesome-all.css', array(), false, 'all');
		wp_enqueue_style('font-awesome-all');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Header',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Footer',
	// 	'parent_slug'	=> 'theme-general-settings',
	// ));
	
}

function my_acf_google_map_api( $api ) {
	$api['key'] = 'AIzaSyDDheZDjJxCxRC8_3nWe508y5w7aAZb-Ps';
	return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function post_type_features_init() {
    $labels = array(
        'name'                  => _x( 'Features', 'Post type general name', 'svetaine' ),
        'singular_name'         => _x( 'Feature', 'Post type singular name', 'svetaine' ),
        'menu_name'             => _x( 'Features', 'Admin Menu text', 'svetaine' ),
        'name_admin_bar'        => _x( 'Feature', 'Add New on Toolbar', 'svetaine' ),
        'add_new'               => __( 'Add New', 'svetaine' ),
        'add_new_item'          => __( 'Add New Freature', 'svetaine' ),
        'new_item'              => __( 'New Feature', 'svetaine' ),
        'edit_item'             => __( 'Edit Feature', 'svetaine' ),
        'view_item'             => __( 'View Feature', 'svetaine' ),
        'all_items'             => __( 'All Features', 'svetaine' ),
        'search_items'          => __( 'Search Features', 'svetaine' ),
        'not_found'             => __( 'No Features found.', 'svetaine' ),
        'not_found_in_trash'    => __( 'No Features found in Trash.', 'svetaine' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'feature' ),
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author'),
    );
 
    register_post_type( 'feature', $args );
}
 
add_action( 'init', 'post_type_features_init' );


function register_theme_menus() {
   
    register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation' ), 
        'footer-navigation' => __( 'Footer Navigation' ),
        'dropdown-elements' => __( 'Dropdown Elementai' ),
    ));
}

add_action( 'init', 'register_theme_menus' );



class CSS_Menu_Walker extends Walker {

    var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
    
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul>\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    
        global $wp_query;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        /* Add active class */
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
            unset($classes['current-menu-item']);
        }
        
        /* Check for children */
        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
        if (!empty($children)) {
            $classes[] = 'has-sub';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
        
        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><span>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '400');