<?php
/**
 * single.php - Template para posts do blog
 *
 * @package Thiago_Bostock
 */

get_header();
?>

<main id="primary" class="site-main" style="padding: 140px 0 100px; background: var(--black);">
    <div class="container" style="max-width: 800px;">

        <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Meta do Post -->
            <div style="margin-bottom: 16px; display: flex; gap: 16px; align-items: center; font-size: 12px; color: rgba(255,255,255,0.3);">
                <span><?php echo get_the_date(); ?></span>
                <?php if ( has_category() ) : ?>
                    <span>•</span>
                    <?php the_category( ' / ' ); ?>
                <?php endif; ?>
            </div>

            <h1 class="section-title" style="font-size: 2.5rem; margin-bottom: 40px;">
                <?php the_title(); ?>
            </h1>

            <?php if ( has_post_thumbnail() ) : ?>
            <div style="border-radius: 20px; overflow: hidden; margin-bottom: 48px;">
                <?php the_post_thumbnail( 'large', [ 'style' => 'width:100%; height:400px; object-fit:cover;' ] ); ?>
            </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

        <!-- Navegação entre posts -->
        <nav style="margin-top: 60px; padding-top: 40px; border-top: 1px solid rgba(255,255,255,0.05); display: flex; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
            <?php
            $prev = get_previous_post();
            $next = get_next_post();
            if ($prev) echo '<a href="' . get_permalink($prev) . '" class="btn btn-outline">← Post Anterior</a>';
            if ($next) echo '<a href="' . get_permalink($next) . '" class="btn btn-outline">Próximo Post →</a>';
            ?>
        </nav>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>
