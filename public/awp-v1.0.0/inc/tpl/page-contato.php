<?php

    $argsSection = array(
        'post_type'     => 'secoes',
        'paginas'       => 'contato'
    );

    $getSection = get_posts( $argsSection );

    if( $getSection ) : 
        foreach( $getSection as $post ) :
?>

<div class="section-wrap container_one">
    <header class="header-section">
        <h2 class="title" title="<?php the_title(); ?>"><?= the_title(); ?></h2>
        <h4 class="subtitle" title="<?php echo get_post_meta( $post->ID, 'cb_subtitle_id', true); ?>"><?php echo get_post_meta( $post->ID, 'cb_subtitle_id', true); ?></h4>
    </header> <!-- /End header section -->

<?php 
        endforeach;
    endif;
?><!-- /End header section -->

    <div class="wrapper-body">
        <div class="wrapper-btns">
            <span class="btn form active">
                <i class="fa fa-envelope"></i>
                Formulário
            </span>
            <span class="btn infos">
                <i class="fa fa-address-book"></i>
                Informações
            </span>
        </div> 

        <div class="wrapper">
            <h4 class="title-box">Quer conversar sobre um pojeto, ou, tirar alguma dúvida:</h4>
            
            <ul class="list-of-infos">
            
                <?php 
                    render_address_html( $post );
                ?>
            </ul> <!-- /End infos -->

            <ul class="social-share">
                <h4 class="title-box">redes sociais</h4>
                <li class="social-item">
                    <i class="icon fa fa-twitter"></i>
                </li>
                <li class="social-item">
                    <i class="icon fa fa-facebook"></i>
                </li>
                <li class="social-item">
                    <i class="icon fa fa-instagram"></i>
                </li> 
            </ul> <!-- /End social-share -->
        </div> <!-- /End wrapper informações -->

        <div class="wrapper">
            <p class="title-box">Se você já tem algo em mente, e, tem convicção do sucesso do seu projeto. Vamos construir sua ideia, me conte alguns detalhes,preencha o formulário:</p>

            <button id="" class="button-medium">formulário</button>

            <span class="text">O que você vai preencher no formulário?</span>
            <ul class="list">
                <li class="list-item">Plataformas de atuação</li>
                <li class="list-item">Orçamento disponível para o projeto</li>
                <li class="list-item">Outras informações necessárias</li>
            </ul>
        </div>

    </div>

</div>
