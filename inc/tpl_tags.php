<?php 
// 

?>

<?php 
/**
 * @func 
 * */ 
function make_title(){
    if(is_home()) {
        return bloginfo('name') . ' | ' . bloginfo( 'description' );
    }
    else{
        return bloginfo('name ') . ' | ' . the_title();
    }
}

/***
 * @func
 * -> Main Header
 */
function main_header() {

    global $post;

    $custom_logo_id = get_theme_mod( 'custom-logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );

    if( is_home() ) :
    ?>
    <header id="" class="main-header">
        <i id="open-menu" class="fa fa-bars hide-elem"></i>
        <i id="close-menu" class="fa fa-times hide-elem"></i>
        <div id="menu-content" class="menu-content container-fluid">
            <div class="row">
                <div class="col-6 col-xl-3">
                    <?php the_custom_logo(); ?>
                </div> <!-- /End logo -->

                <div class="wrapper_menu col-6 col-xl-7">                    
                    <?php
                        $args = array(
                            'menu'      => 'awp-primary',
                            'menu_class'    => 'main-menu',
                            'echo'          => true,
                        );
                        wp_nav_menu( $args );
                    ?>
                </div> <!-- /End menu -->
                
                <div class="social-network col-xl-2">
                    <?php 
                    $page_contato = get_page_by_title( 'contato', OBJECT, 'page' );

                    $pageID = $page_contato->ID;

                    // Links
                    $linkFacebook   = get_post_meta( $pageID, 'cb_contato_facebook', true );
                    $linkInstagram  = get_post_meta( $pageID, 'cb_contato_instagram', true );
                    $linkTwitter    = get_post_meta( $pageID, 'cb_contato_twitter', true );
                    $linkGithub     = get_post_meta( $pageID, 'cb_contato_github', true );
                    $linkcodepen    = get_post_meta( $pageID, 'cb_contato_codepen', true );
                    ?>
                    <!-- Verifico se os links não estão vazios e mando escrever -->
                    <?php if( $linkFacebook ): ?> 
                        <a class="link-social" href="<?php echo $linkFacebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>

                    <?php if( $linkTwitter ): ?>
                        <a class="link-social" href="<?php echo $linkTwitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php endif; ?>

                    <?php if( $linkInstagram ): ?>
                        <a class="link-social" href="<?php echo $linkInstagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php endif; ?>

                    <?php if( $linkGithub ): ?>
                        <a class="link-social" href="<?php echo $linkGithub ?>" target="_blank"><i class="fa fa-github"></i></a>
                    <?php endif; ?>

                    <?php if( $linkcodepen ): ?>
                        <a class="link-social" href="<?php echo $linkcodepen ?>" target="_blank"><i class="fa fa-codepen"></i></a>
                    <?php endif; ?>
                </div> <!-- /End social network -->
            </div>
        </div>

        <!-- Menu hide -->
        <div class="secondary-menu">
            <h2 class="title-menu">Menu</h2>
            <i id="close-aside-menu" class="fa fa-times"></i>                
            <?php
                $args = array(
                    'menu'      => 'awp-primary',
                    'menu_class'    => 'aside-menu',
                    'echo'          => true,
                );
                wp_nav_menu( $args );
            ?>
            <div class="mask"></div>
        </div> <!-- /End menu -->
    </header>
    <?php
    else :
    ?>
    <header id="" class="main-header single-page">
        <div class="menu-content container-fluid">
            <div class="row">
                <div class="col-6 col-xl-3">
                    <?php the_custom_logo(); ?>
                </div> <!-- /End logo -->
                <div class="col-xl-7"></div>
                <div class="social-network col-xl-2">
                    <?php 
                    $page_contato = get_page_by_title( 'contato', OBJECT, 'page' );

                    $pageID = $page_contato->ID;

                    // Links
                    $linkFacebook   = get_post_meta( $pageID, 'cb_contato_facebook', true );
                    $linkInstagram  = get_post_meta( $pageID, 'cb_contato_instagram', true );
                    $linkTwitter    = get_post_meta( $pageID, 'cb_contato_twitter', true );
                    $linkGithub     = get_post_meta( $pageID, 'cb_contato_github', true );
                    $linkcodepen    = get_post_meta( $pageID, 'cb_contato_codepen', true );
                    ?>
                    <!-- Verifico se os links não estão vazios e mando escrever -->
                    <?php if( $linkFacebook ): ?> 
                        <a class="link-social" href="<?php echo $linkFacebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>

                    <?php if( $linkTwitter ): ?>
                        <a class="link-social" href="<?php echo $linkTwitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <?php endif; ?>

                    <?php if( $linkInstagram ): ?>
                        <a class="link-social" href="<?php echo $linkInstagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <?php endif; ?>

                    <?php if( $linkGithub ): ?>
                        <a class="link-social" href="<?php echo $linkGithub ?>" target="_blank"><i class="fa fa-github"></i></a>
                    <?php endif; ?>

                    <?php if( $linkcodepen ): ?>
                        <a class="link-social" href="<?php echo $linkcodepen ?>" target="_blank"><i class="fa fa-codepen"></i></a>
                    <?php endif; ?>
                </div> <!-- /End social network -->
            </div>
        </div>
    </header>
    <?php
    endif;
}

/***
 * @func 
 * -> Informações de contato
 * Render do html para obter as informações de contato registradas
 */
function render_address_html ( $post ) {

    $metaID = get_post_meta( $post->ID );

    $metaAddress    = $metaID['cb_meta_address_id'][0];
    $metaMap        = $metaID['cb_meta_map_id'][0];
    $metaPhone      = $metaID['cb_meta_phone_id'][0];
    $metaEmail      = $metaID['cb_meta_email_id'][0];
    ?>
    <?php 
        if ($metaAddress != '' ) {
    ?>

        <li class="item-info">
            <span class="text-desc">endereço</span>
            <i class="icon fa fa-map-marker"></i>
            <span class="text-info"><?php echo $metaAddress; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php 
        if ($metaMap != '' ) {
    ?>

        <li class="item-info">
            <span class="text-desc">Mapa</span>
            <i class="icon fa fa-map"></i>
            <span class="text-info"><?php echo $metaMap; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php 
        if ($metaPhone != '' ) {
    ?>

        <li class="item-info">
            <span class="text-desc">Telefone</span>
            <i class="icon fa fa-mobile-phone"></i>
            <span class="text-info"><?php echo $metaPhone; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php 
        if ($metaEmail != '' ) {
    ?>

        <li class="item-info">
            <span class="text-desc">E-mail</span>
            <i class="icon fa fa-envelope"></i>
            <span class="text-info"><?php echo $metaEmail; ?></span>
        </li>

    <?php 
        } else {
            false;
        }
    ?>

    <?php
}

/**
 * Rendeniza as redes sociais cadastradas pelo administrador
 * 
*/
function render_social_network() {

    $linkFacebook   = get_post_meta( $pageID, 'cb_contato_facebook', true );
    $linkTwitter    = get_post_meta( $pageID, 'cb_contato_twitter', true );
    $linkInstagram  = get_post_meta( $pageID, 'cb_contato_instagram', true );
    $linkGithub     = get_post_meta( $pageID, 'cb_contato_github', true );
    $linkcodepen    = get_post_meta( $pageID, 'cb_contato_codepen', true );
    ?>

    <!-- Verifico se os links não estão vazios e mando escrever -->
    <?php if( $linkFacebook ): ?> 
        <a class="link-social" href="<?php echo $linkFacebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
    <?php endif; ?>

    <?php if( $linkTwitter ): ?>
        <a class="link-social" href="<?php echo $linkTwitter ?>" target="_blank"><i class="fa fa-twitter"></i></a>
    <?php endif; ?>

    <?php if( $linkInstagram ): ?>
        <a class="link-social" href="<?php echo $linkInstagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
    <?php endif; ?>

    <?php if( $linkGithub ): ?>
        <a class="link-social" href="<?php echo $linkGithub ?>" target="_blank"><i class="fa fa-github"></i></a>
    <?php endif; ?>

    <?php if( $linkcodepen ): ?>
        <a class="link-social" href="<?php echo $linkcodepen ?>" target="_blank"><i class="fa fa-codepen"></i></a>
    <?php endif; ?>

    <?php
}

/*
* render_social_share()
*   Retorna o html equivalente aos botões de compartilhamento
*/ 
function render_social_share () {

    ?>

    <div class="social-bar">
        <i class="icon fa fa-twitter">
            <a  class="twitter-share-button link-share" href="https://twitter.com/intent/tweet?original_referer=  <?php echo the_permalink(); ?>" data-show-count="false"></a>
        </i>

        <i class="icon fa fa-facebook"  >
            <a class="link-share" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u= <?php echo the_permalink(); ?>"></a>
        </i>
    </div>

    <?php 
}

/** 
 * Hook Homepage - Chamada para o slider da homepage
 * 
 * @post-type: Loja, projetos, 
* */ 
function hook_homepage() {
    
    global $post;

    $args_homepage = array(
        'post_type'         => 'post',
        'category'          => 'destaque',
        'category_name'     => 'destaque',
        'numberposts'       => 4,
        'orderby'           => 'date',
        'order'             => 'DESC',
        'post_status'       => 'publish'
    );

    $homepage_posts = new WP_Query( $args_homepage );
    
    if( $homepage_posts->have_posts() ):
        while( $homepage_posts->have_posts() ):
            $homepage_posts->the_post();
    ?>

    <div class="content-post">
        <div class="half-page col-xl-6">
            <h1 class="big-title"><?php the_title(); ?></h1>
            <div class="excerpt">
                <?php the_excerpt() ?>
            </div>
            <button class="link-post"><a href="<?php the_permalink() ?>">saiba mais</a></button>
        </div>

        <div class="half-page col-xl-6">
            <?php the_post_thumbnail( 'full' ) ?>
        </div>
    </div>

    <?php
        wp_reset_postdata();
        endwhile;
    else :

        $page_apresentacao = get_page_by_title( 'apresentacao', 'OBJECT', 'page' );
        
        $pageID = $page_apresentacao->ID;
        $pageTitle = $page_apresentacao->post_title;
        $pageExcerpt = $page_apresentacao->post_excerpt;
    ?>
    
    <div class="content-post">
        <div class="half-page col-xl-6">
            <h1 class="big-title"><?php echo $pageTitle ?></h1>
            <div class="excerpt">
                <?php echo $pageExcerpt ?>
            </div>
        </div>

        <div class="half-page col-xl-6">
            <?php the_post_thumbnail( 'full' ) ?>
        </div>
    </div>
    
    <?php
    endif;
}

/** 
 * Hook Serviços - Chamada para os serviços cadastrados
 * 
 * @post-type: servicos 
* */
function hook_services() {
    $page_servicos = get_page_by_title( 'servicos', OBJECT, 'page' );
    
    $pageID = $page_servicos->ID;
    $pageTitle = $page_servicos->post_title;
    $pageSubtitle = $page_servicos->post_content;

    ?>
    <header class="container sct-header">
        <h1 class="sct-title"><?php echo $pageTitle; ?></h1>
        <p class="sct-subtitle"><?php echo $pageSubtitle; ?></p>
    </header>
    <div class="container">
        
        <div class="services-wrap slider-services">
            <?php
            global $post;

            $args_services = array(
                'post_type'         => 'servicos',
                'posts_per_page'    => 6
            );

            $getServices = get_posts( $args_services );

            if( $getServices ) :
                foreach( $getServices as $post ) : 
            ?>           
            
            <article class="col-xl-10 service-item">
                
                <div class="wrap-thumb">
                    <?php the_post_thumbnail('awp-icon'); ?>                    
                </div>
                
                <div class="wrap-infos">
                    <h4 class="title-service" title="<?php the_title(); ?>"><?php the_title(); ?></h4>
                    <div class="wrap-tags">
                        <?php 
                        $args_tax = array(
                            'post'      => 0,
                            'before'    => '<div class="tags">',
                            'sep'       => ',',
                            'after'     => '</div>',
                            'template'  => '<span style="display: none">%s:</span> %l.'
                        );
                        the_taxonomies( $args_tax );                        
                        ?>
                    </div>
                    <?php the_excerpt(); ?>
                </div>

            </article>

            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>
    <?php 
}

/** 
 * Hook Portfólio - Chamada para a seção portfólio
 * 
 * @post-type: portfólio 
* */
function hook_portfolio() {
    $page_portfolio = get_page_by_title( 'portfolio', OBJECT, 'page' );

    $pageID = $page_portfolio->ID;
    $pageTitle = $page_portfolio->post_title;
    $pageSubtitle = $page_portfolio->post_content;
    
    ?>

    <div class="portfolio-wrap">
            
        <?php

        global $post;

        $args = array(
            'post_type'     => 'portfolio',
            'numberposts'   => 3
        );

        $portfolios = get_posts( $args );

        if( $portfolios ) : 
            foreach( $portfolios as $post ) :
        ?>

        <article class="portfolio-item row">

            <div class="wrap-half col-xl-6">            
                <?php the_post_thumbnail('awp-pic-portfolio') ?>
            </div>


            <div class="wrap-half col-xl-6">
                <h2 class="title-portfolio" title="<?php the_title(); ?>"><?php the_title(); ?></h3>
                <p><?php echo $post->post_excerpt ?></p>

                <?php echo get_the_term_list( $post->ID, 'tags', '<span class="wrap-tags">', ' ', '</span>' ); ?>
                
                <a href="<?php the_permalink() ?>" class="button-link">conheça o case</a>
            </div>
            
        </article>


        <?php
                endforeach;
                wp_reset_postdata();
            endif;
        ?>

    </div>
    
    <?php
}

/**
 * Hook Contato - Verifica se existe uma page contato e imprime ela na seção
 * 
 * @post-type: page  
*/
function hook_contato(){
   $page_contato = get_page_by_title( 'contato', OBJECT, 'page' );

    $pageID = $page_contato->ID;
    $page_title = $page_contato->post_name;
    $page_content = $page_contato->post_content;
    ?>

    <header class="header-contato" style="background-image: url(<?php echo get_template_directory_uri() . '/libs/img/background-contact.png' ?>)">
        <h1 class="sct-title"><?php echo $page_title; ?></h1>
        <p class="sct-subtitle"><?php echo $page_content; ?></p>
    </header>
    <div class="container">
        <!-- Mobile -->
        <div class="botoes-mobile">
            <div id="open-app-contato" class="btn-contact">
                <i class="icon fa fa-list"></i>
                <span class="title">Formulário</span>
            </div>

            <div class="btn-contact">
                <i class="icon fa fa-id-card"></i>
                <span class="title">Informações</span>
            </div>
        </div>

        <!-- Formulário / Informações -->
        <div id="box-contact-mobile" class="box-contact container row">
            <div class="wrap-form col-xl-8">
                <!-- Header mobile -->
                <header class="head-form-mobile">
                    <div class="contagem">
                        <span id="count-phase-one" class="count active-count">1/3</span>
                        <span id="count-phase-two" class="count">2/3</span>
                        <span id="count-phase-three" class="count">3/3</span>                        
                    </div>
                    <div id="close-app-form" class="btn-close">
                        <span class="text">sair</span>
                        <i class="icon fa fa-times-circle"></i>
                    </div>
                </header><!-- /End header Mobile -->
                
                <form action="" method="post" id="formulario" class="form row">
                    <div class="wrapp-app-form phase-one active-phase col-xl-12 row">
                        <!-- Descrição dos campos -->
                        <div class="description-for-mob-app">
                            <h3 class="title">Formulário de contato</h3>
                            <p class="text">Podemos construir coisas incríveis juntos! Mas, para começar, vamos nos conhecer melhor.
                            <i>Qual seu nome?</i>
                            <i>E o seu e-mail?</i>
                            </p>
                        </div>
                        <!-- Campos -->
                        <div class="wrap-input col-sm-12 col-xl-6">
                            <label for="ipt-name" class="name">Nome</label>
                            <input id="ipt-name" type="text" class="ipt-form" placeholder="Insira o Nome" pattern="[A-Za-z0-9]{5,50}" required>
                        </div>
                        <div class="wrap-input col-sm-12 col-xl-6">
                            <label for="ipt-email" class="name">E-mail</label>
                            <input id="ipt-email" type="email" class="ipt-form" placeholder="Seu principal e-mail" pattern="([A-Za-z0-9]{1,50}@)" required>
                        </div>

                        <span id="to-phase-two" class="next-phase">Próximo</span>
                    </div> <!-- /End wrap mobile app -->

                    <div class="wrapp-app-form phase-two col-xl-12 row">
                        <!-- Descrição dos campos -->
                        <div class="description-for-mob-app">
                            <h3 class="title">Formulário de contato</h3>
                            <p class="text">Então, [nome], qual o tipo de serviço você precisa? Tem uma data de entrega? E qual o orçamento disponível?</p>
                        </div>
                        <!-- Campos -->
                        <div class="wrap-input col-sm-12 col-xl-4">
                            <label for="ipt-job" class="name">Tipo do Job</label>
                            <input list="jobs" id="ipt-job" type="text" class="ipt-form" placeholder="Selecione uma opção">
                            <datalist id="jobs">
                                <option value="Website institucional"></option>
                                <option value="Portal de Notícias"></option>
                                <option value="Blog"></option>
                                <option value="SEO(Search engine Optimization)"></option>
                                <option value="Design Gráfico"></option>
                            </datalist>
                        </div>

                        <div class="wrap-input col-sm-12 col-xl-4">
                            <label for="ipt-deadline" class="name">Prazo de entrega</label>
                            <input id="ipt-deadline" type="date" class="ipt-form" placeholder="">
                        </div>

                        <div class="wrap-input col-sm-12 col-xl-4">
                            <label for="ipt-budget" class="name">Orçamento</label>
                            <input id="ipt-budget" type="text" class="ipt-form" placeholder="R$ 1.999,00">
                        </div>

                        <span id="to-phase-three" class="next-phase">Próximo</span>
                    </div> <!-- /End wrap mobile app -->

                    <div class="wrapp-app-form phase-three col-sm-12 col-xl-12 row">
                        <!-- Descrição dos campos -->
                        <div class="description-for-mob-app">
                            <h3 class="title">Formulário de contato</h3>
                            <p class="text">Esse é o último passo, [nome]. Me fale um pouco sobre o motivo do seu contato.</p>
                        </div>
                        <!-- Campos -->
                        <div class="wrap-input col-12">
                            <label for="ipt-description" class="name">Descrição do job</label>
                            <textarea name="ipt-description" id="ipt-description" class="ipt-textarea" cols="" rows="4" require></textarea>
                        </div>    
                    </div><!-- /End wrap mobile app -->

                    <button id="submit-form" class="bnt-send" type="submit">enviar</button>
                </form>

                <!-- #div message sucess -->
                <div class="box-success-message">
                    <h3 class="title-box">Beleza, <span class="append-name"></span>!</h3>
                    <p class="text">Obrigado por entrar em contato e demonstrar insteresse no meu trabalho. Entrarei em contao assim que possível!</p>
                
                    <div class="data-user">
                        <span class="text-bold">Suas Informações:</span>
                        <ul class="list-data-user">
                            <li id="" class="item">Seu nome: <span id="" class="append-name bold"></span></li>
                            <li id="" class="item">Seu e-mail: <span id="" class="append-email bold"></span></li>
                            <li id="" class="item">Prazo do Job: <span id="" class="append-deadline bold"></span></li>
                            <li id="" class="item">Orçamento disponível: <span id="" class="append-budget bold"></span></li>
                        </ul>
                    </div>
                </div>
            </div> <!-- /End wrap-form -->

            <div class="wrap-contact col-xl-4">
                <div class="contact-item">
                    <span class="label-desc">E-mail</span>
                    <p class="text"><i class="fa fa-envelope"></i><?php echo get_post_meta( $pageID, 'cb_contato_email', true ); ?></p>
                </div>
                <div class="contact-item">
                    <span class="label-desc">Telefone/Whatsapp</span>
                    <p class="text"><i class="fa fa-whatsapp"></i><?php echo get_post_meta( $pageID, 'cb_contato_tel', true ); ?></p>
                </div>

                <div class="social-network">
                    <span class="label-desc">Redes Sociais</span>
                    <?php render_social_network() ?>
                </div>
            </div><!-- /End wrap-contact -->
        </div>

        <footer class="mobile-social">
            <?php render_social_network() ?>
        </footer>
    </div>

    <?php
}



?>