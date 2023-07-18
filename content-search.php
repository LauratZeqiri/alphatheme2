<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<?php if( has_post_thumbnail() ): ?>
		<?php endif; ?>
			<div class="first">
				<div class="image-search" ><?php the_post_thumbnail('thumbnail'); ?></div>

					<div class="second">
						<h5><a href=" <?php the_permalink(); ?>"><?php the_title(); ?></a> </h5>
							<small> <?php the_time('j F, Y');?></small>
					</div>
				</div>
</article>

		

