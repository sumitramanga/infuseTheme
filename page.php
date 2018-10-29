<?php get_header(); ?>

<p>This is page.php</p>

<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
		<h1><?= the_title(); ?></h1>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
