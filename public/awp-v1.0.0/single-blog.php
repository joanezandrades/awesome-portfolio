<?php
/**
 * Awesome Portfolio single-blog.
 *
 * @package Awesome Portfolio
 */
 
get_header();
?>

<?php
    if( have_posts() ) : 
        while ( have_posts() ) : 
            the_post();
?>
<main id="post-blog">
    <header class="header-post">

        <div class="wrap-content container_one">

            <h1 class="title-post" title="<?= the_title(); ?>"><?= the_title(); ?></h1>
            
            <h3 class="subtitle-post"><?php the_excerpt() ?></h3>

            <div class="wrapper-footer">
                <div class="col-three">
                    <span class="the-date"><?= the_date(); ?></span>
                </div>
                
                <div class="col-three">
                    <p class="author">Por: <?php echo get_the_author()?></p>
                </div>

                <div>
                    <ul class="social-share">
                        <span>share:</span>
                        <li class="social-item">
                            <i class="icon fa fa-twitter"></i>
                        </li>
                        <li class="social-item">
                            <i class="icon fa fa-facebook"></i>
                        </li>
                    </ul>
                </div>
            </div>
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
