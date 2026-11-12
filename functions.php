<?php
/**
 * Global Route Consultant - WordPress theme (Demo13 design).
 *
 * @package grc-consultant
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GRC_VERSION', '1.0.0' );
define( 'GRC_DIR', get_template_directory() );
define( 'GRC_URI', get_template_directory_uri() );

/* -------------------------------------------------------------------------
 * Theme setup
 * ---------------------------------------------------------------------- */
function grc_setup() {
	load_theme_textdomain( 'grc-consultant', GRC_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 320,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'grc-consultant' ),
		'footer'  => __( 'Footer Menu', 'grc-consultant' ),
	) );

	add_image_size( 'grc-card', 900, 640, true );
	add_image_size( 'grc-wide', 1800, 900, true );
}
add_action( 'after_setup_theme', 'grc_setup' );

/* -------------------------------------------------------------------------
 * Assets
 * ---------------------------------------------------------------------- */
function grc_assets() {
	wp_enqueue_style( 'grc-style', get_stylesheet_uri(), array(), GRC_VERSION );
	wp_enqueue_style( 'grc-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600;1,700&display=swap', array(), null );
	wp_enqueue_script( 'grc-script', GRC_URI . '/assets/js/demo13.js', array(), GRC_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'grc_assets' );

/* -------------------------------------------------------------------------
 * Brand / contact settings (Customizer + defaults)
 * ---------------------------------------------------------------------- */
function grc_defaults() {
	return array(
		'brand_name'    => 'Global Route Consultant',
		'brand_tagline' => 'UMRAH • HAJJ • FLIGHTS • TOURS',
		'phone_primary' => '+1 343-655-6606',
		'phone_alt'     => '+1 289-643-6663',
		'whatsapp'      => '13436556606',
		'email'         => 'contact@globalrouteconsultant.ca',
		'address'       => '2550 Argentia Road, Suite 107, Mississauga, ON L5N 5R1, Canada',
		'hero_title_1'  => 'Global journeys,',
		'hero_title_2'  => 'planned with',
		'hero_title_3'  => 'global care.',
		'hero_text'     => 'Global Route Consultant curates Umrah, Hajj, flight and holiday travel from Canada - with clear 2026 rates, trusted partners and guidance at every step.',
		'hero_image'    => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=2400&q=90',
		'map_link'      => 'https://www.google.com/maps/search/?api=1&query=2550+Argentia+Road+Suite+107+Mississauga+ON',
		/* Editable from Appearance → Customize → Brand & Contact */
		'flight_booking_url' => '/flight-deals/',
		'visa_name'          => 'Visa Consultant',
		'visa_text'          => 'Schengen, US, UK, Canada and Saudi visa guidance from a dedicated consultant - document checks, appointments and application support.',
		'visa_cta'           => 'Book a visa consultation',
		'visa_url'           => '/#contact',
	);
}

/**
 * Resolve a setting that holds a link: site-relative links get home_url().
 */
function grc_link( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return home_url( '/' );
	}
	if ( '/' === $url[0] ) {
		return home_url( $url );
	}
	return $url;
}

function grc_setting( $key ) {
	$defaults = grc_defaults();
	$value    = get_theme_mod( 'grc_' . $key, $defaults[ $key ] );
	return $value;
}

