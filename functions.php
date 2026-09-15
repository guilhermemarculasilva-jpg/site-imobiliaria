<?php
/**
 * Thiago Bostock Imóveis - functions.php
 * Funções principais do tema WordPress
 *
 * @package Thiago_Bostock
 * @version 1.0.0
 */

// Segurança: impede acesso direto ao arquivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// =====================================================
// CONSTANTES DO TEMA
// =====================================================
define( 'TB_VERSION',   '1.0.0' );
define( 'TB_DIR',       get_template_directory() );
define( 'TB_URI',       get_template_directory_uri() );
define( 'TB_PHONE',     '(77) 99155-5610' );
define( 'TB_WHATSAPP',  '5577991555610' );
define( 'TB_CRECI',     '36.772' );

// =====================================================
// CONFIGURAÇÕES DO TEMA
// =====================================================
if ( ! function_exists( 'tb_setup' ) ) :
    function tb_setup() {
        // Tradução
        load_theme_textdomain( 'thiago-bostock', TB_DIR . '/languages' );

        // WordPress gerencia o <title>
        add_theme_support( 'title-tag' );

        // Imagens destacadas
        add_theme_support( 'post-thumbnails' );

        // Feed automático
        add_theme_support( 'automatic-feed-links' );

        // HTML5
        add_theme_support( 'html5', [
            'search-form', 'comment-form', 'comment-list',
            'gallery', 'caption', 'style', 'script',
        ] );

        // Logo customizável via Customizer
        add_theme_support( 'custom-logo', [
            'height'      => 80,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ] );

        // Tamanhos de imagem personalizados para imóveis
        add_image_size( 'imovel-card',   800,  560, true );
        add_image_size( 'imovel-hero',  1920,  800, true );
        add_image_size( 'imovel-thumb',  400,  280, true );

        // Menus de navegação
        register_nav_menus( [
            'primary' => __( 'Menu Principal', 'thiago-bostock' ),
            'footer'  => __( 'Menu Rodapé',    'thiago-bostock' ),
        ] );

        // Suporte a cores de bloco
        add_theme_support( 'editor-color-palette', [
            [ 'name' => 'Dourado', 'slug' => 'gold',  'color' => '#D4AF37' ],
            [ 'name' => 'Preto',   'slug' => 'black', 'color' => '#080808' ],
            [ 'name' => 'Branco',  'slug' => 'white', 'color' => '#ffffff' ],
        ] );
    }
endif;
add_action( 'after_setup_theme', 'tb_setup' );

// =====================================================
// ENQUEUE DE ESTILOS E SCRIPTS
// =====================================================
function tb_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'tb-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;900&display=swap',
        [],
        null
    );

    // CSS principal do tema (style.css da raiz - obrigatório WordPress)
    wp_enqueue_style(
        'tb-style',
        get_stylesheet_uri(),
        [ 'tb-google-fonts' ],
        TB_VERSION
    );

    // JavaScript principal
    wp_enqueue_script(
        'tb-main',
        TB_URI . '/assets/js/main.js',
        [ 'jquery' ],
        TB_VERSION,
        true // no footer
    );

    // Passa dados do PHP para o JS via wp_localize_script
    wp_localize_script( 'tb-main', 'TB_DATA', [
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'tb_nonce' ),
        'homeUrl'   => home_url('/'),
        'whatsapp'  => TB_WHATSAPP,
        'phone'     => TB_PHONE,
    ] );

    // Script de comentários (apenas quando necessário)
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'tb_scripts' );

// =====================================================
// CUSTOM POST TYPE - IMÓVEL
// =====================================================
function tb_register_post_types() {
    $labels = [
        'name'               => 'Imóveis',
        'singular_name'      => 'Imóvel',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Imóvel',
        'edit_item'          => 'Editar Imóvel',
        'new_item'           => 'Novo Imóvel',
        'view_item'          => 'Ver Imóvel',
        'search_items'       => 'Buscar Imóveis',
        'not_found'          => 'Nenhum imóvel encontrado',
        'not_found_in_trash' => 'Nenhum imóvel na lixeira',
        'menu_name'          => 'Imóveis',
    ];

    register_post_type( 'imovel', [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => [ 'slug' => 'imoveis' ],
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'menu_icon'          => 'dashicons-building',
        'menu_position'      => 5,
        'show_in_rest'       => true,
    ] );
}
add_action( 'init', 'tb_register_post_types' );

