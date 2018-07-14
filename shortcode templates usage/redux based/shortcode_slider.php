<?php
function slider_loop_shortcode() {
    global $redux_options;    
    
    // var_dump ($redux_options['slider-slides']);

    if(count($redux_options['slider-slides'])) {
        $i = 0;
        foreach( $redux_options['slider-slides'] as $slide ) {
            ?>
                <div class="<?php if($i == 0) { echo "active"; } ?>">
                    <img src="<?php echo $slide['image']; ?>">
                </div>
            <?php
        $i++;
        }
    }
    
}

add_shortcode( 'slider_loop_one', 'slider_loop_shortcode' );
// [slider_loop_one]
?>