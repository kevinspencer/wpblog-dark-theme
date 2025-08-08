<?php

// Define the version as a constant so we can easily replace it throughout the theme
define( 'LESS_VERSION', 1.1 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss to Head
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* register main menu
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'less' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Enque Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function less_scripts()  { 

	// theme styles
	wp_enqueue_style( 'less-style', get_template_directory_uri() . '/style.css', '10000', 'all' );

	// and our dark guy - that didn't sound right
	wp_enqueue_style( 'less-style', get_template_directory_uri() . '/dark.css', '10000', 'all' );
	
	// add fitvid
	wp_enqueue_script( 'less-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), LESS_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'less', get_template_directory_uri() . '/js/theme.min.js', array(), LESS_VERSION, true );
  
}

function enqueue_dark_mode_toggle() {
    // Enqueue the toggle script
    wp_enqueue_script(
        'theme-toggle',
        get_template_directory_uri() . '/theme-toggle.js',
        array(),
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'enqueue_dark_mode_toggle');
add_action( 'wp_enqueue_scripts', 'less_scripts' );
