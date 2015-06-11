<article <?php post_class(); ?>>
  <header class="gb-entry-summary-header">
    <?php
      $image_url = "";
      if (has_post_thumbnail()) {
        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
      }

      $output = "<img class='post-preview-large-image' src='" . $image_url . "'></img>";
      echo $output;
    ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
