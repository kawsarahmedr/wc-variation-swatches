<?php

namespace WooCommerceVariationSwatches\Admin;

use WooCommerceVariationSwatches\Lib;

defined( 'ABSPATH' ) || exit;

/**
 * Class Settings.
 *
 * @since   1.0.0
 * @package WooCommerceVariationSwatches\Admin
 */
class Settings extends Lib\Settings {

	/**
	 * Get settings tabs.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_tabs() {
		$tabs = array(
			'general'      => __( 'General', 'wc-variation-swatches' ),
			'advanced'     => __( 'Advanced', 'wc-variation-swatches' ),
			'global_style' => __( 'Global Styles', 'wc-variation-swatches' ),
			'product_page' => __( 'Product Page', 'wc-variation-swatches' ),
			'shop_page'    => __( 'Shop Page', 'wc-variation-swatches' ),
		);

		return apply_filters( 'wc_variation_swatches_settings_tabs', $tabs );
	}

	/**
	 * Get settings.
	 *
	 * @param string $tab Current tab.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_settings( $tab ) {
		$settings = array();

		switch ( $tab ) {
			case 'general':
				$settings = array(
					[
						'title' => __( 'General Settings', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect how the plugin will work.', 'wc-variation-swatches' ),
						'id'    => 'general_options',
					],
					[
						'title'   => __( 'Enable for product page', 'wc-variation-swatches' ),
						'desc'    => __( 'Enable swatches for product page.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_enable_product_page',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Enable for shop page', 'wc-variation-swatches' ),
						'desc'    => __( 'Enable swatches for shop page.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_enable_shop_page',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Auto convert dropdown to label', 'wc-variation-swatches' ),
						'desc'    => __( 'Automatically convert dropdown to labels.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_auto_convert_label',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Auto convert dropdown to image', 'wc-variation-swatches' ),
						'desc'    => __( 'Automatically convert dropdown to images.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_auto_convert_image',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'type' => 'sectionend',
						'id'   => 'general_options',
					],
				);
				break;
			case 'advanced':
				$settings = array(
					[
						'title' => __( 'Advanced settings', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the advanced settings.', 'wc-variation-swatches' ),
						'id'    => 'advanced_options',
					],
					[
						'title'   => __( 'Disable out of stock', 'wc-variation-swatches' ),
						'desc'    => __( 'Disable the out of stock items.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_disable_out_of_stock',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Clickable out of stock', 'wc-variation-swatches' ),
						'desc'    => __( 'Clickable the out of stock items.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_clickable_out_of_stock',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Disabled attribute style', 'wc-variation-swatches' ),
						'desc'    => __( 'Disabled the attribute style.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcif_attribute_style',
						'type'    => 'select',
						'options' => array(
							'hide'               => __( 'Hide', 'wc-variation-swatches' ),
							'blur_with_cross'    => __( 'Blur with cross', 'wc-variation-swatches' ),
							'blur_without_cross' => __( 'Blur without cross', 'wc-variation-swatches' ),
						),
						'default' => 'hide',
					],
					[
						'title'   => __( 'Attribute image size', 'wc-variation-swatches' ),
						'desc'    => __( 'Attribute image sizes.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcif_attribute_img_size',
						'type'    => 'select',
						'options' => array(
							'size_1' => __( 'Image Size 1', 'wc-variation-swatches' ),
							'size_2' => __( 'Image Size 2', 'wc-variation-swatches' ),
							'size_3' => __( 'Image Size 3', 'wc-variation-swatches' ),
							'size_4' => __( 'Image Size 4', 'wc-variation-swatches' ),
						),
						'default' => 'size_1',
					],
					[
						'type' => 'sectionend',
						'id'   => 'advanced_options',
					],
				);
				break;
			case 'global_style':
				$settings = array(
					[
						'title' => __( 'Global Styles', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the global style settings.', 'wc-variation-swatches' ),
						'id'    => 'global_style_options',
					],
					[
						'type' => 'sectionend',
						'id'   => 'global_style_options',
					],
					[
						'title' => __( 'Swatches', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the variation swatches style settings.', 'wc-variation-swatches' ),
						'id'    => 'swatches_style_options',
					],
					[
						'title'       => __( 'Swatch width', 'wc-variation-swatches' ),
						'id'          => 'wcsp_swatch_width',
						'desc'        => __( 'Swatch width.', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'text',
						'placeholder' => '50x50',
					],
					[
						'title'       => __( 'Swatch height', 'wc-variation-swatches' ),
						'id'          => 'wcsp_swatch_height',
						'desc'        => __( 'Swatch height.', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'text',
						'placeholder' => '100',
					],
					[
						'title'       => __( 'Swatch radius', 'wc-variation-swatches' ),
						'id'          => 'wcsp_swatch_radius',
						'desc'        => __( 'Swatch radius.', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'text',
						'placeholder' => '100',
					],
					[
						'title'   => __( 'Border color', 'wc-variation-swatches' ),
						'desc'    => __( 'Choose the border color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcsp_border_color',
						'type'    => 'color',
						'default' => '#cccccc',
					],
					[
						'title'       => __( 'Font size', 'wc-variation-swatches' ),
						'id'          => 'wcsp_font_size',
						'desc'        => __( 'Font size.', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'number',
						'placeholder' => '16',
					],
					[
						'type' => 'sectionend',
						'id'   => 'swatches_style_options',
					],
					[
						'title' => __( 'Tooltip', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the tooltip settings.', 'wc-variation-swatches' ),
						'id'    => 'swatches_tooltip_options',
					],
					[
						'title'   => __( 'Background color', 'wc-variation-swatches' ),
						'desc'    => __( 'Choose the background color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcsp_background_color',
						'type'    => 'color',
						'default' => '#cccccc',
					],
					[
						'title'   => __( 'Font color', 'wc-variation-swatches' ),
						'desc'    => __( 'Choose the font color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcsp_font_color',
						'type'    => 'color',
						'default' => '#cccccc',
					],
					[
						'title'       => __( 'Font size', 'wc-variation-swatches' ),
						'id'          => 'wcsp_tooltip_font_size',
						'desc'        => __( 'Font size.', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'number',
						'placeholder' => '16',
					],
					[
						'type' => 'sectionend',
						'id'   => 'swatches_tooltip_options',
					],
					[
						'title' => __( 'Label', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the label settings.', 'wc-variation-swatches' ),
						'id'    => 'swatches_label_options',
					],
					[
						'title'   => __( 'Label position', 'wc-variation-swatches' ),
						'desc'    => __( 'Chose the label position.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcif_label_position',
						'type'    => 'select',
						'options' => array(
							'none'    => __( 'None', 'wc-variation-swatches' ),
							'stacked' => __( 'Stacked', 'wc-variation-swatches' ),
							'inline'  => __( 'Inline', 'wc-variation-swatches' ),
						),
						'default' => 'none',
					],
					[
						'title'       => __( 'Font size', 'wc-variation-swatches' ),
						'id'          => 'wcsp_label_font_size',
						'desc'        => __( 'Font size.', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'number',
						'placeholder' => '16',
					],
					[
						'type' => 'sectionend',
						'id'   => 'swatches_label_options',
					],
					[
						'title' => __( 'Attribute', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the attribute settings.', 'wc-variation-swatches' ),
						'id'    => 'swatches_attribute_options',
					],
					[
						'title'   => __( 'Check/tick color', 'wc-variation-swatches' ),
						'desc'    => __( 'Check/tick color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcsp_check_or_tick_color',
						'type'    => 'color',
						'default' => '#cccccc',
					],
					[
						'title'   => __( 'Cross color', 'wc-variation-swatches' ),
						'desc'    => __( 'Cross color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcsp_cross_color',
						'type'    => 'color',
						'default' => '#cccccc',
					],
					[
						'type' => 'sectionend',
						'id'   => 'swatches_attribute_options',
					],
				);
				break;

			case 'product_page':
				$settings = array(
					[
						'title' => __( 'Product Page', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the product page settings.', 'wc-variation-swatches' ),
						'id'    => 'product_page_options',
					],
					[
						'type' => 'sectionend',
						'id'   => 'product_page_options',
					],
					[
						'title' => __( 'General', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the general settings.', 'wc-variation-swatches' ),
						'id'    => 'product_general_options',
					],
					[
						'title'   => __( 'Enable tooltip', 'wc-variation-swatches' ),
						'desc'    => __( 'Enable tooltip.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_enable_tooltip',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Show selected attribute', 'wc-variation-swatches' ),
						'desc'    => __( 'Show selected attribute.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_show_selected_attr',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'             => __( 'Variation label separator', 'wc-variation-swatches' ),
						'id'                => 'wcsp_variation_label_separator',
						'desc'              => __( 'Variation label separator.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_show_selected_attr',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Enable preloader', 'wc-variation-swatches' ),
						'desc'              => __( 'Enable the preloader.', 'wc-variation-swatches' ),
						'id'                => 'wcvs_enable_preloader',
						'default'           => 'yes',
						'type'              => 'checkbox',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_show_selected_attr',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Variation stock info', 'wc-variation-swatches' ),
						'id'                => 'wcsp_variation_stock_info',
						'desc'              => __( 'Variation stock info.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_show_selected_attr',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Attribute display limit', 'wc-variation-swatches' ),
						'id'                => 'wcsp_attribute_display_limit',
						'desc'              => __( 'Attribute display limit.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_show_selected_attr',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Generate variation URL', 'wc-variation-swatches' ),
						'desc'              => __( 'Generate the variation URL.', 'wc-variation-swatches' ),
						'id'                => 'wcvs_generate_variation_url',
						'default'           => 'yes',
						'type'              => 'checkbox',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_show_selected_attr',
							'data-cond-value' => 'yes',
						),
					],
					[
						'type' => 'sectionend',
						'id'   => 'product_general_options',
					],
					[
						'title' => __( 'Customize', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the customize settings.', 'wc-variation-swatches' ),
						'id'    => 'product_customize_options',
					],
					[
						'title'   => __( 'Override global settings', 'wc-variation-swatches' ),
						'desc'    => __( 'Override global settings.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_override_global_settings',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'             => __( 'Swatch width', 'wc-variation-swatches' ),
						'id'                => 'wcsp_customize_swatch_width',
						'desc'              => __( 'Swatch width.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'placeholder'       => '50',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Swatch height', 'wc-variation-swatches' ),
						'id'                => 'wcsp_customize_swatch_height',
						'desc'              => __( 'Swatch height.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'placeholder'       => '100',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Swatch radius', 'wc-variation-swatches' ),
						'id'                => 'wcsp_customize_swatch_radius',
						'desc'              => __( 'Swatch Radius.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'placeholder'       => '100',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Border color', 'wc-variation-swatches' ),
						'desc'              => __( 'Choose the border color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'                => 'wcsp_customize_border_color',
						'type'              => 'color',
						'default'           => '#cccccc',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Font size', 'wc-variation-swatches' ),
						'id'                => 'wcsp_customize_font_size',
						'desc'              => __( 'Font size.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'number',
						'placeholder'       => '16',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'type' => 'sectionend',
						'id'   => 'product_customize_options',
					],
				);
				break;

			case 'shop_page':
				$settings = array(
					[
						'title' => __( 'Shop Page', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the shop page settings.', 'wc-variation-swatches' ),
						'id'    => 'shop_page_options',
					],
					[
						'title' => __( 'General', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the shop page general settings.', 'wc-variation-swatches' ),
						'id'    => 'shop_page_general_options',
					],
					[
						'title'   => __( 'Swatch alignment', 'wc-variation-swatches' ),
						'desc'    => __( 'Select the swatch alignment option.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcif_swatch_alignment',
						'type'    => 'select',
						'options' => array(
							'left'   => __( 'Left', 'wc-variation-swatches' ),
							'right'  => __( 'Right', 'wc-variation-swatches' ),
							'center' => __( 'Center', 'wc-variation-swatches' ),
						),
						'default' => 'left',
					],
					[
						'title'   => __( 'Swatch position', 'wc-variation-swatches' ),
						'desc'    => __( 'Select the swatch position.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'      => 'wcif_swatch_position',
						'type'    => 'select',
						'options' => array(
							'before_title' => __( 'Before Title', 'wc-variation-swatches' ),
							'after_title'  => __( 'After Title', 'wc-variation-swatches' ),
							'before_price' => __( 'Before Price', 'wc-variation-swatches' ),
							'after_price'  => __( 'After Price', 'wc-variation-swatches' ),
						),
						'default' => 'before_title',
					],
					[
						'title'   => __( 'Show swatches label', 'wc-variation-swatches' ),
						'desc'    => __( 'Show swatches label.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_show_swatches_label',
						'default' => 'yes',
						'type'    => 'checkbox',
					],
					[
						'title'       => __( 'attribute limits', 'wc-variation-swatches' ),
						'id'          => 'wcsp_attribute_limit',
						'desc'        => __( 'Attribute limite', 'wc-variation-swatches' ),
						'desc_tip'    => true,
						'type'        => 'number',
						'placeholder' => '10',
					],
					[
						'type' => 'sectionend',
						'id'   => 'shop_page_options',
					],
					[
						'title' => __( 'Customize', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the shop page customize settings.', 'wc-variation-swatches' ),
						'id'    => 'shop_page_customize_options',
					],
					[
						'title'   => __( 'Override global settings', 'wc-variation-swatches' ),
						'desc'    => __( 'Override global settings.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_shop_override_global_settings',
						'default' => 'yes',
						'type'    => 'checkbox',
					],

					[
						'title'             => __( 'Swatch width', 'wc-variation-swatches' ),
						'id'                => 'wcsp_shop_swatch_width',
						'desc'              => __( 'Swatch width.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'placeholder'       => '50',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_shop_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Swatch height', 'wc-variation-swatches' ),
						'id'                => 'wcsp_shop_swatch_height',
						'desc'              => __( 'Swatch height.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'placeholder'       => '100',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_shop_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Swatch radius', 'wc-variation-swatches' ),
						'id'                => 'wcsp_shop_swatch_radius',
						'desc'              => __( 'Swatch Radius.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'text',
						'placeholder'       => '100',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_shop_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Border color', 'wc-variation-swatches' ),
						'desc'              => __( 'Choose the border color.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'id'                => 'wcsp_shop_border_color',
						'type'              => 'color',
						'default'           => '#cccccc',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_shop_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'title'             => __( 'Font size', 'wc-variation-swatches' ),
						'id'                => 'wcsp_shop_font_size',
						'desc'              => __( 'Font size.', 'wc-variation-swatches' ),
						'desc_tip'          => true,
						'type'              => 'number',
						'placeholder'       => '16',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcvs_shop_override_global_settings',
							'data-cond-value' => 'yes',
						),
					],
					[
						'type' => 'sectionend',
						'id'   => 'shop_page_customize_options',
					],
				);
				break;
		}

		return apply_filters( 'wc_variation_swatches_get_settings_' . $tab, $settings );
	}

	/**
	 * Output premium widget.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	protected function output_premium_widget() {
		if ( wc_variation_swatches()->is_premium_active() ) {
			return;
		}
		$features = array(
			__( 'Feature 1', 'wc-variation-swatches' ),
			__( 'Feature 2', 'wc-variation-swatches' ),
			__( 'Feature 3', 'wc-variation-swatches' ),
			__( 'Feature 4', 'wc-variation-swatches' ),
			__( 'Feature 5', 'wc-variation-swatches' ),
			__( 'Many more ...', 'wc-variation-swatches' ),
		);
		?>
		<div class="pev-panel promo-panel">
			<h3><?php esc_html_e( 'Want More?', 'wc-variation-swatches' ); ?></h3>
			<p><?php esc_attr_e( 'This plugin offers a premium version which comes with the following features:', 'wc-variation-swatches' ); ?></p>
			<ul>
				<?php foreach ( $features as $feature ) : ?>
					<li>- <?php echo esc_html( $feature ); ?></li>
				<?php endforeach; ?>
			</ul>
			<a href="https://pluginever.com/plugins/wc-variation-swatches/?utm_source=plugin-settings&utm_medium=banner&utm_campaign=upgrade&utm_id=wc-variation-swatches" class="button" target="_blank">
				<?php esc_html_e( 'Upgrade to PRO', 'wc-variation-swatches' ); ?>
			</a>
		</div>
		<?php
	}

	 /**
	 * Output settings form.
	 *
	 * @param array $settings Settings.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	 protected function output_form( $settings ) {
		 $current_tab = $this->get_current_tab();
		 /**
		 * Action hook to output settings form.
		 *
		 * @since 1.0.0
		 */
		 do_action( 'wc_variation_swatches_settings_' . $current_tab );
		 parent::output_form( $settings );
	 }

	/**
	 * Output tabs.
	 *
	 * @param array $tabs Tabs.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function output_tabs( $tabs ) {
		parent::output_tabs( $tabs );
		if ( wc_variation_swatches()->get_docs_url() ) {
			echo sprintf( '<a href="%s" class="nav-tab" target="_blank">%s</a>', esc_url( wc_variation_swatches()->get_docs_url() ), esc_html__( 'Documentation', 'wc-variation-swatches' ) );
		}
	}
}
