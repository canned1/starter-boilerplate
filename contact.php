<?php
/*
Template Name: Contacto
*/
?>
<?php get_header(); ?>
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 card my-4 p-4">
        <?php echo do_shortcode ('[contact-form-7 id="24" title="Contact form 1"]'); ?>
      </div>
    </div>        
  </div>
<?php get_footer(); ?>