function grc_customize_register( $wp_customize ) {
	$defaults = grc_defaults();
	$wp_customize->add_section( 'grc_brand', array(
		'title'    => __( 'Brand & Contact', 'grc-consultant' ),
		'priority' => 20,
		'description' => __( 'Global Route Consultant branding, phone numbers, email and office address.', 'grc-consultant' ),
	) );
	foreach ( $defaults as $key => $label ) {
		if ( in_array( $key, array( 'hero_image', 'map_link', 'visa_text' ), true ) ) {
			continue;
		}
		$is_url = in_array( $key, array( 'flight_booking_url', 'visa_url' ), true );
		$wp_customize->add_setting( 'grc_' . $key, array(
			'default'           => $label,
			'sanitize_callback' => $is_url ? 'esc_url_raw' : 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'grc_' . $key, array(
			'label'   => ucwords( str_replace( '_', ' ', $key ) ),
			'section' => 'grc_brand',
			'type'    => 'text',
		) );
	}
	$wp_customize->add_setting( 'grc_visa_text', array(
		'default'           => $defaults['visa_text'],
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'grc_visa_text', array(
		'label'       => __( 'Visa consultant card text', 'grc-consultant' ),
		'description' => __( 'Shown on the visa consultant card on the home page.', 'grc-consultant' ),
		'section'     => 'grc_brand',
		'type'        => 'textarea',
	) );
	$wp_customize->add_setting( 'grc_hero_image', array(
		'default'           => $defaults['hero_image'],
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'grc_hero_image', array(
		'label'   => __( 'Hero background image', 'grc-consultant' ),
		'section' => 'grc_brand',
	) ) );
}
add_action( 'customize_register', 'grc_customize_register' );

/* -------------------------------------------------------------------------
 * Package data (baked from the source clone - all packages + rates)
 * ---------------------------------------------------------------------- */
function grc_site_data() {
	static $data = null;
	if ( null === $data ) {
		$file = GRC_DIR . '/inc/data/site.json';
		$data = file_exists( $file ) ? json_decode( file_get_contents( $file ), true ) : array();
	}
	return $data;
}

function grc_packages() {
	$data = grc_site_data();
	return isset( $data['packages'] ) ? $data['packages'] : array();
}

function grc_monthly() {
	$data = grc_site_data();
	return isset( $data['monthly'] ) ? $data['monthly'] : array();
}

function grc_content_pages() {
	$data = grc_site_data();
	return isset( $data['content_pages'] ) ? $data['content_pages'] : array();
}

function grc_money( $value ) {
	if ( null === $value || '' === $value ) {
		return '';
	}
	return 'CAD ' . number_format( (float) $value, 0, '.', ',' );
}

function grc_tier_label( $tier ) {
	return strtoupper( $tier );
}

/**
 * Local packaged image URL (copied from the clone).
 */
function grc_image( $relative ) {
	if ( ! $relative ) {
		return '';
	}
	return GRC_URI . '/assets/img/uploads/' . ltrim( $relative, '/' );
}

/**
 * Permalink for a packaged content item - falls back to the source URL.
 */
function grc_item_url( $url ) {
	$slug = parse_url( $url, PHP_URL_PATH );
	$slug = trim( (string) $slug, '/' );

	// Package pages -> local CPT permalink.
	if ( 0 === strpos( $slug, 'package/' ) ) {
		return home_url( '/package/' . sanitize_title( substr( $slug, 8 ) ) . '/' );
	}

	// Content pages -> local page permalink.
	$map = grc_slug_map();
	if ( $slug && isset( $map[ $slug ] ) ) {
		return home_url( '/' . $map[ $slug ] . '/' );
	}

	return $url;
}

function grc_slug_map() {
	static $map = null;
	if ( null === $map ) {
		$map = array();
		foreach ( grc_content_pages() as $page ) {
			$map[ $page['slug'] ] = $page['slug'];
		}
		foreach ( grc_monthly() as $month ) {
			$map[ $month['slug'] ] = $month['slug'];
		}
	}
	return $map;
}

/* -------------------------------------------------------------------------
 * Custom post type: packages (so every package/rate is editable in WP)
 * ---------------------------------------------------------------------- */
function grc_register_cpt() {
	register_post_type( 'grc_package', array(
		'labels'        => array(
			'name'          => __( 'Packages & Rates', 'grc-consultant' ),
			'singular_name' => __( 'Package', 'grc-consultant' ),
			'add_new_item'  => __( 'Add New Package', 'grc-consultant' ),
			'edit_item'     => __( 'Edit Package', 'grc-consultant' ),
		),
		'public'        => true,
		'show_in_rest'  => true,
		'has_archive'   => 'packages',
		'rewrite'       => array( 'slug' => 'package' ),
		'menu_icon'     => 'dashicons-airplane',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
	) );
}
add_action( 'init', 'grc_register_cpt' );

/* -------------------------------------------------------------------------
 * Import clone content into WordPress on theme activation
 * ---------------------------------------------------------------------- */
function grc_import_content() {
	if ( get_option( 'grc_imported' ) ) {
		return;
	}

	$packages = grc_packages();
	foreach ( $packages as $package ) {
		$existing = get_page_by_path( $package['slug'], OBJECT, 'grc_package' );
		if ( $existing ) {
			wp_update_post( array(
				'ID'           => $existing->ID,
				'post_title'   => $package['title'],
				'post_content' => $package['description'],
			) );
			$post_id = $existing->ID;
		} else {
			$post_id = wp_insert_post( array(
				'post_type'    => 'grc_package',
				'post_title'   => $package['title'],
				'post_name'    => $package['slug'],
				'post_status'  => 'publish',
				'post_content' => $package['description'],
			) );
		}
		if ( ! $post_id ) {
			continue;
		}
		update_post_meta( $post_id, '_grc_tier', $package['tier'] );
		update_post_meta( $post_id, '_grc_price_min', $package['price_min'] );
		update_post_meta( $post_id, '_grc_price_max', $package['price_max'] );
		update_post_meta( $post_id, '_grc_rates', $package['rates'] );
		update_post_meta( $post_id, '_grc_highlights', $package['highlights'] );
		update_post_meta( $post_id, '_grc_image', $package['image'] );
		update_post_meta( $post_id, '_grc_source_url', $package['url'] );
		update_post_meta( $post_id, '_grc_imported', 1 );
	}

	$grc_importable = array_merge( grc_content_pages(), grc_monthly() );
	foreach ( $grc_importable as $page ) {
		$content = grc_blocks_to_html( $page['blocks'] );
		$existing = get_page_by_path( $page['slug'] );
		if ( $existing ) {
			wp_update_post( array(
				'ID'           => $existing->ID,
				'post_title'   => $page['title'],
				'post_content' => $content,
				'post_excerpt' => $page['description'],
			) );
			continue;
		}
		$grc_new_id = wp_insert_post( array(
			'post_type'    => 'page',
			'post_title'   => $page['title'],
			'post_name'    => $page['slug'],
			'post_status'  => 'publish',
			'post_content' => $content,
			'post_excerpt' => $page['description'],
		) );
		if ( $grc_new_id ) {
			update_post_meta( $grc_new_id, '_grc_imported', 1 );
		}
	}

	// Remove stale pages from earlier imports (renamed / dropped slugs).
	$grc_valid = wp_list_pluck( $grc_importable, 'slug' );
	$grc_stale = get_posts( array(
		'post_type'      => 'page',
		'post_status'    => 'any',
		'posts_per_page' => -1,
		'meta_key'       => '_grc_imported',
		'fields'         => 'ids',
	) );
	foreach ( $grc_stale as $grc_stale_id ) {
		if ( ! in_array( get_post_field( 'post_name', $grc_stale_id ), $grc_valid, true ) ) {
			wp_delete_post( $grc_stale_id, true );
		}
	}

	update_option( 'grc_imported', time() );
}
add_action( 'after_switch_theme', 'grc_import_content' );

/**
 * Convert extracted clone blocks into clean HTML.
 */
function grc_blocks_to_html( $blocks ) {
	if ( ! is_array( $blocks ) ) {
		return '';
	}
	$html = '';
	foreach ( $blocks as $block ) {
		switch ( $block['type'] ) {
			case 'heading':
				$level = min( 4, max( 2, (int) $block['level'] + 1 ) );
				$html .= '<h' . $level . '>' . esc_html( $block['text'] ) . '</h' . $level . '>';
				break;
			case 'paragraph':
				$html .= '<p>' . esc_html( $block['text'] ) . '</p>';
				break;
			case 'list':
				$tag   = ! empty( $block['ordered'] ) ? 'ol' : 'ul';
				$html .= '<' . $tag . '>';
				foreach ( $block['items'] as $item ) {
					$html .= '<li>' . esc_html( $item ) . '</li>';
				}
				$html .= '</' . $tag . '>';
				break;
			case 'table':
				if ( empty( $block['rows'] ) ) {
					break;
				}
				$html .= '<table><thead><tr>';
				foreach ( $block['rows'][0] as $cell ) {
					$html .= '<th>' . esc_html( $cell ) . '</th>';
				}
				$html .= '</tr></thead><tbody>';
				foreach ( array_slice( $block['rows'], 1 ) as $row ) {
					$html .= '<tr>';
					foreach ( $row as $cell ) {
						$html .= '<td>' . esc_html( $cell ) . '</td>';
					}
					$html .= '</tr>';
				}
				$html .= '</tbody></table>';
				break;
		}
	}
	return $html;
}

/* -------------------------------------------------------------------------
 * Menus fallback - flat <a> list, exactly like the demo13 reference markup
 * ---------------------------------------------------------------------- */
function grc_menu_fallback() {
	$grc_items = array(
		array( 'Home', home_url( '/' ) ),
		array( 'About', home_url( '/#about' ) ),
		array( 'Services', home_url( '/#services' ) ),
		array( 'Packages & Rates', home_url( '/#pilgrimage' ) ),
		array( '2026 Departures', home_url( '/#months' ) ),
		array( 'All Packages', home_url( '/packages/' ) ),
		array( 'All Pages', home_url( '/#all-pages' ) ),
		array( 'Contact', home_url( '/#contact' ) ),
	);
	foreach ( $grc_items as $grc_item ) {
		printf( '<a href="%s">%s</a>', esc_url( $grc_item[1] ), esc_html( $grc_item[0] ) );
	}
}

/**
 * Flat nav walker: renders menu items as direct <a> children of .links
 * (no <ul>/<li>), matching the demo13 reference markup exactly.
 */
class GRC_Flat_Nav_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {}

	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = implode( ' ', array_filter( $classes ) );
		$output     .= '<a href="' . esc_url( $item->url ) . '" class="' . esc_attr( $class_names ) . '">';
		$output     .= esc_html( $item->title );
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</a>';
	}
}

