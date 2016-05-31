<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SoundsByJohan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article', 'clearfix') ); ?>>

	<div class="list-article-content">
		<header class="entry-header">
			<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<?php echo "<span class='date'>Posted on ", the_date(), "</span>"; ?>
			<div class="thetags"><?php the_tags(); ?></div>
		</header><!-- .entry-header -->

		<div class="list-article-thumb">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php
				if ( has_post_thumbnail( ) ) {
					the_post_thumbnail( 'SoundsByJohan-blog-medium' );
				}
				?>
			</a>
		</div>

		<div class="entry-excerpt">
			<?php
				the_content();
			?>
	</div>
		
</article><!-- #post-## -->
