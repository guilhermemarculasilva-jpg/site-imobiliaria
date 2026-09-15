<?php
/**
 * front-page.php - Homepage / Página Inicial
 * Usa as classes CSS definidas em style.css (sem Tailwind)
 *
 * @package Thiago_Bostock
 */

get_header(); ?>

<main id="primary" class="site-main" role="main">

    <!-- ============================
         1. HERO SECTION
         ============================ -->
    <section class="hero-section" id="hero" aria-label="Seção principal">

        <!-- Background com imagem -->
        <div class="hero-bg">
            <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1920&q=80"
                 alt="Imóvel de luxo"
                 loading="eager"
                 fetchpriority="high">
            <div class="hero-bg-overlay"></div>
        </div>

        <div class="hero-content-wrap">
            <div class="container">
                <div class="hero-inner">

                    <!-- Texto do Hero -->
                    <div class="hero-text">
                        <span class="hero-eyebrow">Construir com Sabedoria</span>

                        <h1 class="hero-title">
                            É Investir com<br>
                            <span class="accent">Sucesso!</span>
                        </h1>

                        <p class="hero-subtitle">
                            Consultoria imobiliária exclusiva em Barreiras e região. Encontre o imóvel ideal com o corretor mais preparado do mercado.
                        </p>

                        <div class="hero-buttons">
                            <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá! Gostaria de atendimento exclusivo.' ) ); ?>"
                               class="btn btn-gold"
                               target="_blank"
                               rel="noopener noreferrer">
                                Atendimento Exclusivo
                            </a>
                            <a href="#imoveis" class="btn btn-outline">
                                Ver Portfólio
                            </a>
                        </div>

                        <!-- Estatísticas -->
                        <div class="hero-stats">
                            <div class="hero-stat">
                                <div class="hero-stat-num">+500</div>
                                <div class="hero-stat-label">Imóveis Vendidos</div>
                            </div>
                            <div class="hero-stat">
                                <div class="hero-stat-num">+10</div>
                                <div class="hero-stat-label">Anos de Mercado</div>
                            </div>
                            <div class="hero-stat">
                                <div class="hero-stat-num">100%</div>
                                <div class="hero-stat-label">Satisfação</div>
                            </div>
                        </div>
                    </div>

                    <!-- Foto do Corretor -->
                    <div class="hero-profile">
                        <div class="hero-profile-frame"></div>
                        <img src="https://i.imgur.com/NouCHp8.png"
                             alt="Thiago Bostock - Corretor de Imóveis"
                             loading="eager">
                        <div class="hero-badge">
                            <div class="hero-badge-num">CRECI</div>
                            <div class="hero-badge-text"><?php echo TB_CRECI; ?> — BA</div>
                        </div>
                    </div>

                </div><!-- .hero-inner -->
            </div><!-- .container -->
        </div><!-- .hero-content-wrap -->

        <!-- Indicador de scroll -->
        <div class="hero-scroll" aria-hidden="true">
            <span>Explore</span>
            <div class="hero-scroll-line"></div>
        </div>

    </section><!-- .hero-section -->


    <!-- ============================
         2. BARRA DE BUSCA
         ============================ -->
    <div class="search-wrap">
        <div class="container">
            <div class="search-box">
                <form class="search-form" id="tb-search-form" role="search" aria-label="Buscar imóveis" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
                    <input type="hidden" name="post_type" value="imovel">

                    <div class="search-field" style="flex: 2;">
                        <label for="search-keyword">O que você procura?</label>
                        <input type="text" id="search-keyword" name="s" placeholder="Ex: Casa com piscina, Apartamento 3 quartos...">
                    </div>

                    <div class="search-field">
                        <label for="search-tipo">Tipo de Imóvel</label>
                        <select id="search-tipo" name="tipo">
                            <option value="">Todos os tipos</option>
                            <option value="casa">Casa</option>
                            <option value="apartamento">Apartamento</option>
                            <option value="terreno">Terreno</option>
                            <option value="comercial">Comercial</option>
                        </select>
                    </div>

                    <div class="search-field">
                        <label for="search-finalidade">Finalidade</label>
                        <select id="search-finalidade" name="finalidade">
                            <option value="">Comprar ou Alugar</option>
                            <option value="venda">Comprar</option>
                            <option value="aluguel">Alugar</option>
                            <option value="lancamento">Lançamento</option>
                        </select>
                    </div>

                    <button type="submit" class="search-submit" aria-label="Buscar imóveis">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                        </svg>
                        Buscar
                    </button>
                </form>
            </div>
        </div>
    </div><!-- .search-wrap -->


    <!-- ============================
         3. IMÓVEIS EM DESTAQUE
         ============================ -->
    <section class="section-py" id="imoveis" aria-label="Imóveis em destaque">
        <div class="container">

            <div class="section-header">
                <div>
                    <span class="section-label">Portfólio Exclusivo</span>
                    <h2 class="section-title">Imóveis em <span>Destaque</span></h2>
                </div>
                <a href="<?php echo esc_url( get_post_type_archive_link('imovel') ); ?>" class="view-all">
                    Ver todos os imóveis
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <line x1="5" x2="19" y1="12" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>

            <!-- Grid de Cards -->
            <div class="properties-grid" id="properties-grid">
                <?php
                $args_imoveis = [
                    'post_type'      => 'imovel',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];
                $q_imoveis = new WP_Query( $args_imoveis );

                if ( $q_imoveis->have_posts() ) :
                    while ( $q_imoveis->have_posts() ) : $q_imoveis->the_post();
                        get_template_part( 'template-parts/card-imovel' );
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Placeholders quando não há imóveis cadastrados
                    $placeholders = [
                        [ 'Mansão Alphaville', 'R$ 4.500.000', 'Alphaville, BA',      '4', '6', '450', 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800&q=80' ],
                        [ 'Penthouse Luxo',    'R$ 8.200.000', 'Barreiras, BA',        '5', '7', '620', 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=800&q=80' ],
                        [ 'Casa Moderna',      'R$ 1.900.000', 'Barreiras, BA',        '3', '4', '280', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80' ],
                        [ 'Cobertura Premium', 'R$ 3.200.000', 'Centro, Barreiras',    '4', '5', '380', 'https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?w=800&q=80' ],
                        [ 'Villa Exclusiva',   'R$ 6.800.000', 'Barreiras, BA',        '5', '8', '750', 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=800&q=80' ],
                        [ 'Studio Moderno',    'R$ 580.000',   'Centro, Barreiras',    '1', '2', '68',  'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=80' ],
                    ];

                    foreach ( $placeholders as $p ) :
                    ?>
                    <article class="property-card">
                        <div class="property-card-media">
                            <img src="<?php echo esc_url( $p[6] ); ?>" alt="<?php echo esc_attr( $p[0] ); ?>" loading="lazy">
                            <span class="property-badge">Destaque</span>
                            <div class="property-price"><?php echo esc_html( $p[1] ); ?></div>
                        </div>
                        <div class="property-card-body">
                            <div class="property-location">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <?php echo esc_html( $p[2] ); ?>
                            </div>
                            <h3 class="property-title"><?php echo esc_html( $p[0] ); ?></h3>
                            <div class="property-features">
                                <div class="property-feature">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 20h20"/><rect width="18" height="12" x="3" y="8" rx="2"/><path d="M15 8V5a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v3"/></svg>
                                    <?php echo esc_html( $p[3] ); ?> Qts
                                </div>
                                <div class="property-feature">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 6 6.5 3.5a1.5 1.5 0 0 0-2.12 0L3.5 4.38a1.5 1.5 0 0 0 0 2.12L6 9"/><path d="M10 16 7 19c-1.1 1.1-1.1 2.9 0 4s2.9 1.1 4 0l3-3"/><path d="M14.7 5.3a2 2 0 0 1 2.8 0l2.5 2.5a2 2 0 0 1 0 2.8L9 21H3v-6Z"/></svg>
                                    <?php echo esc_html( $p[4] ); ?> Banh
                                </div>
                                <div class="property-feature">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><line x1="3" x2="21" y1="9" y2="9"/><line x1="3" x2="21" y1="15" y2="15"/><line x1="9" x2="9" y1="9" y2="21"/><line x1="15" x2="15" y1="9" y2="21"/></svg>
                                    <?php echo esc_html( $p[5] ); ?>m²
                                </div>
                            </div>
                            <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá! Tenho interesse no imóvel: ' . $p[0] ) ); ?>"
                               class="property-btn" target="_blank" rel="noopener noreferrer">
                                Tenho Interesse
                            </a>
                        </div>
                    </article>
                    <?php
                    endforeach;
                endif;
                ?>
            </div><!-- .properties-grid -->

        </div>
    </section>


    <!-- ============================
         4. SOBRE O CORRETOR
         ============================ -->
    <section class="about-section section-py" id="sobre" aria-label="Sobre Thiago Bostock">
        <div class="container">
            <div class="about-inner">

                <!-- Imagem -->
                <div class="about-media">
                    <div class="about-img-wrap">
                        <img src="https://i.imgur.com/r93bu5p.jpeg"
                             alt="Thiago Bostock - Corretor de Imóveis"
                             loading="lazy">
                    </div>
                    <div class="about-accent-box"></div>
                </div>

                <!-- Texto -->
                <div class="about-content">
                    <span class="section-label">O Profissional</span>
                    <h2 class="section-title">Thiago <span>Bostock</span></h2>

                    <p class="about-text">
                        Com mais de uma década de experiência no mercado imobiliário da Bahia, Thiago Bostock tornou-se sinônimo de credibilidade, resultado e atendimento de excelência. Credenciado pelo CRECI <?php echo TB_CRECI; ?>, atua com total transparência em cada negociação.
                    </p>
                    <p class="about-text">
                        Sua missão é simples: <strong style="color: #D4AF37;">construir com sabedoria é investir com sucesso</strong>. Cada imóvel apresentado é analisado criteriosamente para garantir o melhor retorno e segurança jurídica para seus clientes.
                    </p>

                    <div class="about-stats">
                        <div>
                            <div class="about-stat-num">+500</div>
                            <div class="about-stat-label">Imóveis Vendidos</div>
                        </div>
                        <div>
                            <div class="about-stat-num">+10</div>
                            <div class="about-stat-label">Anos de Mercado</div>
                        </div>
                        <div>
                            <div class="about-stat-num">100%</div>
                            <div class="about-stat-label">Comprometimento</div>
                        </div>
                        <div>
                            <div class="about-stat-num">CRECI</div>
                            <div class="about-stat-label"><?php echo TB_CRECI; ?></div>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; margin-top: 40px; flex-wrap: wrap;">
                        <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>"
                           class="btn btn-gold"
                           target="_blank"
                           rel="noopener noreferrer">
                            Falar com Thiago
                        </a>
                        <a href="#servicos" class="btn btn-outline">Nossos Serviços</a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================
         5. SERVIÇOS
         ============================ -->
    <section class="services-section section-py" id="servicos" aria-label="Serviços">
        <div class="services-glow" aria-hidden="true"></div>
        <div class="container" style="position: relative; z-index: 1;">

            <div class="section-header-center">
                <span class="section-label">O que fazemos</span>
                <h2 class="section-title">Consultoria <span>Estratégica</span></h2>
                <p class="section-desc">Muito além da intermediação imobiliária. Oferecemos assessoria completa para seu patrimônio crescer com segurança.</p>
            </div>

            <div class="services-grid">

                <?php
                $services = [
                    [
                        'icon'  => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
                        'title' => 'Compra e Venda',
                        'desc'  => 'Intermediação profissional com análise de mercado, documentação e negociação para o melhor negócio.',
                    ],
                    [
                        'icon'  => '<line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>',
                        'title' => 'Financiamento',
                        'desc'  => 'Trabalhamos com os principais bancos para conseguir a menor taxa de juros e as melhores condições para você.',
                    ],
                    [
                        'icon'  => '<path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="9" x2="15" y1="12" y2="12"/><line x1="9" x2="12" y1="16" y2="16"/>',
                        'title' => 'Imposto de Renda',
                        'desc'  => 'Orientação especializada sobre ganho de capital, declaração de bens imóveis e regularização perante a Receita Federal.',
                    ],
                    [
                        'icon'  => '<path d="M2 20h.01"/><path d="M7 20v-4"/><path d="M12 20v-8"/><path d="M17 20v-12"/><path d="M22 4v16"/>',
                        'title' => 'Investimentos',
                        'desc'  => 'Identificamos oportunidades com alto potencial de valorização. Análise criteriosa de rentabilidade e liquidez.',
                    ],
                    [
                        'icon'  => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/><path d="M11 8v3h3"/>',
                        'title' => 'Avaliação de Imóveis',
                        'desc'  => 'Laudo técnico preciso com base em dados reais de mercado para compra, venda, locação ou inventário.',
                    ],
                    [
                        'icon'  => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
                        'title' => 'Consultoria Exclusiva',
                        'desc'  => 'Atendimento personalizado do início ao fim: do primeiro contato à assinatura do contrato e muito além.',
                    ],
                ];

                foreach ( $services as $s ) :
                ?>
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <?php echo $s['icon']; ?>
                        </svg>
                    </div>
                    <h3 class="service-title"><?php echo esc_html( $s['title'] ); ?></h3>
                    <p class="service-desc"><?php echo esc_html( $s['desc'] ); ?></p>
                    <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá! Quero saber mais sobre o serviço de ' . $s['title'] ) ); ?>"
                       class="service-link" target="_blank" rel="noopener noreferrer">
                        Saber mais
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <line x1="5" x2="19" y1="12" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- ============================
         6. FINANCIAMENTO
         ============================ -->
    <section class="financing-section section-py" id="financiamento" aria-label="Taxas de financiamento">
        <div class="container">
            <div class="financing-inner">

                <!-- Lista de Taxas -->
                <div>
                    <span class="section-label">Planejamento Financeiro</span>
                    <h2 class="section-title">Taxas de <span>Financiamento</span></h2>
                    <p class="section-desc" style="margin-bottom: 0;">Compare as taxas dos principais bancos e escolha a melhor condição para o seu perfil.</p>

                    <div class="rates-list">
                        <?php
                        $bancos = [
                            [ 'Caixa Econômica',  '11,19% a.a + TR', 'CEF' ],
                            [ 'Itaú Unibanco',    '12,47% a.a + TR', 'ITÁ' ],
                            [ 'Santander',        '12,99% a.a + TR', 'SAN' ],
                            [ 'Bradesco',         '13,13% a.a + TR', 'BRA' ],
                            [ 'Banco do Brasil',  '13,76% a.a + TR', 'BB'  ],
                        ];
                        foreach ( $bancos as $b ) :
                        ?>
                        <div class="rate-row">
                            <div class="rate-bank">
                                <div class="rate-logo"><?php echo esc_html( $b[2] ); ?></div>
                                <span class="rate-bank-name"><?php echo esc_html( $b[0] ); ?></span>
                            </div>
                            <span class="rate-value"><?php echo esc_html( $b[1] ); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <p class="rate-note">* Taxas sujeitas à análise de crédito, renda e relacionamento bancário. Consulte condições vigentes.</p>
                </div>

                <!-- Simulador -->
                <div class="simulator-card">
                    <div class="simulator-inner">
                        <p class="simulator-label">Simulador de Crédito</p>

                        <div class="simulator-field">
                            <div class="simulator-field-header">
                                <span>Valor do Imóvel</span>
                                <span id="valor-display">R$ 600.000</span>
                            </div>
                            <input type="range"
                                   class="simulator-range"
                                   id="simulator-valor"
                                   min="100000"
                                   max="5000000"
                                   step="50000"
                                   value="600000"
                                   aria-label="Valor do imóvel">
                        </div>

                        <div class="simulator-field">
                            <div class="simulator-field-header">
                                <span>Prazo</span>
                                <span id="prazo-display">360 meses</span>
                            </div>
                            <input type="range"
                                   class="simulator-range"
                                   id="simulator-prazo"
                                   min="60"
                                   max="420"
                                   step="12"
                                   value="360"
                                   aria-label="Prazo em meses">
                        </div>

                        <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá! Quero simular um financiamento imobiliário.' ) ); ?>"
                           class="simulator-cta"
                           target="_blank"
                           rel="noopener noreferrer">
                            Solicitar Simulação Grátis
                        </a>
                    </div>

                    <div class="simulator-contact">
                        <div class="simulator-contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="#25D366">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="simulator-contact-label">Dúvidas? Fale com Thiago</div>
                            <div class="simulator-contact-num"><?php echo TB_PHONE; ?></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================
         7. NEWSLETTER / CTA
         ============================ -->
    <section class="newsletter-section" aria-label="Cadastro de newsletter">
        <div class="container">
            <div class="newsletter-inner">
                <div>
                    <h2 class="newsletter-title">Receba <span>Oportunidades</span> Exclusivas</h2>
                    <p class="newsletter-subtitle">Seja o primeiro a saber sobre lançamentos e imóveis premium antes de chegarem ao mercado.</p>
                </div>
                <form class="newsletter-form" id="tb-newsletter-form" novalidate>
                    <input type="email"
                           class="newsletter-input"
                           placeholder="Seu melhor e-mail"
                           required
                           aria-label="Seu e-mail">
                    <button type="submit" class="newsletter-btn">Quero Receber</button>
                </form>
            </div>
        </div>
    </section>


    <!-- ============================
         8. DEPOIMENTOS
         ============================ -->
    <section class="testimonials-section section-py" aria-label="Depoimentos de clientes">
        <div class="container">
            <div class="section-header-center">
                <span class="section-label">Clientes Satisfeitos</span>
                <h2 class="section-title">O que dizem sobre <span>Thiago</span></h2>
            </div>

            <div class="testimonials-grid">
                <?php
                $testimonials = [
                    [ 'M', 'Melhor corretor que já trabalhei! Super profissional e honesto. Me ajudou a encontrar o imóvel perfeito dentro do meu orçamento sem stress.', 'Marcos Oliveira', 'Barreiras, BA', '★★★★★' ],
                    [ 'A', 'O Thiago cuidou de tudo, da avaliação ao financiamento. Conseguiu uma taxa incrível no banco que eu nem sabia que existia. Recomendo muito!', 'Ana Carolina Lima', 'Luís Eduardo, BA', '★★★★★' ],
                    [ 'R', 'Atendimento exclusivo de verdade. Ele me atendeu até nos fins de semana. Vendeu minha casa em tempo recorde pelo valor pedido.', 'Roberto Santos', 'Barreiras, BA', '★★★★★' ],
                ];

                foreach ( $testimonials as $t ) :
                ?>
                <div class="testimonial-card">
                    <div class="testimonial-stars" aria-label="5 estrelas"><?php echo $t[4]; ?></div>
                    <p class="testimonial-text"><?php echo esc_html( $t[1] ); ?></p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar" aria-hidden="true"><?php echo esc_html( $t[0] ); ?></div>
                        <div>
                            <div class="testimonial-name"><?php echo esc_html( $t[2] ); ?></div>
                            <div class="testimonial-city"><?php echo esc_html( $t[3] ); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================
         9. CONTATO
         ============================ -->
    <section class="contact-section section-py" id="contato" aria-label="Formulário de contato">
        <div class="container">

            <div class="section-header-center">
                <span class="section-label">Fale com Thiago</span>
                <h2 class="section-title">Entre em <span>Contato</span></h2>
                <p class="section-desc">Atendimento exclusivo e personalizado. Respondo pessoalmente cada mensagem.</p>
            </div>

            <div class="contact-inner">

                <!-- Informações de Contato -->
                <div class="contact-info">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label">WhatsApp / Telefone</div>
                            <div class="contact-value">
                                <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" target="_blank" style="color: var(--gold);">
                                    <?php echo TB_PHONE; ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label">E-mail</div>
                            <div class="contact-value">
                                <a href="mailto:contato@thiagobostock.com.br" style="color: var(--gold);">
                                    contato@thiagobostock.com.br
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label">Localização</div>
                            <div class="contact-value">Barreiras, Bahia — Brasil</div>
                        </div>
                    </div>

                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label">Horário de Atendimento</div>
                            <div class="contact-value">Seg–Sex: 8h–18h | Sáb: 8h–12h</div>
                        </div>
                    </div>

                    <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá Thiago! Vim pelo site e quero mais informações.' ) ); ?>"
                       class="btn btn-whatsapp"
                       target="_blank"
                       rel="noopener noreferrer"
                       style="margin-top: 20px; border-radius: 12px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Iniciar Conversa no WhatsApp
                    </a>
                </div>

                <!-- Formulário -->
                <form class="contact-form" id="tb-contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">Nome Completo *</label>
                            <input type="text" id="contact-name" name="name" placeholder="Seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="contact-email">E-mail *</label>
                            <input type="email" id="contact-email" name="email" placeholder="seu@email.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-phone">Telefone</label>
                            <input type="tel" id="contact-phone" name="phone" placeholder="(77) 9 9999-9999">
                        </div>
                        <div class="form-group">
                            <label for="contact-interest">Interesse</label>
                            <select id="contact-interest" name="interest">
                                <option value="">Selecione...</option>
                                <option value="comprar">Quero Comprar</option>
                                <option value="vender">Quero Vender</option>
                                <option value="financiar">Financiamento</option>
                                <option value="avaliar">Avaliação de Imóvel</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-message">Mensagem *</label>
                        <textarea id="contact-message" name="message" rows="5" placeholder="Descreva o que você procura ou sua dúvida..." required></textarea>
                    </div>

                    <div id="form-feedback" style="display:none; padding: 12px 16px; border-radius: 8px; font-size: 14px; font-weight: 600;"></div>

                    <button type="submit" class="form-submit" id="form-submit-btn">
                        Enviar Mensagem
                    </button>
                </form>

            </div>
        </div>
    </section>

</main><!-- #primary -->

<?php get_footer(); ?>
