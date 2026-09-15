<?php
/**
 * single-imovel.php - Página de detalhe do imóvel
 *
 * @package Thiago_Bostock
 */

get_header();

while ( have_posts() ) : the_post();

// Meta dados do imóvel
$valor      = tb_get_price();
$area       = tb_get_meta('area');
$quartos    = tb_get_meta('quartos');
$banheiros  = tb_get_meta('banheiros');
$vagas      = tb_get_meta('vagas');
$endereco   = tb_get_meta('endereco');
$cidade     = tb_get_meta('cidade') ?: 'Barreiras, BA';
$codigo     = tb_get_meta('codigo');

$wa_msg = urlencode( 'Olá Thiago! Vi o imóvel "' . get_the_title() . '" no site e tenho interesse. Código: ' . $codigo );
?>

<main id="primary" class="site-main">

    <!-- Hero do Imóvel -->
    <div class="single-hero">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="Breadcrumb" style="margin-bottom: 32px; font-size: 12px; color: rgba(255,255,255,0.4);">
                <a href="<?php echo esc_url( home_url('/') ); ?>" style="color: var(--gold);">Início</a>
                <span style="margin: 0 8px;">/</span>
                <a href="<?php echo esc_url( get_post_type_archive_link('imovel') ); ?>" style="color: rgba(255,255,255,0.4);">Imóveis</a>
                <span style="margin: 0 8px;">/</span>
                <span><?php the_title(); ?></span>
            </nav>

            <!-- Galeria de Imagens -->
            <div class="single-hero-images">
                <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'imovel-hero', [ 'class' => 'main-img', 'loading' => 'eager' ] ); ?>
                <?php else : ?>
                    <img class="main-img"
                         src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=1200&q=80"
                         alt="<?php the_title_attribute(); ?>"
                         loading="eager">
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- Conteúdo Principal + Sidebar -->
    <div style="background: var(--black); padding: 60px 0 100px;">
        <div class="container">
            <div class="single-content-wrap">

                <!-- Coluna Principal -->
                <div class="single-main">

                    <?php if ($codigo) : ?>
                    <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: rgba(255,255,255,0.3);">
                        Cód. <?php echo esc_html( $codigo ); ?>
                    </span>
                    <?php endif; ?>

                    <h1 style="font-size: 2.5rem; font-weight: 900; color: #fff; margin-top: 12px; line-height: 1.1;">
                        <?php the_title(); ?>
                    </h1>

                    <div class="single-price"><?php echo esc_html( $valor ); ?></div>

                    <?php if ($endereco || $cidade) : ?>
                    <p style="color: rgba(255,255,255,0.4); font-size: 14px; margin-bottom: 8px; display: flex; align-items: center; gap: 6px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <?php echo esc_html( $endereco ?: $cidade ); ?>
                    </p>
                    <?php endif; ?>

                    <!-- Características -->
                    <div class="single-features">
                        <?php if ($quartos) : ?>
                        <div class="single-feature">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 20h20"/><rect width="18" height="12" x="3" y="8" rx="2"/>
                                <path d="M15 8V5a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v3"/>
                            </svg>
                            <strong><?php echo esc_html($quartos); ?></strong> Quartos
                        </div>
                        <?php endif; ?>
                        <?php if ($banheiros) : ?>
                        <div class="single-feature">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 6 6.5 3.5a1.5 1.5 0 0 0-2.12 0L3.5 4.38a1.5 1.5 0 0 0 0 2.12L6 9"/>
                                <path d="M10 16 7 19c-1.1 1.1-1.1 2.9 0 4s2.9 1.1 4 0l3-3"/>
                                <path d="M14.7 5.3a2 2 0 0 1 2.8 0l2.5 2.5a2 2 0 0 1 0 2.8L9 21H3v-6Z"/>
                            </svg>
                            <strong><?php echo esc_html($banheiros); ?></strong> Banheiros
                        </div>
                        <?php endif; ?>
                        <?php if ($area) : ?>
                        <div class="single-feature">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="18" height="18" x="3" y="3" rx="2"/>
                                <line x1="3" x2="21" y1="9" y2="9"/><line x1="9" x2="9" y1="9" y2="21"/>
                            </svg>
                            <strong><?php echo esc_html($area); ?>m²</strong> Área Total
                        </div>
                        <?php endif; ?>
                        <?php if ($vagas) : ?>
                        <div class="single-feature">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="18" height="18" x="3" y="3" rx="2"/>
                                <circle cx="8.5" cy="13.5" r="2.5"/>
                                <path d="M15 13.5a2.5 2.5 0 0 0-2.5 2.5"/>
                                <path d="M6 7h12"/>
                            </svg>
                            <strong><?php echo esc_html($vagas); ?></strong> Vagas
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Descrição -->
                    <?php if ( get_the_content() ) : ?>
                    <div class="entry-content" style="margin-top: 40px;">
                        <h2 style="font-size: 1.4rem; font-weight: 800; text-transform: uppercase; color: #fff; margin-bottom: 20px; letter-spacing: 0.05em;">
                            Sobre este imóvel
                        </h2>
                        <?php the_content(); ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar / CTA -->
                <aside class="single-sidebar">
                    <div class="sidebar-card">
                        <p class="sidebar-cta-title">Tenho Interesse</p>
                        <p style="font-size: 2rem; font-weight: 900; color: var(--gold); margin-bottom: 8px;"><?php echo esc_html($valor); ?></p>
                        <p style="font-size: 12px; color: rgba(255,255,255,0.4); margin-bottom: 28px;">
                            Fale com Thiago e tire todas suas dúvidas sobre este imóvel.
                        </p>

                        <div style="display: flex; flex-direction: column; gap: 12px;">
                            <a href="https://wa.me/<?php echo TB_WHATSAPP; ?>?text=<?php echo $wa_msg; ?>"
                               class="btn btn-whatsapp"
                               target="_blank"
                               rel="noopener noreferrer"
                               style="border-radius: 10px;">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp
                            </a>

                            <a href="tel:<?php echo preg_replace('/[^0-9]/', '', TB_PHONE); ?>"
                               class="btn btn-outline"
                               style="border-radius: 10px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                                Ligar Agora
                            </a>
                        </div>

                        <?php if ($codigo) : ?>
                        <p style="margin-top: 24px; font-size: 11px; color: rgba(255,255,255,0.2); text-align: center; letter-spacing: 0.15em;">
                            CÓD. <?php echo esc_html($codigo); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </aside>

            </div>
        </div>
    </div>

</main>

<?php
endwhile;
get_footer();
?>
