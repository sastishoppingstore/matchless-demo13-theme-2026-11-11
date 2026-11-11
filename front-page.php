<?php
/**
 * Front page - 100% Demo13 section structure, filled with Global Route
 * Consultant content (all 2026 packages, rates and pages).
 *
 * Section order & ids match /demo13 exactly:
 *   home (hero) -> about -> services -> pilgrimage -> tours -> why
 *   -> group (steps) -> reviews -> faq -> contact -> last-call
 *
 * @package grc-consultant
 */

get_header();

$grc_brand   = grc_setting( 'brand_name' );
$grc_phone   = grc_setting( 'phone_primary' );
$grc_tel     = preg_replace( '/[^0-9+]/', '', $grc_phone );
$grc_email   = grc_setting( 'email' );
$grc_addr    = grc_setting( 'address' );
$grc_wa      = grc_setting( 'whatsapp' );
$grc_hero_bg = grc_setting( 'hero_image' );

$grc_packages = grc_packages();
$grc_monthly  = grc_monthly();

/* Group packages by tier. */
$grc_tiers = array();
foreach ( $grc_packages as $grc_pkg ) {
	$grc_tiers[ $grc_pkg['tier'] ][] = $grc_pkg;
}
$grc_tier_order = array( 'Diamond', 'Gold', 'Silver', 'Hajj', 'Umrah' );
?>

<!-- ============================ HERO ============================ -->
<section class="hero" id="home" style="background-image:linear-gradient(90deg,rgba(12,38,31,.83),rgba(12,38,31,.25) 68%,rgba(12,38,31,.1)),url('<?php echo esc_url( $grc_hero_bg ); ?>');background-position:center 48%;background-size:cover">
	<div class="wrap">
		<div class="hero-content reveal">
			<div class="kicker">Canada based · Global reach</div>
			<h1><?php echo esc_html( grc_setting( 'hero_title_1' ) ); ?><br><?php echo esc_html( grc_setting( 'hero_title_2' ) ); ?><br><i><?php echo esc_html( grc_setting( 'hero_title_3' ) ); ?></i></h1>
			<p><?php echo esc_html( grc_setting( 'hero_text' ) ); ?></p>
			<div class="hero-actions">
				<a class="btn" href="#pilgrimage">View Packages &amp; Rates ↗</a>
				<a class="btn btn-light" href="#tours">Explore Destinations</a>
			</div>
		</div>
	</div>
	<div class="wrap hero-bottom">
		<span><strong><?php echo esc_html( strtoupper( $grc_brand ) ); ?></strong><br>UMRAH · HAJJ · FLIGHTS · HOLIDAYS</span>
		<span class="scroll-mark">SCROLL TO EXPLORE</span>
	</div>
</section>

<!-- ======================== BOOKING WIDGET ======================= -->
<div class="wrap booking-shell" id="booking">
	<div class="booking reveal">
		<div class="booking-top">
			<h3>Where would you like to go?</h3>
			<span>LET'S START PLANNING</span>
		</div>
		<div class="tabs" role="tablist" aria-label="Travel type">
			<button class="tab active" type="button" data-kind="Umrah Package">☾ Umrah</button>
			<button class="tab" type="button" data-kind="Hajj Package">✧ Hajj</button>
			<button class="tab" type="button" data-kind="Flight Deal">✈ Flights</button>
			<button class="tab" type="button" data-kind="Group Tickets">♧ Group tickets</button>
			<button class="tab" type="button" data-kind="Tour Package">⌖ Holidays &amp; Cruises</button>
		</div>
		<form id="quickForm" class="grc-quick-form">
			<div class="book-grid">
				<div class="field">
					<label for="grc-destination">DESTINATION / PACKAGE</label>
					<input id="grc-destination" name="destination" placeholder="e.g. Diamond Umrah, Hajj 2027" required>
				</div>
				<div class="field">
					<label for="grc-date">TRAVEL DATE</label>
					<input id="grc-date" type="date" name="date" required>
				</div>
				<div class="field">
					<label for="grc-travellers">TRAVELLERS</label>
					<select id="grc-travellers" name="travellers">
						<option>1 Traveller</option>
						<option>2 Travellers</option>
						<option>3–5 Travellers</option>
						<option>6–10 Travellers</option>
						<option>10+ Travellers</option>
					</select>
				</div>
				<div class="field">
					<label for="grc-name">YOUR NAME</label>
					<input id="grc-name" name="name" placeholder="Full name" required>
				</div>
				<button class="btn book-submit" type="submit">Send Enquiry ↗</button>
			</div>
			<input type="hidden" name="type" id="kind" value="Umrah Package">
		</form>
	</div>
