/* ==========================================================================
   Global Route Consultant - Demo13 behaviour
   Menu, tabs, FAQ accordion, reveal on scroll, back-to-top, quick enquiry.
   ========================================================================== */
(function () {
	'use strict';

	function ready(fn) {
		if (document.readyState !== 'loading') { fn(); }
		else { document.addEventListener('DOMContentLoaded', fn); }
	}

	ready(function () {
		/* ---------------- Mobile menu ---------------- */
		var menu  = document.getElementById('menu');
		var links = document.getElementById('links');
		if (menu && links) {
			menu.addEventListener('click', function () {
				links.classList.toggle('open');
				menu.setAttribute('aria-expanded', links.classList.contains('open') ? 'true' : 'false');
			});
			links.querySelectorAll('a').forEach(function (a) {
				a.addEventListener('click', function () {
					links.classList.remove('open');
					menu.setAttribute('aria-expanded', 'false');
				});
			});
		}

		/* ---------------- Booking tabs ---------------- */
		var kind = document.getElementById('kind');
		document.querySelectorAll('.tab').forEach(function (t) {
			t.addEventListener('click', function () {
				document.querySelectorAll('.tab').forEach(function (x) { x.classList.remove('active'); });
				t.classList.add('active');
				if (kind) { kind.value = t.dataset.kind; }
			});
		});

		/* ---------------- FAQ accordion ---------------- */
		document.querySelectorAll('.faq-q').forEach(function (q) {
			q.addEventListener('click', function () {
				q.parentElement.classList.toggle('open');
			});
		});

		/* ---------------- Reveal on scroll ---------------- */
		if ('IntersectionObserver' in window) {
			var io = new IntersectionObserver(function (entries) {
				entries.forEach(function (e) {
					if (e.isIntersecting) {
						e.target.classList.add('visible');
						io.unobserve(e.target);
					}
				});
			}, { threshold: 0.1 });
			document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });
		} else {
			document.querySelectorAll('.reveal').forEach(function (el) { el.classList.add('visible'); });
		}

		/* ---------------- Back to top ---------------- */
		var topBtn = document.getElementById('toTop');
		if (topBtn) {
			window.addEventListener('scroll', function () {
				topBtn.classList.toggle('show', window.scrollY > 450);
			});
			topBtn.addEventListener('click', function () {
				window.scrollTo({ top: 0, behavior: 'smooth' });
			});
		}

		/* ---------------- Package tier filter ---------------- */
		var filter = document.getElementById('grc-tier-filter');
		var grid   = document.getElementById('grc-package-grid');
		if (filter && grid) {
			filter.addEventListener('click', function (e) {
				var btn = e.target.closest('button');
				if (!btn) { return; }
				filter.querySelectorAll('button').forEach(function (b) { b.classList.remove('active'); });
				btn.classList.add('active');
				var tier = btn.dataset.tier;
				grid.querySelectorAll('.package').forEach(function (card) {
					var show = (tier === 'all') || (card.dataset.tier === tier);
					card.style.display = show ? '' : 'none';
				});
			});
		}

		/* ---------------- Quick enquiry -> WhatsApp ---------------- */
		var quick = document.getElementById('quickForm');
		if (quick) {
			quick.addEventListener('submit', function (e) {
				e.preventDefault();
				var d = Object.fromEntries(new FormData(e.target).entries());
				var msg = 'Assalam-o-Alaikum Global Route Consultant,%0A' +
					'Travel Enquiry: ' + encodeURIComponent(d.type || 'General') + '%0A' +
					'Name: ' + encodeURIComponent(d.name || '') + '%0A' +
					'Phone: ' + encodeURIComponent(d.phone || '') + '%0A' +
					'Package / Route: ' + encodeURIComponent(d.destination || '') + '%0A' +
					'Date: ' + encodeURIComponent(d.date || '') + '%0A' +
					'Travellers: ' + encodeURIComponent(d.travellers || '');
				window.open('https://wa.me/' + (window.grcWhatsapp || '13436556606') + '?text=' + msg, '_blank', 'noopener');
			});
		}

		/* ---------------- Year stamp ---------------- */
		var year = document.getElementById('year');
		if (year) { year.textContent = new Date().getFullYear(); }
	});
})();
