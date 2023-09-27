<?php

namespace WooCommerceVariationSwatches\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Class Metaboxes.
 *
 * @since   1.0.0
 * @package WooCommerceVariationSwatches\Admin
 */
class Metaboxes {
	/**
	 * Metaboxes constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'woocommerce_product_data_tabs', array( __CLASS__, 'product_data_tab' ) );
		add_action( 'woocommerce_product_data_panels', array( __CLASS__, 'product_write_panel' ) );
//		add_filter( 'woocommerce_process_product_meta', array( __CLASS__, 'product_save_data' ) );
//		add_action( 'woocommerce_product_after_variable_attributes', array( __CLASS__, 'variable_product_content' ), 10, 3 );
	}

	/**
	 * product
	 * since 1.0.0
	 */
	public static function product_data_tab( $tabs ) {
		$tabs['wc_variation_swatches'] = array(
			'label'    => __( 'Variation Swatches', 'wc-variation-swatches' ),
			'target'   => 'wc_variation_swatches_data',
			'class'    => array( 'show_if_simple' ),
			'priority' => 11,
		);

		return $tabs;
	}

	/**
	 * since 1.0.0
	 */
	public static function product_write_panel() {
		global $post, $woocommerce;
		?>
		<div id="wc_variation_swatches_data" class="panel woocommerce_options_panel show_if_simple"
		     style="padding-bottom: 50px;display: none;">
		<?php
		woocommerce_wp_checkbox(
			array(
				'id'            => '_is_serial_number',
				'label'         => __( 'Sell keys', 'wc-serial-numbers' ),
				'description'   => __( 'Enable this if you are selling keys or licensing this product.', 'wc-serial-numbers' ),
				'value'         => get_post_meta( $post->ID, '_is_serial_number', true ),
				'wrapper_class' => 'options_group',
				'desc_tip'      => true,
			)
		);
		?>
		</div>
		<?php
	}
}
