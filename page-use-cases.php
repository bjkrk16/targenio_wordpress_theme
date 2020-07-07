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

<div class="use-case-post-container produkt-container">
<?php 
    // Use Cases
    $cat = 'Use Case';
    $amount = 0;
    $cat_id = get_cat_ID( $cat );
    $cat_url = get_category_link( $cat_id );
    $post_categories = get_the_category();
    $excerpt_length = 1024;
    $args = array(
        'cat' => $cat_id,
        'posts_per_page' => 100
    );
    ?>
    <!-- <div class="home__preview-info"> -->
        <!-- <h3 class="preview-info__headline"><?php echo $cat ?></h3> -->
        <!-- <a class="preview-info__link" href="<?php echo esc_url( $cat_url ); ?>">Alle Artikel zum Thema <?php echo $cat ?></a> -->
    <!-- </div> -->
    <div class="home__post-preview-wrapper">

        <?php $allgemein_query = new WP_Query( $args );?>
        
        <?php if ( $allgemein_query->have_posts() ) : ?>

        <?php while ( $allgemein_query->have_posts() ) : $allgemein_query->the_post(); ?>

        <div class="home__post-preview home__post-preview--<?php echo strtolower($type); ?>">

            <div class="post-container post-container--<?php echo $type ?>" ?>
                <?php if (has_post_thumbnail()) : ?>
                <div class="post-container__thumb post-container__thumb--<?php echo $type ?>">
                    <a class="thumb__link" href="<?php the_permalink() ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                    </a>
                </div>
                <?php endif; ?>
                <?php
                // $post = the_post();
                $post_id = $allgemein_query->post->ID;
                $post_category = get_the_category($post_id);
                // echo '<pre>' . var_export($post_category, true) . '</pre>';
                if( $type === 'hero' ) { 
                    rewind_posts(); 
                }
                ?>
                <a class="post-container__post-info post-container__post-info--<?php echo $type ?>" href="<?php the_permalink(); ?>">
                    <?php $author_id = get_the_author_meta( 'ID' ); ?>
                    <div class="post-info__headline-info">
                        <p class="headline-info__category"><?php echo $post_category[0]->name; ?></p>
                        <h4 class="headline-info__headline"><?php the_title(); ?></h4>
                    </div>
                    <div class="post-info__excerpt">
                        <p><?php echo substr(get_the_excerpt( $post_id ), 0, $excerpt_length); ?></p>
                    </div>
                    <a class="use-case-post-preview-link" href="<?php the_permalink(); ?>">Mehr</a>
                </a>
            </div>
        
        </div>

        <?php endwhile; ?>
        <?php 
        wp_reset_postdata(); 
        if( $type === 'hero' ) { 
            wp_reset_query();
        }
        ?>

        <?php endif; ?>
    </div>
    <?php
    // !POSTBLOCK
    ?>
</div>

<div class="use-case-quote">
    <h3>In agilen Zeiten sollten Automatisierungsprojekte in Wochen und Monaten nicht in Jahren gemessen werden.</h3>
</div>

</div>
<?php get_footer(); ?>