<article <?php post_class(); ?>>
  <header class="gb-entry-summary-header">
    <?php
      $image_name = "default_large_post";
      $image_ext = "jpg";
      if (has_post_thumbnail()) {
        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $image_name = substr($image_url, 0, -4);
        $image_ext = substr($image_url, count($image_url), 4);
      }

      $output = "<div class=\"post-preview-large-image\" style=\"" . Roots\Sage\Assets\get_retina_bg_css($image_name, $image_ext) . "\"></div>";
      echo $output;
    ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
