<?php
/**
 * Free Assets Library Plugin.
 *
 * @package      FAL
 * @copyright    Copyright (C) 2014-2022, Surror - admin@surror.com
 * @link         https://surror.com
 * @since        2.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Free Assets Library
 * Version:           2.1.1
 * Plugin URI:        https://surror.com/free-asset-library/
 * Description:       Stunning free images from Openverse, Pixabay for your own blog. Find suitable image as per your need from the millions royalty free images library.
 * Author:            Surror
 * Author URI:        https://surror.com/
 * License:           GPL v3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       fal
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

/**
 * FAL class.
 *
 * @class Main class of the plugin.
 */
final class FAL {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public $version = '2.1.1';

	/**
	 * Database version.
	 *
	 * @var string
	 */
	public $db_version = '1';

	/**
	 * Minimum version of WordPress required.
	 *
	 * @var string
	 */
	private $wordpress_version = '6.1.1';

	/**
	 * Minimum version of PHP required.
	 *
	 * @var string
	 */
	private $php_version = '7.2';

	/**
	 * Holds various class instances.
	 *
	 * @var array
	 */
	private $container = [];

	/**
	 * Hold install error messages.
	 *
	 * @var bool
	 */
	private $messages = [];

	/**
	 * The single instance of the class.
	 *
	 * @var FAL
	 */
	protected static $instance = null;

	/**
	 * Magic isset to bypass referencing plugin.
	 *
	 * @param  string $prop Property to check.
	 * @return bool
	 */
	public function __isset( $prop ) {
		return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
	}

	/**
	 * Magic getter method.
	 *
	 * @param  string $prop Property to get.
	 * @return mixed Property value or NULL if it does not exists.
	 */
	public function __get( $prop ) {
		if ( array_key_exists( $prop, $this->container ) ) {
			return $this->container[ $prop ];
		}

		if ( isset( $this->{$prop} ) ) {
			return $this->{$prop};
		}

		return null;
	}

	/**
	 * Magic setter method.
	 *
	 * @param mixed $prop  Property to set.
	 * @param mixed $value Value to set.
	 */
	public function __set( $prop, $value ) {
		if ( property_exists( $this, $prop ) ) {
			$this->$prop = $value;
			return;
		}

		$this->container[ $prop ] = $value;
	}

	/**
	 * Magic call method.
	 *
	 * @param  string $name      Method to call.
	 * @param  array  $arguments Arguments to pass when calling.
	 * @return mixed Return value of the callback.
	 */
	public function __call( $name, $arguments ) {
		$hash = [
			'plugin_dir'   => FAL_DIR,
			'plugin_url'   => FAL_URI,
			'includes_dir' => FAL_DIR . 'includes/',
		];

		if ( isset( $hash[ $name ] ) ) {
			return $hash[ $name ];
		}

		return call_user_func_array( $name, $arguments );
	}

	/**
	 * Initialize.
	 */
	public function init() {
	}

	/**
	 * Retrieve main FAL instance.
	 *
	 * Ensure only one instance is loaded or can be loaded.
	 *
	 * @see fal()
	 * @return FAL
	 */
	public static function get() {
		if ( is_null( self::$instance ) && ! ( self::$instance instanceof FAL ) ) {
			self::$instance = new FAL();
			self::$instance->setup();
		}

		return self::$instance;
	}

	/**
	 * Instantiate the plugin.
	 */
	private function setup() {
		// Define plugin constants.
		$this->define_constants();

		// Include required files.
		$this->includes();

		// Instantiate classes.
		$this->instantiate();

		// Loaded action.
		do_action( 'fal/loaded' );
	}

	/**
	 * Auto-deactivate plugin if requirements are not met, and display a notice.
	 */
	public function auto_deactivate() {
		deactivate_plugins( plugin_basename( FAL_FILE ) );
		if ( isset( $_GET['activate'] ) ) { // phpcs:ignore
			unset( $_GET['activate'] ); // phpcs:ignore
		}
	}

	/**
	 * Error notice on plugin activation.
	 */
	public function activation_error() {
		?>
		<div class="notice fal-notice notice-error">
			<p>
				<?php echo join( '<br>', $this->messages ); // phpcs:ignore ?>
			</p>
		</div>
		<?php
	}

	/**
	 * Define the plugin constants.
	 */
	private function define_constants() {
		define( 'FAL_VERSION', $this->version );
		define( 'FAL_FILE', __FILE__ );
		define( 'FAL_BASE', plugin_basename( FAL_FILE ) );
		define( 'FAL_DIR', plugin_dir_path( FAL_FILE ) );
		define( 'FAL_URI', plugins_url( '/', FAL_FILE ) );
	}

	/**
	 * Include the required files.
	 */
	private function includes() {
		include dirname( __FILE__ ) . '/vendor/autoload.php';
	}

	/**
	 * Instantiate classes.
	 */
	private function instantiate() {
		new \FAL\Page();
		new \FAL\RestAPI();
		new \FAL\Track();
		new \FAL\Media_Popup();
	}

}

/**
 * Returns the main instance of FAL to prevent the need to use globals.
 *
 * @return FAL
 */
function fal() {
	return FAL::get();
}

// Start it.
fal();
