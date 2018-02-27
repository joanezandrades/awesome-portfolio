<?php
/**
 * Awesome Portfolio template_tags;
 * Arquivo que faz todos os hooks de seções, hooks de informações de contato entre outras funções isoladas. * 
*/
?>

<?php

/**
 * Funções complementares que serão usadas em vários locais do sistema. Tais como: rendenizar informações de contato, redes sociais, titulo da aba etc..
*/
function make_title(){
    /**
     * @desc: Cria os títulos das abas baseado no tipo de página aberta
    * */
    if( is_home() ) {
        return bloginfo('name ') . ' | ' . bloginfo( ' description' );
    }
    else{
        return bloginfo('name ') . ' | ' . the_title();
    }
}

function render_network_links() {
    /**
     * @desc: Função especializada em rendenizar os links das redes sociais cadastradas
    */

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
    <?php endif;
}

function render_social_share () {
    /**
     * @desc: Retornar os botões de compartilhamento
    */
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
 * Getters de conteúdo para homepage
 * @desc: Cada função verifica a existência uma página que correponda com sua respectiva seção na homepage.
 * Cada função faz um WP_query em busca dos posts que corresponda sua seção.
*/
function main_header() {
    /**
     * @func main_header()
     * @desc: retorna a criação do header do site, diferenciado conforme os tipos de páginas em que é chamado
    */
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
                        $args_menu = array(
                            'menu'      => 'awp-primary',
                            'menu_class'    => 'main-menu',
                            'echo'          => true,
                        );
                        wp_nav_menu( $args_menu );
                    ?>
                </div> <!-- /End menu -->
                
                <div class="social-network col-xl-2">
                    <?php render_network_links(); ?>
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
                    <?php render_network_links(); ?>
                </div> <!-- /End social network -->
            </div>
        </div>
    </header>
    <?php
    endif;
}

function get_homepage() {
    /** 
     * get_homepage() - rendeniza a homepage de destaques do site
    * */ 
    
    global $post;

    $args_blog = array(
        'post_type'         => 'post',
        'category_name'     => 'destaque',
        'posts_per_page '   => 4,
        'orderby'           => 'date',
        'order'             => 'DESC',
        'post_status'       => 'publish'
    );

    $posts_blog = new WP_Query( $args_blog );
    
    if( $posts_blog->have_posts() ):
        while( $posts_blog->have_posts() ):
            $posts_blog->the_post();
    ?>

    <div class="content-post">
        <div class="half-page col-xl-6">
            <h1 class="big-title"><?php the_title(); ?></h1>
            <div class="excerpt">
                <?php the_excerpt() ?>
            </div>
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

function get_services() {
    /** 
     * get_services() - Faz a construção da seção de serviços.
     * inclusive, busca pela página serviços para desenhar o cabeçalho da seção.     * 
    */
    $page_services = get_page_by_title( 'servicos', OBJECT, 'page' );
    $pageID = $page_services->ID;
    $pageTitle = $page_services->post_title;
    $pageSubtitle = $page_services->post_content;

    if( $page_services ): 
    ?>
        <header class="container sct-header">
            <h1 class="sct-title"><?php echo $pageTitle; ?></h1>
            <p class="sct-subtitle"><?php echo $pageSubtitle; ?></p>
        </header>
    <?php 
    else: 
        if( is_user_logged_in() ) : ?>
            <h1 class="title">Crie uma página de serviços para configurar o título e subtitlo da seção.</h1>
    <?php   
        endif;
    endif;?>

    <!-- Conteúdo da seção -->
    <div class="container">
        
        <div class="services-wrap slider-services">
            <?php
            global $post;

            $args_services = array(
                'post_type'         => 'servicos',
                'posts_per_page'    => 6,
                'post_status'       => 'publish'
            );

            $getServices = new WP_query( $args_services );

            if( $getServices->have_posts() ) :
                while( $getServices->have_posts() ) : 
                    $getServices->the_post();
            ?>           
            
            <article class="col-xl-4 service-item">
                <div class="container-service">
                    <div class="wrap-thumb">
                        <?php the_post_thumbnail('awp-icon'); ?>                    
                    </div>
                    
                    <div class="wrap-infos">
                        <h4 class="title-service" title="<?php the_title(); ?>"><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                    </div>
                </div>

            </article>

            <?php
                    endwhile;
                else:
            ?>
                <h1 class="title">Nenhum serviço registrado.</h1>
                <?php if( is_user_logged_in() ): ?>
                    <span class="text">Você pode registrar seus serviços a partir do menu "Serviços", na sua admin dashboard.</span>
                <?php endif; ?>
            <?php endif; ?>       
        </div>
    </div>
    <?php 
}

function get_portfolio() {
    /** 
     * get_portfolio() - Faz a construção da seção de Portfólio da homepage.
    * */
    $page_portfolio = get_page_by_title( 'portfolio', OBJECT, 'page' );

    $pageID = $page_portfolio->ID;
    $pageTitle = $page_portfolio->post_title;
    $pageSubtitle = $page_portfolio->post_content;
    
    if( $page_portfolio ):
    ?>
        <header class="container sct-header">
            <h1 class="sct-title"><?php echo $pageTitle; ?></h1>
            <p class="sct-subtitle"><?php echo $pageSubtitle; ?></p>
        </header>
    <?php 
    else :
        if( is_user_logged_in() ) :
    ?>
            <h1 class="title">Crie uma página de serviços para configurar o título e subtitlo da seção.</h1>
    <?php
        endif;
    endif;
    ?>
    <div class="portfolio-wrap"> 
        <?php

        global $post;

        $args_portfolio = array(
            'post_type'         => 'portfolio',
            'posts_per_page'    => 3,
            'post_status'       => 'publish'
        );

        $getPortfolios = new WP_Query( $args_portfolio );

        if( $getPortfolios->have_posts() ) : 
            while( $getPortfolios->have_posts() ) :
                $getPortfolios->the_post();
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
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </div>
    
    <?php
}

function get_contato(){
    /**
     * get_contato() - Verifica se existe uma page contato e imprime ela na seção
    */
   $page_contato = get_page_by_title( 'contato', OBJECT, 'page' );

    $pageID = $page_contato->ID;
    $page_title = $page_contato->post_name;
    $page_content = $page_contato->post_content;

    if( $page_content ) :
    ?>
        <header class="header-contato" style="background-image: url(<?php the_post_thumbnail_url( 'full' ) ?>)">
        </header>
    <?php 
    else :
        if( is_user_logged_in() ) :
    ?>
            <h1 class="title">Crie uma página de serviços para configurar o título e subtitlo da seção.</h1>
    <?php 
        endif;
    endif;
    ?>

    <!-- Contact Content -->
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
        <div id="box-contact-mobile" class="wrapper-contact container row">
            <div class="wrapper-form col-xl-8">
                <!-- Header Formulário -->
                <header class="header-formulario">
                    <div class="head-form-desktop">
                        <h3 class="title">Formulário de contato</h3>
                        <p class="subtitle">Preencha o formulário que eu te retorno</p>
                    </div> <!-- End heade for desktop -->
                    <div class="header-form-mobile">
                        <div class="wrap-count">
                            <span id="count-phase-one" class="count active-count">1/3</span>
                            <span id="count-phase-two" class="count">2/3</span>
                            <span id="count-phase-three" class="count">3/3</span>                        
                        </div>
                    </div> <!-- End header for mobile -->
                    <div id="close-app-form" class="btn-close">
                        <span class="text">sair</span>
                        <i class="icon fa fa-times-circle"></i>
                    </div><!-- End btn for mobile -->
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
                            <span class="error-message">Por favor, insira seu nome.</span>
                            <input id="ipt-name" type="text" class="ipt-form" placeholder="Insira o Nome" pattern="[A-Za-z0-9]{5,50}" required>
                        </div>
                        <div class="wrap-input col-sm-12 col-xl-6">
                            <label for="ipt-email" class="name">E-mail</label>
                            <span class="error-message">Por favor, insira seu e-mail.</span>
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

            <div class="wrap-contact-infos col-xl-4">
                <div class="head-form-desktop">
                    <h3 class="title">Outras informações</h3>
                    <p class="subtitle">Social network e contato direto</p>
                </div>
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
                    <?php render_network_links() ?>
                </div>
            </div><!-- /End wrap-contact -->
        </div>

        <footer class="mobile-social">
            <?php render_network_links() ?>
        </footer>
    </div>

    <?php
}
?>