<div class="gb-pageheader">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="center-block">
          <h1 class="center-block">Blog</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="navbar-right">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".nav-categories-collapse">
        <span class="sr-only"><?= __('Toggle category navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <nav class="nav-categories-collapse" role="navigation">
        <ul class="gb-category-nav">
          <?php
           $is_category = is_category();
           $categories = get_categories(array('hide_empty' => 0));
           $current_cat_id = -1;
           if ($is_category) {
             $current_cat_id = get_query_var('cat');
           }
           $is_first = true;
           foreach($categories as $cat) {
             $is_current_cat = $is_category && ($cat->cat_ID == $current_cat_id);
             $li = ($is_first ? '' : ' | ');
             $li .= '<li class="' . ($is_current_cat ? 'cur-cat-item' : 'cat-item') . '"><a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
             echo $li;

             $is_first = false;
           }
          ?>
        </ul>

    </nav>
  </div>
</div>