// =====================================================
// TAXONOMIAS - TIPO E FINALIDADE
// =====================================================
function tb_register_taxonomies() {
    // Tipo de imóvel (Casa, Apartamento, Terreno...)
    register_taxonomy( 'tipo_imovel', 'imovel', [
        'label'        => 'Tipos de Imóvel',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'tipo' ],
        'show_in_rest' => true,
    ] );

    // Finalidade (Venda, Aluguel...)
    register_taxonomy( 'finalidade', 'imovel', [
        'label'        => 'Finalidade',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'finalidade' ],
        'show_in_rest' => true,
    ] );

    // Bairro / Localização
    register_taxonomy( 'localizacao', 'imovel', [
        'label'        => 'Localização',
        'hierarchical' => true,
        'rewrite'      => [ 'slug' => 'bairro' ],
        'show_in_rest' => true,
    ] );
}
add_action( 'init', 'tb_register_taxonomies' );

// =====================================================
// META BOXES - DADOS DO IMÓVEL
// =====================================================
function tb_add_meta_boxes() {
    add_meta_box(
        'tb_imovel_dados',
        'Dados do Imóvel',
        'tb_render_meta_box',
        'imovel',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'tb_add_meta_boxes' );

function tb_render_meta_box( $post ) {
    // Nonce de segurança
    wp_nonce_field( 'tb_save_meta', 'tb_meta_nonce' );

    // Campos do imóvel
    $campos = [
        'valor'        => 'Valor (ex: 450000)',
        'area'         => 'Área (m²)',
        'quartos'      => 'Quartos',
        'banheiros'    => 'Banheiros',
        'vagas'        => 'Vagas de Garagem',
        'endereco'     => 'Endereço Completo',
        'cidade'       => 'Cidade',
        'bairro'       => 'Bairro',
        'codigo'       => 'Código do Imóvel',
    ];

    echo '<table class="form-table">';
    foreach ( $campos as $key => $label ) :
        $valor = get_post_meta( $post->ID, '_tb_' . $key, true );
        printf(
            '<tr>
                <th><label for="tb_%1$s">%2$s</label></th>
                <td><input type="text" id="tb_%1$s" name="tb_%1$s" value="%3$s" style="width:100%%" /></td>
            </tr>',
            esc_attr( $key ),
            esc_html( $label ),
            esc_attr( $valor )
        );
    endforeach;
    echo '</table>';
}

function tb_save_meta( $post_id ) {
    // Verifica nonce
    if ( ! isset( $_POST['tb_meta_nonce'] ) || ! wp_verify_nonce( $_POST['tb_meta_nonce'], 'tb_save_meta' ) ) {
        return;
    }

    // Não salva em autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Verifica permissões
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $campos = [ 'valor', 'area', 'quartos', 'banheiros', 'vagas', 'endereco', 'cidade', 'bairro', 'codigo' ];

    foreach ( $campos as $key ) {
        if ( isset( $_POST[ 'tb_' . $key ] ) ) {
            update_post_meta( $post_id, '_tb_' . $key, sanitize_text_field( $_POST[ 'tb_' . $key ] ) );
        }
    }
}
add_action( 'save_post', 'tb_save_meta' );

// =====================================================
// HELPER FUNCTIONS
// =====================================================

/**
 * Retorna o valor do meta do imóvel formatado
 * @param string $key   - chave do meta (sem prefixo)
 * @param int    $post_id
 * @return string
 */
function tb_get_meta( $key, $post_id = null ) {
    if ( ! $post_id ) $post_id = get_the_ID();
    return get_post_meta( $post_id, '_tb_' . $key, true );
}

/**
 * Retorna o preço formatado em Real
 * @param int $post_id
 * @return string
 */
function tb_get_price( $post_id = null ) {
    $valor = tb_get_meta( 'valor', $post_id );
    if ( ! $valor ) return 'Consulte';
    return 'R$ ' . number_format( (float) $valor, 0, ',', '.' );
}

/**
 * Retorna o número de WhatsApp para links
 * @param string $msg - mensagem opcional
 * @return string URL do WhatsApp
 */
function tb_whatsapp_link( $msg = '' ) {
    $base = 'https://wa.me/' . TB_WHATSAPP;
    if ( $msg ) $base .= '?text=' . urlencode( $msg );
    return $base;
}

/**
 * Exibe a logo do tema
 */
function tb_logo() {
    // Usa o campo de logo do customizer
    if ( has_custom_logo() ) {
        $logo_id  = get_theme_mod( 'custom_logo' );
        $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );
        printf( '<img src="%s" alt="%s" class="logo-img">', esc_url( $logo_url ), esc_attr( get_bloginfo('name') ) );
    } else {
        // Fallback: logo SVG inline
        echo tb_logo_svg();
    }
}

/**
 * Logo SVG inline (baseada na identidade visual)
 */