</div>

<!-- ============================ ABOUT ============================ -->
<section class="section" id="about">
	<div class="wrap intro">
		<div class="intro-visual reveal">
			<img class="big" src="<?php echo esc_url( grc_image( '2026/04/Umrah-Package-2026.webp' ) ); ?>" alt="Khana Kaaba, Makkah - the focal point of every Umrah journey" loading="lazy">
			<img class="small" src="<?php echo esc_url( grc_image( '2025/11/Untitled-design-4-scaled.png' ) ); ?>" alt="Masjid an-Nabawi, Madinah" loading="lazy">
			<div class="round-note">Plan with<br>a global<br>perspective</div>
		</div>
		<div class="intro-copy reveal">
			<div class="eyebrow">A little about us</div>
			<h2>Your journey to the holy cities, planned with care.</h2>
			<p>Global Route Consultant brings your travel enquiries together in one welcoming place. Whether you are planning Umrah, Hajj, flights, a cruise or a family holiday, start by telling us what matters to you.</p>
			<p>We are a TICO-registered, IATA-certified and ACTO-registered agency based in Mississauga, Ontario - proudly serving pilgrims from across the Greater Toronto Area and all of Canada.</p>
			<div class="ticks">
				<span>Umrah &amp; Hajj travel</span>
				<span>Diamond, Gold &amp; Silver</span>
				<span>Group &amp; family tickets</span>
				<span>Flights, cruises &amp; holidays</span>
			</div>
			<a class="btn" href="#contact">Get to Know Us ↗</a>
		</div>
	</div>
</section>

<!-- =========================== SERVICES ========================== -->
<section class="section" id="services" style="background:#f4f0e7">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">What we can help with</div>
			<h2>One travel partner.<br>Many ways to explore.</h2>
			<p>Choose the service you need and send us your travel details. We’ll help you take the next step.</p>
		</div>
		<div class="service-grid">
			<article class="service reveal"><div class="symbol">☾</div><h3>Umrah Packages</h3><p>Diamond, Gold, Silver and customized Umrah packages from Toronto (YYZ).</p><a href="#pilgrimage">VIEW UMRAH ↗</a></article>
			<article class="service reveal"><div class="symbol">✧</div><h3>Hajj 2027</h3><p>Executive, Comfort Premium, Comfort Superior and Comfort Plus Hajj.</p><a href="<?php echo esc_url( home_url( '/hajj-2027-packages/' ) ); ?>">HAJJ ENQUIRY ↗</a></article>
			<article class="service reveal"><div class="symbol">♧</div><h3>Group Tickets</h3><p>Flight enquiries for families, companies, schools and larger groups.</p><a href="<?php echo esc_url( home_url( '/group-umrah-packages/' ) ); ?>">GROUP ENQUIRY ↗</a></article>
			<article class="service reveal"><div class="symbol">✈</div><h3>Flight Deals</h3><p>Domestic and international flight enquiries and route planning.</p><a href="<?php echo esc_url( home_url( '/flight-deals/' ) ); ?>">ASK ABOUT FLIGHTS ↗</a></article>
			<article class="service reveal"><div class="symbol">▣</div><h3>Customized Umrah</h3><p>Build your own Umrah - nights, hotel tier, occupancy and flights.</p><a href="<?php echo esc_url( home_url( '/customized/' ) ); ?>">CUSTOMIZE ↗</a></article>
			<article class="service reveal"><div class="symbol">⌖</div><h3>Vacations &amp; Cruises</h3><p>Disney Cruise Line, Royal Caribbean and leisure family getaways.</p><a href="<?php echo esc_url( home_url( '/royal-caribbean/' ) ); ?>">VIEW TOURS ↗</a></article>
			<article class="service reveal"><div class="symbol">◎</div><h3>Family Travel</h3><p>Seats together, connecting rooms, child visa processing - every family detail handled.</p><a href="<?php echo esc_url( home_url( '/family-umrah-packages/' ) ); ?>">PLAN TOGETHER ↗</a></article>
			<article class="service reveal"><div class="symbol">♢</div><h3>Travel Guidance</h3><p>Visa help, Ziyarat planning, travel documents and terms explained before you book.</p><a href="<?php echo esc_url( home_url( '/umrah-travel-inquiry/' ) ); ?>">TALK TO US ↗</a></article>
		</div>
	</div>
