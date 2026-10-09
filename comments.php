Toko Ber<?php
/**
 * Comments Template — Toko Berkah
 *
 * @package UKM_Toko_Theme
 */

if ( post_password_required() ) {
    return;
}
?>

<section id="comments" class="comments-section">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-heading">
            <?php
            $comments_number = get_comments_number();
            printf(
                /* translators: %d number of comments */
                esc_html( _nx( '%d Komentar', '%d Komentar', $comments_number, 'comments title', 'ukm-toko-theme' ) ),
                (int) $comments_number
            );
            ?>
        </h2>

        <ol class="comments-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 48,
                'callback'   => function_exists( 'ukm_toko_comment_callback' ) ? 'ukm_toko_comment_callback' : null,
            ) );
            ?>
        </ol>

        <?php the_comments_pagination( array(
            'prev_text' => '&laquo; ' . esc_html__( 'Komentar Sebelumnya', 'ukm-toko-theme' ),
            'next_text' => esc_html__( 'Komentar Berikutnya', 'ukm-toko-theme' ) . ' &raquo;',
        ) ); ?>

    <?php endif; ?>

    <?php
    // Comment form
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments">
            <?php esc_html_e( 'Komentar untuk postingan ini ditutup.', 'ukm-toko-theme' ); ?>
        </p>
    <?php else : ?>
        <?php
        comment_form( array(
            'title_reply'          => esc_html__( 'Tinggalkan Komentar', 'ukm-toko-theme' ),
            'title_reply_to'       => esc_html__( 'Balas komentar dari %s', 'ukm-toko-theme' ),
            'cancel_reply_link'    => esc_html__( 'Batal', 'ukm-toko-theme' ),
            'label_submit'         => esc_html__( 'Kirim Komentar', 'ukm-toko-theme' ),
            'class_submit'         => 'ukm-btn ukm-btn-primary',
            'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Alamat email Anda tidak akan dipublikasikan.', 'ukm-toko-theme' ) . '</p>',
        ) );
        ?>
    <?php endif; ?>

</section><!-- #comments -->
