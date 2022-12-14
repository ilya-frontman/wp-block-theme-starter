<?php

/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp-block-theme
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define('WP_BLOCK_THEME_STARTER_VERSION', wp_get_theme()->get('Version'));

/**
 * Add theme support.
 */
function wp_block_theme_setup()
{
	add_theme_support('wp-block-styles');
	add_editor_style('./assets/css/style-shared.min.css');

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = ['button', 'file', 'quote', 'search'];
	foreach ($styled_blocks as $block_name) {
		$args = array(
			'handle' => "wp-block-theme-$block_name",
			'src'    => get_theme_file_uri("assets/css/blocks/$block_name.min.css"),
			'path'   => get_theme_file_path("assets/css/blocks/$block_name.min.css"),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style("core/$block_name", $args);
	}
}
add_action('after_setup_theme', 'wp_block_theme_setup');

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function wp_block_theme_styles()
{
	wp_enqueue_style(
		'wp-block-theme-style',
		get_stylesheet_uri(),
		[],
		WP_BLOCK_THEME_STARTER_VERSION
	);
	wp_enqueue_style(
		'wp-block-theme-shared-styles',
		get_theme_file_uri('assets/css/style-shared.min.css'),
		[],
		WP_BLOCK_THEME_STARTER_VERSION
	);

	wp_enqueue_style(
		'wp-block-theme-custom-fonts',
		get_theme_file_uri('/assets/css/fonts.min.css'),
		[],
		WP_BLOCK_THEME_STARTER_VERSION
	);
}
add_action('wp_enqueue_scripts', 'wp_block_theme_styles');

// Block style examples.
require_once get_theme_file_path('inc/register-block-styles.php');

// Block pattern helper for the privacy policy.
require_once get_theme_file_path('inc/block-pattern-helper.php');

// Load custom-fonts
include_once get_theme_file_path('hooks/load-fonts.php');
add_action('wp_head', 'load_web_fonts');

// Register menu
function wp_block_theme_register_menus()
{
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu', 'wp-block-theme'),
			'secondary-menu' => __('Secondary Menu', 'wp-block-theme'),
		)
	);
}
add_action('init', 'wp_block_theme_register_menus');

// Add support custom-logo
function wp_block_theme_register_custom_logo()
{
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height' => 80,
		'width'  => 160,
		'flex-height' => true,
		'flex-width' => true,
	));
}
add_action('after_setup_theme', 'wp_block_theme_register_custom_logo');

// Add classic customizer edit: logo, favicon, menu
function wp_block_theme_customize_register($wp_customize)
{
	$wp_customize->add_setting('setting_id', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	));
}
add_action('customize_register', 'wp_block_theme_customize_register');
