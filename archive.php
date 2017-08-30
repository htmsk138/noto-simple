<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Noto_Simple
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				if ( is_home() && ! is_front_page() ) {
				?>
					<h1 class="page-title"><?php single_post_title(); ?></h1>

				<?php } else {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				}
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation(array(
                'prev_text' => '<i class="material-icons">navigate_before</i><span class="hidden-sm">' . __('Older posts', 'noto-simple') . '</span>',
                'next_text' => '<span class="hidden-sm">' . __('Newer posts', 'noto-simple') . '</span><i class="material-icons">navigate_next</i>',
            ));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
