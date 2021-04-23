<footer class="footer-section">
	<div id="WAButton"></div>
	<script type="text/javascript">
		$(function() {
			$('#WAButton').floatingWhatsApp({
				phone: '+628127123225', //WhatsApp Business phone number
				headerTitle: 'Chat with us on WhatsApp!', //Popup Title
				message: "Nama : \nNIK : \nAlamat : \n\n Pertanyaan / Keluhan : ",
				//  popupMessage: 'Nama : \nNIK:', //Popup Message
				showPopup: true, //Enables popup display
				buttonImage: '<img src="<?= base_url('assets/img/') ?>whatsapp.svg" />', //Button Image
				//headerColor: 'crimson', //Custom header color
				//backgroundColor: 'crimson', //Custom background button color
				position: "right" //Position: left | right

			});
		});
	</script>
	<div class="overlay">
		<div class="waveWrapper waveAnimation">
			<div class="waveWrapperInner bgTop">
				<div class="wave waveTop"></div>
			</div>
			<div class="waveWrapperInner bgMiddle">
				<div class="wave waveMiddle"></div>
			</div>
			<div class="waveWrapperInner bgBottom">
				<div class="wave waveBottom"></div>
			</div>
		</div>

		<div class="footer-content">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-12">
						<div class="social-icon">
							<ul class="icon-area">
								<li class="social-nav">
									<a href="https://www.facebook.com/kpblada.babel.1"><i class="icofont-facebook"></i></a>
								</li>
								<!-- <li class="social-nav">
									<a href="#"><i class="icofont-twitter"></i></a>
								</li> -->
								<li class="social-nav">
									<a href="https://www.instagram.com/kpb.ladababel/"><i class="icofont-instagram"></i></a>
								</li>
								<li class="social-nav">
									<a href="whatsapp://send?abid=082123192019&text=Send%2C%20Message%2C%20from%2C%20!"><i class="icofont-whatsapp"></i></a>
								</li>
							</ul>
						</div>
						<div class="footer-text">
							<h5 class="footer-title">Subscribe to KPB LADA BABEL</h5>
							<h2 class="footer-subtitle">To Get Exclusive services</h2>
						</div>
					</div>
				</div>
				<div class="row d-flex justify-content-center">
					<div class="col-lg-7">
						<div class="subscribe">
							<input type="email" name="email" placeholder="Your Email Address" class="input-subscribe" />
							<button class="subscribe-btn">Subscribe</button>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="row d-flex justify-content-center">
						<div class="col-lg-6 col-md-12 d-flex justify-content-start reunir-content-center">
							<div class="footer-bottom-left">
								<p>
									Copyright © 2021.All Rights Reserved By
									<a href="#">KPB Lada Babel</a>
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-12 d-flex justify-content-end reunir-content-center">
							<div class="footer-bottom-right">
								<ul>
									<li>
										<a href="#">Privacy & Policy</a>
									</li>
									<li>
										<a href="#">Term Of Service</a>
									</li>
									<li>
										<a href="#">Affilate</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="<?= base_url('assets/assets_v2/') ?>js/app.js"></script>
<script src="<?= base_url('assets/assets_v2/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/assets_v2/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/assets_v2/') ?>js/wow.min.js"></script>
<script src="<?= base_url('assets/assets_v2/') ?>js/magnific-popup.min.js"></script>
<script src="<?= base_url('assets/assets_v2/') ?>js/main.js"></script>
<script>
	$(document).ready(function() {
		$('body').scrollspy({
			target: '#navbar',
			offset: 80
		});

		// Page scrolling feature
		$('a.page-scroll').bind('click', function(event) {
			var link = $(this);
			$('html, body').stop().animate({
				scrollTop: $(link.attr('href')).offset().top - 50
			}, 500);
			event.preventDefault();
			$("#navbar").collapse('hide');
		});
	});

	function initNavbar(changeOn) {
		cbpAnimatedHeader = (function() {
			var docElem = document.documentElement,
				header = document.querySelector('.navbar-default'),
				didScroll = false,
				changeHeaderOn = changeOn;

			function init() {
				window.addEventListener('scroll', function(event) {
					if (!didScroll) {
						didScroll = true;
						setTimeout(scrollPage, 250);
					}
				}, false);
			}

			function scrollPage() {
				var sy = scrollY();
				if (sy >= changeHeaderOn) {
					$(header).addClass('navbar-scroll')
				} else {
					$(header).removeClass('navbar-scroll')
				}
				didScroll = false;
			}
			if (changeOn == 0) {
				scrollPage();
			}

			function scrollY() {
				return window.pageYOffset || docElem.scrollTop;
			}
			init();
		})();
		new WOW().init();
	}
</script>

</body>

</html>