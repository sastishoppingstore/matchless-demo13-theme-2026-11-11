<?php
/**
 * Theme header / navigation.
 *
 * Structure mirrors the demo13 reference exactly:
 *   announcement bar  ->  header (.logo icon + wordmark)  ->  nav  ->  call btn + burger
 *
 * @package grc-consultant
 */

$grc_phone  = grc_setting( 'phone_primary' );
$grc_brand  = grc_setting( 'brand_name' );
$grc_tag    = grc_setting( 'brand_tagline' );
$grc_email  = grc_setting( 'email' );
$grc_addr   = grc_setting( 'address' );
$grc_wa     = grc_setting( 'whatsapp' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#f4f0e7">
<link rel="icon" href="<?php echo esc_url( GRC_URI . '/assets/img/favicon.png' ); ?>" type="image/png" sizes="512x512">
<?php wp_head(); ?>
<style id="grc-fix">html,body{width:100%;max-width:100%;overflow-x:hidden;-webkit-text-size-adjust:100%}*,*::before,*::after{box-sizing:border-box}img,video,iframe,svg{max-width:100%;height:auto}body{margin:0}.container,.wrap,.w,.wrapper{max-width:100%}</style>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<div class="announcement">
	<div class="wrap">
		<span>✦ GLOBAL ROUTE CONSULTANT — CANADA</span>
		<span>CALL / WHATSAPP: <?php echo esc_html( $grc_phone ); ?></span>
	</div>
</div>

<header class="header">
	<div class="wrap nav">
		<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="logo-icon" aria-hidden="true">✈</span><span class="screen-reader-text"><?php echo esc_html( $grc_brand ); ?></span>
			<span><?php echo esc_html( strtoupper( $grc_brand ) ); ?><small><?php echo esc_html( $grc_tag ); ?></small></span>
		</a>

		<nav class="links" id="links" aria-label="Primary">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'container'       => false,
					'container_class' => '',
					'menu_class'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 2,
					'walker'          => new GRC_Flat_Nav_Walker(),
					'fallback_cb'     => false,
				) );
			} else {
				grc_menu_fallback();
			}
			?>
		</nav>

		<a class="nav-btn" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $grc_phone ) ); ?>">Call Us ↗</a>
		<button class="menu" id="menu" aria-label="Open menu" aria-expanded="false">☰</button>
	</div>
</header>

<main>
