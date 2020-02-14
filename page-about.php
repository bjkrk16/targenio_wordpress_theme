<?php get_header(); ?>

<div class="about-container">

<?php 
    // https://stackoverflow.com/questions/3127385/wordpress-get-the-page-id-outside-the-loop
    $page_object = get_queried_object();
    $page_id     = get_queried_object_id();
    if ( post_password_required($page_id) ) : 
        echo get_the_password_form();
    else:
        if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
         
                <article class="post container__content">
                    <!-- <h2><a href="<?php // the_permalink() ?>"><?php // the_title() ?></a></h2> -->
                    <?php the_content() ?>
                </article>
            
            <?php endwhile; 
        endif;
?>

<?php
    endif;
?>

</div>

<?php get_footer(); ?>