</section>

<!-- ====================== PACKAGES & RATES ====================== -->
<section class="section scenic-band" id="pilgrimage">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">Packages &amp; rates</div>
			<h2>Real packages.<br>Real 2026 rates.</h2>
			<p>Every Diamond, Gold, Silver and Hajj package with per-person occupancy rates - quoted in CAD, taxes included where stated.</p>
		</div>

		<div class="filter-row reveal" id="grc-tier-filter" role="group" aria-label="Filter packages by tier">
			<button class="active" type="button" data-tier="all">All Packages</button>
			<?php foreach ( $grc_tier_order as $grc_tier ) : ?>
				<?php if ( empty( $grc_tiers[ $grc_tier ] ) ) { continue; } ?>
				<button type="button" data-tier="<?php echo esc_attr( $grc_tier ); ?>"><?php echo esc_html( $grc_tier ); ?> (<?php echo esc_html( count( $grc_tiers[ $grc_tier ] ) ); ?>)</button>
			<?php endforeach; ?>
		</div>

		<div class="package-grid" id="grc-package-grid">
			<?php foreach ( $grc_packages as $grc_pkg ) : ?>
				<?php
				$grc_img   = grc_image( $grc_pkg['image'] );
				if ( ! $grc_img ) {
					$grc_img = grc_image( '2026/04/Umrah-Package-2026.webp' );
				}
				$grc_price = $grc_pkg['price_min'] ? grc_money( $grc_pkg['price_min'] ) : 'Contact for rates';
				?>
				<article class="package reveal" data-tier="<?php echo esc_attr( $grc_pkg['tier'] ); ?>">
					<div class="package-photo">
						<?php if ( $grc_img ) : ?>
							<img src="<?php echo esc_url( $grc_img ); ?>" alt="<?php echo esc_attr( $grc_pkg['title'] ); ?>" loading="lazy">
						<?php endif; ?>
						<span class="package-label"><?php echo esc_html( grc_tier_label( $grc_pkg['tier'] ) ); ?></span>
					</div>
					<div class="package-body">
						<h3><?php echo esc_html( $grc_pkg['title'] ); ?></h3>
						<?php if ( ! empty( $grc_pkg['description'] ) ) : ?>
							<p><?php echo esc_html( wp_trim_words( $grc_pkg['description'], 24 ) ); ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $grc_pkg['rates'] ) ) : ?>
							<div class="package-meta">
								<?php foreach ( $grc_pkg['rates'] as $grc_rate ) : ?>
									<span class="chip"><?php echo esc_html( $grc_rate['label'] ); ?> · <?php echo esc_html( grc_money( $grc_rate['price'] ) ); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="package-foot">
							<span class="from">from <strong><?php echo esc_html( $grc_price ); ?></strong></span>
							<a href="<?php echo esc_url( grc_item_url( $grc_pkg['url'] ) ); ?>">DETAILS ↗</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<!-- 2026 / 2027 monthly departures with full pricing tables -->
		<div class="section-head reveal" id="months" style="margin-top:70px">
			<div class="eyebrow">2026 &amp; 2027 departures</div>
			<h2>Umrah packages by month.</h2>
			<p>Every month has its own departure window and pricing - here are the published rates from our 2026 group programme.</p>
		</div>
		<div class="package-grid">
			<?php foreach ( $grc_monthly as $grc_month ) : ?>
				<article class="package reveal">
					<div class="package-photo">
						<?php
						$grc_mimg = ! empty( $grc_month['image'] )
							? grc_image( $grc_month['image'] )
							: grc_image( '2026/04/Umrah-Package-2026.webp' );
						?>
						<img src="<?php echo esc_url( $grc_mimg ); ?>" alt="<?php echo esc_attr( $grc_month['title'] ); ?>" loading="lazy">
						<span class="package-label">GROUP DEPARTURE</span>
					</div>
					<div class="package-body">
						<h3><?php echo esc_html( $grc_month['title'] ); ?></h3>
						<?php if ( ! empty( $grc_month['table'] ) ) : ?>
							<table class="rate-table">
								<thead>
									<tr>
										<?php foreach ( $grc_month['table'][0] as $grc_cell ) : ?>
											<th><?php echo esc_html( $grc_cell ); ?></th>
										<?php endforeach; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ( array_slice( $grc_month['table'], 1 ) as $grc_row ) : ?>
										<tr>
											<?php foreach ( $grc_row as $grc_i => $grc_cell ) : ?>
												<?php if ( 0 === $grc_i ) : ?>
													<td><strong><?php echo esc_html( $grc_cell ); ?></strong></td>
												<?php else : ?>
													<td class="num"><?php echo esc_html( $grc_cell ); ?></td>
												<?php endif; ?>
											<?php endforeach; ?>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						<?php endif; ?>
						<div class="package-foot">
							<span class="from">Pricing table</span>
							<a href="<?php echo esc_url( grc_item_url( $grc_month['url'] ) ); ?>">VIEW MONTH ↗</a>
						</div>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ========================== DESTINATIONS ======================= -->
