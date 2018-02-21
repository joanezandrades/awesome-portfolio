<?php
/**
* Awesome Portfolio single-portfolio.
*
* @package Awesome Portfolio
*/

get_header();
?>

<?php

if( have_posts() ) :
    while( have_posts() ):
        the_post();
?>
<main id="post-portfolio" class="container">
    <header class="header-post">
        <h1 class="title-post"><?php the_title(); ?></h1>
        
        <div class="excerpt">
            <?php the_excerpt() ?>
        </div>

        <div class="wrap-infos row">
            <span class="date col-xl-4"><?php the_date(); ?></span>

            <span class="author col-xl-4">Por: <?php the_author() ?></span>

            <div class="wrap-share col-xl-4">
                <?php render_social_share() ?>
            </div>
        </div>
    </header> <!-- /End header -->

    <div class="content-post">
        <?php the_content(); ?>
    </div>
</main>


<?php 
    endwhile;
endif;
?>

<?php 
get_footer();
?>