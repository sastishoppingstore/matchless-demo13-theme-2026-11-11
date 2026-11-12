<?php
/**
 * Theme footer.
 *
 * @package grc-consultant
 */

$grc_phone = grc_setting( 'phone_primary' );
$grc_brand = grc_setting( 'brand_name' );
$grc_email = grc_setting( 'email' );
$grc_addr  = grc_setting( 'address' );
$grc_wa    = grc_setting( 'whatsapp' );
$grc_tel   = preg_replace( '/[^0-9+]/', '', $grc_phone );
?>
</main>

<footer class="footer">
	<div class="wrap">
		<div class="footer-grid">
			<div>
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="logo-icon" aria-hidden="true">✈</span><span class="screen-reader-text"><?php echo esc_html( $grc_brand ); ?></span>
					<span><?php echo esc_html( strtoupper( $grc_brand ) ); ?><small><?php echo esc_html( grc_setting( 'brand_tagline' ) ); ?></small></span>
				</a>
				<p>Thoughtful travel enquiries for Umrah, Hajj, flights, groups and holidays.</p>
				<div class="socials">
					<a href="https://wa.me/<?php echo esc_attr( $grc_wa ); ?>" aria-label="WhatsApp" target="_blank" rel="noopener">◉</a>
					<a href="mailto:<?php echo esc_attr( $grc_email ); ?>" aria-label="Email">✉</a>
					<a href="<?php echo esc_url( grc_setting( 'map_link' ) ); ?>" aria-label="Office location" target="_blank" rel="noopener">⌖</a>
				</div>
			</div>

			<div>
				<h4>Discover</h4>
				<div class="foot-links">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
					<a href="<?php echo esc_url( home_url( '/#why' ) ); ?>">Why Global Route</a>
					<a href="<?php echo esc_url( home_url( '/#months' ) ); ?>">2026 Departures</a>
					<a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">FAQs</a>
				</div>
			</div>

			<div>
				<h4>Travel Services</h4>
				<div class="foot-links">
					<a href="<?php echo esc_url( home_url( '/packages/' ) ); ?>">All Packages &amp; Rates</a>
					<a href="<?php echo esc_url( home_url( '/hajj-2027-packages/' ) ); ?>">Hajj 2027</a>
					<a href="<?php echo esc_url( grc_link( grc_setting( 'flight_booking_url' ) ) ); ?>">Flight Deals</a>
					<a href="<?php echo esc_url( home_url( '/royal-caribbean/' ) ); ?>">Cruises</a>
					<a href="<?php echo esc_url( home_url( '/customized/' ) ); ?>">Customized Umrah</a>
				</div>
			</div>

			<div>
				<h4>Contact</h4>
				<div class="foot-links">
					<a href="tel:<?php echo esc_attr( $grc_tel ); ?>"><?php echo esc_html( $grc_phone ); ?></a>
					<a href="mailto:<?php echo esc_attr( $grc_email ); ?>"><?php echo esc_html( $grc_email ); ?></a>
					<a href="https://wa.me/<?php echo esc_attr( $grc_wa ); ?>" target="_blank" rel="noopener">WhatsApp Us</a>
					<a href="<?php echo esc_url( grc_setting( 'map_link' ) ); ?>" target="_blank" rel="noopener">Get Directions ↗</a>
				</div>
			</div>
		</div>

		<div class="copyright">
			<span>© <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( $grc_brand ); ?>. All rights reserved.</span>
			<span>TICO registered · IATA certified · Saudi Tourism Premier Partner</span>
		</div>
	</div>
</footer>

<button class="to-top" id="toTop" aria-label="Back to top">↑</button>

<?php wp_footer(); ?>
</body>
</html>
