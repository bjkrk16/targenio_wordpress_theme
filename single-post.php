<?php get_header(); ?>

<div class="single-post-container">

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <?php if (has_post_thumbnail()) : ?>
        <div class="single-post__hero">
            <img class="hero__img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        </div>
        <?php endif; ?>
        <article class='single-post-layout'>
            <?php 
                $category = get_the_category(); 
                // Hide the authors info DOM node.
                $hide_author_info = false;
                // print("<pre>".print_r($category,true)."</pre>"); 
                if ($category[1] && $category[1]->category_nicename === "use-case") {
                    $parent_category = $category[1]; 
                    // echo "$parent_category->category_nicename";
                    $hide_author_info = true;
                } else {
                    // echo "no category parent";
                    $hide_author_info = false;
                }
                
            ?>
            <div class="single-post-layout__title">
                <p class="title__category typo__single-post-title-category"><?php echo $category[0]->name; ?></p>
                <h2><?php the_title(); ?></h2>
            </div>
            <?php 
                $author_id = get_the_author_meta( 'ID' );
                $avatar_url = get_avatar_url( $author_id );
                $mail_subject = 'Kontaktaufnahme via targenio Corporate Blog';
                $parsed_subject = str_replace(' ', '%20', $mail_subject);
                $share_subject = str_replace(' ', '%20', get_the_title());
                $share_body_prefix = 'Ein sehr lesenswerter Artikel%3A ';
                $share_body_link = str_replace( ' ', '%20', esc_url(get_the_permalink()) );
                $share_body = $share_body_prefix . $share_body_link;
            ?>
            
            <?php if(!$hide_author_info): ?>
            <div class="single-post-layout__info">
                <div class="info-wrapper">
                    <a href="<?php echo esc_url(get_author_posts_url( $author_id )); ?>">
                        <img src="<?php echo $avatar_url; ?>" alt="<?php the_author(); ?> profile image">
                    </a>
                    <div class="info__name">
                        <a href="mailto:<?php echo get_the_author_meta( 'user_email' ); ?>?subject=<?php echo $parsed_subject ?>">
                            <?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ) . ' '; ?>
                        </a>
                        <span> | <?php the_date(); ?></span>
                    </div>
                </div>
                <a class="info__share" href="mailto:?subject=<?php echo $share_subject ?>&amp;body=<?php echo $share_body ?>" class="single-post-layout__share">Artikel verschicken</a>    
            </div>
            <?php endif; ?>
            <!-- <button class="copy-to-clipboard">Copy</button> -->
            <?php the_content(); ?>
        </article>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

    <?php endwhile; 
endif;
?>

</div>

<?php get_footer(); ?>