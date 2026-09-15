<?php
/**
 * index.php - Template fallback principal do WordPress
 * Este arquivo é o último recurso do WordPress quando nenhum outro template é encontrado.
 * Para a home, usamos front-page.php
 *
 * @package Thiago_Bostock
 */

get_header(); ?>

<main id="primary" class="site-main" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="container">
        <?php
        if ( have_posts() ) :
            echo '<div class="properties-grid">';
            while ( have_posts() ) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'property-card' ); ?>>
                    <div class="property-card-body" style="padding: 32px;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="property-card-media" style="margin-bottom: 20px; border-radius: 12px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium_large', [ 'style' => 'width:100%; height:200px; object-fit:cover;' ] ); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <h2 class="property-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="entry-content" style="color: rgba(255,255,255,0.6); margin-top: 12px;">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="property-btn" style="margin-top: 20px;">
                            Leia mais
                        </a>
                    </div>
                </article>
                <?php
            endwhile;
            echo '</div>';

            the_posts_navigation();
        else :
            echo '<p style="color: rgba(255,255,255,0.4); text-align: center;">Nenhum conteúdo encontrado.</p>';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
