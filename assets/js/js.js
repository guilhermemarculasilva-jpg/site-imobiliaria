/**
 * Thiago Bostock Imóveis — main.js
 * JavaScript principal do tema WordPress
 *
 * @package Thiago_Bostock
 * @version 1.0.0
 */

(function ($) {
    'use strict';

    // ====================================================
    // DOCUMENT READY
    // ====================================================
    $(document).ready(function () {

        // 1. Navbar: adiciona classe 'scrolled' ao fazer scroll
        initNavbarScroll();

        // 2. Menu mobile hamburger
        initMobileMenu();

        // 3. Smooth scroll para âncoras
        initSmoothScroll();

        // 4. Simulador de Financiamento
        initSimulator();

        // 5. Formulário de contato AJAX
        initContactForm();

        // 6. Newsletter
        initNewsletter();

        // 7. Animações de entrada (Intersection Observer)
        initScrollAnimations();
    });


    // ====================================================
    // 1. NAVBAR SCROLL
    // Adiciona a classe 'scrolled' que muda o background
    // ====================================================
    function initNavbarScroll() {
        var $header = $('#masthead');

        // Verifica a posição ao carregar (caso a página já esteja scrollada)
        if ($(window).scrollTop() > 60) {
            $header.addClass('scrolled');
        }

        $(window).on('scroll.navbar', function () {
            if ($(window).scrollTop() > 60) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
        });
    }


    // ====================================================
    // 2. MENU MOBILE
    // Toggle do menu overlay no mobile
    // ====================================================
    function initMobileMenu() {
        var $hamburger  = $('#hamburger');
        var $closeBtn   = $('#mobile-menu-close');
        var $mobileMenu = $('#mobile-menu');

        function openMenu() {
            $mobileMenu.addClass('active');
            $hamburger.attr('aria-expanded', 'true');
            $('body').css('overflow', 'hidden');
        }

        function closeMenu() {
            $mobileMenu.removeClass('active');
            $hamburger.attr('aria-expanded', 'false');
            $('body').css('overflow', '');
        }

        $hamburger.on('click', openMenu);
        $closeBtn.on('click', closeMenu);

        // Fecha ao clicar em um link do menu mobile
        $mobileMenu.find('a').on('click', closeMenu);

        // Fecha com ESC
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape') closeMenu();
        });
    }


    // ====================================================
    // 3. SMOOTH SCROLL
    // Rolagem suave para seções da mesma página
    // ====================================================
    function initSmoothScroll() {
        $('a[href^="#"]').not('[href="#"]').on('click', function (e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                var offset = target.offset().top - 80; // desconta a altura do header fixo
                $('html, body').animate({ scrollTop: offset }, 700, 'swing');
            }
        });
    }


    // ====================================================
    // 4. SIMULADOR DE FINANCIAMENTO
    // Atualiza valores exibidos ao mover os ranges
    // ====================================================
    function initSimulator() {
        var $valorRange = $('#simulator-valor');
        var $prazoRange = $('#simulator-prazo');
        var $valorDisplay = $('#valor-display');
        var $prazoDisplay = $('#prazo-display');

        if (!$valorRange.length) return;

        function formatCurrency(value) {
            return 'R$ ' + parseInt(value).toLocaleString('pt-BR');
        }

        $valorRange.on('input change', function () {
            $valorDisplay.text(formatCurrency(this.value));
        });

        $prazoRange.on('input change', function () {
            $prazoDisplay.text(this.value + ' meses');
        });
    }


    // ====================================================
    // 5. FORMULÁRIO DE CONTATO AJAX
    // Envia sem recarregar a página
    // ====================================================
    function initContactForm() {
        var $form     = $('#tb-contact-form');
        var $feedback = $('#form-feedback');
        var $btn      = $('#form-submit-btn');

        if (!$form.length) return;

        $form.on('submit', function (e) {
            e.preventDefault();

            // Coleta os dados
            var data = {
                action:  'tb_send_contact',
                nonce:   TB_DATA.nonce,
                name:    $form.find('[name="name"]').val().trim(),
                email:   $form.find('[name="email"]').val().trim(),
                phone:   $form.find('[name="phone"]').val().trim(),
                message: $form.find('[name="message"]').val().trim(),
            };

            // Validação básica client-side
            if (!data.name || !data.email || !data.message) {
                showFeedback('Por favor, preencha todos os campos obrigatórios.', 'error');
                return;
            }

            // Desabilita botão e mostra carregando
            $btn.prop('disabled', true).text('Enviando...');

            $.ajax({
                url:  TB_DATA.ajaxUrl,
                type: 'POST',
                data: data,
                success: function (res) {
                    if (res.success) {
                        showFeedback(res.data.msg, 'success');
                        $form[0].reset();
                    } else {
                        showFeedback(res.data.msg, 'error');
                    }
                },
                error: function () {
                    showFeedback('Erro de conexão. Por favor, tente pelo WhatsApp.', 'error');
                },
                complete: function () {
                    $btn.prop('disabled', false).text('Enviar Mensagem');
                }
            });
        });

        /**
         * Exibe feedback visual no formulário
         * @param {string} msg - Mensagem a exibir
         * @param {string} type - 'success' ou 'error'
         */
        function showFeedback(msg, type) {
            var styles = type === 'success'
                ? 'background: rgba(37,211,102,0.1); color: #25D366; border: 1px solid rgba(37,211,102,0.3);'
                : 'background: rgba(255,80,80,0.1); color: #ff5050; border: 1px solid rgba(255,80,80,0.3);';

            $feedback.attr('style', 'display: block; padding: 12px 16px; border-radius: 8px; font-size: 14px; font-weight: 600; ' + styles)
                     .text(msg);

            // Esconde após 6 segundos se sucesso
            if (type === 'success') {
                setTimeout(function () { $feedback.hide(); }, 6000);
            }
        }
    }


    // ====================================================
    // 6. NEWSLETTER
    // Feedback simples no formulário de newsletter
    // ====================================================
    function initNewsletter() {
        var $form = $('#tb-newsletter-form');
        if (!$form.length) return;

        $form.on('submit', function (e) {
            e.preventDefault();
            var email = $form.find('input[type="email"]').val().trim();

            if (!email || !/\S+@\S+\.\S+/.test(email)) {
                alert('Por favor, informe um e-mail válido.');
                return;
            }

            // Aqui você pode integrar com Mailchimp, RD Station, etc.
            $form.find('button').text('Cadastrado!');
            setTimeout(function () { $form[0].reset(); $form.find('button').text('Quero Receber'); }, 3000);
        });
    }


    // ====================================================
    // 7. ANIMAÇÕES DE SCROLL (Intersection Observer)
    // Adiciona classe 'fade-up' aos elementos visíveis
    // ====================================================
    function initScrollAnimations() {
        // Verifica suporte ao IntersectionObserver
        if (!('IntersectionObserver' in window)) return;

        var elementsToAnimate = document.querySelectorAll(
            '.property-card, .service-card, .testimonial-card, .about-stat, .rate-row'
        );

        if (!elementsToAnimate.length) return;

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.style.opacity  = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        elementsToAnimate.forEach(function (el) {
            // Prepara o elemento para a animação
            el.style.opacity   = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    }

})(jQuery);
