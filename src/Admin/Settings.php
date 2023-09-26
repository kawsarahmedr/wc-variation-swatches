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
			'test' => __( 'test', 'wc-variation-swatches' ),
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
						'title' => __( 'General settings', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect how the plugin will work.', 'wc-variation-swatches' ),
						'id'    => 'general_options',
					],
					[
						'title'       => __( 'Example field', 'wc-variation-swatches' ),
						'id'          => 'wcsp_example_field',
						'desc'        => __( 'This is an example field.', 'wc-variation-swatches' ),
						'desc_tip'    => __( 'This is an example field.', 'wc-variation-swatches' ),
						'type'        => 'text',
						'default'     => 'I am a default value',
						'placeholder' => 'I am a placeholder',
					],
					[
						'type' => 'sectionend',
						'id'   => 'general_options',
					],
				);
				break;
			case 'test':
				$settings = array(
					[
						'title' => __( 'Advanced settings', 'wc-variation-swatches' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect how the plugin will work.', 'wc-variation-swatches' ),
						'id'    => 'advanced_options',
					],
					[
						'title'       => __( 'Example field', 'wc-variation-swatches' ),
						'id'          => 'wcsp_example_field',
						'desc'        => __( 'This is an example field.', 'wc-variation-swatches' ),
						'desc_tip'    => __( 'This is an example field.', 'wc-variation-swatches' ),
						'type'        => 'text',
						'default'     => 'I am a default value',
						'placeholder' => 'I am a placeholder',
					],
					[
						'type' => 'sectionend',
						'id'   => 'advanced_options',
					],
				);
				do_action( 'wc_variation_swatches_settings_test' );
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
