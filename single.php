
<?php get_header(); ?>
    <section class="container article mt-5">        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <div class="col-12 text-center article-date"><?php echo get_the_date(); ?></div>
                <h1 class="col-12 col-md-8 offset-md-2 text-center article-title"><?php the_title(); ?></h1>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 mt-4">
                        <img class="img-fluid w-100" src="<?php echo get_the_post_thumbnail_url( $recent["ID"], 'full' ); ?>" alt="<?php the_title(); ?>">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-7 article-content mt-5">
                        <?php the_content(); ?>
                        <div class="col-12 p-0 article-author">
                            <div class="row">
                                <hr class="col-12">
                                <div class="col-2">
                                    <img class="img-fluid" src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>" />
                                </div>
                                <div class="col-10">
                                    <p class="article-author-fullname"><?php echo nl2br(get_the_author_meta('first_name')); ?> <?php echo nl2br(get_the_author_meta('last_name')); ?></p>
                                    <p class="article-author-description"><?php echo nl2br(get_the_author_meta('description')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 featured">
                        <div class="row no-gutters mb-3">
                        <div class="col-2 lines align-self-end"></div>
                        <div class="col-12 justify-content-center mt-5">
                            <h2 class="mb-0">Los más Leidos</h2>
                        </div>
                        <div class="col-2 lines align-self-end"></div>
                        </div>

                        <?php 
                        $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'post_views_count', 'orderby' => 'post_views_count', 'order' => 'DESC'  ) );
                        while ( $popularpost->have_posts() ) : $popularpost->the_post();
                            echo '<a href="'.get_the_permalink($post->ID).'" class="row">';
                            echo '<div class="col-3 px-2">';
                                echo '<img class="img-fluid featured-img" src="'.get_the_post_thumbnail_url($post->ID, 'full').'">';
                            echo '</div>';
                            echo '<div class="col-9 p-0">';
                                echo '<p>'.get_the_title($post->ID).'</p>';
                            echo '</div>';
                            echo '</a>';
                        endwhile;
                        ?>
                    </div>                  
                </div>                
            </article>
            <div class="row">
                <div class="col-12 col-sm-8 comments"><?php comments_template(); ?></div>
                <div class="col-12 col-sm-4">
                <?php
                    $posttags = get_the_tags();
                    if ($posttags) {
                        foreach($posttags as $tag) {
                            echo '#'.$tag->name . ' '; 
                        }
                    }
                    ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </section>
<?php get_footer(); ?>