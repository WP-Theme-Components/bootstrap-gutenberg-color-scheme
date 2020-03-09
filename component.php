<?php
/**
 * Gutenberg color scheme for the default Bootstrap styles
 *
 * @package WP-Theme-Components
 * @subpackage bootstrap-gutenberg-color-scheme
 * @link https://github.com/WP-Theme-Components/bootstrap-gutenberg-color-scheme
 * @version 1.0.0
 * @author Cameron Jones
 */

namespace WP_Theme_Components\Bootstrap_Gutenberg_Color_Scheme;

use function WP_Theme_Components\get_component_url;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Get the default Bootstrap color scheme
 *
 * @since 1.0.0
 * @return array
 */
function get_color_scheme() {
	$colors = array(
		array(
			'name'  => 'Primary',
			'slug'  => 'primary',
			'color' => '#007bff',
		),
		array(
			'name'  => 'Secondary',
			'slug'  => 'secondary',
			'color' => '#6c757d',
		),
		array(
			'name'  => 'Success',
			'slug'  => 'success',
			'color' => '#28a745',
		),
		array(
			'name'  => 'Danger',
			'slug'  => 'danger',
			'color' => '#dc3545',
		),
		array(
			'name'  => 'Warning',
			'slug'  => 'warning',
			'color' => '#ffc107',
		),
		array(
			'name'  => 'Info',
			'slug'  => 'info',
			'color' => '#17a2b8',
		),
		array(
			'name'  => 'Light',
			'slug'  => 'light',
			'color' => '#f8f9fa',
		),
		array(
			'name'  => 'Dark',
			'slug'  => 'dark',
			'color' => '#343a40',
		),
		array(
			'name'  => 'White',
			'slug'  => 'white',
			'color' => '#ffffff',
		),
	);
	return $colors;
}

/**
 * Add the color scheme theme support
 *
 * @since 1.0.0
 */
function theme_support() {
	add_theme_support( 'editor-color-palette', get_color_scheme() );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\theme_support' );

/**
 * Whether or not to enqueue the stylesheet
 *
 * @since 1.0.0
 * @return bool
 */
function maybe_enqueue_stylesheet() {
	return apply_filters( 'wp_theme_components/maybe_enqueue_stylesheet', true );
}

/**
 * Enqueue the color scheme stylesheet
 *
 * @since 1.0.0
 */
function enqueue_stylesheet() {
	if ( maybe_enqueue_stylesheet() ) {
		wp_enqueue_style( 'wp-theme-components/bootstrap-gutenberg-color-scheme', trailingslashit( get_component_url( __FILE__ ) ) . 'style.min.css', array(), '1.0.0' );
	}
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_stylesheet' );