<section class="section" id="tours">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">Where we travel</div>
			<h2>Pick a place. We’ll help with the journey.</h2>
			<p>From the Haramain to cruise decks - a global portfolio handled by one Canadian team.</p>
		</div>
		<div class="destinations reveal">
			<div class="place"><img src="<?php echo esc_url( grc_image( '2026/04/Umrah-Package-2026.webp' ) ); ?>" alt="Makkah and Madinah" width="1200" height="800"><div class="place-info"><span>SAUDI ARABIA</span><h3>Makkah &amp; Madinah</h3></div></div>
			<div class="place"><img src="<?php echo esc_url( grc_image( '2025/11/Untitled-design-4-scaled.png' ) ); ?>" alt="Masjid an-Nabawi, Madinah" width="900" height="900"><div class="place-info"><span>MADINAH</span><h3>Masjid an-Nabawi</h3></div></div>
			<div class="place"><img src="<?php echo esc_url( grc_image( '2025/11/06-1-1.jpg' ) ); ?>" alt="Masjid al-Haram, Makkah" width="900" height="900"><div class="place-info"><span>MAKKAH</span><h3>Masjid al-Haram</h3></div></div>
			<div class="place"><img src="<?php echo esc_url( grc_image( '2025/11/01-2-1-1.jpg' ) ); ?>" alt="Hajj and Umrah pilgrims" width="900" height="900"><div class="place-info"><span>HAJJ &amp; UMRAH</span><h3>Imam-led groups</h3></div></div>
			<div class="place"><img src="<?php echo esc_url( grc_image( '2025/11/Untitled-design-scaled.png' ) ); ?>" alt="Makkah clock tower" width="900" height="900"><div class="place-info"><span>MAKKAH</span><h3>Clock Tower</h3></div></div>
		</div>
	</div>
</section>

<!-- ============================== WHY ============================= -->
<section class="section" id="why" style="background:#f4f0e7">
	<div class="wrap why-grid">
		<div class="why-photo reveal">
			<img src="<?php echo esc_url( grc_image( '2025/11/06-1-1.jpg' ) ); ?>" alt="Pilgrims at the Kaaba during Umrah" loading="lazy">
			<div class="why-stamp">Go with<br>confidence.</div>
		</div>
		<div class="intro-copy reveal">
			<div class="eyebrow">Why Global Route Consultant</div>
			<h2>Good journeys begin with good people.</h2>
			<p>We want every traveller to feel heard, informed and confident while exploring their options. Here’s what guides the way we work.</p>
			<div class="reason-list">
				<div class="reason"><b>136+ Google reviews</b><p>Rated 4.6★ by travellers across the GTA.</p></div>
				<div class="reason"><b>TICO registered</b><p>Protected under Ontario travel regulations.</p></div>
				<div class="reason"><b>Imam-led groups</b><p>Guided by an experienced Imam on every journey.</p></div>
				<div class="reason"><b>Saudi Tourism Premier Partner</b><p>Direct hotel and ground partners in Saudi Arabia.</p></div>
				<div class="reason"><b>Local Mississauga office</b><p>Visit us in person at 2550 Argentia Road, Suite 107.</p></div>
				<div class="reason"><b>One easy contact</b><p>Call, email or WhatsApp a dedicated travel consultant.</p></div>
			</div>
		</div>
	</div>
