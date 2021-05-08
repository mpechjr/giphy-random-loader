<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.melaniopech.com
 * @since      1.0.0
 *
 * @package    Giphy_Random_Loader
 * @subpackage Giphy_Random_Loader/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Giphy_Random_Loader
 * @subpackage Giphy_Random_Loader/includes
 * @author     Melanio Pech <melaniojr@pech.com.bz>
 */
class Giphy_Random_Loader_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'giphy-random-loader',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
