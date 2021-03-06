<?php

function render_small_previews($atts) {
  $atts = shortcode_atts( array(
    'count' => 3,
    'posts_per_row' => 3,
    'column_class' => 'col-sm-4'), $atts, 'post_previews_small');
  $args = array('posts_per_page' => $atts['count']);
  $posts = get_posts($args);
  if (count($posts) == 1) {
    $posts[1] = $posts[0];
    $posts[2] = $posts[0];
  }

  global $post;

  $col_class = $atts['column_class'];
  $per_row = $atts['posts_per_row'];
  $i = 0;
  $has_output = false;
  $output = "";
  foreach($posts as $post) {
    setup_postdata($post);
    if ($i % $per_row == 0) {
      if ($has_output == true) {
        $output .= "</div>";
      }
      $output .= "<div class='row'>";
      $has_output = true;
    }
    $output .= "<div class='{$col_class}'>";
    $output .= render_small_preview($post);
    $output .= "</div>";

    ++$i;
  }
  if ($has_output) {
    $output .= "</div>";
  }

  wp_reset_postdata();

  return $output;
}

function render_small_preview($post_obj) {

  $output = "";
  $output .= "<div class='gb-small-post-preview'>";

  $image_url = "";
  if (has_post_thumbnail($post_obj->ID)) {
    $image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post_obj->ID), 'thumbnail')[0];
  }

  $output .= "<img class='small-image' src='" . $image_url . "'></img>";

  $output .= "<h5>{$post_obj->post_title}</h5>";
  $output .= "<p class='post-excerpt'>" . get_the_excerpt() . "</p>";
  $output .= "</div>";



  return $output;
}

add_shortcode('post_previews_small', 'render_small_previews');

?>