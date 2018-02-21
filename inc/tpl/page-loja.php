<?php


    $argsSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'loja',
        'post_status'   => 'publish'
    );

    $getSection = get_posts( $argsSection );

    if( $getSection ) :
        foreach( $getSection as $post ) :

?>
<div class="loja-wrap container_one">
    <?php
            endforeach;
        endif;
    ?><!-- /End header-section -->


    <?php
        $args = array(
            'post_type'     => 'produtos',
            'categorias'    => '',
            'numberposts'   => 1
        );

        $getProdutos = get_posts( $args );

        if( $getProdutos ) :
            foreach( $getProdutos as $post ) :
    ?>

    <article class="produto-post">

        <div class="wrap-container">
            <?php the_post_thumbnail( 'awp-thumb-loja' )?>
        </div>
        

        <div class="wrap-container">
            <div class="aside-infos">
                <h3 class="title" title="<?= the_title(); ?>"><?= the_title(); ?></h3>
            
                <div class="resumo">
                    <?= the_excerpt(); ?>
                </div> <!-- /End resumo -->

                <ul class="meta-box">                   
                    <li class="meta-item">
                        <span class="square-icon">
                            <i class="icon fa fa-money"></i>
                        </span>
                        
                        <span class="text-big">R$ <?= get_post_meta( $post->ID, 'cb_meta_price', true ); ?></span>
                        <span class="text-small">Em 5x sem juros no cartão!</span>
                    </li>

                    <li class="meta-item">
                        <span class="square-icon">
                            <i class="icon fa fa-tags"></i>
                        </span>
                        <?= get_the_term_list( $post->ID, 'tags' ); ?>
                    </li>
                             
                </ul> <!-- /End meta information -->

    
                <a class="btn-link" href="<?= the_permalink(); ?>" >Comprar <i class="fa fa-shopping-cart"></i></a>
                
                <ul class="social-share">
                    <li class="social-item">
                        <i class="icon fa fa-twitter"></i>
                    </li>
                    <li class="social-item">
                        <i class="icon fa fa-facebook"></i>
                    </li>
                    <li class="social-item">
                        <i class="icon fa fa-envelope"></i>
                    </li> 
                </ul> <!-- /End social-share -->
            </div>
        </div>
    </article>

    <?php
            endforeach;
        endif;
    ?>

</div> <!-- /End section -->

