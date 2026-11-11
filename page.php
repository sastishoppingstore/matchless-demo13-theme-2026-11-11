<?php
/**
 * Standard page template (content pages imported from the clone).
 *
 * @package grc-consultant
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<section class="grc-hero">
		<div class="wrap">
			<div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <?php the_title(); ?></div>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="section">
		<div class="wrap" style="max-width:900px">
			<div class="grc-prose reveal">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="admin-note">',
					'after'  => '</div>',
				) );
				?>
			</div>
		</div>
	</section>

	<section class="section contact">
		<div class="wrap contact-grid">
			<div class="contact-copy reveal">
				<div class="eyebrow">Need help?</div>
				<h2>Talk to Global Route Consultant.</h2>
				<p>Our team confirms availability, inclusions and terms for every package before you book.</p>
				<div class="contact-details">
					<div><b>☎</b><span><?php echo esc_html( grc_setting( 'phone_primary' ) ); ?></span></div>
					<div><b>✉</b><span><?php echo esc_html( grc_setting( 'email' ) ); ?></span></div>
					<div><b>◉</b><span><?php echo esc_html( grc_setting( 'address' ) ); ?></span></div>
				</div>
			</div>
			<?php get_template_part( 'template-parts/enquiry-form' ); ?>
		</div>
	</section>

	<?php
endwhile;

get_footer();
