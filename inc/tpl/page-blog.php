<?php

    $argsSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'blog'
    );

    $getSection = get_posts( $argsSection );

    if( $getSection != 0 ) :
        foreach( $getSection as $post ) : 
?>

<div class="section-wrapper container_one">
    <header class="header-section-secondary">
        <h2 class="title" title="<?= the_title(); ?>"><?= the_title(); ?></h2>
        <h1 class="subtitle"><?= get_post_meta( $post->ID, 'cb_subtitle_id', true ); ?></h1>
    </header> <!-- /End header section -->

<?php
        endforeach;
    endif;
?> <!-- /End header section -->

    <div class="container-blog">    
        <div class="blog-wrap">

        <?php
            $args_blog = array(
                'post_type'         => 'blog',
                'numberposts'       => 3,
                'status'            => 'publish'
            );

            $posts_blog = get_posts($args_blog);

            if( $posts_blog ) :
                foreach( $posts_blog as $post ) : 
                    setup_postdata($post);
        ?>
            <article class="blog-post">
                <ul class="social-share blog-social-share">
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
                <?php the_post_thumbnail('awp-portrait-small'); ?>

                <div class="wrap-description">
                    <span class="the-category"><?= single_tag_title() ?></span> 

                    <a href="<?= the_permalink(); ?>">
                        <h3 class="title-post" title="<?= the_title(); ?>"><?= the_title(); ?></h3>
                    </a>
                    
                    <span class="the-date"><?= the_date(); ?></span>

                    
                </div> <!-- /End wrapper -->

            </article> <!-- /End blog destaque -->

            <?php
                endforeach;
            endif;
            ?>
        </div>
        <!-- Botões de controle dos sliders -->
        <ul class="slider-nav nav-blog">
            <?php
            if( $posts_blog > 1 ) :
                foreach( $posts_blog as $post ) :
            ?>

            <li class="slide-button"></li>

            <?php
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</div> <!-- /End wrapper blog -->