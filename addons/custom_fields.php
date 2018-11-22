<?php

function admin_my_enqueue() {
    wp_enqueue_style('CustomFieldStyle', get_template_directory_uri() . '/assets/css/customFields.css', array(), '1.0.0', 'all');
    wp_enqueue_script('CustomFieldScript', get_template_directory_uri() . '/assets/js/customFields.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'admin_my_enqueue');

$metaboxes = array(
    'web_ux_section' => array(
        'title' => __('Project Content', 'Breadcrumbs'),
        'applicableto' => 'webstudents',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'header_image' => array(
                'title' => __('Project Image: ', 'infusetheme'),
                'type' => 'image',
                'description' => 'Image which is being displayed in the header.'
            ),
            'profile_link' => array(
              'title' => __('Link to Linkedin: ', 'infusetheme'),
              'type' => 'text'
            )
        )
    ),
    'graphic_section' => array(
        'title' => __('Project Content', 'Breadcrumbs'),
        'applicableto' => 'graphicsstudents',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'header_image' => array(
                'title' => __('Project Image: ', 'infusetheme'),
                'type' => 'image',
                'description' => 'Image which is being displayed in the header.'
            )
        )
    ),
    'screen_section' => array(
        'title' => __('Project Content', 'Breadcrumbs'),
        'applicableto' => 'screenstudents',
        'location' => 'normal',
        'priority' => 'high',
        'fields' => array(
            'header_image' => array(
                'title' => __('Project Image: ', 'infusetheme'),
                'type' => 'image',
                'description' => 'Image which is being displayed in the header.'
            )
        )
    )
);

function add_post_format_metabox() {
    global $metaboxes;
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}

add_action( 'admin_init', 'add_post_format_metabox' );

function show_metaboxes( $post, $args ) {
    global $metaboxes;

    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];

    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';

    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                case 'text':
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                    $output .= '<p>This can only be a link to your Linkedin profile, remember that the purpose of this website is to promote the exhibition and encourage people to come and find out more about you and your work.<p>';
                    $output .= '<button>Add Linkedin</button>';
                break;
                case 'image':
                    $image =  get_post_meta( $post->ID, $id, true );
                    if($image){
                        $imagesrc = wp_get_attachment_image_url($image, 'header_image', false);
                        $removeClasses = "remove_custom_images button";
                    } else{
                        $removeClasses = "remove_custom_images button hidden";
                    }
                    $output .= '<div class="image-form-group">';
                        $output .= '<label>'.$field['title'].'</label>';
                        $output .= '<img class="custom_image" src="'.$imagesrc.'">';
                        $output .= '<input type="hidden" value="' . $custom[$id][0] . '" class="customInput regular-text process_custom_images" name="'.$id.'" max="" min="1" step="1" readonly style="display:block">';
                        $output .= '<button class="set_custom_images button">Add Image</button>';
                        $output .= '<button class="'.$removeClasses.'">Remove Image</button>';
                    $output .= '</div>';
                break;
                default:
                    $output .= '<div class="form-group"><label for="' . $id . '">' . $field['title'] . '</label><input class="customInput" id="' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" style="width: 100%;" /></div>';
                break;
            }
        }
    }
    echo $output;
}


function save_metaboxes( $post_id ) {
    global $metaboxes;

    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
    $post_type = get_post_type();

    foreach ( $metaboxes as $id => $metabox ) {
        // die($post_type);
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];

            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];


                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }

}
add_action( 'save_post', 'save_metaboxes' );
