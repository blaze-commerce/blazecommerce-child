<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>


<?php blz_render_block_template( 'checkout-header' ); ?>


<div class="woocommerce-order blz-thankyou-page" id="blz-custom-wcorder">

	<?php
	if ( $order instanceof WC_Order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed">
				<?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?>
			</p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay">
					<?php esc_html_e( 'Pay', 'woocommerce' ); ?>
				</a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay">
						<?php esc_html_e( 'My account', 'woocommerce' ); ?>
					</a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<?php wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>

			<div class="blaze-custom-thankyou-page-container">
				<div class="blaze-thankyou-page-inner">
					<div class="blz-order-received">
						<div class="blz-order-order-number">
							<?php esc_html_e( 'Your order number is', 'woocommerce' ); ?>
							#<?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<div class="blz-order-email">
							<p>You will receive your confirmation email to
								<strong><?php echo esc_html( $order->get_billing_email() ); ?></strong> within 5 minutes. If you
								do not see the email in your inbox, please check your spam or junk folder
							</p>
							<p>within 5 minutes. If you do not see the email in your inbox, please check your spam or junk
								folder</p>
						</div>
						<div class="blz-order-email-resend">
							<p>Still not working (check spam folder)?</p>
							<a href="#" class="blz-resend-order-email"
								data-order-id="<?php echo esc_attr( $order->get_id() ); ?>"
								data-nonce="<?php echo wp_create_nonce( 'resend_order_email' ); ?>">
								Resend Email
							</a>
							<span class="resend-message" style="display: none;"></span>
						</div>
						<div class="blz-order-email-support">
							<p>If you still do not receive the email, please contact our support team at
								<strong>info@dancewear.co.uk</strong>
							</p>
						</div>
					</div>

					<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
					<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

					<?php
					$order            = wc_get_order( $order_id );
					$customer_note    = $order->get_customer_note(); // Get the correct customer note
					$additional_field = get_post_meta( $order->get_id(), 'additional_', true );

					if ( $customer_note || $additional_field ) : ?>
						<div class="blz-thankyou--additional-info">
							<div>
								<?php if ( $customer_note ) : ?>
									<div><strong>Order Notes:</strong> <?php echo esc_html( $customer_note ); ?></div>
								<?php endif; ?>
								<?php if ( $additional_field ) : ?>
									<div><strong>Backorder Info:</strong> <?php echo esc_html( $additional_field ); ?></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<div class="blz-order-summary-container">
					<h2><?php esc_html_e( 'Order Summary', 'woocommerce' ); ?></h2>

					<?php foreach ( $order->get_items() as $item_id => $item ) :
						$product = $item->get_product();
						if ( $product ) :
							$image_id  = $product->get_image_id();
							$image_url = wp_get_attachment_image_url( $image_id, 'contain' );
							?>
							<div class="blz-order-summary-inner">
								<div class="product-content">
									<div class="product-thumbnail">
										<img class="product-image" src="<?php echo esc_url( $image_url ); ?>" />
									</div>
									<div class="product-name-container">
										<div class="product-name">
											<div class="blz-product-name">
												<?php echo esc_html( $item->get_name() ); ?>
												<?php echo wc_price( $item->get_subtotal() ); ?>
											</div>
											<div class="blz-qty-price">
												<strong class="product-quantity">
													<?php echo sprintf( __( 'Qty: %s&nbsp;', 'woocommerce' ), $item->get_quantity() ); ?>
												</strong>
											</div>
											<div class="blz-variation-container">
												<?php wc_display_item_meta( $item ); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endif; endforeach; ?>

					<div class="blz-order-totals">
						<div class="blz-totals-row">
							<span class="blz-total-label"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>
							<span class="blz-total-value"><?php echo wc_price( $order->get_subtotal() ); ?></span>
						</div>

						<?php if ( $order->get_total_discount() > 0 ) : ?>
							<div class="blz-totals-row">
								<span class="blz-total-label"><?php esc_html_e( 'Discount', 'woocommerce' ); ?></span>
								<span class="blz-total-value">-<?php echo wc_price( $order->get_total_discount() ); ?></span>
							</div>
						<?php endif; ?>

						<?php if ( $order->get_shipping_method() ) : ?>
							<div class="blz-totals-row">
								<span class="blz-total-label"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></span>
								<span class="blz-total-value"><?php echo esc_html( $order->get_shipping_method() ); ?></span>
							</div>
						<?php endif; ?>

						<div class="blz-totals-row blz-grand-total blz-border-above">
							<span class="blz-grand-total-label"><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
							<span class="blz-grand-total-value"><?php echo wc_price( $order->get_total() ); ?></span>
						</div>
					</div>
				</div>
				<?php if ( is_user_logged_in() ) : ?>
					<script>
						console.log("User is already logged in.");
					</script>
				<?php else : ?>
					<script>
						console.log("User is not logged in.");
					</script>
					<div class="blz-thankyou-signup">
						<div class="thankyou-signup-heading">
							<p> Create an account from this order & checkout faster next time </p>
						</div>
						<ul class="blz-thankyou-ul">
							<li>Save Time for future orders</li>
							<li>Order Tracking</li>
							<li>Access to Past Invoices</li>
							<li>Account-Only Rewards</li>
						</ul>
						<div class="thankyou-signup-button">

							<div class="blaze-register-ty-container">
								<div class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?>>

									<?php do_action( 'woocommerce_register_form_start' ); ?>

									<?php
									// Fetch the order ID correctly
									$order_id = get_query_var( 'order-received' ) ?: get_query_var( 'order_id' );

									if ( ! $order_id && isset( $_GET['order-received'] ) ) {
										$order_id = intval( $_GET['order-received'] );
									}

									$billing_email = '';

									if ( $order_id ) {
										$order = wc_get_order( $order_id );
										if ( $order ) {
											$billing_email = $order->get_billing_email();
										}
									}
									?>

									<p
										class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide blaze-custom-email-username-field">
										<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span
												class="blaze-custom-required required">*</span></label>
										<input type="text" placeholder="Username"
											class="woocommerce-Input woocommerce-Input--text input-text blaze-custom-input-container"
											name="username" id="reg_username" autocomplete="username"
											value="<?php echo esc_attr( $billing_email ); ?>" />
									</p>

									<p
										class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide blaze-custom-email-username-field">
										<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span
												class="blaze-custom-required required">*</span></label>
										<input type="email" placeholder="Email"
											class="woocommerce-Input woocommerce-Input--text input-text blaze-custom-input-container"
											name="email" id="reg_email" autocomplete="email"
											value="<?php echo esc_attr( $billing_email ); ?>" />
									</p>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
												class="blaze-custom-required required">*</span></label>
										<input type="password" placeholder="Password"
											class="woocommerce-Input woocommerce-Input--text input-text blaze-custom-input-container"
											name="password" id="reg_password" autocomplete="new-password" />
									</p>

									<?php do_action( 'woocommerce_register_form' ); ?>

									<p class="woocommerce-form-row form-row">
										<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
										<button type="submit"
											class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
											name="register"
											value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'REGISTER', 'woocommerce' ); ?></button>
									</p>

									<?php do_action( 'woocommerce_register_form_end' ); ?>

								</div>
							</div>

							<a class="blaze-custom-signup-thankyou-button">SIGN UP
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<g id="heroicons-mini/arrow-right">
										<path id="Vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
											d="M3.60156 12.0002C3.60156 11.5031 4.00451 11.1002 4.50156 11.1002L17.2671 11.1002L12.2778 6.34894C11.9195 6.00443 11.9083 5.43469 12.2528 5.0764C12.5973 4.7181 13.1671 4.70693 13.5254 5.05144L20.1254 11.3514C20.3018 11.5211 20.4016 11.7554 20.4016 12.0002C20.4016 12.245 20.3018 12.4793 20.1254 12.6489L13.5254 18.9489C13.1671 19.2935 12.5973 19.2823 12.2528 18.924C11.9083 18.5657 11.9195 17.996 12.2778 17.6514L17.2671 12.9002L4.50156 12.9002C4.00451 12.9002 3.60156 12.4973 3.60156 12.0002Z"
											fill="white" />
									</g>
								</svg>
							</a>
							<a id="blaze-custom-cancel-thankyou-button">CANCEL
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<g id="heroicons-mini/arrow-right">
										<path id="Vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
											d="M3.60156 12.0002C3.60156 11.5031 4.00451 11.1002 4.50156 11.1002L17.2671 11.1002L12.2778 6.34894C11.9195 6.00443 11.9083 5.43469 12.2528 5.0764C12.5973 4.7181 13.1671 4.70693 13.5254 5.05144L20.1254 11.3514C20.3018 11.5211 20.4016 11.7554 20.4016 12.0002C20.4016 12.245 20.3018 12.4793 20.1254 12.6489L13.5254 18.9489C13.1671 19.2935 12.5973 19.2823 12.2528 18.924C11.9083 18.5657 11.9195 17.996 12.2778 17.6514L17.2671 12.9002L4.50156 12.9002C4.00451 12.9002 3.60156 12.4973 3.60156 12.0002Z"
											fill="white" />
									</g>
								</svg>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>



		<?php endif; ?>

	<?php else : ?>

		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

	<?php endif; ?>

</div>


<?php blz_render_block_template( 'checkout-f-ooter' ); ?>