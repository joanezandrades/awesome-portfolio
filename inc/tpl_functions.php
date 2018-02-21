<?php 
/** 
*   Criação de Meta-Box para registro de informações adicionais.
*       @link https://developer.wordpress.org/reference/functions/add_meta_box/
*/

/**
 * Registro de informações adicionais nas paginas das seções que configurão a homepage;
 * @post-type: secoes
 * -> callback
 * */ 
function callback_subtitle_secoes( $post ){
    $metaID = get_post_meta( $post->ID );

    $subtitleSecao    = $metaID['cb_subtitle_secao'][0];
    ?>

    <div class="">

        <div class="input_wrapper">
            <input id="cb_subtitle_secao" class="" type="text" name="cb_subtitle_secao" value="<?php $subtitleSecao ?>">
        </div>

    </div>

    <?php
}

/**
 * Registero de informações adicionais nas páginas das seções que configurão a homepage;
 * @post-type: secoes
 * -> save
*/
function save_subtitle_secao( $post_id ){
    if( isset( $_POST['cb_subtitle_secao'] ) ){
        update_post_meta( $post_id, 'cb_subtitle_secao', sanitize_text_field( $_POST['cb_subtitle_secao'] ) );
    } else {
        return false;
    }
}
add_action('save_post', 'save_subtitle_secao');

/**
 * Registro de informações adicionais nas páginas das seções que configurão a homepage;
 * @post-type: secoes
 * -> register
 * */ 
