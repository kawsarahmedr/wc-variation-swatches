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
			__( 'Variation Swatches', 'wc-variation-swatches' ),
			__( 'Variation Swatches', 'wc-variation-swatches' ),
			'manage_options',
			'wc-variation-swatches',
			array( Settings::class, 'output' )
		);
	}
}
