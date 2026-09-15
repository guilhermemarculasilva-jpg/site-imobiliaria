<?php
/**
 * archive-imovel.php - Arquivo de todos os imóveis
 * URL: /imoveis/
 *
 * @package Thiago_Bostock
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Header do Arquivo -->
    <div class="archive-header">
        <div class="container">
            <span class="section-label">Portfólio Completo</span>
            <h1 class="section-title">Todos os <span>Imóveis</span></h1>
            <p class="section-desc">Encontre o imóvel perfeito para você. Filtre por tipo, finalidade ou localização.</p>
        </div>
    </div>

    <!-- Barra de Busca -->
    <div class="search-wrap" style="margin-top: 0; margin-bottom: 60px;">
        <div class="container">
            <div class="search-box">
                <form class="search-form" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
                    <input type="hidden" name="post_type" value="imovel">
                    <div class="search-field" style="flex: 2;">
                        <label for="archive-search">Buscar imóvel</label>
                        <input type="text" id="archive-search" name="s"
                               placeholder="Palavras-chave..."
                               value="<?php echo esc_attr( get_search_query() ); ?>">
                    </div>
                    <div class="search-field">
                        <label for="archive-tipo">Tipo</label>
                        <select id="archive-tipo" name="tipo">
                            <option value="">Todos</option>
                            <?php
                            $tipos = get_terms( [ 'taxonomy' => 'tipo_imovel', 'hide_empty' => true ] );
                            if ( $tipos && ! is_wp_error($tipos) ) {
                                foreach ( $tipos as $tipo ) {
                                    printf( '<option value="%s">%s (%d)</option>',
                                        esc_attr($tipo->slug),
                                        esc_html($tipo->name),
                                        $tipo->count
                                    );
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="search-field">
                        <label for="archive-finalidade">Finalidade</label>
                        <select id="archive-finalidade" name="finalidade">
                            <option value="">Todas</option>
                            <option value="venda">Venda</option>
                            <option value="aluguel">Aluguel</option>
                            <option value="lancamento">Lançamento</option>
                        </select>
                    </div>
                    <button type="submit" class="search-submit">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                        </svg>
                        Buscar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Grid de Imóveis -->
    <div class="container" style="padding-bottom: 100px;">

        <?php if ( have_posts() ) : ?>

            <div class="properties-grid">
                <?php
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/card-imovel' );
                endwhile;
                ?>
            </div>

            <!-- Paginação -->
            <div style="margin-top: 60px; display: flex; justify-content: center;">
                <?php
                the_posts_pagination( [
                    'mid_size'  => 2,
                    'prev_text' => '← Anterior',
                    'next_text' => 'Próximo →',
                ] );
                ?>
            </div>

        <?php else : ?>
            <div style="text-align: center; padding: 80px 0;">
                <p style="font-size: 1.2rem; color: rgba(255,255,255,0.3); margin-bottom: 24px;">
                    Nenhum imóvel encontrado com esses critérios.
                </p>
                <a href="<?php echo esc_url( get_post_type_archive_link('imovel') ); ?>" class="btn btn-gold">
                    Ver Todos os Imóveis
                </a>
            </div>
        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>
