<?php

// Polyfill
if(!function_exists('is_iterable')) {
	function is_iterable($var) {
		return is_array($var) || $var instanceof Iterable;
	}
}

// WordPress Stubs
if(function_exists('add_shortcode')) {
	die('This file should not be included in a WordPress Installation!\n');
} else {

	function add_shortcode($handle, $callable, $priority=null, $args=null) {}
	function apply_filters($handle, $output=[], $pairs=[], $atts=[], $sc=null) { return $out; }
	function decode_shortcode_data($input) { return $input; }
	function shortcode_atts( $pairs, $atts, $shortcode = '' ) {
		$atts = (array)$atts;
		$out = array();
		foreach ($pairs as $name => $default) {
			if ( array_key_exists($name, $atts) )
				$out[$name] = $atts[$name];
			else
				$out[$name] = $default;
		}
		/**
		 * Filters a shortcode's default attributes.
		 *
		 * If the third parameter of the shortcode_atts() function is present then this filter is available.
		 * The third parameter, $shortcode, is the name of the shortcode.
		 *
		 * @since 3.6.0
		 * @since 4.4.0 Added the `$shortcode` parameter.
		 *
		 * @param array  $out       The output array of shortcode attributes.
		 * @param array  $pairs     The supported attributes and their defaults.
		 * @param array  $atts      The user defined shortcode attributes.
		 * @param string $shortcode The shortcode name.
		 */
		if ( $shortcode ) {
			$out = apply_filters( "shortcode_atts_{$shortcode}", $out, $pairs, $atts, $shortcode );
		}
		return $out;
	}
	set_error_handler(function($errno, $errstr, $errfile, $errline){
		error_log("[Error] $errno: $errstr on line $errline of '$errfile'\n");
		exit(3);
	});
}
