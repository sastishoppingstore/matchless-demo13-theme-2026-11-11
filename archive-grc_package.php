<?php
/**
 * Archive for packages (grc_package) - Demo13 design with all rates.
 *
 * @package grc-consultant
 */

get_header();

$grc_packages = grc_packages();
$grc_tiers   = array();
foreach ( $grc_packages as $grc_pkg ) {
	$grc_tiers[ $grc_pkg['tier'] ][] = $grc_pkg;
}
$grc_tier_order = array( 'Diamond', 'Gold', 'Silver', 'Hajj', 'Umrah' );
?>

<section class="hero" id="home" style="min-height:520px;background-image:linear-gradient(90deg,rgba(12,38,31,.84),rgba(12,38,31,.26) 68%,rgba(12,38,31,.12)),url('<?php echo esc_url( grc_setting( 'hero_image' ) ); ?>');background-position:center 48%;background-size:cover">
	<div class="wrap">
		<div class="hero-content reveal">
			<div class="kicker">Packages &amp; rates</div>
			<h1>Every package.<br>Every rate.</h1>
			<p>All Diamond, Gold, Silver, Hajj and customized packages with per-person occupancy pricing for 2026 and 2027 departures from Canada.</p>
			<div class="hero-actions">
				<a class="btn" href="#all-packages">Browse Packages ↗</a>
				<a class="btn btn-light" href="<?php echo esc_url( home_url( '/#months' ) ); ?>">Monthly Rates</a>
			</div>
		</div>
	</div>
	<div class="wrap hero-bottom">
		<span><strong><?php echo esc_html( strtoupper( grc_setting( 'brand_name' ) ) ); ?></strong><br>UMRAH · HAJJ · FLIGHTS · HOLIDAYS</span>
		<span class="scroll-mark">SCROLL TO EXPLORE</span>
	</div>
</section>

<section class="section" id="all-packages">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">Full catalogue</div>
			<h2>Choose your tier.</h2>
			<p>Filter by package tier, then open any package for full inclusions, occupancy rates and booking terms.</p>
		</div>

		<?php foreach ( $grc_tier_order as $grc_tier ) : ?>
			<?php if ( empty( $grc_tiers[ $grc_tier ] ) ) { continue; } ?>
			<h3 style="font:700 30px 'Playfair Display';color:var(--forest);margin:44px 0 20px"><?php echo esc_html( $grc_tier ); ?> Packages</h3>
			<div class="package-grid">
				<?php foreach ( $grc_tiers[ $grc_tier ] as $grc_pkg ) : ?>
					<?php $grc_img = grc_image( $grc_pkg['image'] ); ?>
					<article class="package reveal">
						<div class="package-photo">
							<?php if ( $grc_img ) : ?>
								<img src="<?php echo esc_url( $grc_img ); ?>" alt="<?php echo esc_attr( $grc_pkg['title'] ); ?>" loading="lazy">
							<?php endif; ?>
							<span class="package-label"><?php echo esc_html( grc_tier_label( $grc_pkg['tier'] ) ); ?></span>
						</div>
						<div class="package-body">
							<h3><?php echo esc_html( $grc_pkg['title'] ); ?></h3>
							<?php if ( ! empty( $grc_pkg['description'] ) ) : ?>
								<p><?php echo esc_html( wp_trim_words( $grc_pkg['description'], 22 ) ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $grc_pkg['rates'] ) ) : ?>
								<div class="package-meta">
									<?php foreach ( $grc_pkg['rates'] as $grc_rate ) : ?>
										<span class="chip"><?php echo esc_html( $grc_rate['label'] ); ?> · <?php echo esc_html( grc_money( $grc_rate['price'] ) ); ?></span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<div class="package-foot">
								<span class="from">from <strong><?php echo esc_html( $grc_pkg['price_min'] ? grc_money( $grc_pkg['price_min'] ) : 'Contact us' ); ?></strong></span>
								<a href="<?php echo esc_url( grc_item_url( $grc_pkg['url'] ) ); ?>">DETAILS ↗</a>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<section class="last-call">
	<div class="wrap call-inner">
		<div>
			<h2>Ready to book your package?</h2>
			<p>Global Route Consultant will confirm availability and the exact rate for your dates.</p>
		</div>
		<a class="btn" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', grc_setting( 'phone_primary' ) ) ); ?>">Call <?php echo esc_html( grc_setting( 'phone_primary' ) ); ?> ↗</a>
	</div>
</section>

<?php
get_footer();