</section>

<!-- ============================= STEPS ============================ -->
<section class="section steps" id="group">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">How booking works</div>
			<h2>From “let’s go” to “we’re going”.</h2>
			<p>Planning Umrah, Hajj or a group trip? Here’s how to begin with Global Route Consultant.</p>
		</div>
		<div class="steps-grid">
			<div class="step reveal"><div class="num">01</div><h3>Tell us the route</h3><p>Share your departure city, destination and preferred travel dates.</p></div>
			<div class="step reveal"><div class="num">02</div><h3>Count your group</h3><p>Tell us the number of passengers and any family or group needs.</p></div>
			<div class="step reveal"><div class="num">03</div><h3>Review the details</h3><p>Discuss schedules, hotel tiers, occupancy rates and applicable terms.</p></div>
			<div class="step reveal"><div class="num">04</div><h3>Confirm your plan</h3><p>Proceed once all booking details and conditions are confirmed.</p></div>
		</div>
	</div>
</section>

<!-- ============================ REVIEWS =========================== -->
<section class="section" id="reviews">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">Words from travellers</div>
			<h2>Trusted by Canadian families.</h2>
			<p>We value the trust travellers place in us and welcome honest feedback about their experience.</p>
		</div>
		<div class="review-grid">
			<article class="review reveal"><div class="stars">★★★★★</div><p>“Our family Umrah was handled beautifully - seats together, connecting rooms, and an Imam who made the whole journey easy.”</p><div class="reviewer"><img src="<?php echo esc_url( grc_image( '2025/11/Review-1-600x600.jpeg' ) ); ?>" alt="Traveller portrait" width="39" height="39"><div><b>Family traveller</b><small>Mississauga, ON</small></div></div></article>
			<article class="review reveal"><div class="stars">★★★★★</div><p>“Clear package rates, no hidden surprises. They explained the occupancy pricing so we could choose with confidence.”</p><div class="reviewer"><img src="<?php echo esc_url( grc_image( '2025/11/Review-2-600x600.jpeg' ) ); ?>" alt="Traveller portrait" width="39" height="39"><div><b>Group organiser</b><small>Toronto, ON</small></div></div></article>
			<article class="review reveal"><div class="stars">★★★★★</div><p>“A welcoming first conversation about our December Umrah. The 2026 rates they shared matched the confirmed booking exactly.”</p><div class="reviewer"><img src="<?php echo esc_url( grc_image( '2025/11/Review-13-600x600.jpeg' ) ); ?>" alt="Traveller portrait" width="39" height="39"><div><b>Pilgrimage traveller</b><small>Brampton, ON</small></div></div></article>
		</div>
		<p style="font-size:9px;color:#8a958e;margin-top:14px">136+ Google reviews at 4.6★ - shown here as representative traveller feedback. Replace with permission-based customer testimonials before publishing.</p>
	</div>
</section>

<!-- ============================== FAQ ============================= -->
<section class="section" id="faq" style="background:#f4f0e7">
	<div class="wrap faq-layout">
		<div class="section-head reveal">
			<div class="eyebrow">A few helpful answers</div>
			<h2>Questions before you go?</h2>
			<p>Answers to common Umrah, Hajj and travel questions. For exact availability and booking terms, contact Global Route Consultant.</p>
			<a class="btn" href="#contact">Ask Us Directly ↗</a>
		</div>
		<div class="reveal">
			<div class="faq-item open"><button class="faq-q" type="button">How do I see package rates? <span>＋</span></button><div class="faq-a">Browse the Packages &amp; Rates section above - every Diamond, Gold, Silver and Hajj package is listed with per-person occupancy rates (Quad, Triple, Double). Monthly 2026 pricing tables are listed further down the same section.</div></div>
			<div class="faq-item"><button class="faq-q" type="button">Do I need a visa to perform Umrah from Canada? <span>＋</span></button><div class="faq-a">Yes. Canadian citizens and permanent residents require an Umrah visa. Global Route Consultant handles the complete visa application process on your behalf - no trips to the Saudi consulate required.</div></div>
			<div class="faq-item"><button class="faq-q" type="button">What is the difference between Diamond, Gold and Silver? <span>＋</span></button><div class="faq-a">The tiers differ mainly in hotel category and distance from the Haram. Diamond offers the closest, highest-category hotels, Gold balances comfort and value, and Silver is the most economical option.</div></div>
			<div class="faq-item"><button class="faq-q" type="button">Do you offer Hajj 2027 packages? <span>＋</span></button><div class="faq-a">Yes - Executive (11 Days), Comfort Premium (13 Days), Comfort Superior (14 Days) and Comfort Plus (17 Days). Contact us for current dates, inclusions and guidance.</div></div>
			<div class="faq-item"><button class="faq-q" type="button">Is the website booking confirmed online? <span>＋</span></button><div class="faq-a">No. This website is an enquiry interface. Fares, availability, booking conditions and final confirmations are handled directly by Global Route Consultant.</div></div>
		</div>
	</div>
