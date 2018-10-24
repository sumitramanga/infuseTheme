<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	<title>Infuse - Yoobee School of Design 2018 Exhibiton</title>
</head>
<body>

	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div><?php the_content(); ?></div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>
