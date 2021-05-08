<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.melaniopech.com
 * @since             1.0.0
 * @package           Giphy_Random_Loader
 *
 * @wordpress-plugin
 * Plugin Name:       Giphy Random Loader
 * Plugin URI:        www.melaniopech.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Melanio Pech
 * Author URI:        www.melaniopech.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       giphy-random-loader
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GIPHY_RANDOM_LOADER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-giphy-random-loader-activator.php
 */
function activate_giphy_random_loader() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-giphy-random-loader-activator.php';
	Giphy_Random_Loader_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-giphy-random-loader-deactivator.php
 */
function deactivate_giphy_random_loader() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-giphy-random-loader-deactivator.php';
	Giphy_Random_Loader_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_giphy_random_loader' );
register_deactivation_hook( __FILE__, 'deactivate_giphy_random_loader' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-giphy-random-loader.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_giphy_random_loader() {

	$plugin = new Giphy_Random_Loader();
	$plugin->run();

}
run_giphy_random_loader();
