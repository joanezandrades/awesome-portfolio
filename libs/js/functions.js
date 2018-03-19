
/**
 * Função hideLogoRollpage
 * Esconder e mostra elementos conforme a posíção da altura e da rolagem da página
 * @param heightScreen = Altura da tela - 75px;
 * @param rollTop = Contagem da rolagem em realação ao top
 * @param logo = Elemento logotipo
 * @param menuContent = Elemento Menu
 * @param btnOpenMenu = Elemento botão menu
 * */ 
function hideLogoRollPage() {
    var heightScreen    = $(window).height() - 75;

    var rollTop         = $(document).scrollTop();

    var logo            = $('.logo_container');

    var menuContent      = $('#menu-content');

    var btnOpenMenu     = $('#open-menu')

    if( rollTop > heightScreen ) {

        menuContent.addClass('hide-elem');
        btnOpenMenu.addClass('show-menu');

    } else {

        menuContent.removeClass('hide-elem');
        btnOpenMenu.removeClass('show-menu');
    }
}

// Função setWidthMenuFixed
function setWidthMenuFixed () {
    var widthScreen    = $(window).width();

    $('#main-header').width(widthScreen);
}

/**
 * Função getMenu() / closeMenu()
 * Abrir e esconder o menu secundário.
*/
function toggleMenu (element) {
    let openMenu = $('#open-menu');
    let closeMenuMobile = $('#close-menu');
    let closeMenuDesktop = $('#close-aside-menu');

    let linkCloseMobile = $('.menu-awp-primary-container a');
    let linkCloseDektop = $('.aside-menu a');
    let widthWindow = $(window).width();

    // Se width > 480px
    if( widthWindow > 480) {

        // Open Menu secundário desktop
        openMenu.on( 'click', function() {
            $('.secondary-menu').addClass('active-secondary-menu');
        });
    
        // Esconder quando clicar no botão close
        closeMenuDesktop.on( 'click', function() {
            $('.secondary-menu').removeClass('active-secondary-menu');
        })
    
        // Esconder Menu quando clicar em algum link
        linkCloseDektop.on( 'click', function() {
            $('.secondary-menu').removeClass('active-secondary-menu');
        })
    } 
    if( widthWindow < 480 ) {
       
        openMenu.on( 'click', function() {
            $('.menu-awp-primary-container').addClass('menu-mobile-active');
            $(this).css({
                'display' : 'none'
            })

            closeMenuMobile.css({
                'display' : 'block'
            })
        });
    
        // Esconder quando clicar no botão close
        closeMenuMobile.on( 'click', function() {
            $('.menu-awp-primary-container').removeClass('menu-mobile-active');
            $(this).css({
                'display' : 'none'
            })

            openMenu.css({
                'display' : 'block'
            })
        })
    
        // Esconder Menu quando clicar em algum link
        linkCloseMobile.on( 'click', function() {
            $('.menu-awp-primary-container').removeClass('menu-mobile-active');
        })
    }

}
toggleMenu();

// Função bgParallax
function bgParallax () {
    $('.bg-parallax').each( function () {
        var $obj    = $(this);
        var yPos    = -($(window).scrollTop() / $obj.data('speed'));
        var bgPos   = '50%' + yPos + 'px';

        $obj.css(
            'background-position', bgPos
        );
    })
}


// Add rolagem suave
$(document).on('click', 'a', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
});


// Funções invocadas quando rolar a página
if( $(window).height() > 480 ) {

    $(document).scroll(function () {
        hideLogoRollPage();
    })
}


// invocando bg parallax
$(window).scroll( function () {
    bgParallax();
})

// Menu
$('.menu-close').on('click', function () {
    toggleMenu($(this));
});
