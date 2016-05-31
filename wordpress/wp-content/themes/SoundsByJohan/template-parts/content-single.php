<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoundsByJohan
 */

get_header('post');
?>
<div class="lab-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php echo "<span class='date'>Posted on ", the_date(), "</span>"; ?>

			<div class="thetags">
				<?php the_tags(); ?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>

		</div><!-- .entry-content -->

		<!--<footer class="entry-footer">
			<?php SoundsByJohan_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</div>

