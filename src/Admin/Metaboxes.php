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
	}

	/**
	 * Product panel tab
	 *
	 * since 1.0.0
	 */
	public static function product_data_tab( $tabs ) {
		$tabs['wc_variation_swatches'] = array(
			'label'    => __( 'Variation Swatches', 'wc-variation-swatches' ),
			'target'   => 'wc_variation_swatches_data',
//			'class'    => array( 'show_if_simple' ),
			'priority' => 11,
		);

		return $tabs;
	}

	/** Product panel meta boxes
	 *
	 * since 1.0.0
	 */
	public static function product_write_panel() {
		global $post, $woocommerce;
		?>
		<div id="wc_variation_swatches_data" class="panel woocommerce_options_panel"
		     style="padding-bottom: 50px;display: none;">
		<?php
		woocommerce_wp_checkbox(
			array(
				'id'            => 'wcvs_is_enable_tooltip',
				'label'         => __( 'Enable tooltip', 'wc-variation-swatches' ),
				'description'   => __( 'Check this if you want to enable tooltip.', 'wc-variation-swatches' ),
				'value'         => get_post_meta( $post->ID, 'wcvs_is_enable_tooltip', true ),
				'wrapper_class' => 'options_group',
				'desc_tip'      => true,
			)
		);

		woocommerce_wp_checkbox(
			array(
				'id'            => 'wcvs_show_selected_attr',
				'label'         => __( 'Show selected attribute', 'wc-variation-swatches' ),
				'description'   => __( 'Check this if you want to show selected attribute.', 'wc-variation-swatches' ),
				'value'         => get_post_meta( $post->ID, 'wcvs_show_selected_attr', true ),
				'wrapper_class' => 'form-field',
				'desc_tip'      => true,
			)
		);

		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_variation_label_separator',
				'label'             => __( 'Variation label separator', 'wc-serial-numbers' ),
				'description'       => __( 'Variation label separator.', 'wc-serial-numbers' ),
				'value'             => get_post_meta( $post->ID, 'wcsp_variation_label_separator', true ),
				'type'              => 'text',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_show_selected_attr',
					'data-cond-value' => 'yes',
				),
			)
		);

		woocommerce_wp_checkbox(
			array(
				'id'            => 'wcvs_is_enable_preloader',
				'label'         => __( 'Enable preloader', 'wc-variation-swatches' ),
				'description'   => __( 'Check this if you want to enable preloader.', 'wc-variation-swatches' ),
				'value'         => get_post_meta( $post->ID, 'wcvs_is_enable_preloader', true ),
				'wrapper_class' => 'form-field',
				'desc_tip'      => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_show_selected_attr',
					'data-cond-value' => 'yes',
				),
			)
		);

		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_variation_stock_info',
				'label'             => __( 'Variation stock info', 'wc-serial-numbers' ),
				'description'       => __( 'Variation stock info.', 'wc-serial-numbers' ),
				'value'             => get_post_meta( $post->ID, 'wcsp_variation_stock_info', true ),
				'type'              => 'text',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_show_selected_attr',
					'data-cond-value' => 'yes',
				),
			)
		);

		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_attribute_display_limit',
				'label'             => __( 'Attribute display limit', 'wc-serial-numbers' ),
				'description'       => __( 'Attribute display limit.', 'wc-serial-numbers' ),
				'value'             => get_post_meta( $post->ID, 'wcsp_attribute_display_limit', true ),
				'type'              => 'number',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_show_selected_attr',
					'data-cond-value' => 'yes',
				),
			)
		);

		woocommerce_wp_checkbox(
			array(
				'id'            => 'wcvs_generate_variation_url',
				'label'         => __( 'Generate variation URL', 'wc-variation-swatches' ),
				'description'   => __( 'Check this if you want to enable the variation URL generate roll.', 'wc-variation-swatches' ),
				'value'         => get_post_meta( $post->ID, 'wcvs_generate_variation_url', true ),
				'wrapper_class' => 'options_group',
				'desc_tip'      => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_show_selected_attr',
					'data-cond-value' => 'yes',
				),
			)
		);

		woocommerce_wp_checkbox(
			array(
				'id'            => 'wcvs_override_global_settings',
				'label'         => __( 'Override global settings', 'wc-variation-swatches' ),
				'description'   => __( 'Check this if you want to override the global settings.', 'wc-variation-swatches' ),
				'value'         => get_post_meta( $post->ID, 'wcvs_override_global_settings', true ),
				'wrapper_class' => 'options_group',
				'desc_tip'      => true,
			)
		);

		$wcsp_customize_swatch_width = (int) get_post_meta( $post->ID, 'wcsp_customize_swatch_width', true );
		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_customize_swatch_width',
				'label'             => __( 'Swatch width', 'wc-serial-numbers' ),
				'description'       => __( 'Enter swatch width.', 'wc-serial-numbers' ),
				'value'             => empty( $wcsp_customize_swatch_width ) ? 50 : $wcsp_customize_swatch_width,
				'type'              => 'number',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_override_global_settings',
					'data-cond-value' => 'yes',
				),
			)
		);

		$wcsp_customize_swatch_height = (int) get_post_meta( $post->ID, 'wcsp_customize_swatch_height', true );
		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_customize_swatch_height',
				'label'             => __( 'Swatch height', 'wc-serial-numbers' ),
				'description'       => __( 'Enter swatch height.', 'wc-serial-numbers' ),
				'value'             => empty( $wcsp_customize_swatch_height ) ? 50 : $wcsp_customize_swatch_height,
				'type'              => 'number',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_override_global_settings',
					'data-cond-value' => 'yes',
				),
			)
		);

		$wcsp_customize_swatch_radius = (int) get_post_meta( $post->ID, 'wcsp_customize_swatch_radius', true );
		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_customize_swatch_radius',
				'label'             => __( 'Swatch radius', 'wc-serial-numbers' ),
				'description'       => __( 'Enter swatch radius.', 'wc-serial-numbers' ),
				'value'             => empty( $wcsp_customize_swatch_radius ) ? 50 : $wcsp_customize_swatch_radius,
				'type'              => 'number',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_override_global_settings',
					'data-cond-value' => 'yes',
				),
			)
		);

		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_customize_border_color',
				'label'             => __( 'Border color', 'wc-serial-numbers' ),
				'description'       => __( 'Chose border color.', 'wc-serial-numbers' ),
				'value'             => get_post_meta( $post->ID, 'wcsp_customize_border_color', true ),
				'type'              => 'text',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_override_global_settings',
					'data-cond-value' => 'yes',
				),
			)
		);

		$wcsp_customize_font_size = (int) get_post_meta( $post->ID, 'wcsp_customize_font_size', true );
		woocommerce_wp_text_input(
			array(
				'id'                => 'wcsp_customize_font_size',
				'label'             => __( 'Font size', 'wc-serial-numbers' ),
				'description'       => __( 'Enter font size.', 'wc-serial-numbers' ),
				'value'             => empty( $wcsp_customize_font_size ) ? 16 : $wcsp_customize_font_size,
				'type'              => 'number',
				'wrapper_class'     => 'form-field',
				'desc_tip'          => true,
				'custom_attributes' => array(
					'data-cond-id'    => 'wcvs_override_global_settings',
					'data-cond-value' => 'yes',
				),
			)
		);
		?>
		</div>
		<?php
	}
}
