<?php
/**
 * Shared enquiry form partial.
 *
 * @package grc-consultant
 */

$grc_wa   = grc_setting( 'whatsapp' );
$grc_tel  = preg_replace( '/[^0-9+]/', '', grc_setting( 'phone_primary' ) );
$grc_mail = grc_setting( 'email' );
?>
<form class="contact-form reveal" id="contactForm" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
	<input type="hidden" name="action" value="grc_enquiry">
	<h3>Send a travel enquiry</h3>
	<div class="form-grid">
		<div class="field"><label for="grc_f_name">YOUR NAME</label><input id="grc_f_name" name="grc_name" placeholder="Full name" required></div>
		<div class="field"><label for="grc_f_email">EMAIL ADDRESS</label><input id="grc_f_email" name="grc_email" type="email" placeholder="<?php echo esc_attr( $grc_mail ); ?>"></div>
		<div class="field"><label for="grc_f_phone">PHONE / WHATSAPP</label><input id="grc_f_phone" name="grc_phone" type="tel" placeholder="Your number" required></div>
		<div class="field"><label for="grc_f_type">WHAT DO YOU NEED?</label><select id="grc_f_type" name="grc_type"><option>Umrah Package</option><option>Hajj 2027</option><option>Flight Deal</option><option>Group/Family Tickets</option><option>Vacation / Cruise</option><option>Other</option></select></div>
		<div class="field wide"><label for="grc_f_details">TRAVEL DETAILS</label><textarea id="grc_f_details" name="grc_details" placeholder="Destination, dates, travellers and your questions..." required></textarea></div>
	</div>
	<button class="btn" type="submit">Send Enquiry ↗</button>
	<p class="fineprint">Prefer to talk? Call <a href="tel:<?php echo esc_attr( $grc_tel ); ?>"><?php echo esc_html( grc_setting( 'phone_primary' ) ); ?></a> or <a href="https://wa.me/<?php echo esc_attr( $grc_wa ); ?>" target="_blank" rel="noopener">message us on WhatsApp</a>.</p>
</form>
