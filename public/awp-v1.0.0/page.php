<?php
/**
 * Awesome Portfolio page.
 *
 * @package Awesome Portfolio
 */
get_header()
?>

<?php
    if( have_posts() ) : 
        while ( have_posts() ) : 
            the_post();
?>
<main id="post-blog">
    <header class="header-post cover">
        <?php 
            the_post_thumbnail('awp-cover'); 
        ?>
    
        <div class="wrap-title container_one">
            <?php
                the_category();
            ?>
            <!-- Provisório -->
            <!-- <span class="the-category">
            </span>  -->

            <h1 class="title-post" title="<?= the_title(); ?>"><?= the_title(); ?></h1>
            <div class="line-sep"></div>
            <span class="the-date"><?= the_date(); ?></span>

            <ul class="social-share">
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
        </div>
            
    </header> <!-- /End header post-blog --> 

    <section class="post-body">
        <div class="content">
            <?= the_content(); ?>
        </div>
    
        <div class="wrapper_tags">
            <?php the_tags(); ?>
        </div>
    </section> <!-- /End post-body -->
<?php
        endwhile;
    else :
?>
    <h1>Post not found!</h1>
    
</main>


<?php
    endif;

get_footer();
?>