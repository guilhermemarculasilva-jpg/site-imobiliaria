<?php
/**
 * page-contato.php - Página de Contato
 * Template: Contato
 *
 * @package Thiago_Bostock
 */

get_header(); ?>

<main id="primary" class="site-main">

    <div style="padding-top: 120px; background: var(--black); padding-bottom: 100px;">
        <div class="container">

            <div style="text-align: center; padding-top: 60px; padding-bottom: 80px;">
                <span class="section-label">Atendimento Exclusivo</span>
                <h1 class="section-title">Fale com <span>Thiago</span></h1>
                <p class="section-desc">Respondo pessoalmente cada mensagem. Atendimento humanizado e sem burocracia.</p>
            </div>

            <div class="contact-inner">
                <!-- Info -->
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
                                <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" style="color: var(--gold);"><?php echo TB_PHONE; ?></a>
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
                                <a href="mailto:contato@thiagobostock.com.br" style="color: var(--gold);">contato@thiagobostock.com.br</a>
                            </div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <div class="contact-label">Localização</div>
                            <div class="contact-value">Barreiras, Bahia — Brasil</div>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" class="btn btn-whatsapp" target="_blank" rel="noopener noreferrer" style="margin-top: 16px; border-radius: 12px;">
                        Abrir WhatsApp
                    </a>
                </div>

                <!-- Formulário -->
                <form class="contact-form" id="tb-contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="c-name">Nome *</label>
                            <input type="text" id="c-name" name="name" placeholder="Seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="c-email">E-mail *</label>
                            <input type="email" id="c-email" name="email" placeholder="seu@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="c-phone">Telefone</label>
                        <input type="tel" id="c-phone" name="phone" placeholder="(77) 9 9999-9999">
                    </div>
                    <div class="form-group">
                        <label for="c-message">Mensagem *</label>
                        <textarea id="c-message" name="message" rows="6" placeholder="Como posso ajudar?" required></textarea>
                    </div>
                    <div id="form-feedback" style="display:none; padding: 12px 16px; border-radius: 8px; font-size: 14px; font-weight: 600;"></div>
                    <button type="submit" class="form-submit" id="form-submit-btn">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
