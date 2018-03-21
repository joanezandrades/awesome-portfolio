<?php 
/** 
 *  Campos adicionais e registro de meta_box
 *  cb_ = callback
 *
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */

/**
 *  Registro de informações adicionais na página de contato;
 *  post-type: page
 *  page-slug: contato
 * 
 * @callback
 */ 
function cb_inf_contact( $post ){
    $metaID = get_post_meta( $post->ID );

    $contatoTel         = $metaID['cb_contato_tel'][0];
    $contatoEmail       = $metaID['cb_contato_email'][0];
    $contatoFacebook    = $metaID['cb_contato_facebook'][0];
    $contatoTwitter     = $metaID['cb_contato_twitter'][0];
    $contatoInstagram   = $metaID['cb_contato_instagram'][0];
    $contatoGithub      = $metaID['cb_contato_github'][0];
    $contatoCodepen     = $metaID['cb_contato_codepen'][0];
    ?>

    <div class="container">
        <h3>Informações de contato</h3>
        <div class="input_wrapper">
            <label for="cb_contato_tel">Telefone:</label>
            <input id="cb_contato_tel" class="ipt-form" type="text" name="cb_contato_tel" value="<?php echo $contatoTel ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_email">E-mail:</label>
            <input id="cb_contato_email" class="ipt-form" type="email" name="cb_contato_email" value="<?php echo $contatoEmail ?>">
        </div>
        <h3 class="subtitle">Redes Sociais</h3>
        <div class="input_wrapper">
            <label for="cb_contato_facebook">Página/Perfil Facebook:</label>
            <input id="cb_contato_facebook" class="ipt-form" type="text" name="cb_contato_facebook" value="<?php echo $contatoFacebook ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_twitter">Twitter:</label>
            <input id="cb_contato_twitter" class="ipt-form" type="text" name="cb_contato_twitter" value="<?php echo $contatoTwitter ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_instagram">Instagram:</label>
            <input type="text" id="cb_contato_instagram" class="ipt-form" name="cb_contato_instagram" value="<?php echo $contatoInstagram ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_github">Github:</label>
            <input id="cb_contato_github" class="ipt-form" type="text" name="cb_contato_github" value="<?php echo $contatoGithub ?>">
        </div>
        <div class="input_wrapper">
            <label for="cb_contato_codepen">Codepen:</label>
            <input id="cb_contato_codepen" class="ipt-form" name="cb_contato_codepen" type="text" value="<?php echo $contatoCodepen ?>">
        </div>
    </div>

    <?php
}

/**
 * @save
*/
function save_contact( $post_id ) {
 
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
add_action( 'save_post', 'save_contact' );

/**
 * @register
*/ 
function reg_infos_contato () {

    add_meta_box(
        'meta-infos',
        'Adicione suas informações de contato',
        'cb_inf_contact',
        'page',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'reg_infos_contato' );

//---------------------------------------- /End -----------------------------------------//

/** 
 *  Posts personalizados
 *
 * @link https://codex.wordpress.org/pt-br:Tipos_de_Posts_Personalizados
 */

/*
*   Post type: temas
*   desc: Onde cada novo tema wordpress será postado.
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
 *  Post type: Serviços
 *  desc: Onde cada serviço oferecido pelo profissional deve ser postado.
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

/**
 *  Post type: Portfólio
 *  desc: Onde cada projeto deverá ser postado
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

/**
 *  Categorias para tipos de posts personalizados.
 * 
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
*/
$arr_types_posts = array(
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
register_taxonomy('categorias', $arr_types_posts, $argssCat);

/**
 *  Tags para tipos de posts personalizados.
 * 
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
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
register_taxonomy('tags', $arr_types_posts, $argsTags);

/**
 *  Load stylesheets
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
 *  Load JS
*/
if ( ! function_exists( 'load_scripts_js' ) ) {

    function load_scripts_js() {
        
        // jQuery
        wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/libs/js/jquery-3.1.0.min.js', array(), null, true );

        // jQuery easing
        wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/libs/js/jquery-ui.min.js', array(), null, true );

        // Slick slider
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/libs/js/slick.js', array('jquery'), null, true );

        // js Mask
        // wp_enqueue_script( 'jQuery-mask', get_template_directory_uri() . '/libs/js/jquery.mask.min.js', array('jquery'), null, true );

        // Main functions js
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/libs/js/functions.js', array('jquery'), null, true );

        // Form contact functions js
        wp_enqueue_script( 'form-contact', get_template_directory_uri() . '/libs/js/form-contato.js' , array('jquery'), null, true );
        
    }
    add_action( 'wp_enqueue_scripts', 'load_scripts_js' );
}

?>