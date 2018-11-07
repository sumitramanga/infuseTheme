<?php
/*
Template Name: Classes template

*/


 ?>

<?php get_header(); ?>

<?php if(have_posts()): ?>

  <?php while(have_posts()): the_post(); ?>
      <h1><?= the_title();  ?></h1>
      <p><?= the_content();  ?></p>
  <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
