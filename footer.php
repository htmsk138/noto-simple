<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Noto_Simple
 */

?>

        </div><!-- .container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="container">
			<a id="back-to-top" href="#page"><i class="material-icons">keyboard_arrow_up</i></a>
            <div class="site-info">
                <?php
                $footer_text = get_theme_mod( 'footer_text', '' );
                if ( empty( $footer_text ) ) {
                    /* translators: 1: Theme name */
                    printf( esc_html__( 'Theme: %1$s', 'noto-simple' ), '<a href="https://wordpress.org/themes/noto-simple/">Noto Simple</a>' );
                } else {
                    echo $footer_text;
                }
                ?>
            </div><!-- .site-info -->
        </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
