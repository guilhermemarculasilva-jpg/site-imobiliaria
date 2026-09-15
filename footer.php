    </div><!-- #content .site-content -->

    <!-- ============================
         FOOTER
         ============================ -->
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">

            <!-- Grid do Footer -->
            <div class="footer-top">

                <!-- Coluna 1: Marca -->
                <div class="footer-col">
                    <a href="<?php echo esc_url( home_url('/') ); ?>" class="site-logo footer-logo" aria-label="Thiago Bostock">
                        <?php tb_logo(); ?>
                        <div class="logo-text-wrapper">
                            <span class="logo-name">Thiago Bostock</span>
                            <span class="logo-creci">CRECI <?php echo TB_CRECI; ?></span>
                        </div>
                    </a>
                    <p class="footer-brand-desc">
                        Consultoria imobiliária de alto padrão em Barreiras e região. Comprometido com resultados sólidos e atendimento exclusivo.
                    </p>
                    <div class="footer-socials">
                        <a href="https://instagram.com/" target="_blank" rel="noopener" class="footer-social" aria-label="Instagram">IG</a>
                        <a href="https://facebook.com/"  target="_blank" rel="noopener" class="footer-social" aria-label="Facebook">FB</a>
                        <a href="https://linkedin.com/"  target="_blank" rel="noopener" class="footer-social" aria-label="LinkedIn">IN</a>
                        <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" target="_blank" rel="noopener" class="footer-social" aria-label="WhatsApp">WA</a>
                    </div>
                </div>

                <!-- Coluna 2: Menu -->
                <div class="footer-col">
                    <h4 class="footer-col-title">Navegação</h4>
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => 'tb_footer_fallback_nav',
                    ] );
                    ?>
                </div>

                <!-- Coluna 3: Serviços -->
                <div class="footer-col">
                    <h4 class="footer-col-title">Serviços</h4>
                    <ul class="footer-menu">
                        <li><a href="<?php echo esc_url( home_url('/#servicos') ); ?>">Compra e Venda</a></li>
                        <li><a href="<?php echo esc_url( home_url('/#servicos') ); ?>">Avaliação de Imóveis</a></li>
                        <li><a href="<?php echo esc_url( home_url('/#financiamento') ); ?>">Financiamento</a></li>
                        <li><a href="<?php echo esc_url( home_url('/#servicos') ); ?>">Imposto de Renda</a></li>
                        <li><a href="<?php echo esc_url( home_url('/#servicos') ); ?>">Consultoria</a></li>
                    </ul>
                </div>

                <!-- Coluna 4: Contato -->
                <div class="footer-col">
                    <h4 class="footer-col-title">Contato Exclusivo</h4>
                    <ul class="footer-menu">
                        <li style="color: rgba(255,255,255,0.6); margin-bottom: 8px;">
                            <strong style="color: #D4AF37; display: block; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 4px;">WhatsApp</strong>
                            <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" target="_blank"><?php echo TB_PHONE; ?></a>
                        </li>
                        <li style="color: rgba(255,255,255,0.6); margin-bottom: 8px;">
                            <strong style="color: #D4AF37; display: block; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 4px;">E-mail</strong>
                            <a href="mailto:contato@thiagobostock.com.br">contato@thiagobostock.com.br</a>
                        </li>
                        <li style="color: rgba(255,255,255,0.6);">
                            <strong style="color: #D4AF37; display: block; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 4px;">Localização</strong>
                            Barreiras, Bahia — Brasil
                        </li>
                    </ul>
                    <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá! Vi seu site e quero tirar uma dúvida.' ) ); ?>"
                       class="btn btn-whatsapp"
                       target="_blank"
                       rel="noopener noreferrer"
                       style="margin-top: 24px; border-radius: 8px; padding: 12px 24px; font-size: 10px;">
                        Falar pelo WhatsApp
                    </a>
                </div>

            </div><!-- .footer-top -->

            <!-- Rodapé inferior -->
            <div class="footer-bottom">
                <p class="footer-copy">
                    &copy; <?php echo date('Y'); ?>
                    <a href="<?php echo esc_url( home_url('/') ); ?>" style="color: var(--white-40);">Thiago Bostock Consultoria Imobiliária</a>.
                    Todos os direitos reservados.
                </p>
                <span class="footer-creci">CRECI <?php echo TB_CRECI; ?>-BA &bull; COFECI</span>
            </div>

        </div><!-- .container -->
    </footer><!-- #colophon -->

</div><!-- #page .site-wrapper -->

<!-- ============================
     BOTÃO WHATSAPP FLUTUANTE
     ============================ -->
<a href="<?php echo esc_url( tb_whatsapp_link( 'Olá, Thiago! Vi seu site e gostaria de mais informações sobre imóveis.' ) ); ?>"
   class="whatsapp-float"
   target="_blank"
   rel="noopener noreferrer"
   aria-label="Falar com Thiago Bostock pelo WhatsApp">
    <span class="whatsapp-tooltip">Fale comigo agora!</span>
    <!-- Ícone WhatsApp SVG -->
    <svg width="28" height="28" viewBox="0 0 24 24" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
</a>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Fallback nav do footer
 */
function tb_footer_fallback_nav() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . esc_url( home_url('/') )              . '">Início</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#imoveis') )      . '">Imóveis</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#sobre') )        . '">Sobre</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#servicos') )     . '">Serviços</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#financiamento') ). '">Financiamento</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#contato') )      . '">Contato</a></li>';
    echo '</ul>';
}
