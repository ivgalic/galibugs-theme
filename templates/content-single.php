<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <?php
        $image_url = "";
        if (has_post_thumbnail()) {
          $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
        }

        $output = "<img class='post-large-image' src='" . $image_url . "'></img>";
        echo $output;
      ?>
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
