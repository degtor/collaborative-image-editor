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

    <div class="list-article-thumb">
            <?php
            if ( has_post_thumbnail( ) ) {
                the_post_thumbnail( 'SoundsByJohan-blog-small' );
                the_title();
                the_tags();
            } else {
                echo '<img alt="" src="'. get_template_directory_uri() . '/assets/images/placholder2.png' .'">';
            }
            ?>
    </div>

</article><!-- #post-## -->