function tb_logo_svg() {
    return '<svg width="48" height="48" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <polygon points="50,5 95,28 95,72 50,95 5,72 5,28" fill="none" stroke="#D4AF37" stroke-width="4"/>
        <polygon points="50,18 82,35 82,65 50,82 18,65 18,35" fill="none" stroke="#D4AF37" stroke-width="2" opacity="0.5"/>
        <path d="M28 58 L28 72 L72 72 L72 58 L50 38 Z" fill="#D4AF37" opacity="0.9"/>
        <rect x="42" y="56" width="16" height="16" fill="#080808" rx="2"/>
        <rect x="45" y="59" width="5" height="5" fill="#D4AF37" rx="1"/>
        <rect x="50" y="59" width="5" height="5" fill="#D4AF37" rx="1"/>
        <rect x="45" y="64" width="5" height="5" fill="#D4AF37" rx="1"/>
        <rect x="50" y="64" width="5" height="5" fill="#D4AF37" rx="1"/>
    </svg>';
}

// =====================================================
// AJAX - FILTRO DE IMÓVEIS
// =====================================================
function tb_filter_imoveis() {
    check_ajax_referer( 'tb_nonce', 'nonce' );

    $args = [
        'post_type'      => 'imovel',
        'posts_per_page' => 9,
        'post_status'    => 'publish',
    ];

    $tax_query = [];

    if ( ! empty( $_POST['tipo'] ) ) {
        $tax_query[] = [
            'taxonomy' => 'tipo_imovel',
            'field'    => 'slug',
            'terms'    => sanitize_text_field( $_POST['tipo'] ),
        ];
    }

    if ( ! empty( $_POST['finalidade'] ) ) {
        $tax_query[] = [
            'taxonomy' => 'finalidade',
            'field'    => 'slug',
            'terms'    => sanitize_text_field( $_POST['finalidade'] ),
        ];
    }

    if ( $tax_query ) {
        $args['tax_query'] = array_merge( [ 'relation' => 'AND' ], $tax_query );
    }

    if ( ! empty( $_POST['s'] ) ) {
        $args['s'] = sanitize_text_field( $_POST['s'] );
    }

    $query = new WP_Query( $args );
    $html  = '';

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            ob_start();
            get_template_part( 'template-parts/card-imovel' );
            $html .= ob_get_clean();
        endwhile;
        wp_reset_postdata();
    else :
        $html = '<p class="no-results">Nenhum imóvel encontrado com esses critérios.</p>';
    endif;

    wp_send_json_success( [ 'html' => $html ] );
}
add_action( 'wp_ajax_tb_filter_imoveis',        'tb_filter_imoveis' );
add_action( 'wp_ajax_nopriv_tb_filter_imoveis', 'tb_filter_imoveis' );

// =====================================================
// CONTACT FORM - AJAX
// =====================================================
function tb_send_contact() {
    check_ajax_referer( 'tb_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $phone   = sanitize_text_field( $_POST['phone'] ?? '' );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $name || ! $email || ! $message ) {
        wp_send_json_error( [ 'msg' => 'Por favor, preencha todos os campos.' ] );
    }

    $to      = get_option('admin_email');
    $subject = "Novo contato via site - {$name}";
    $body    = "Nome: {$name}\nE-mail: {$email}\nTelefone: {$phone}\n\nMensagem:\n{$message}";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$email}" ];

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'msg' => 'Mensagem enviada com sucesso! Retornaremos em breve.' ] );
    } else {
        wp_send_json_error( [ 'msg' => 'Erro ao enviar. Tente pelo WhatsApp.' ] );
    }
}
add_action( 'wp_ajax_tb_send_contact',        'tb_send_contact' );
add_action( 'wp_ajax_nopriv_tb_send_contact', 'tb_send_contact' );

// =====================================================
// WIDGETS
// =====================================================
function tb_widgets_init() {
    register_sidebar( [
        'name'          => 'Sidebar Imóveis',
        'id'            => 'sidebar-imoveis',
        'description'   => 'Sidebar exibida nas páginas de imóveis.',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'tb_widgets_init' );

// =====================================================
// SEO - META DESCRIPTION AUTOMÁTICA
// =====================================================
function tb_meta_description() {
    if ( is_singular('imovel') ) {
        $excerpt = get_the_excerpt();
        $price   = tb_get_price();
        $cidade  = tb_get_meta('cidade');
        $desc    = $cidade ? "{$price} em {$cidade}. {$excerpt}" : "{$price}. {$excerpt}";
        printf( '<meta name="description" content="%s">', esc_attr( wp_trim_words($desc, 20) ) );
    }
}
add_action( 'wp_head', 'tb_meta_description' );

// =====================================================
// FLUSH REWRITE RULES (ao ativar o tema)
// =====================================================
function tb_activate() {
    tb_register_post_types();
    tb_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'tb_activate' );
