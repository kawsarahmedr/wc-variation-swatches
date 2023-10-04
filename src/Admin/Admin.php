<?php

namespace WooCommerceVariationSwatches\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 *
 * @since 1.0.0
 * @package WooCommerceVariationSwatches
 */
class Admin {

	/**
	 * Admin constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ), 1 );
		add_filter( 'woocommerce_screen_ids', array( $this, 'screen_ids' ) );
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), PHP_INT_MAX );
		add_filter( 'update_footer', array( $this, 'update_footer' ), PHP_INT_MAX );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Init.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		wc_variation_swatches()->services->add( Settings::instance() );
		wc_variation_swatches()->services->add( Menus::class );
	}

	/**
	 * Add the plugin screens to the WooCommerce screens.
	 * This will load the WooCommerce admin styles and scripts.
	 *
	 * @param array $ids Screen ids.
	 *
	 * @return array
	 */
	public function screen_ids( $ids ) {
		return array_merge( $ids, self::get_screen_ids() );
	}

	/**
	 * Admin footer text.
	 *
	 * @param string $footer_text Footer text.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function admin_footer_text( $footer_text ) {
		if ( wc_variation_swatches()->get_review_url() && in_array( get_current_screen()->id, self::get_screen_ids(), true ) ) {
			$footer_text = sprintf(
			/* translators: 1: Plugin name 2: WordPress */
				__( 'Thank you for using %1$s. If you like it, please leave us a %2$s rating. A huge thank you from PluginEver in advance!', 'wc-variation-swatches' ),
				'<strong>' . esc_html( wc_variation_swatches()->get_name() ) . '</strong>',
				'<a href="' . esc_url( wc_variation_swatches()->get_review_url() ) . '" target="_blank" class="wc-variation-swatches-rating-link" data-rated="' . esc_attr__( 'Thanks :)', 'wc-variation-swatches' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
			);
		}

		return $footer_text;
	}

	/**
	 * Update footer.
	 *
	 * @param string $footer_text Footer text.
	 *
	 * @since 1.0.0
	 * @return string
	 */
	public function update_footer( $footer_text ) {
		if ( in_array( get_current_screen()->id, self::get_screen_ids(), true ) ) {
			/* translators: 1: Plugin version */
			$footer_text = sprintf( esc_html__( 'Version %s', 'wc-variation-swatches' ), wc_variation_swatches()->get_version() );
		}

		return $footer_text;
	}

	/**
	 * Get screen ids.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public static function get_screen_ids() {
		$screen_ids = [
			'woocommerce_page_wc-variation-swatches',
			'post.php',
		];

		return apply_filters( 'wc_variation_swatches_screen_ids', $screen_ids );
	}

	/**
	 * Enqueue admin scripts.
	 *
	 * @param string $hook Hook name.
	 *
	 * @since 1.0.0
	 */
	public function admin_scripts( $hook ) {

		$screen_ids = self::get_screen_ids();
		wc_variation_swatches()->register_style( 'wcvs-admin', 'css/admin-common.css' );
		wc_variation_swatches()->register_script( 'wcvs-admin', 'js/admin-common.js' );

		if ( in_array( $hook, $screen_ids, true ) ) {
			wp_enqueue_style( 'wcvs-admin' );
			wp_enqueue_script( 'wcvs-admin' );
		}
	}
}
