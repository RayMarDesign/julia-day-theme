<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package juliaday
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <nav id="site-navigation-footer" class="footer-navigation" role="navigation">
            <div class="container">
                <?php wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id' => 'secondary-menu',
                    'depth' => 1,
                ) ); ?>
            </div>
		</nav><!-- #site-navigation-footer -->
        <div class="site-contact">
            <div class="container">
                <div class="col col-1">
                    <div class="site-contact-address">
                        <span class="screen-reader-text"><?php esc_html_e( 'Location: ', 'juliaday' ); ?></span>
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        <p>Julia Day Nursery<br>
                        76 Central Street<br>
                        Ansonia, CT 06401</p>
                    </div>
                    <div class="site-contact-email">
                        <span class="screen-reader-text"><?php esc_html_e( 'Email: ', 'juliaday' ); ?></span>
                        <a href="mailto:juldaynursery@sbcglobal.net">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p>juldaynursery<wbr>@sbcglobal.net</p>
                        </a>
                    </div>
                </div>
                <div class="col col-2">
                    <div class="site-contact-phone">
                        <span class="screen-reader-text"><?php esc_html_e( 'Phone Number: ', 'juliaday' ); ?></span>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <p>203-736-2554</p>
                    </div>
                    <div class="site-contact-fax">
                        <span class="screen-reader-text"><?php esc_html_e( 'Fax Number: ', 'juliaday' ); ?></span>
                        <i class="fa fa-fax" aria-hidden="true"></i>
                        <p>203-736-9999</p>
                    </div>
                    <div class="site-contact-facebook">
                        <span class="screen-reader-text"><?php esc_html_e( 'Facebook: ', 'juliaday' ); ?></span>
                        <a href="https://www.facebook.com/JuliaDayNursery" target="_blank">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            <p>JuliaDayNursery</p>
                        </a>
                    </div>
                </div>
                <div class="col col-3">
                    <div class="site-contact-naeyc">
                        <a href="https://www.naeyc.org/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/images/naeyc-logo.jpg'?>" alt="NAEYC Accredited" title="NAEYC Accredited"></a>
                    </div>
                    <div class="site-contact-unitedway">
                        <a href="http://www.valleyunitedway.org/" target="_blank"><img src="<?php echo get_template_directory_uri() . '/images/valley-uw-logo.jpg'?>" alt="Valley United Way" title="Valley United Way"></a>
                    </div>
                </div>
            </div>
        </div><!-- .site-contact -->
        <div class="site-info container">
            <div class="site-info-copy">Copyright &copy; <?php
                if ( 2016 < (int)date('Y') ) {
                    echo '2016-' . date('Y');
                } else {
                    echo date('Y');
                }
            ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
