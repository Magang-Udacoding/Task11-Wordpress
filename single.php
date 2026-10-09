<?php
/**
 * Single Post Template — Toko Berkah
 *
 * @package UKM_Toko_Theme
 */

get_header();
?>

<main id="primary-content" class="single-post-main">
    <div class="site-container single-post-layout">
        <div class="single-post-content-col">

            <?php if ( function_exists( 'ukm_toko_breadcrumbs' ) ) ukm_toko_breadcrumbs(); ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-article' ); ?> itemscope itemtype="https://schema.org/Article">

                    <!-- Post Header -->
                    <header class="single-post-header">
                        <?php
                        $cats = get_the_category();
                        if ( $cats ) :
                        ?>
                        <div class="post-cats">
                            <?php foreach ( $cats as $c ) : ?>
                            <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>" class="ukm-badge ukm-badge-green">
                                <?php echo esc_html( $c->name ); ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <h1 class="single-post-title" itemprop="headline"><?php the_title(); ?></h1>

                        <div class="post-meta">
                            <span class="post-meta-date" itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                📅 <?php echo get_the_date( 'j F Y' ); ?>
                            </span>
                            <span class="post-meta-sep" aria-hidden="true">•</span>
                            <span class="post-meta-author" itemprop="author">
                                ✍️ <?php the_author(); ?>
                            </span>
                            <?php if ( ! is_singular( 'produk' ) ) : ?>
                            <span class="post-meta-sep" aria-hidden="true">•</span>
                            <span class="post-meta-read"><?php echo esc_html( (int) ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 ) ); ?> <?php esc_html_e( 'menit baca', 'ukm-toko-theme' ); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="single-post-thumb" itemprop="image">
                        <?php the_post_thumbnail( 'large', array( 'loading' => 'eager' ) ); ?>
                    </div>
                    <?php endif; ?>

                    <!-- Post Content -->
                    <div class="single-post-body entry-content" itemprop="articleBody">
                        <?php
                        the_content( sprintf(
                            '<a href="%s">' . esc_html__( 'Baca lebih lanjut', 'ukm-toko-theme' ) . '</a>',
                            the_permalink()
                        ) );
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Halaman:', 'ukm-toko-theme' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <!-- Post Footer (Tags) -->
                    <footer class="single-post-footer">
                        <?php
                        $tags_list = get_the_tag_list( '<div class="post-tags"><span class="tags-label">' . esc_html__( 'Tag:', 'ukm-toko-theme' ) . '</span> ', ', ', '</div>' );
                        echo wp_kses_post( $tags_list );
                        ?>
                        <div class="post-share">
                            <span><?php esc_html_e( 'Bagikan:', 'ukm-toko-theme' ); ?></span>
                            <a href="https://wa.me/?text=<?php echo rawurlencode( get_the_title() . ' ' . get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-wa">WhatsApp</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( get_permalink() ); ?>" target="_blank" rel="noopener noreferrer" class="share-fb">Facebook</a>
                        </div>
                    </footer>

                    <!-- Post Navigation -->
                    <nav class="single-post-nav" aria-label="<?php esc_attr_e( 'Navigasi artikel', 'ukm-toko-theme' ); ?>">
                        <?php
                        the_post_navigation( array(
                            'prev_text' => '&larr; <span>%title</span>',
                            'next_text' => '<span>%title</span> &rarr;',
                        ) );
                        ?>
                    </nav>

                </article><!-- .single-post-article -->

                <!-- Comments -->
                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>

            <?php endwhile; ?>

        </div><!-- .single-post-content-col -->

        <aside class="single-post-sidebar">
            <?php get_sidebar(); ?>
        </aside>

    </div><!-- .single-post-layout -->
</main>

<?php
get_footer();
