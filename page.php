<?php get_header(); ?>
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-9">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
        endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
      </div>
    </div>        
  </div>
<?php get_footer(); ?>