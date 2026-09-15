<?php
/**
 * 404.php - Página de erro Not Found
 *
 * @package Thiago_Bostock
 */

get_header();
?>

<main id="primary" class="site-main error-404-section">
    <div style="position: absolute; font-size: 20rem; font-weight: 900; color: var(--gold); opacity: 0.04; user-select: none; line-height: 1;">
        404
    </div>
    <div class="error-404-content container" style="text-align: center; padding: 60px 24px;">
        <span class="section-label" style="display: block; margin-bottom: 16px;">Ops!</span>
        <h1 class="section-title" style="font-size: 3rem; margin-bottom: 24px;">
            Página não <span>Encontrada</span>
        </h1>
        <p style="color: rgba(255,255,255,0.4); font-size: 1.1rem; max-width: 500px; margin: 0 auto 48px; line-height: 1.7;">
            A página que você procura não existe ou foi movida. Mas temos imóveis incríveis esperando por você!
        </p>
        <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn btn-gold">
                Voltar para o Início
            </a>
            <a href="<?php echo esc_url( get_post_type_archive_link('imovel') ); ?>" class="btn btn-outline">
                Ver Imóveis
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
