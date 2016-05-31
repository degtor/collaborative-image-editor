<?php
/**
 * The front page template file.
 *
 * The front-page.php template file is used to render your site’s front page,
 * whether the front page displays the blog posts index (mentioned above) or a static page.
 * The front page template takes precedence over the blog posts index (home.php) template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package SoundsByJohan
 */

get_header('lab'); ?>

	<div id="content" class="site-content">

		<?php echo SoundsByJohan_breadcrumb(); ?>

		<div id="content-inside" class="lab-container">
			<div id="primary" class="content-area">
				<main id="main" class="lab-main" role="main">
				<?php if ( have_posts() ) : ?>

					<?php query_posts('cat=7'); ?> <!--/* We specify which category of posts to be work etc */-->
					<?php if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );
						?>
					<?php endwhile; ?>

					<?php the_posts_navigation(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>
						<?php echo do_shortcode('[ajax_load_more post_type="post" category="lab" category__not_in="4" offset="2" posts_per_page="8" container_type="div"]'); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--#content-inside -->
	</div><!-- #content -->

<?php get_footer(); ?>
