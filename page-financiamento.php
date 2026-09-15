<?php
/**
 * page-financiamento.php - Página de Financiamento
 * Template: Financiamento
 *
 * @package Thiago_Bostock
 */

get_header(); ?>

<main id="primary" class="site-main">

    <div style="padding-top: 120px; background: var(--black);">
        <div class="container" style="padding-bottom: 100px;">

            <div style="text-align: center; padding-top: 60px; padding-bottom: 80px;">
                <span class="section-label">Crédito Imobiliário</span>
                <h1 class="section-title">Taxas de <span>Financiamento</span></h1>
                <p class="section-desc">Compare as taxas dos principais bancos e realize o sonho do seu imóvel com as melhores condições do mercado.</p>
            </div>

            <div class="financing-inner">
                <!-- Tabela de Taxas -->
                <div>
                    <div class="rates-list">
                        <?php
                        $bancos = [
                            [ 'Caixa Econômica Federal', '11,19% a.a + TR', 'CEF' ],
                            [ 'Itaú Unibanco',           '12,47% a.a + TR', 'ITÁ' ],
                            [ 'Banco Santander',         '12,99% a.a + TR', 'SAN' ],
                            [ 'Banco Bradesco',          '13,13% a.a + TR', 'BRA' ],
                            [ 'Banco do Brasil',         '13,76% a.a + TR', 'BB'  ],
                        ];
                        foreach ( $bancos as $b ) :
                        ?>
                        <div class="rate-row">
                            <div class="rate-bank">
                                <div class="rate-logo"><?php echo esc_html($b[2]); ?></div>
                                <span class="rate-bank-name"><?php echo esc_html($b[0]); ?></span>
                            </div>
                            <span class="rate-value"><?php echo esc_html($b[1]); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <p class="rate-note">* Taxas de referência. Sujeitas à análise de crédito e renda. Consulte o corretor para simular.</p>

                    <div style="margin-top: 48px; padding: 32px; background: var(--gray-800); border: 1px solid rgba(212,175,55,0.15); border-radius: 20px;">
                        <h3 style="color: var(--gold); font-size: 1.2rem; font-weight: 800; text-transform: uppercase; margin-bottom: 16px;">Como funciona?</h3>
                        <ul style="color: rgba(255,255,255,0.6); line-height: 2.2; padding-left: 0; list-style: none;">
                            <li>✓ Análise gratuita do seu perfil de crédito</li>
                            <li>✓ Simulação com os melhores bancos</li>
                            <li>✓ Acompanhamento do processo até a aprovação</li>
                            <li>✓ Orientação sobre documentação necessária</li>
                            <li>✓ Suporte jurídico na escritura</li>
                        </ul>
                    </div>
                </div>

                <!-- Simulador -->
                <div class="simulator-card">
                    <div class="simulator-inner">
                        <p class="simulator-label">Simule seu Financiamento</p>
                        <div class="simulator-field">
                            <div class="simulator-field-header">
                                <span>Valor do Imóvel</span>
                                <span id="valor-display">R$ 600.000</span>
                            </div>
                            <input type="range" class="simulator-range" id="simulator-valor" min="100000" max="5000000" step="50000" value="600000">
                        </div>
                        <div class="simulator-field">
                            <div class="simulator-field-header">
                                <span>Prazo (meses)</span>
                                <span id="prazo-display">360 meses</span>
                            </div>
                            <input type="range" class="simulator-range" id="simulator-prazo" min="60" max="420" step="12" value="360">
                        </div>
                        <a href="<?php echo esc_url( tb_whatsapp_link('Olá! Quero simular um financiamento imobiliário.') ); ?>"
                           class="simulator-cta" target="_blank" rel="noopener noreferrer">
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
                            <div class="simulator-contact-label">Fale com o especialista</div>
                            <div class="simulator-contact-num"><?php echo TB_PHONE; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
