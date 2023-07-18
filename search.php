
<?php get_header(); ?>

<div class="container">
	<div class="search">
		<div class="form-search">
			<?php 
			if( have_posts() ):
				while( have_posts() ): the_post();
					get_template_part('content', 'search');
				endwhile;
			endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
