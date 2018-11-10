<?php
/*
Template Name: Classes template

*/


 ?>

<?php get_header(); ?>

<div class="container classes-template-container">



<?php if(have_posts()): ?>

  <?php while(have_posts()): the_post(); ?>
      <div class="classes-template-title-wrapper"> <a href="#"><i class="classes-template-chevron fas fa-chevron-left"></i></a> <h1 class="classes-template-title"><?php the_title();  ?></h1> <span><i class="classes-template-chevron fas fa-chevron-left chevron-hidden"></i></span></div>
      <div class="classes-template-blurb"><?php the_content();  ?></div>
  <?php endwhile; ?>
<?php endif; ?>

<div class="row row-custom">

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
           <div class="col col-custom" data-toggle="modal" data-target="#content<?php echo($post->ID); ?>">
             <div class="hover-event-trigger">

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
                			echo wp_get_attachment_image( $attachment_id, 'project-thumbnail' );
                		}
                	}
                ?>
               <h5 class="project-title"><?php the_title(); ?></h5>
               <div class="white-backdrop"></div>
               </div>
           </div>


           <!-- Modal -->
           <div class="modal fade" id="content<?php echo($post->ID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <div class="modal-header-flex">
                     <?php the_post_thumbnail('thumbnail', ['class'=>'project-profile-img', 'alt'=>'thumbnail image']); ?>
                     <h5 class="modal-title" id="exampleModalLongTitle"><?php the_title(); ?></h5>
                   </div>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <div class="project-modal-content">
                     <?php the_content('image'); ?>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- End Modal -->

         <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>

</div>



<?php get_footer(); ?>
