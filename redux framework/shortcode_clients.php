<?php
function clients_logos_loop_shortcode() {
    global $redux_options;
    
    // var_dump ($redux_options['clients-gallery']);
    
    function wp_get_attachment( $attachment_id ) {
        $attachment = get_post( $attachment_id );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    }

    $myGalleryIDs = explode(',', $redux_options['clients-gallery']);
    
    echo '<div class="row">';
        
    echo '<div class="col-md-6">';
            
            echo '<div class="clients-caption-one">';
                echo $redux_options['clients-caption-one'];
            echo "</div>";

            echo '<div class="clients-captions">';
                echo '<span class="clients-counter">';
                    echo $redux_options['clients-counter'];
                echo " </span> ";
                echo $redux_options['clients-caption-two'];
            echo "</div>";

        echo "</div>";

        echo '<div class="col-md-6">';

            echo '<div class="sliderWrap">';
                echo '<div id="owl-logos" class="owl-carousel owl-theme owl-logos">';

                    foreach($myGalleryIDs as $myPhotoID) {
                    $photoArray = wp_get_attachment($myPhotoID);
                    ?>
                        <div class="item">
                            <img src="<?php echo wp_get_attachment_url( $myPhotoID ); ?>" class="" alt="<?php echo $photoArray[title]; ?>">
                        </div>
                    <?php 
                    } // foreach ends

                echo "</div>";
            echo "</div>";

        echo "</div>";
    echo "</div>";
    
}
add_shortcode( 'clients_logos', 'clients_logos_loop_shortcode' );
// [clients_logos]
?>