<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.melaniopech.com
 * @since      1.0.0
 *
 * @package    Giphy_Random_Loader
 * @subpackage Giphy_Random_Loader/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Giphy_Random_Loader
 * @subpackage Giphy_Random_Loader/admin
 * @author     Melanio Pech <melaniojr@pech.com.bz>
 */
class Giphy_Random_Loader_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Giphy_Random_Loader_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Giphy_Random_Loader_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/giphy-random-loader-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Giphy_Random_Loader_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Giphy_Random_Loader_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/giphy-random-loader-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function giphy_loader() {
		//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, 
		add_menu_page(
			__( 'Custom Menu Title', 'textdomain' ),
			'custom menu',
			'manage_options',
			'giphy-loader',
			array( $this, 'include_overview_partial' ),
			'',
			'',
			6
		);

		 
	}
	public function include_overview_partial() {
		include_once( plugin_dir_path( __FILE__ ) .'partials/giphy-random-loader-admin-display.php' );
	}

	public  function get_giphy_avatar( $data ) {
		$user_id = get_current_user_id();
		$giphy_avatar_url = get_user_meta( $user_id, 'giphy_profile_image', true );
		if ( empty( $giphy_avatar_url ) ) {
			return $data;
		}
		 
		if ( $giphy_avatar_url ) {
			$data['url'] = $giphy_avatar_url;
		}
		 
		return $data;
	}


}
	
