<?php
$SoundsByJohan_contact_id            = get_theme_mod( 'SoundsByJohan_contact_id', esc_html__('contact', 'SoundsByJohan') );
$SoundsByJohan_contact_disable       = get_theme_mod( 'SoundsByJohan_contact_disable' ) == 1 ?  true : false;
$SoundsByJohan_contact_title         = get_theme_mod( 'SoundsByJohan_contact_title', esc_html__('Get in touch', 'SoundsByJohan' ));
$SoundsByJohan_contact_subtitle      = get_theme_mod( 'SoundsByJohan_contact_subtitle', esc_html__('Section subtitle', 'SoundsByJohan' ));
$SoundsByJohan_contact_cf7           = get_theme_mod( 'SoundsByJohan_contact_cf7' );
$SoundsByJohan_contact_cf7_disable   = get_theme_mod( 'SoundsByJohan_contact_cf7_disable' );
$SoundsByJohan_contact_text          = get_theme_mod( 'SoundsByJohan_contact_text' );
$SoundsByJohan_contact_body          = get_theme_mod( 'SoundsByJohan_contact_body' );
$SoundsByJohan_contact_address_title = get_theme_mod( 'SoundsByJohan_contact_address_title' );
$SoundsByJohan_contact_address       = get_theme_mod( 'SoundsByJohan_contact_address' );
$SoundsByJohan_contact_phone         = get_theme_mod( 'SoundsByJohan_contact_phone' );
$SoundsByJohan_contact_email         = get_theme_mod( 'SoundsByJohan_contact_email' );
$SoundsByJohan_contact_fax           = get_theme_mod( 'SoundsByJohan_contact_fax' );
if ( $SoundsByJohan_contact_cf7 || $SoundsByJohan_contact_text || $SoundsByJohan_contact_address_title || $SoundsByJohan_contact_phone || $SoundsByJohan_contact_email || $SoundsByJohan_contact_fax ) {
    $desc = get_theme_mod( 'SoundsByJohan_contact_desc' );
    ?>
    <?php if (!$SoundsByJohan_contact_disable) : ?>
        <section class="contact">
            <div class="container">
                <?php if ( $SoundsByJohan_contact_title || $SoundsByJohan_contact_subtitle || $desc ){ ?>
                    <?php if ($SoundsByJohan_contact_subtitle != '') echo '<h5 class="section-subtitle">' . esc_html($SoundsByJohan_contact_subtitle) . '</h5>'; ?>
                    <?php if ($SoundsByJohan_contact_title != '') echo '<h2>' . esc_html($SoundsByJohan_contact_title) . '</h2>'; ?>
                    <?php if ( $desc ) {
                        echo '<div class="section-desc">' . wp_kses_post( $desc ) . '</div>';
                    } ?>
                <?php } ?>
                <div class="wrapper">
                    <div class="contact-copy">
                        <h3><?php if ($SoundsByJohan_contact_text != '') echo wp_kses_post($SoundsByJohan_contact_text); ?></h3>
                        <p><?php if ($SoundsByJohan_contact_body != '') echo wp_kses_post($SoundsByJohan_contact_body); ?></p>
                            <div class="address-box">
                                <h3><?php if ($SoundsByJohan_contact_address_title != '') echo wp_kses_post($SoundsByJohan_contact_address_title); ?></h3>

                                <?php if ($SoundsByJohan_contact_address != ''): ?>
                                    <div class="address-contact">
                                        <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-map-marker fa-stack-1x fa-inverse"></i></span>

                                        <div class="address-content"><?php echo wp_kses_post($SoundsByJohan_contact_address); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($SoundsByJohan_contact_phone != ''): ?>
                                    <div class="address-contact">
                                        <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span>

                                        <div class="address-content"><?php echo wp_kses_post($SoundsByJohan_contact_phone); ?></div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($SoundsByJohan_contact_email != ''): ?>
                                    <div class="address-contact">
                                        <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i></span>

                                        <div class="address-content"><a href="mailto:<?php echo antispambot($SoundsByJohan_contact_email); ?>"><?php echo antispambot($SoundsByJohan_contact_email); ?></a></div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($SoundsByJohan_contact_fax != ''): ?>
                                    <div class="address-contact">
                                        <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-fax fa-stack-1x fa-inverse"></i></span>

                                        <div class="address-content"><?php echo wp_kses_post($SoundsByJohan_contact_fax); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php if ($SoundsByJohan_contact_cf7_disable != '1') : ?>
                        <?php if (isset($SoundsByJohan_contact_cf7) && $SoundsByJohan_contact_cf7 != '') { ?>
                            <div class="contact-form">
                                <?php echo do_shortcode(wp_kses_post($SoundsByJohan_contact_cf7)); ?>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
                <!-- Här var en wrapperdiv förut -->
                    <ul class="grid">
                        <li>
                            <div class="inner">
                                <div style="background-image: url('/wp-content/themes/SoundsByJohan/assets/images/facebook-logo-white.png')"></div>
                            </div>
                        </li>
                        <li>
                            <div class="inner">
                                <div style="background-image: url('/wp-content/themes/SoundsByJohan/assets/images/facebook-logo-white.png')"></div>
                            </div>
                        </li>
                        <li>
                            <div class="inner">
                                <div style="background-image: url('/wp-content/themes/SoundsByJohan/assets/images/facebook-logo-white.png')"></div>
                            </div>
                        </li>
                        <li>
                            <div class="inner">
                                <div style="background-image: url('/wp-content/themes/SoundsByJohan/assets/images/facebook-logo-white.png')"></div>
                            </div>
                        </li>
                    </ul>
            </div>
        </section>
    <?php endif;
}