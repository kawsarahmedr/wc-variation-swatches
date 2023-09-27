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
			'general' => __( 'General', 'wc-variation-swatches' ),
			'advanced' => __( 'Advanced', 'wc-variation-swatches' ),
			'global_style' => __( 'Global Styles', 'wc-variation-swatches' ),
			'product_page' => __( 'Product Page', 'wc-variation-swatches' ),
			'shop_page' => __( 'Shop Page', 'wc-variation-swatches' ),
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
			case 'general' :
				$settings = array(
					[
						'title' => __( 'General settings', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect how the plugin will work.', 'wc-variation-swatches' ),
						'id'    => 'general_options',
					],
					[
						'title'   => __( 'Enable for Product page', 'wc-variation-swatches' ),
						'desc'    => __( 'Enable swatches for product page.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_enable_product_page',
						'default' => 'Yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Enable for Shop page', 'wc-variation-swatches' ),
						'desc'    => __( 'Enable swatches for shop page.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_enable_shop_page',
						'default' => 'Yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Auto Convert Dropdown to Label', 'wc-variation-swatches' ),
						'desc'    => __( 'Automatically convert dropdown to labels.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_auto_convert_label',
						'default' => 'Yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Auto Convert Dropdown to Image', 'wc-variation-swatches' ),
						'desc'    => __( 'Automatically convert dropdown to images.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_auto_convert_image',
						'default' => 'Yes',
						'type'    => 'checkbox',
					],
					[
						'type' => 'sectionend',
						'id'   => 'general_options',
					],
				);
				break;
			case 'advanced' :
				$settings = array(
					[
						'title' => __( 'Advanced settings', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options are the advanced settings.', 'wc-variation-swatches' ),
						'id'    => 'advanced_options',
					],
					[
						'title'   => __( 'Disable Out of Stock', 'wc-variation-swatches' ),
						'desc'    => __( 'Disable the out of stock items.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_disable_out_of_stock',
						'default' => 'Yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Clickable Out Of Stock', 'wc-variation-swatches' ),
						'desc'    => __( 'Clickable the out of stock items.', 'wc-variation-swatches' ),
						'id'      => 'wcvs_clickable_out_of_stock',
						'default' => 'Yes',
						'type'    => 'checkbox',
					],
					[
						'title'   => __( 'Disabled Attribute style', 'wc-image-flip' ),
						'desc'    => __( 'Disabled the attribute style.', 'wc-image-flip' ),
						'id'      => 'wcif_attribute_style',
						'type'    => 'select',
						'options' => array(
							'hide'               => __( 'Hide', 'wc-image-flip' ),
							'blur_with_cross'    => __( 'Blur with cross', 'wc-image-flip' ),
							'blur_without_cross' => __( 'Blur without cross', 'wc-image-flip' ),
						),
						'default' => 'hide',
					],
					[
						'title'   => __( 'Attribute Image Size', 'wc-image-flip' ),
						'desc'    => __( 'Attribute image sizes.', 'wc-image-flip' ),
						'id'      => 'wcif_attribute_img_size',
						'type'    => 'select',
						'options' => array(
							'size_1'               => __( 'Image Size 1', 'wc-image-flip' ),
							'size_2'               => __( 'Image Size 2', 'wc-image-flip' ),
							'size_3'               => __( 'Image Size 3', 'wc-image-flip' ),
							'size_4'               => __( 'Image Size 4', 'wc-image-flip' ),
						),
						'default' => 'size_1',
					],
					[
						'type' => 'sectionend',
						'id'   => 'advanced_options',
					],
				);
				break;
			case 'global_style' :
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
						'type' => 'sectionend',
						'id'   => 'swatches_style_options',
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

//	/**
//	 * Output settings form.
//	 *
//	 * @param array $settings Settings.
//	 *
//	 * @return void
//	 * @since 1.0.0
//	 */
//	protected function output_form( $settings ) {
//		$current_tab = $this->get_current_tab();
//		/**
//		 * Action hook to output settings form.
//		 *
//		 * @since 1.0.0
//		 */
//		do_action( 'wc_variation_swatches_settings_' . $current_tab );
//		parent::output_form( $settings );
//	}

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
