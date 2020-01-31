<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <div class="category-container">

        <h2><?php echo single_cat_title( '', false ) ?></h2>

        <div class="category-container__posts-wrapper">

        <?php while ( have_posts() ) : the_post(); ?>

            <div class="category__post-preview category__post-preview--<?php echo strtolower(single_cat_title( '', false )); ?>">

                    <?php
                    $excerpt_length = 512;
                    ?>
                    <div class="post-container">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="post-container__thumb post-container__thumb--category">
                            <a class="thumb__link" href="<?php the_permalink() ?>">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </a>
                        </div>
                        <?php endif; ?>
                        <a class="post-container__post-info post-container__post-info--category" href="<?php the_permalink(); ?>">
                            <?php $author_id = get_the_author_meta( 'ID' ); ?>
                            <div class="post-info__headline-info">
                                <p class="headline-info__category"><?php echo single_cat_title( '', false ) ?></p>
                                <h4 class="headline-info__headline"><?php the_title(); ?></h4>
                            </div>
                            <div class="post-info__excerpt"><p><?php echo substr( get_the_excerpt(), 0, $excerpt_length); ?></p></div>
                            <p class="post-info__author-date">von <span><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></span> | <?php echo get_the_date('j. F Y'); ?></p>
                        </a>
                    </div>

            </div>

        <?php endwhile; ?>

        </div>

    </div>

<?php endif; ?>

<?php get_footer(); ?> 