<nav class="navbar fixed-bottom navbar-light bg-light bottom-navbar d-md-none">
	<a href="<?php echo wc_get_cart_url(); ?>"  class="cart-icon">
					<img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/shopping-cart-icon.svg'; ?>" alt="cart">
					<span class="cart-quantity"><?php echo WC()->cart->cart_contents_count; ?></span>
					<span class="cart-price"><?php echo WC()->cart->get_cart_total(); ?></span>
	</a>
</nav>
<footer class="footer">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md-4">
					<div class="row">
						<h5 class="col-12">Síguenos</h5>
					</div>
					<div class="row">
						<ul class="col-12 list-inline social-list">
							<li class="list-inline-item">
								<a target="_blank" href="https://www.facebook.com/happyliveslatam">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>
							<li class="list-inline-item">
								<a target="_blank" href="https://www.instagram.com/happylivesco/">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li class="list-inline-item">
								<a target="_blank" href="https://twitter.com/happylivesco">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<form action="https://facebook.us7.list-manage.com/subscribe/post?u=8ff39d019b43eee09df98633e&amp;id=f7322964a2" method="post" name="mc-embedded-subscribe-form" class="col-12">
							<h5>Suscríbete a nuestro newsletter</h5>
							<p>Recibirás información de nuestros últimas experiencias y descuentos</p>
							<div class="form-group">
								<label>Email</label>
								<input name="EMAIL" class="form-control" type="email" placeholder="Email" aria-label="Email">
							</div>
							<div class="form-group">
								<label>Intereses </label>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										Entretenimiento
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										Bienestar
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										Turismo
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
									<label class="form-check-label" for="defaultCheck1">
										Gastronomía
									</label>
								</div>
							</div>
							<button class="btn btn-block btn-secondary" type="submit">Suscribirme</button>
						</form>
					</div>
				</div>
				<div class="col-6">
					<div class="row">
						<div class="col-12 col-md-4">
							<h5>Categorías</h5>
							<ul class="list-unstyled">
								<li class="list-item">
									<a href="<?php echo home_url('/product-category/entretenimiento/');?>">Entretenimiento</a>
								</li>
								<li class="list-item">
									<a href="<?php echo home_url('/product-category/gastronomia/');?>">Gastronomía</a>
								</li>
								<li class="list-item">
									<a href="<?php echo home_url('/product-category/turismo/');?>">Turismo</a>
								</li>
								<li class="list-item">
									<a href="<?php echo home_url('/product-category/bienestar/');?>">Bienestar</a>
								</li>
							</ul>
						</div>
						<div class="col-12 col-md-4">
							<h5>Ayuda</h5>
							<ul class="list-unstyled">
								<li class="list-item">
									<a href="<?php echo home_url('/contacto');?>">Contacto</a>
								</li>
								<li class="list-item">
									<a href="<?php echo home_url('/preguntas-frecuentes');?>">Preguntas Frecuentes</a>
								</li>
							</ul>
						</div>
						<div class="col-12 col-md-4">
							<h5>Acerca de Happy Lives</h5>
							<ul class="list-unstyled">
								<li class="list-item">
									<a href="<?php echo home_url('quienes-somos')?>">¿Quienes somos?</a>
								</li>
								<li class="list-item">
									<a href="<?php echo home_url('politicas-de-privacidad')?>">Políticas de privacidad</a>
								</li>
								<li class="list-item">
									<a href="#">Términos y condiciones</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-12">
							<div class="row mt-4">
								<div class="col-12">
									<h6>Recibimos todas las formas de pago</h6>
								</div>
							</div>
							<div class="row justify-content-center align-items-center">
								<div class="col-2"><img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/visa.svg'; ?>"></div>
								<div class="col-2"><img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/mastercard.svg'; ?>"></div>
								<div class="col-2"><img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/pse.svg'; ?>"></div>
								<div class="col-2"><img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/baloto.png'; ?>"></div>
								<div class="col-2"><img class="img-fluid" src="<?php echo get_template_directory_uri() .'/assets/img/efecty.png'; ?>"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145101578-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-145101578-1');
	</script>
</body>

</html>