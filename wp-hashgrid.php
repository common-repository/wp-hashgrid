<?php
/*
Plugin Name: WP Hashgrid
Plugin URI: http://morganestes.me/wp-hashgrid
Description: A basic implementation of <a href="http://www.hashgrid.com/" title="#grid website" target="_blank">hashgrid.js</a> (#grid) for use in designing and developing WordPress themes.
Version: 0.1.2
Author: Morgan Estes
Author URI: http://morganestes.me
License: GPLv3
*/

/**
 * Class WP_Hashgrid
 */
class WP_Hashgrid {

    /**
     * Constructor to fire off actions when the class is created.
     *
     * @since 0.1.0
     *
     * @uses add_action() WordPress hook to dynamically call functions.
     */
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_assets' ) );
	}

    /**
     * Adds the front-end assets to the site.
     *
     * @since 0.1.0
     *
     * @uses wp_enqueue_script() Adds JavaScript files to the page.
     * @uses wp_enqueue_style() Adds CSS files to the page.
     *
     * @return string HTML string to insert script and link elements.
     */
	function load_assets() {
		/** @todo Make the CSS customizable via Admin page. */
		wp_enqueue_script( 'wp-hashgrid', plugins_url( 'hashgrid.js', __FILE__ ), array( 'jquery' ), '9', true );
		wp_enqueue_style( 'wp-hashgrid', plugins_url( 'hashgrid.css', __FILE__ ) );
	}
}

$hashgrid = new WP_Hashgrid();
