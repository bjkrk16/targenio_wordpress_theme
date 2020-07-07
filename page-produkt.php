<?php get_header(); ?>

<div class="container">

<?php 
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

            <article class='produkt-container'>
                <?php the_content(); ?>
            </article>

        <?php endwhile; 

    else : 
        echo'<p>There are no pages!</p>';
    endif;
?>

</div>

<?php get_footer(); ?>