function reg_subtitle_secoes(){

    add_meta_box(
        'subtitle-secao',
        'Adicione um subtitulo',
        'callback_subtitle_secoes',
        'secoes',
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes', 'reg_subtitle_secoes');

//---------------------------------------- /End -----------------------------------------//

/**
 * Registro de informações adicionais no projetos;
 * @post-type: projetos
 * -> callback
*/
function callback_link_project( $post ) {
    $metaID = get_post_meta( $post->ID );

    $linkProject = $metaID['cb_link_project'][0];
    ?>

    <div class="">
        <label for="cb_link_project">Link do projeto:</label>
        <input id="cb_link_project" class="" type="text" name="cb_link_project" value="<?php $linkProject ?>">
    </div>

    <?php 
}

/**
 * Registro de informações adicionais no projetos;
 * @post-type: projetos
 * -> save
*/
function save_link_project( $post_id ) {
    if( isset( $_POST['cb_link_project'] ) ) {
        update_post_meta( $post_id, 'cb_link_project', sanitize_text_field( $_POST['cb_link_project'] ) );
    }
    else{
        return 'Link inválido!';
    }
}
add_action( 'save_post', 'save_link_project' );

/**
 * Registro de informações adicionais no projetos;
 * @post-type: projetos
 * -> Register
 */
function reg_link_projects() {
    add_meta_box(
        'link-projects',
        'Adicione o link deste projeto',
        'callback_link_project',
        'projetos',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'reg_link_projects' );

//---------------------------------------- /End -----------------------------------------//

/*  
* Registro de informações adicionais nos templates;
* @post-type: templates
* -> func callback
*/
function callback_templates( $post ) {
    $metaID = get_post_meta( $post->ID );

    $templateVersion        = $metaID['cb_tpl_version'][0];
    $templatePrice          = $metaID['cb_tpl_price'][0];
    $templateBgCustom       = $metaID['cb_tpl_bgcustom'][0];
    ?>

    <div class="cb_container">
        <div class="input_wrapper">
            <label for="cb_meta">Versão:</label>
            <input id="cb_tpl_version" type="number" name="cb_tpl_version" value="<?= $metaVersion ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_meta">Preço:</label>
            <input id="cb_tpl_price" type="text" name="cb_tpl_price" value="<?= $metaPrice ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_meta">Background:</label>
            <input type="file" accept=".jpg, .png" name="cb_tpl_bgcustom" value="<?= $metaBgCustom ?>">
        </div>
    </div>

    <?php
}

/*  
* Registro de informações adicionais nos templates;
* @post-type: templates
* -> func save
*/
function save_templates_infos( $post_id ) {
    if( isset( $_POST['cb_tpl_version'] ) ) {
        update_post_meta( $post_id, 'cb_tpl_version', sanitize_text_field( $_POST['cb_tpl_version'] ) );
    }
    if( isset( $_POST['cb_tpl_price'] ) ) {
        update_post_meta( $post_id, 'cb_tpl_price', sanitize_text_field( $_POST['cb_tpl_price'] ) );
    }
    if( isset( $_POST['cb_tpl_bgcustom'] ) ) {
        update_post_meta( $post_id, 'cb_tpl_bgcustom', sanitize_text_field( $_POST['cb_tpl_bgcustom'] ) );
    }
}
add_action( 'save_post', 'save_templates_infos' );


/*  
* Registro de informações adicionais nos templates;
* @post-type: templates
* -> func register
*/
function register_type_templates() {
    add_meta_box(
        'post-type-templates',
        'Adicione informações do template',
        'callback_templates',
        'templates',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'register_type_templates' );

//---------------------------------------- /End -----------------------------------------//

/**
 * Registro de informações adicionais de contato;
 * @post-type: page
 * @page-slug: contato
 * 
 * -> callback
 */ 
function callback_infos_contato( $post ){
    $metaID = get_post_meta( $post->ID );

    $contatoTel         = $metaID['cb_contato_tel'][0];
    $contatoEmail       = $metaID['cb_contato_email'][0];
    $contatoFacebook    = $metaID['cb_contato_facebook'][0];
    $contatoTwitter     = $metaID['cb_contato_twitter'][0];
    $contatoInstagram   = $metaID['cb_contato_instagram'][0];
    $contatoGithub      = $metaID['cb_contato_github'][0];
    $contatoCodepen     = $metaID['cb_contato_codepen'][0];
    ?>

    <div class="cb_container">
        <h3>Informações de contato</h3>
        <div class="input_wrapper">
            <label for="cb_contato_tel">Telefone:</label>
            <input id="cb_contato_tel" class="" type="text" name="cb_contato_tel" value="<?php echo $contatoTel ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_email">E-mail:</label>
            <input id="cb_contato_email" class="" type="email" name="cb_contato_email" value="<?php echo $contatoEmail ?>">
        </div>
        <h3 class="subtitle">Redes Sociais</h3>
        <div class="input_wrapper">
            <label for="cb_contato_facebook">Página/Perfil Facebook:</label>
            <input id="cb_contato_facebook" class="" type="text" name="cb_contato_facebook" value="<?php echo $contatoFacebook ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_twitter">Twitter:</label>
            <input id="cb_contato_twitter" class="" type="text" name="cb_contato_twitter" value="<?php echo $contatoTwitter ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_instagram">Instagram:</label>
            <input type="text" id="cb_contato_instagram" class="" name="cb_contato_instagram" value="<?php echo $contatoInstagram ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_github">Github:</label>
            <input id="cb_contato_github" class="" type="text" name="cb_contato_github" value="<?php echo $contatoGithub ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_codepen">Codepen:</label>
            <input id="cb_contato_codepen" class="" name="cb_contato_codepen" type="text" value="<?php echo $contatoCodepen ?>">
        </div>
    </div>

    <?php
}

/**
 * -> save
*/
function save_infos_contato( $post_id ) {
 
    if( isset( $_POST['cb_contato_tel'] ) ) {
        update_post_meta( $post_id, 'cb_contato_tel', sanitize_text_field( $_POST['cb_contato_tel'] ) );
    }

    if( isset( $_POST['cb_contato_email'] ) ) {
        update_post_meta( $post_id, 'cb_contato_email', sanitize_text_field( $_POST['cb_contato_email'] ) );
    }
    
    if( isset( $_POST['cb_contato_facebook'] ) ) {
        update_post_meta( $post_id, 'cb_contato_facebook', sanitize_text_field( $_POST['cb_contato_facebook'] ) );
    }

    if( isset( $_POST['cb_contato_twitter'] ) ) {
        update_post_meta( $post_id, 'cb_contato_twitter', sanitize_text_field( $_POST['cb_contato_twitter'] ) );
    }

    if( isset( $_POST['cb_contato_instagram'] ) ) {
        update_post_meta( $post_id, 'cb_contato_instagram', sanitize_text_field( $_POST['cb_contato_instagram'] ) );
    }

    if( isset( $_POST['cb_contato_github'] ) ){
        update_post_meta( $post_id, 'cb_contato_github', sanitize_text_field( $_POST['cb_contato_github'] ) );
    }

    if( isset( $_POST['cb_contato_codepen'] ) ){
        update_post_meta( $post_id, 'cb_contato_codepen', sanitize_text_field( $_POST['cb_contato_codepen'] ) );
    }
}
add_action( 'save_post', 'save_infos_contato' );

/**
 * -> register
 * */ 
function reg_infos_contato () {

    add_meta_box(
        'meta-infos',
        'Adicione suas informações de contato',
        'callback_infos_contato',
        'page',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'reg_infos_contato' );

//---------------------------------------- /End -----------------------------------------//

/** 
* Registro de novos post-types específicos.
* @link https://codex.wordpress.org/pt-br:Tipos_de_Posts_Personalizados
*/

/*
* Post type: Temas
* @desc: tipo específico para adicionar novos temas que serão comercializados
*/ 
add_action( 'init', 'temas' );
function temas() {
    $pluralName = 'Temas';
    $singularName = 'Tema';

    $labels = array(
        'name'                  => $pluralName,
        'singular_name'         => $singularName,
        'add_new'               => 'Novo ' . $singularName,
        'add_new_item'          => 'Adicionar ' . $singularName,
        'edit_item'             => 'Editar ' . $singularName,
        'new_item'              => 'Adicionar novo ' . $singularName,
        'featured_image'        => 'Capa do produto'
    );

    $supports = array(
        'title',
        'editor',
        'thumbnail',
    );

    $args_loja = array(
        'labels'        => $labels,
        'public'        => true,
        'supports'      => $supports,
        'menu_icon'     => 'dashicons-cart'
    );
    register_post_type( 'temas', $args_loja );
}

/*
* Post type: Serviços
*/ 
add_action( 'init', 'servicos' );
function servicos() {
    $pluralName = 'Serviços';
    $singularName = 'Serviço';

    $labels = array(
        'name'              => $pluralName,
        'singular_name'     => $singularName,
        'add_new'           => 'Novo ' . $singularName,
        'add_new_item'      => 'Adicionar ' . $singularName,
        'edit_item'         => 'Editar ' . $singularName,
        'featured_image'    => 'Adicionar ícone'
    );

    $supports = array(
        'title',
        'excerpt',
        'thumbnail'
    );

    $args_services = array(
        'labels'    => $labels,
        'public'    => true,
        'supports'  => $supports,
        'menu_icon' => 'dashicons-editor-code'
    );
    register_post_type( 'servicos', $args_services );
}

/*
* Post type: Portfólio
*/ 
add_action( 'init', 'portfolio' );
function portfolio() {
    $pluralName = 'Portfólio';
    $singularName = 'Portfólio';

    $labels = array(
        'name'              => $pluralName,
        'singular_name'     => $singularName,
        'add_new'           => 'Novo ' . $singularName,
        'add_new_item'      => 'Adicionar ' . $singularName,
        'edit_item'         => 'Editar ' . $singularName,
        'featured_image'    => 'Adicionar Capa do trabalho'
    );

    $supports = array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
    );

    $args_portfolio = array(
        'labels'    => $labels,
        'supports'  => $supports,
        'public'    => true,
        'menu_icon' => ''
    );
    register_post_type( 'portfolio', $args_portfolio );
}

/*
*   Registro de categorias e tags relacionadas aos posts
*       @link https://codex.wordpress.org/Function_Reference/register_taxonomy
*/
$forCategoriesAndTags = array(
    'temas',
    'servicos',
    'portfolio',
    'posts'
);

$nameCatPlural = 'Categorias';
$nameCatSingular = 'Categoria';

$labelsCat = array(
    'name'              => $nameCatPlural,
    'singular_name'     => $nameCatSingular,
    'add_new_item'      => 'Adicionar ' . $nameCatSingular,
    'edit_item'         => 'Editar ' . $nameCatSingular
);

$argssCat = array(
    'labels'        => $labelsCat,
    'hierarchical'  => true,
    'public'        => true
);
register_taxonomy('categorias', $forCategoriesAndTags, $argssCat);

/*
* Registro de tags
*/
$nameTagsPlural     = 'Tags';
$nameTagsSingular   = 'Tag';

$labelsTags = array(
    'name'          => $nameTagsPlural,
    'singular_name' => $nameTagsSingular,
    'add_new_item'  => 'Adicionar ' . $nameTagsSingular,
    'edit_item'     => 'Editar ' . $nameTagsSingular
);

$argsTags = array(
    'labels'        => $labelsTags,
    'hierarchical'  => false,
    'public'        => true
);
register_taxonomy('tags', $forCategoriesAndTags, $argsTags);

/**
* Criando uma area de widgets
*
*/
function widgets_novos_widgets_init() {

    register_sidebar( array(
        'name'              => 'Informacoes',
        'id'                => 'contact-widget',
        'before_widget'     => '<div>',
        'after_widget'      => '</div>',
        'before_title'      => '<h2>',
        'after_title'       => '</h2>',
    ) );
}
add_action( 'widgets_init', 'widgets_novos_widgets_init' );

/**
*    WP Enqueue stylesheet
*/
if ( !function_exists( 'load_style_scripts' ) ) {

    $path = get_template_directory_uri();

    function load_style_scripts () {

        wp_enqueue_style( 'reset', get_template_directory_uri() . '/libs/css/reset.min.css', array(), true );
        wp_enqueue_style( 'animations', get_template_directory_uri() . '/libs/css/keyframes.min.css', array(), true );
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/libs/css/slick.min.css', array(), true );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/libs/css/bootstrap.min.css', array(), true );
        wp_enqueue_style( 'main', get_template_directory_uri() . '/libs/css/style-theme.min.css', array(), true );
    }
    add_action( 'wp_enqueue_scripts', 'load_style_scripts' );
}


/**
*    WP Enqueue Javascript
*/
if ( ! function_exists( 'load_scripts_js' ) ) {

    function load_scripts_js() {
        
        // jQuery
        wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/libs/js/jquery-3.1.0.min.js', array(), null, true );

        // jQuery easing
        wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/libs/js/jquery-ui.min.js', array(), null, true );

        // Slick slider
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/libs/js/slick.js', array('jquery'), null, true );

        // Main functions js
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/libs/js/functions.js', array('jquery'), null, true );

        // Form contact functions js
        wp_enqueue_script( 'form-contact', get_template_directory_uri() . '/libs/js/form-contato.js' , array('jquery'), null, true );
        
    }
    add_action( 'wp_enqueue_scripts', 'load_scripts_js' );
}

?>