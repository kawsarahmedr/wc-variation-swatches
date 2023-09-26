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
		add_action( 'wc_variation_swatches_things_content', array( $this, 'output_things_content' ) );
		add_action( 'wc_variation_swatches_settings_test', array( __CLASS__, 'render_test_tab_data' ) );
	}

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

	/**
	 * Output main page.
	 *
	 * @since 1.0.0
	 */
	public function output_main_page() {
		$page_hook = 'things';
		include __DIR__ . '/views/admin-page.php';
	}

	/**
	 * Output things content.
	 *
	 * @since 1.0.0
	 */
	public function output_things_content() {
		$add_thing  = isset( $_GET['new'] ) ? true : false; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$edit_thing = isset( $_GET['edit_thing'] ) ? absint( wp_unslash( $_GET['edit_thing'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( $edit_thing && ! wcsp_get_thing( $edit_thing ) ) {
			wp_safe_redirect( admin_url( 'admin.php?page=wc-variation-swatches' ) );
			exit();
		}
		if ( $add_thing ) {
			include __DIR__ . '/views/add-thing.php';
		} elseif ( $edit_thing ) {
			include __DIR__ . '/views/edit-thing.php';
		} else {
			include __DIR__ . '/views/list-thing.php';
		}
	}
}
