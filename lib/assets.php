<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
 */

class JsonManifest {
  private $manifest;

  public function __construct($manifest_path) {
    if (file_exists($manifest_path)) {
      $this->manifest = json_decode(file_get_contents($manifest_path), true);
    } else {
      $this->manifest = [];
    }
  }

  public function get() {
    return $this->manifest;
  }

  public function getPath($key = '', $default = null) {
    $collection = $this->manifest;
    if (is_null($key)) {
      return $collection;
    }
    if (isset($collection[$key])) {
      return $collection[$key];
    }
    foreach (explode('.', $key) as $segment) {
      if (!isset($collection[$segment])) {
        return $default;
      } else {
        $collection = $collection[$segment];
      }
    }
    return $collection;
  }
}

function asset_path($filename) {
  $dist_path = get_template_directory_uri() . DIST_DIR;
  $directory = dirname($filename) . '/';
  $file = basename($filename);
  static $manifest;

  if (empty($manifest)) {
    $manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
    $manifest = new JsonManifest($manifest_path);
  }

  if (WP_ENV !== 'development' && array_key_exists($file, $manifest->get())) {
    return $dist_path . $directory . $manifest->get()[$file];
  } else {
    return $dist_path . $directory . $file;
  }
}

function get_retina_bg_asset_css($filename, $ext, $w = "auto", $h = "auto") {
  $at1x_path = "../../../../assets/{$filename}.{$ext}";
  $at2x_path = "../../../../assets/{$filename}@2x.#{$ext}";

  $output = "background-image: url('{$at1x_path}');";

  $output .= "
  @media all and (-webkit-min-device-pixel-ratio : 1.5),
         all and (-o-min-device-pixel-ratio: 3/2),
         all and (min--moz-device-pixel-ratio: 1.5),
         all and (min-device-pixel-ratio: 1.5) {
           background-image: url('{$at2x_path}');
           background-size: $w $h;
  }";

  return $output;
}

function get_retina_bg_image_css($filename, $w = "auto", $h = "auto") {
  $base = substr($filename, 0, -4);
  $ext = substr($filename, count($filename) - 4, 4);
  $at1x_path = $filename;
  $at2x_path = "{$base}@2x.{$ext}";

  $output = "background-image: url(\"{$at1x_path}\");";

  $output .= "
  @media all and (-webkit-min-device-pixel-ratio : 1.5),
         all and (-o-min-device-pixel-ratio: 3/2),
         all and (min--moz-device-pixel-ratio: 1.5),
         all and (min-device-pixel-ratio: 1.5) {
           background-image: url(\"{$at2x_path}\");
           background-size: $w $h;
  }";

  return $output;
}

function get_asset_path($filename) {
  return get_template_directory_uri() . "/assets/" . $filename;
}

function assets() {
  wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
  wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

function theme_fonts() {
  wp_dequeue_style('open-sans');
  wp_deregister_style('open-sans');
  wp_register_style('open-sans', '//fonts.googleapis.com/css?family=Quicksand:300,400|Raleway:700,400,200');
  wp_enqueue_style('open-sans');
}
add_action('wp_print_styles', __NAMESPACE__ . '\\theme_fonts', 100000);