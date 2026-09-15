<?php
/**
 * page-sobre.php - Página Sobre
 * Template: Sobre Nós
 *
 * @package Thiago_Bostock
 */

get_header(); ?>

<main id="primary" class="site-main">

    <div style="padding-top: 120px; background: var(--black);">
        <div class="container" style="padding-bottom: 100px;">
            <div style="max-width: 900px; margin: 0 auto; text-align: center; padding-top: 60px; padding-bottom: 80px;">
                <span class="section-label">Quem Somos</span>
                <h1 class="section-title">Thiago <span>Bostock</span></h1>
                <p class="section-desc">Corretor de imóveis com mais de 10 anos de experiência, comprometido com excelência e resultados.</p>
            </div>

            <div class="about-inner">
                <div class="about-media">
                    <div class="about-img-wrap">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=700&q=80"
                             alt="Thiago Bostock" loading="lazy">
                    </div>
                    <div class="about-accent-box"></div>
                </div>
                <div>
                    <span class="section-label">O Profissional</span>
                    <h2 class="section-title" style="font-size: 2.5rem;">Construir com <span>Sabedoria</span></h2>

                    <?php if ( have_posts() ) : the_post(); the_content(); else : ?>
                    <p class="about-text">
                        Formado e credenciado pelo CRECI <?php echo TB_CRECI; ?>, Thiago Bostock construiu sua carreira com base em três pilares fundamentais: <strong style="color: var(--gold);">honestidade, resultado e relacionamento</strong>.
                    </p>
                    <p class="about-text">
                        Especialista em imóveis de alto padrão, financiamento imobiliário e consultoria de investimentos, Thiago atende clientes em Barreiras, Luís Eduardo Magalhães e toda a região oeste da Bahia.
                    </p>
                    <p class="about-text">
                        Com mais de 500 imóveis negociados e centenas de clientes satisfeitos, cada transação é tratada com o máximo cuidado, do primeiro contato à entrega das chaves.
                    </p>
                    <?php endif; ?>

                    <div class="about-stats">
                        <div>
                            <div class="about-stat-num">+500</div>
                            <div class="about-stat-label">Imóveis Vendidos</div>
                        </div>
                        <div>
                            <div class="about-stat-num">+10</div>
                            <div class="about-stat-label">Anos de Experiência</div>
                        </div>
                    </div>

                    <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" class="btn btn-gold" target="_blank" rel="noopener noreferrer" style="margin-top: 40px;">
                        Fale com Thiago
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
