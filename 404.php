<?php
/**
 * 404 page.
 *
 * @package grc-consultant
 */

get_header();
?>

<section class="hero" id="home" style="min-height:520px;background-image:linear-gradient(90deg,rgba(12,38,31,.86),rgba(12,38,31,.3)),url('<?php echo esc_url( grc_setting( 'hero_image' ) ); ?>');background-position:center 48%;background-size:cover">
	<div class="wrap">
		<div class="hero-content reveal">
			<div class="kicker">404</div>
			<h1>This route<br>isn't mapped.</h1>
			<p>The page you were looking for has moved or never existed. Let us point you to the right package.</p>
			<div class="hero-actions">
				<a class="btn" href="<?php echo esc_url( home_url( '/#packages' ) ); ?>">Browse Packages ↗</a>
				<a class="btn btn-light" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back Home</a>
			</div>
		</div>
	</div>
</section>

<section class="section">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">Popular routes</div>
			<h2>Where would you like to go?</h2>
			<p>Start from a popular departure, or tell us your dates and we'll build the trip.</p>
		</div>
		<div class="service-grid">
			<a class="service reveal" href="<?php echo esc_url( home_url( '/#packages' ) ); ?>"><div class="symbol">☾</div><h3>Umrah Packages</h3><p>Diamond, Gold, Silver and customized packages with full rates.</p></a>
			<a class="service reveal" href="<?php echo esc_url( home_url( '/hajj-2027-packages/' ) ); ?>"><div class="symbol">✧</div><h3>Hajj 2027</h3><p>Executive, Comfort Premium, Superior and Comfort Plus.</p></a>
			<a class="service reveal" href="<?php echo esc_url( home_url( '/#months' ) ); ?>"><div class="symbol">⌖</div><h3>2026 Departures</h3><p>Monthly Umrah pricing tables for every departure month.</p></a>
			<a class="service reveal" href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><div class="symbol">◎</div><h3>Talk to Us</h3><p>Call, email or WhatsApp a dedicated travel consultant.</p></a>
		</div>
	</div>
</section>

<?php
get_footer();
