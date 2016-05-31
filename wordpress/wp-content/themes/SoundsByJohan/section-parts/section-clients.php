<?php
$SoundsByJohan_clients_id       = get_theme_mod( 'SoundsByJohan_clients_id', esc_html__('clients', 'SoundsByJohan') );
$SoundsByJohan_clients_disable  = get_theme_mod( 'SoundsByJohan_clients_disable' ) ==  1 ? true : false;
$SoundsByJohan_clients_testimonial1    = get_theme_mod( 'SoundsByJohan_clients_testimonial1', esc_html__('Testimonial 1', 'SoundsByJohan' ));
$SoundsByJohan_clients_testimonial2    = get_theme_mod( 'SoundsByJohan_clients_testimonial2', esc_html__('Testimonial 2', 'SoundsByJohan' ));
$SoundsByJohan_clients_person1    = get_theme_mod( 'SoundsByJohan_clients_person1', esc_html__('Person 1', 'SoundsByJohan' ));
$SoundsByJohan_clients_person2    = get_theme_mod( 'SoundsByJohan_clients_person2', esc_html__('Person 2', 'SoundsByJohan' ));
$SoundsByJohan_clients_subtitle = get_theme_mod( 'SoundsByJohan_clients_subtitle', esc_html__('Section subtitle', 'SoundsByJohan' ));
$SoundsByJohan_clients_title = get_theme_mod( 'SoundsByJohan_clients_title', esc_html__('Title', 'SoundsByJohan'));
$layout = intval( get_theme_mod( 'SoundsByJohan_clients_layout', 3 ) );
$user_ids = SoundsByJohan_get_section_clients_data();
if ( ! empty( $user_ids ) ) {
    ?>
    <?php if ( ! $SoundsByJohan_clients_disable ) : ?>
<section class="clients lame-parallaxer">
    <div class="container">
        <?php if ($SoundsByJohan_clients_title != '') echo '<h2>' . esc_html($SoundsByJohan_clients_title) . '</h2>' ?>
        <div class="client-testimonials">
                <div class="testimonial">
                    <?php if ($SoundsByJohan_clients_testimonial1 != '') echo '<p><q class="section-title">' . esc_html($SoundsByJohan_clients_testimonial1) . '</q>' . '- ' . esc_html($SoundsByJohan_clients_person1) . '</p>'; ?>
                </div>
                <div class="testimonial">
                    <?php if ($SoundsByJohan_clients_testimonial2 != '') echo '<p><q class="section-title">' . esc_html($SoundsByJohan_clients_testimonial2) . '</q>' . '- ' . esc_html($SoundsByJohan_clients_person2) . '</p>'; ?>
                </div>
        </div>
        <ul class="grid">
            <?php
            if (!empty($user_ids)) {
                $n = 0;
                foreach ($user_ids as $member) {
                    $member = wp_parse_args( $member, array(
                        'user_id'  =>array(),
                    ));

                    $link = isset( $member['link'] ) ?  $member['link'] : '';
                    $user_id = wp_parse_args( $member['user_id'],array(
                        'id' => '',
                     ) );

                    $image_attributes = wp_get_attachment_image_src( $user_id['id'], 'SoundsByJohan-medium' );
                    if ( $image_attributes ) {
                        $image = $image_attributes[0];
                        $data = get_post( $user_id['id'] );
                        $n ++ ;
                        ?>
                        <li>
                            <div class="inner">
                                <div style="background-image: url('<?php echo esc_url( $image ); ?>')"></div>
                            </div>
                        </li>
                        <?php

                    }
                }
            } ?>
        </ul>
    </div>
</section>
<?php endif;
}
