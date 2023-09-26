<?php
/**
 * Admin View: List Thing
 *
 * @package WooCommerceVariationSwatches
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;
$list_table = wcsp_get_list_table( 'things' );
$action     = $list_table->current_action();
$list_table->process_bulk_action( $action );
$list_table->prepare_items();
?>

<div class="pev-admin-page__header">
	<div>
		<h1 class="wp-heading-inline">
			<?php esc_html_e( 'Things', 'wc-variation-swatches' ); ?>
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-variation-swatches&new=1' ) ); ?>" class="page-title-action">
				<?php esc_html_e( 'Add New', 'wc-variation-swatches' ); ?>
			</a>
		</h1>
	</div>
</div>
<form id="things-list-table" method="get">
	<?php
	$status = isset( $_GET['status'] ) ? sanitize_text_field( wp_unslash( $_GET['status'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$list_table->views();
	$list_table->search_box( __( 'Search', 'wc-variation-swatches' ), 'key' );
	$list_table->display();
	?>
	<input type="hidden" name="status" value="<?php echo esc_attr( $status ); ?>">
	<input type="hidden" name="page" value="wc-variation-swatches">
</form>


