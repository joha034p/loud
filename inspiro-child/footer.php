<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.0.0
 * @version 1.0.0
 */

?>

		</div><!-- #content -->

		<?php get_template_part( 'template-parts/footer/footer', 'instagram-widget' ); ?>

		<footer id="colophon" <?php inspiro_footer_class(); ?> role="contentinfo">
			<div class="inner-wrap footer-wrapper">
				<div>
					<div class="column-header">
						Hent appen
					</div>
					<ul class="first-col">
						<li>
							<a href="https://apps.apple.com/dk/app/radio-loud/id1498746367">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/app-store.svg" />
							</a>
						</li>
						<li>
							<a href="https://play.google.com/store/apps/details?id=dk.uptime.RadioLoud&hl=da">
								<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/google-play.png" />
							</a>
						</li>
					</ul>
				</div>
				<div>
					<div class="column-header">
						Indhold
					</div>
					<ul>
						<li><a href="/loud/podcasts">Podcasts</a></li>
						<li></li>
					</ul>
				</div>
				<div>
					<div class="column-header">
						Om Radio Loud
					</div>
					<ul>
						<li><a href="/loud/loud-live">LOUD LIVE</a></li>
						<li><a href="/loud/om-radio-loud/">Hvem er vi</a></li>
						<li class="social-wrapper">
							<a href="https://www.facebook.com/radiolouddanmark/">
								<img class="social_fb" src="<?php echo get_stylesheet_directory_uri() ?>/assets/fbIcon.svg" />
									</a>
							<a href="https://twitter.com/radioloud_dk?lang=da">
								<img class="social_twitter" src="<?php echo get_stylesheet_directory_uri() ?>/assets/twitter.svg" />
									</a>
							<a href="https://twitter.com/radioloud_dk?lang=da">
								<img class="social_ig" src="<?php echo get_stylesheet_directory_uri() ?>/assets/ig.svg" />
									</a>
						</li>
					</ul>
				</div>
				<div>
					<div class="column-header">
						Kontaktinformation
					</div>
					<ul>
						<li><a href="mailto:kontakt@radioloud.dk">kontakt@radioloud.dk</a></li>
						<li><a href="tel:+4532421714">+45 32 42 17 14</a></li>
						<li>PROGRAMREDAKTION</li>
						<li> <div class="smuktekst"> Wildersgade 10B, 2. sal </div> </li>
						<li> <div class="smuktekst"> 1408 København </div></li>
						<li>NYHEDSREDAKTION</li>
						<li> <div class="smuktekst"> Vestergade 165D, 2. sal</div></li>
						<li> <div class="smuktekst"> 5700 Svendborg</div></li>



					</ul>
				</div>
				 <?php
				// get_template_part( 'template-parts/footer/footer', 'widgets' );
				// get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .inner-wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>

<style>
.footer-wrapper {
	padding: 20px 0;
	width: 80%;
    margin: 0 auto;
	display: flex;
}
.footer-wrapper div {
	flex-basis: 25%;
}
.footer-wrapper .column-header {
	text-transform: uppercase;
}
.footer-wrapper ul {
	margin-left: 0;
	list-style: none;
}
.footer-wrapper ul li {
	margin: 7px 0;
	
}
.footer-wrapper ul a {
	color: white;
}
.footer-wrapper ul.first-col img {
	width: 128px;
}

.smuktekst {
	color: white;
}
.social-wrapper {
	display: flex;
	justify-content: space-between;
	width: 50%;
}
.social-wrapper a {
	flex-basis: 25%;
}


</style>

</html>
