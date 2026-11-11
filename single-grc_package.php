<?php
/**
 * Single package page (grc_package CPT) - Demo13 design.
 *
 * @package grc-consultant
 */

get_header();

while ( have_posts() ) :
	the_post();

	$grc_tier  = get_post_meta( get_the_ID(), '_grc_tier', true );
	$grc_pmin  = get_post_meta( get_the_ID(), '_grc_price_min', true );
	$grc_pmax  = get_post_meta( get_the_ID(), '_grc_price_max', true );
	$grc_rates = get_post_meta( get_the_ID(), '_grc_rates', true );
	$grc_high  = get_post_meta( get_the_ID(), '_grc_highlights', true );
	$grc_img   = get_post_meta( get_the_ID(), '_grc_image', true );
	$grc_src   = get_post_meta( get_the_ID(), '_grc_source_url', true );
	$grc_tier  = $grc_tier ? $grc_tier : 'Umrah';

	if ( ! is_array( $grc_rates ) ) { $grc_rates = array(); }
	if ( ! is_array( $grc_high ) ) { $grc_high = array(); }
	?>

	<section class="grc-hero">
		<div class="wrap">
			<div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <?php echo esc_html( $grc_tier ); ?> Packages</div>
			<h1><?php the_title(); ?></h1>
			<?php if ( $grc_pmin ) : ?>
				<p>From <strong><?php echo esc_html( grc_money( $grc_pmin ) ); ?></strong><?php echo $grc_pmax && $grc_pmax != $grc_pmin ? ' — ' . esc_html( grc_money( $grc_pmax ) ) : ''; ?> per person (CAD, taxes included where stated).</p>
			<?php else : ?>
				<p>Contact Global Route Consultant for current pricing and availability on this package.</p>
			<?php endif; ?>
			<div class="hero-actions">
				<a class="btn" href="#enquire">Enquire Now ↗</a>
				<a class="btn btn-light" href="<?php echo esc_url( home_url( '/#packages' ) ); ?>">All Packages</a>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="wrap intro">
			<div class="intro-visual reveal">
				<?php if ( $grc_img ) : ?>
					<img class="big" src="<?php echo esc_url( grc_image( $grc_img ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
				<?php endif; ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<img class="small" src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'medium' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
				<?php endif; ?>
				<div class="round-note">Trusted<br>Canada<br>wide</div>
			</div>
			<div class="intro-copy reveal grc-prose">
				<div class="eyebrow"><?php echo esc_html( grc_tier_label( $grc_tier ) ); ?> package</div>
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $grc_rates ) ) : ?>
		<section class="section" style="background:#f4f0e7">
			<div class="wrap">
				<div class="section-head reveal">
					<div class="eyebrow">Rates</div>
					<h2>Price per person.</h2>
					<p>All rates in CAD. Final prices are confirmed at the time of booking based on availability.</p>
				</div>
				<table class="rate-table reveal">
					<thead><tr><th>Occupancy</th><th>Price per person (CAD)</th></tr></thead>
					<tbody>
						<?php foreach ( $grc_rates as $grc_rate ) : ?>
							<tr>
								<td><strong><?php echo esc_html( $grc_rate['label'] ); ?></strong></td>
								<td class="num"><?php echo esc_html( grc_money( $grc_rate['price'] ) ); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( ! empty( $grc_high ) ) : ?>
		<section class="section steps">
			<div class="wrap">
				<div class="section-head reveal">
					<div class="eyebrow">Package highlights</div>
					<h2>What’s included.</h2>
				</div>
				<div class="steps-grid">
					<?php foreach ( array_slice( $grc_high, 0, 8 ) as $grc_index => $grc_item ) : ?>
						<div class="step reveal">
							<div class="num"><?php echo esc_html( str_pad( (string) ( $grc_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></div>
							<p style="margin-top:10px"><?php echo esc_html( $grc_item ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="section contact" id="enquire">
		<div class="wrap contact-grid">
			<div class="contact-copy reveal">
				<div class="eyebrow">Enquire</div>
				<h2>Book this package.</h2>
				<p>Share your dates, group size and room preferences - we will confirm availability and the exact rate.</p>
				<div class="contact-details">
					<div><b>☎</b><span><?php echo esc_html( grc_setting( 'phone_primary' ) ); ?></span></div>
					<div><b>✉</b><span><?php echo esc_html( grc_setting( 'email' ) ); ?></span></div>
					<div><b>◉</b><span><?php echo esc_html( grc_setting( 'address' ) ); ?></span></div>
				</div>
				<?php if ( $grc_src ) : ?>
					<p style="margin-top:20px;font-size:10px"><a href="<?php echo esc_url( $grc_src ); ?>" target="_blank" rel="noopener">View source listing ↗</a></p>
				<?php endif; ?>
			</div>
			<?php
			get_template_part( 'template-parts/enquiry-form' );
			?>
		</div>
	</section>

	<?php
endwhile;

get_footer();
