<?php
/*
Template Name: Classes template

*/


 ?>

<?php get_header(); ?>

<div class="container">



<?php if(have_posts()): ?>

  <?php while(have_posts()): the_post(); ?>
      <h1><?php the_title();  ?></h1>
      <p><?php the_content();  ?></p>
  <?php endwhile; ?>
<?php endif; ?>

<div class="row">
      <?php
        if (is_page('Web and UX')) {
          $args = array(
            'post_type' => 'webStudents',
            'order' => 'ASC',
            'orderby' => 'title'
          );
        } else if (is_page('Creative Digital')) {
          $args = array(
            'post_type' => 'graphicsStudents',
            'order' => 'ASC',
            'orderby' => 'title'
          );
        } else if (is_page('Screen Production')){
          $args = array(
            'post_type' => 'screenStudents',
            'order' => 'ASC',
            'orderby' => 'title'
          );
        } else{
          echo('Class not found.');
        }

        $students = new WP_Query($args);

       ?>

       <?php if($students->have_posts()): ?>
         <?php while ($students->have_posts()): $students->the_post();?>
           <div class="col">

               <?php
                	$images =& get_children( array (
                		'post_parent' => $post->ID,
                		'post_type' => 'attachment',
                		'post_mime_type' => 'image',
                    'exclude' => get_post_thumbnail_id()
                	));

                	if ( empty($images) ) {

                	} else {
                		foreach ( $images as $attachment_id => $attachment ) {
                			echo wp_get_attachment_image( $attachment_id, 'medium' );
                		}
                	}
                ?>
               <h5><?php the_title(); ?></h5>
           </div>
         <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>

</div>

<?php get_footer(); ?>
