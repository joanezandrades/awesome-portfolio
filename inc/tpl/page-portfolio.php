<?php

   // Meta    
    $subtitle = get_post_meta($post->ID, 'subtitle_id', true);

    $argsSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'portfolio'
    );

    $getSection = get_posts( $argsSection );

    if( $getSection ) : 
        foreach( $getSection as $post ) : 
?>
<div class="section-wrap container_one">
    <header class="header-section">
        <h2 class="title" title="<?php the_title(); ?>"><?php the_title(); ?></h2>
        <h1 class="subtitle"><?php echo get_post_meta( $post->ID, 'cb_subtitle_id', true ); ?></h1>

        <div class="wrap-tags">
            <span class="tag">logotipo</span>
            <span class="tag">website</span>
            <span class="tag">e-commerce</span>
            <span class="tag">android</span>
            <span class="tag">codepen</span>
        </div>
    </header> <!-- /End header section -->

    <?php
            endforeach;
        endif;
    ?>
    <div class="slider-container">
        
        
        

        <!-- Botões de controle dos sliders -->
        <ul class="slider-nav nav-portfolio">
            <?php
            if( $getPortfolio > 1 ) :
                foreach( $getPortfolio as $post ) :
            ?>

            <li class="slide-button"></li>

            <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</div> <!-- /End section Portfólio -->