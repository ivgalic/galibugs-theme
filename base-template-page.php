<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
      get_template_part('templates/page-header');
    ?>
    <div class="container content" role="document">
      <div class="row">
        <div class="col-sm-12">
          <?php
            if (has_post_thumbnail()) {
              $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
              $output = "<img class='post-large-image' src='" . $image_url . "'></img>";
              echo $output;
            }
          ?>
        </div>
      </div>
      <div class="row gb-section-start">
        <main class="main" role="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
      </div>  
    </div><!-- /.container .content -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