</section>

<!-- ============================ CONTACT =========================== -->
<section class="section contact" id="contact">
	<div class="wrap contact-grid">
		<div class="contact-copy reveal">
			<div class="eyebrow">Your next chapter starts here</div>
			<h2>Let’s make a little world of memories.</h2>
			<p>Have a destination in mind? Send your travel details or contact us directly. We’d love to hear where you’re planning to go.</p>
			<div class="contact-details">
				<div><b>☎</b><span><?php echo esc_html( $grc_phone ); ?></span></div>
				<div><b>✉</b><span><?php echo esc_html( $grc_email ); ?></span></div>
				<div><b>◉</b><span><?php echo esc_html( $grc_addr ); ?></span></div>
			</div>
			<a class="btn" style="margin-top:25px" href="https://wa.me/<?php echo esc_attr( $grc_wa ); ?>?text=Assalam-o-Alaikum%2C%20I%20want%20to%20enquire%20about%20travel." target="_blank" rel="noopener">Chat on WhatsApp ↗</a>
		</div>

		<?php if ( isset( $_GET['grc_sent'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification ?>
			<div class="admin-note" style="grid-column:1/-1">
				<?php echo '1' === $_GET['grc_sent'] ? 'Thank you - your enquiry has been sent. We will reply shortly.' : 'Please fill in your name and email so we can reply.'; // phpcs:ignore WordPress.Security.NonceVerification ?>
			</div>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/enquiry-form' ); ?>
	</div>
</section>

<!-- =========================== LAST CALL ========================== -->
<section class="last-call">
	<div class="wrap call-inner">
		<div>
			<h2>Somewhere beautiful is calling.</h2>
			<p>Let Global Route Consultant help you take the first step.</p>
		</div>
		<a class="btn" href="tel:<?php echo esc_attr( $grc_tel ); ?>">Call <?php echo esc_html( $grc_phone ); ?> ↗</a>
	</div>
</section>

<!-- ===================== ALL PAGES DIRECTORY =====================
     GRC-only content directory (every screened page in one place).
     Kept at the bottom, above the footer, so every demo13 section
     above it stays a pixel-for-pixel match. -->
<section class="section" id="all-pages" style="background:#f4f0e7">
	<div class="wrap">
		<div class="section-head reveal">
			<div class="eyebrow">Explore everything</div>
			<h2>Every page, one place.</h2>
			<p>All Global Route Consultant content - destinations, packages, terms, guides and city pages.</p>
		</div>
		<div class="service-grid">
			<?php foreach ( grc_content_pages() as $grc_cp ) : ?>
				<article class="service reveal">
					<div class="symbol">↗</div>
					<h3><a href="<?php echo esc_url( home_url( '/' . $grc_cp['slug'] . '/' ) ); ?>" style="color:inherit"><?php echo esc_html( $grc_cp['title'] ); ?></a></h3>
					<p><?php echo esc_html( wp_trim_words( $grc_cp['description'] ? $grc_cp['description'] : $grc_cp['title'], 16 ) ); ?></p>
					<a href="<?php echo esc_url( home_url( '/' . $grc_cp['slug'] . '/' ) ); ?>">OPEN PAGE ↗</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
get_footer();
