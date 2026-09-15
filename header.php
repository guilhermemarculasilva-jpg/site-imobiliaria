<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'tb-theme' ); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">

    <!-- ============================
         HEADER / NAVBAR
         ============================ -->
    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="header-inner">

                <!-- Logo -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo('name'); ?> - Ir para a página inicial">
                    <?php tb_logo(); ?>
                    <div class="logo-text-wrapper">
                        <span class="logo-name">Thiago Bostock</span>
                        <span class="logo-creci">CRECI <?php echo TB_CRECI; ?></span>
                    </div>
                </a>

                <!-- Navegação Desktop -->
                <nav class="main-nav" id="site-navigation" role="navigation" aria-label="Menu Principal">
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => 'tb_fallback_nav',
                    ] );
                    ?>
                </nav>

                <!-- Ações do Header -->
                <div class="header-cta">
                    <a href="<?php echo esc_url( tb_whatsapp_link( 'Olá! Vim pelo site e gostaria de atendimento exclusivo.' ) ); ?>"
                       class="btn btn-gold"
                       target="_blank"
                       rel="noopener noreferrer">
                        Atendimento Exclusivo
                    </a>

                    <!-- Botão Hamburguer -->
                    <button class="hamburger" id="hamburger" aria-label="Abrir menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

            </div><!-- .header-inner -->
        </div><!-- .container -->
    </header><!-- #masthead -->

    <!-- Menu Mobile (abre em overlay) -->
    <div class="mobile-menu" id="mobile-menu" role="dialog" aria-label="Menu Mobile">
        <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Fechar menu">&times;</button>
        <a href="<?php echo esc_url( home_url('/') ); ?>">Início</a>
        <a href="<?php echo esc_url( home_url('/#imoveis') ); ?>">Imóveis</a>
        <a href="<?php echo esc_url( home_url('/#sobre') ); ?>">Sobre</a>
        <a href="<?php echo esc_url( home_url('/#servicos') ); ?>">Serviços</a>
        <a href="<?php echo esc_url( home_url('/#financiamento') ); ?>">Financiamento</a>
        <a href="<?php echo esc_url( home_url('/#contato') ); ?>">Contato</a>
        <a href="<?php echo esc_url( tb_whatsapp_link() ); ?>" target="_blank" style="color: #25D366;">
            <?php echo TB_PHONE; ?>
        </a>
    </div>

    <!-- Conteúdo principal da página começa aqui -->
    <div id="content" class="site-content">

<?php
/**
 * Fallback para o menu quando nenhum foi cadastrado no WordPress
 */
function tb_fallback_nav() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url( home_url('/') ) . '">Início</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#imoveis') ) . '">Imóveis</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#sobre') ) . '">Sobre</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#servicos') ) . '">Serviços</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#financiamento') ) . '">Financiamento</a></li>';
    echo '<li><a href="' . esc_url( home_url('/#contato') ) . '">Contato</a></li>';
    echo '</ul>';
}
