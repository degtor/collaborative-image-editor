<?php
$id       = get_theme_mod( 'SoundsByJohan_intro_id', 'intro' );
$disable  = get_theme_mod( 'SoundsByJohan_intro_disable' ) == 1 ? true : false;
$heading  = get_theme_mod( 'SoundsByJohan_intro_title' );
$bodytext = get_theme_mod( 'SoundsByJohan_intro_bodytext' );
$video    = get_theme_mod( 'SoundsByJohan_intro_url' );

if ( ! $disable && ( $video || $heading || $bodytext ) ) {
    $image    = get_theme_mod( 'SoundsByJohan_intro_image' );
    ?>
    <?php if ( $image ) { ?>
    <?php } ?>
        <section class="intro lame-parallaxer"> <!--<section class="intro super-parallax">-->
            <div class="container">
                <div class="wrapper">
                    <div class="video intro-anim-video">
                        <div class="inner">
                            <iframe src="<?php echo $video; ?>?badge=0&byline=0&color=ff0000&portrait=0&title=0"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="copy intro-anim-copy">
                        <?php if ($heading != '') echo '<h2 class="section-title">' . esc_html($heading) . '</h2>'; ?>
                        <?php if ($bodytext != '') echo '<p>' . esc_html($bodytext) . '</p>'; ?>
                    </div>

                </div>
            </div>
        </section>
    <?php if ( $image ) { ?>
    </div>
    <?php } ?>
<?php  }
