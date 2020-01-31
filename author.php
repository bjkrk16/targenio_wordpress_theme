<?php get_header(); ?>

<?php $currAuthorID = get_the_author_meta( 'ID' ); ?>

<?php if ( have_posts() ) : ?>

    <div class="author-container">

        <div class="author-container__author-info">
            <!-- <img src="<?php //echo esc_url(get_avatar_url( $currAuthorID )) ?>" alt=""> -->
            <h2>Alle Artikel von <?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></h2>
            <?php if ( get_the_author_meta( 'description' ) ) {
                // the_author_meta( 'description' );
            } ?>
        </div>

        <div class="author-container__author-posts">
            <?php while ( have_posts() ) : the_post(); ?>

            <div class="category__post-preview">

                <?php
                $excerpt_length = 512;
                ?>
                <div class="post-container">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="post-container__thumb post-container__thumb--author">
                        <a class="thumb__link" href="<?php the_permalink() ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        </a>
                    </div>
                    <?php endif; ?>
                    <a class="post-container__post-info post-container__post-info--author" href="<?php the_permalink(); ?>">
                        <?php $author_id = get_the_author_meta( 'ID' ); ?>
                        <div class="post-info__headline-info">
                            <?php $category = get_the_category(); ?>
                            <p class="headline-info__category"><?php echo $category[0]->name; ?></p>
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