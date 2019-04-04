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
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'noto-simple' ), 'Noto Simple', '<a href="https://hitomiseki.com/" target="_blank" rel="noreferrer noopener">Hitomi Seki</a>' );
                ?>
            </div><!-- .site-info -->
			<p class="copyright">
				&copy;<?php echo date_i18n('Y') . ' '; bloginfo('name'); ?>
			</p>
        </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
