<?php

namespace WooCommerceVariationSwatches\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 *
 * @since 1.0.0
 * @package WooCommerceVariationSwatches
 */
class Menus {

	/**
	 * Menus constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'settings_menu' ), 55 );
//		add_action( 'wc_variation_swatches_settings_test', array( __CLASS__, 'render_test_tab_data' ) );
	}

	/**
	 * Render the settings tab content.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public static function render_test_tab_data() {
		include __DIR__ . '/views/add-thing.php';
	}

	/**
	 * Settings menu.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function settings_menu() {
		add_submenu_page(
			'woocommerce',
			__( 'WC Variation Swatches', 'wc-variation-swatches' ),
			__( 'WC Variation Swatches', 'wc-variation-swatches' ),
			'manage_options',
			'wc-variation-swatches',
			array( Settings::class, 'output' )
		);
	}
}
