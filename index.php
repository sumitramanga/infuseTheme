<?php get_header(); ?>

<div class="container">
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>

			<div class="row">
				<div class="col-xs-12 col-md-4">
					<h1><?php the_title(); ?></h1>
				</div>

				<div class="w-100"></div>

				<div class="col-xs-12 col-md-4">
					<div><?php the_content(); ?></div>
				</div>

				<div class="w-100"></div>

				<?php if (has_post_thumbnail()):?>
					<div class="col-xs-12 col-md-4">
						<?php the_post_thumbnail('medium', ['class' => 'post-img', 'alt'=>'thumbnail post image']); ?>
					</div>

				<?php else: ?>
					<div class="col-xs-12">
				<?php endif; ?>
				</div> <!-- end the col div -->
			</div> <!-- end the row div -->

		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
