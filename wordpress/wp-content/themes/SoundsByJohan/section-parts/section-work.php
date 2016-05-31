<?php
$SoundsByJohan_work_id        = get_theme_mod( 'SoundsByJohan_work_id', esc_html__('work', 'SoundsByJohan') );
$SoundsByJohan_work_disable   = get_theme_mod( 'SoundsByJohan_work_disable' ) == 1 ? true : false;
$SoundsByJohan_work_title     = get_theme_mod( 'SoundsByJohan_work_title', esc_html__('Latest work', 'SoundsByJohan' ));
$SoundsByJohan_work_number    = get_theme_mod( 'SoundsByJohan_work_number', '3' );
$SoundsByJohan_work_more_link = get_theme_mod( 'SoundsByJohan_work_more_link', '#' );
$SoundsByJohan_work_more_text = get_theme_mod( 'SoundsByJohan_work_more_text', esc_html__('Read Our Blog', 'SoundsByJohan' ));
?>
<?php if ( ! $SoundsByJohan_work_disable  ) : ?>
<!--<section id="--><?php //if ( $SoundsByJohan_work_id != '' ) echo $SoundsByJohan_work_id; ?><!--" --><?php //do_action( 'SoundsByJohan_section_atts', 'work' ); ?><!-- class="--><?php //echo esc_attr( apply_filters( 'SoundsByJohan_section_class', 'section-work section-padding onepage-section', 'work' ) ); ?><!--">-->
<!--	--><?php //do_action( 'SoundsByJohan_section_before_inner', 'work' ); ?>
<section class="work">
	<div class="container">
		<?php if ($SoundsByJohan_work_title != '') echo '<h2>' . esc_html($SoundsByJohan_work_title) . '</h2>' ?>
		<ul class="work-thumbs grid">

			<?php
			$query = new WP_Query(
				array(
					'posts_per_page' => $SoundsByJohan_work_number
				)
			);
			?>
			<?php if ( $query->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php query_posts('cat=4'); ?>
				<?php while (have_posts() ) : the_post(); ?>

					<li class="work-item">
						<div class="inner" style="background-image: url('<?php echo the_post_thumbnail_url() ?>')">
							<span><?php the_title() ?></span>
						</div>
					</li>
				<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
	<div class="work-slide">
		<nav>
			<div class="prev"></div>
			<div class="next"></div>
		</nav>
		<div class="inner">
			<div class="scroller">
				<ul class="work-items">

				<?php
				$query = new WP_Query(
					array(
						'posts_per_page' => $SoundsByJohan_work_number
					)
				);
				?>
				<?php if ( $query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php query_posts('cat=4'); ?>
					<?php while (have_posts() ) : the_post(); ?>

						<li class="work-item">
							<img src="<?php echo the_post_thumbnail_url() ?>" alt="">
							<h3><?php the_title() ?></h3>
							<?php the_content() ?>
						</li>
					<?php endwhile; ?>
				<?php endif; ?>

			</ul>
		</div>
		</div>
		<div class="overlay"></div>
	</div>
</section>
<?php endif;
wp_reset_query();

