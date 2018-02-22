<?php
/**
 * Awesome Portfolio Index.php.
 *
 * @package Awesome Portfolio
 */

get_header();

/**
 * - Renomear funções para get_ ao invés de hook_
*/

?>
<section id="homepage" class="bg-parallax" data-speed="0" style="background-image: url(<?php background_image() ?>)">
    <div class="container-fluid">
        <div class="slick-slider-homepage">        
            <?php get_homepage(); ?>
        </div>
        
        <!-- Botão Scroll Down  -->
        <a class="scroll-down" href="#servicos">
            <span class="">Serviços</span>
            <i class="fa fa-angle-down bounce-down"></i>
        </a>
    </div>
</section> <!-- /.end homepage -->

<section id="servicos" class="bg-parallax" data-speed="0">
    <?php get_services(); ?>
</section> <!-- /.end servicos -->

<section id="portfolio" class="bg-parallax" data-speed="0">
    <?php get_portfolio(); ?>
</section> <!-- /.end portfolio -->

<section id="contato" class="bg-parallax" data-speed="0">
    <?php get_contato(); ?>
</section>

<?php get_footer(); ?>