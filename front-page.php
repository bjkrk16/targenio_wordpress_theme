<?php get_header(); ?>

<main class="main container">
    <!-- <h1 class="main__title">wohoo</h1> -->

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
     
            <article class="post container__front-page">
                <!-- <h2><a href="<?php // the_permalink() ?>"><?php // the_title() ?></a></h2> -->
                <?php the_content() ?>
            </article>
        
        <?php endwhile; 
    endif; ?>
</main>

<?php get_footer(); ?>