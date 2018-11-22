<?php
/*
Template Name: Classes template

*/


 ?>

<?php get_header(); ?>

<div class="container classes-template-container">



<?php if(have_posts()): ?>

  <?php while(have_posts()): the_post(); ?>
      <div class="classes-template-title-wrapper"> <a href="<?= site_url(); ?>"><i class="classes-template-chevron fas fa-chevron-left"></i></a> <h1 class="classes-template-title"><?php the_title();  ?></h1> <span><i class="classes-template-chevron fas fa-chevron-left chevron-hidden"></i></span></div>
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


               <?php
               $postID = get_the_id();
               $image =  get_post_meta( $postID, 'header_image', true );
               $link =  get_post_meta( $postID, 'profile_link', true );
               // var_dump($link);
               // die();
               if($image){

                   $projectThumbnailImg = wp_get_attachment_image_url($image, 'project-thumbnail', false);
                   $projectFullImg = wp_get_attachment_image_url($image, 'large', false);

                   ?>

                   <div class="col-xl-4 col-lg-6 col-custom" data-toggle="modal" data-target="#content<?php echo($post->ID); ?>">
                     <div class="hover-event-trigger">
                       <img src="<?= $projectThumbnailImg ?>" alt="project image thumbnail" class="attachment-project-thumbnail">
                      <h5 class="project-title"><?php the_title(); ?></h5>
                      <div class="white-backdrop"></div>
                      </div>
                  </div>


                  <!-- Modal -->
                  <div class="modal fade" id="content<?php echo($post->ID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div class="modal-header-flex">
                            <?php the_post_thumbnail('thumbnail', ['class'=>'project-profile-img', 'alt'=>'thumbnail image']); ?>
                            <div class="modal-header-text">
                              <h5 class="modal-title" id="exampleModalLongTitle"><?php the_title(); ?></h5>
                              <?php if($link): ?>
                                <a href="<?= $link ?>" target="_blank" class="modal-header-link">View profile</a>
                              <?php endif; ?>
                            </div>
                          </div>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="project-modal-content">
                            <img src="<?= $projectFullImg ?>" alt="project image" class="project-modal-img">
                            <?php the_content(); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->

                   <?php
                 }
                 ?>




         <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>

</div>



<?php get_footer(); ?>
