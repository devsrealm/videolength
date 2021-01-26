<?php

function video_length_meta_box() {

		global $post;

		add_meta_box(
			'videolength_Id', // unique Id for the box
			__( 'Video Duration Box', 'videolength' ), //title of the box
			'video_length_meta_box_fields', // callback function
			'post',	// post type
			'side',
			'core'
		);

}

add_action ('add_meta_boxes', 'video_length_meta_box');

function video_length_meta_box_fields( $post ) {
		// Use nonce for verification
		wp_nonce_field( plugin_basename( __FILE__ ), 'videolength_noncename' );

		$outputDuration    = get_post_meta( $post->ID, 'videolength_duration', true );


    ?>
        <p>
            <input id="videoInput" type="file" />
            <span class="description">Click The Input To Select The Video</span>
        </p>

		<p>
				<label for="videolength_duration">Video Duration</label><br />
				<input type="text" class="all-options" name="videolength_duration" id="videolength_duration" value="<?php echo esc_attr( $outputDuration ); ?>" />
				<span class="description">You can also add the video duration manually</span>
		</p>

		<?php
	}

function video_length_meta_box_save ( $post_id ) {
        // verify if this is an auto save routine.
        // If it is the post has not been updated, so we don't want to do anything
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return $post_id;
        }

        // verify this came from the screen and with proper authorization,
        // because save_post can be triggered at other times
        if ( !isset( $_POST['videolength_noncename'] ) || !wp_verify_nonce( $_POST['videolength_noncename'], plugin_basename( __FILE__ ) ) ) {
                return $post_id;
        }

        // Get the post type object.
        global $post;
        $post_type = get_post_type_object( $post->post_type );

        // Check if the current user has permission to edit the post.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
                return $post_id;
        }

        // Get the posted data and pass it into an associative array for ease of entry
        $metadata['videolength_duration'] = ( isset( $_POST['videolength_duration'] ) ? $_POST['videolength_duration'] : '' );

        // add/update record (both are taken care of by update_post_meta)
        foreach( $metadata as $key => $value ) {
                // get current meta value
                $current_value = get_post_meta( $post_id, $key, true);

                if ( $value && '' == $current_value ) {
                        add_post_meta( $post_id, $key, $value, true );
                } elseif ( $value && $value != $current_value ) {
                        update_post_meta( $post_id, $key, $value );
                } elseif ( '' == $value && $current_value ) {
                        delete_post_meta( $post_id, $key, $current_value );
                }
        }
}

add_action ('save_post', 'video_length_meta_box_save');