/* -------------------------------------------------------------------------
 * Contact / enquiry handling (posts enquiry via admin-post)
 * ---------------------------------------------------------------------- */
function grc_handle_enquiry() {
	$name    = isset( $_POST['grc_name'] ) ? sanitize_text_field( wp_unslash( $_POST['grc_name'] ) ) : '';
	$email   = isset( $_POST['grc_email'] ) ? sanitize_email( wp_unslash( $_POST['grc_email'] ) ) : '';
	$phone   = isset( $_POST['grc_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['grc_phone'] ) ) : '';
	$type    = isset( $_POST['grc_type'] ) ? sanitize_text_field( wp_unslash( $_POST['grc_type'] ) ) : '';
	$details = isset( $_POST['grc_details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['grc_details'] ) ) : '';

	if ( ! $name || ! $email ) {
		wp_safe_redirect( add_query_arg( 'grc_sent', '0', wp_get_referer() ? wp_get_referer() : home_url( '/' ) ) );
		exit;
	}

	$subject = sprintf( 'Travel enquiry - %s', $type ? $type : 'General' );
	$body    = "Name: $name\nEmail: $email\nPhone: $phone\nInterest: $type\n\nDetails:\n$details\n";
	$headers = array( 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $name . ' <' . $email . '>' );

	wp_mail( grc_setting( 'email' ), $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'grc_sent', '1', wp_get_referer() ? wp_get_referer() : home_url( '/' ) ) );
	exit;
}
add_action( 'admin_post_nopriv_grc_enquiry', 'grc_handle_enquiry' );
add_action( 'admin_post_grc_enquiry', 'grc_handle_enquiry' );

/* -------------------------------------------------------------------------
 * Misc
 * ---------------------------------------------------------------------- */
function grc_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'grc_excerpt_more' );

function grc_body_classes( $classes ) {
	$classes[] = 'grc-body';
	return $classes;
}
add_filter( 'body_class', 'grc_body_classes' );

/**
 * Allow SVG logo uploads (optional).
 */
function grc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mime_types', 'grc_mime_types' );

/* -------------------------------------------------------------------------
 * SEO
 * ---------------------------------------------------------------------- */
/**
 * Tight, keyword-led front page title (the WP.com default was 140+ chars).
 */
function grc_document_title_parts( $parts ) {
	if ( is_front_page() ) {
		$parts['title'] = 'Umrah & Hajj Packages from Canada';
		$parts['site']  = grc_setting( 'brand_name' );
		unset( $parts['tagline'] );
	}
	return $parts;
}
add_filter( 'document_title_parts', 'grc_document_title_parts' );

/**
 * Keep the social (Open Graph / Twitter) copy in sync with the SEO title and
 * meta description that WP.com/Jetpack generates for the home page.
 */
function grc_open_graph_tags( $tags ) {
	if ( is_front_page() ) {
		$desc = 'Umrah & Hajj packages from Canada with clear 2026 rates, flights, cruises and customized travel. Mississauga-based agency serving Toronto and the GTA.';
		$tags['og:title']        = 'Umrah & Hajj Packages from Canada – Global Route Consultant';
		$tags['og:description']  = $desc;
		$tags['twitter:text:title'] = 'Umrah & Hajj Packages from Canada';
		$tags['twitter:description'] = $desc;
	}
	return $tags;
}
add_filter( 'jetpack_open_graph_tags', 'grc_open_graph_tags' );

/**
 * WP.com/Jetpack disables core XML sitemaps while its own sitemap index is
 * empty on this site, which left /sitemap.xml redirecting to a 404. Re-enable
 * the core sitemap so search engines can discover every page and package.
 */
add_filter( 'wp_sitemaps_enabled', '__return_true', 999 );

/**
 * TravelAgency structured data for the home page (rich results + local SEO).
 */
function grc_schema_jsonld() {
	if ( ! is_front_page() ) {
		return;
	}
	$phone  = preg_replace( '/[^0-9+]/', '', grc_setting( 'phone_primary' ) );
	$schema = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'TravelAgency',
		'@id'         => home_url( '/#travelagency' ),
		'name'        => grc_setting( 'brand_name' ),
		'url'         => home_url( '/' ),
		'logo'        => GRC_URI . '/assets/img/logo.png',
		'image'       => GRC_URI . '/assets/img/logo.png',
		'description' => 'Umrah, Hajj, flight and holiday travel agency based in Mississauga, Ontario, serving Toronto and the GTA with clear 2026 packages and rates.',
		'telephone'   => $phone,
		'email'       => grc_setting( 'email' ),
		'priceRange'  => '$$',
		'currenciesAccepted' => 'CAD',
		'address'     => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => '2550 Argentia Road, Suite 107',
			'addressLocality' => 'Mississauga',
			'addressRegion'   => 'ON',
			'postalCode'      => 'L5N 5R1',
			'addressCountry'  => 'CA',
		),
		'areaServed'  => array( 'Toronto', 'Mississauga', 'Brampton', 'Scarborough', 'Vaughan', 'Hamilton', 'Oakville', 'Canada' ),
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
				'opens'     => '10:00',
				'closes'    => '18:00',
			),
		),
		'hasOfferCatalog' => array(
			'@type' => 'OfferCatalog',
			'name'  => 'Umrah and Hajj packages from Canada',
			'itemListElement' => array(
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Diamond Umrah Packages' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Gold Umrah Packages' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Silver Umrah Packages' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Hajj 2027 Packages' ) ),
			),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'grc_schema_jsonld', 30 );

/**
 * Preconnect to the font CDN so the first paint is quick.
 */
function grc_resource_hints( $hints, $relation ) {
	if ( 'preconnect' === $relation ) {
		$hints[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' => 'anonymous' );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'grc_resource_hints', 10, 2 );

/**
 * 301 old 2025 package URLs to their 2026 equivalents (keeps old links alive).
 */
function grc_legacy_2025_redirect() {
	if ( ! is_404() ) {
		return;
	}
	$path = trim( (string) parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '', PHP_URL_PATH ), '/' ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput
	if ( '' === $path || false === strpos( $path, '2025' ) || false === strpos( $path, 'package' ) ) {
		return;
	}
	$new = str_replace( '2025', '2026', $path );
	if ( 0 !== strpos( $new, 'package/' ) ) {
		$new = 'package/' . $new;
	}
	$target = home_url( '/' . $new . '/' );
	wp_safe_redirect( $target, 301 );
	exit;
}
add_action( 'template_redirect', 'grc_legacy_2025_redirect' );
