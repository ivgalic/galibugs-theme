<article <?php post_class(); ?> >
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
