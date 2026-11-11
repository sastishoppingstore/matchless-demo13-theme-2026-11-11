<?php
/**
 * Search results.
 *
 * @package grc-consultant
 */

get_header();
?>

<section class="grc-hero">
	<div class="wrap">
		<div class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / Search</div>
		<h1>Search results.</h1>
		<p>Results for “<?php echo esc_html( get_search_query() ); ?>”.</p>
	</div>
</section>

<section class="section">
	<div class="wrap">
		<div class="package-grid">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="package reveal">
						<div class="package-photo">
							<?php if ( has_post_thumbnail() ) : ?>
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'grc-card' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
							<?php endif; ?>
							<span class="package-label"><?php echo esc_html( get_post_type() ); ?></span>
						</div>
						<div class="package-body">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
							<div class="package-foot">
								<span><?php echo esc_html( get_the_date() ); ?></span>
								<a href="<?php the_permalink(); ?>">OPEN ↗</a>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			<?php else : ?>
				<p style="color:var(--muted)">Nothing matched your search. Try “Umrah”, “Hajj”, “Diamond” or “flights”.</p>
			<?php endif; ?>
		</div>

		<?php
		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '← Previous',
			'next_text' => 'Next →',
		) );
		?>
	</div>
</section>

<?php
get_footer();
