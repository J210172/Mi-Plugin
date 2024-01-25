<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://asir.duckdns.org
 * @since      1.0.0
 *
 * @package    Mi_Plugin
 * @subpackage Mi_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mi_Plugin
 * @subpackage Mi_Plugin/admin
 * @author     Yo <Yo@asir.net>
 */
class Mi_Plugin_Admin {

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
		 * defined in Mi_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mi_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mi-plugin-admin.css', array(), $this->version, 'all' );

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
		 * defined in Mi_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mi_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mi-plugin-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function add_menus() {
		add_menu_page(
			'Jaime Menu',
			'Jaime Menu',
			'manage_options',
			'jaime-menu',
			[$this, 'my_admin_page_contents'],
			'dashicons-schedule',
			3
		);

		add_submenu_page( 
			'jaime-menu',
			'Mi Plugin Ayuda',
			'Ayuda',
			'manage_options',
			$this->plugin_name . '-help',
			[$this, 'help_page'],
		);
	}

	function help_page() {
		?>
			<h1>¿Necesitas ayuda?</h1>
			<h2>¡Pues preguntale a Chat GPT!</h2>
		<?php
	}

	function my_admin_page_contents() {
		echo "<h1>Bienvenido al '". get_admin_page_title() ."' del Mejor plugin del mundo</h1>";
	}
}
