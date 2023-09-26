<?php
/**
 * WC Variation Swatches Uninstall
 *
 * Uninstalling WC Variation Swatches deletes user roles, pages, tables, and options.
 *
 * @package     WooCommerceVariationSwatches
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

// remove all the options starting with wc_variation_swatches.
$delete_all_options = get_option( 'wc_variation_swatches_delete_data' );
if ( empty( $delete_all_options ) ) {
	return;
}
// Delete all the options.
global $wpdb;
$wpdb->query( "DELETE FROM $wpdb->options WHERE option_name LIKE 'wc_variation_swatches%';" );

