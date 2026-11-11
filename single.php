<?php
/**
 * Single blog post.
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
			<p><?php echo esc_html( get_the_date() ); ?></p>
		</div>
	</section>

	<section class="section">
		<div class="wrap" style="max-width:900px">
			<div class="grc-prose reveal">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
