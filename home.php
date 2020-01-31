<?php get_header(); ?>

<div class="home-container">

<?php 
    // https://stackoverflow.com/questions/3127385/wordpress-get-the-page-id-outside-the-loop
    $page_object = get_queried_object();
    $page_id     = get_queried_object_id();
    if ( post_password_required($page_id) ) : 
        echo get_the_password_form();

    else:
?>

    <?php 
    // HERO 
    $type = 'hero';
    $cat = null;
    $amount = 0;
    $amount = ($type === 'post' ? 2 : 0);
    $amount = ($type === 'hero' ? 1 : 0);
    $cat_id = get_cat_ID( $cat );
    $cat_url = get_category_link( $cat_id );
    $excerpt_length = 512;
    if ($type === 'post') {
        $args = array(
            'cat' => $cat_id,
            'posts_per_page' => $amount
        );
    } else {
        $args = array(
            'posts_per_page' => $amount
        );
    }
    ?>
    <?php if ($type === 'post') : ?>
    <div class="home__preview-info">
        <h3 class="preview-info__headline"><?php echo $cat ?></h3>
        <a class="preview-info__link" href="<?php echo esc_url( $cat_url ); ?>">Alle Artikel zum Thema <?php echo $cat ?></a>
    </div>
    <?php endif; ?>
    <div class="home__post-preview home__post-preview--<?php echo strtolower($type); ?>">

        <?php $allgemein_query = new WP_Query( $args ); ?>
        
        <?php if ( $allgemein_query->have_posts() ) : ?>

        <?php while ( $allgemein_query->have_posts() ) : $allgemein_query->the_post(); ?>

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
                    <div class="post-info__excerpt"><p><?php echo substr(get_the_excerpt( $post_id ), 0, $excerpt_length); ?></p></div>
                    <p class="post-info__author-date">von <span><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></span> | <?php echo get_the_date('j. F Y'); ?></p>
                </a>
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
    // !HERO
    ?>

    <?php 
    // Technologie & Business 
    $type = 'post';
    $cat = 'Technologie & Business';
    $amount = 0;
    $amount = ($type === 'post' ? 2 : 0);
    $amount = ($type === 'hero' ? 1 : 0);
    $cat_id = get_cat_ID( $cat );
    $cat_url = get_category_link( $cat_id );
    $excerpt_length = 512;
    if ($type === 'post') {
        $args = array(
            'cat' => $cat_id,
            'posts_per_page' => 2
        );
    } else {
        $args = array(
            'posts_per_page' => $amount
        );
    }
    ?>
    <div class="home__preview-info">
        <h3 class="preview-info__headline"><?php echo $cat ?></h3>
        <a class="preview-info__link" href="<?php echo esc_url( $cat_url ); ?>">Alle Artikel zum Thema <?php echo $cat ?></a>
    </div>
    <div class="home__post-preview-wrapper">

        <?php $allgemein_query = new WP_Query( $args ); ?>
        
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
                    <div class="post-info__excerpt"><p><?php echo substr(get_the_excerpt( $post_id ), 0, $excerpt_length); ?></p></div>
                    <p class="post-info__author-date">von <span><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></span> | <?php echo get_the_date('j. F Y'); ?></p>
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

    <?php 
    // Produkt & Features 
    $type = 'post';
    $cat = 'Produkt & Features';
    $amount = 0;
    $amount = ($type === 'post' ? 2 : 0);
    $amount = ($type === 'hero' ? 1 : 0);
    $cat_id = get_cat_ID( $cat );
    $cat_url = get_category_link( $cat_id );
    $excerpt_length = 256;
    if ($type === 'post') {
        $args = array(
            'cat' => $cat_id,
            'posts_per_page' => 2
        );
    } else {
        $args = array(
            'posts_per_page' => $amount
        );
    }
    ?>
    <div class="home__preview-info">
        <h3 class="preview-info__headline"><?php echo $cat ?></h3>
        <a class="preview-info__link" href="<?php echo esc_url( $cat_url ); ?>">Alle Artikel zum Thema <?php echo $cat ?></a>
    </div>
    <div class="home__post-preview-wrapper">

        <?php $allgemein_query = new WP_Query( $args ); ?>
        
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
                    <div class="post-info__excerpt"><p><?php echo substr(get_the_excerpt( $post_id ), 0, $excerpt_length); ?></p></div>
                    <p class="post-info__author-date">von <span><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></span> | <?php echo get_the_date('j. F Y'); ?></p>
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

    <?php 
    // Unternehmen 
    $type = 'post';
    $cat = 'Unternehmen';
    $amount = 0;
    $amount = ($type === 'post' ? 2 : 0);
    $amount = ($type === 'hero' ? 1 : 0);
    $cat_id = get_cat_ID( $cat );
    $cat_url = get_category_link( $cat_id );
    $excerpt_length = 256;
    if ($type === 'post') {
        $args = array(
            'cat' => $cat_id,
            'posts_per_page' => 2
        );
    } else {
        $args = array(
            'posts_per_page' => $amount
        );
    }
    ?>
    <div class="home__preview-info">
        <h3 class="preview-info__headline"><?php echo $cat ?></h3>
        <a class="preview-info__link" href="<?php echo esc_url( $cat_url ); ?>">Alle Artikel zum Thema <?php echo $cat ?></a>
    </div>
    <div class="home__post-preview-wrapper">

        <?php $allgemein_query = new WP_Query( $args ); ?>
        
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
                    <div class="post-info__excerpt"><p><?php echo substr(get_the_excerpt( $post_id ), 0, $excerpt_length); ?></p></div>
                    <p class="post-info__author-date">von <span><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></span> | <?php echo get_the_date('j. F Y'); ?></p>
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

<?php
    endif;
?>

</div>

<?php get_footer(); ?>