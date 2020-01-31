<?php

/**
 * Template Name: Custom Page Template
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

    <article class="page-layout">
        <h2><?php the_title(); ?></h2>
        <h3>Custom Page Template</h3>
        <?php the_content(); ?>
    </article>

    <?php endwhile;

else :
    echo'<p>There are no pages!</p>';

endif;

get_footer();

?>