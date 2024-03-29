<?php

if (!defined("ABSPATH"))
    die('No script kitties please!');


//! Shortcode

function hwy_handle_test_shortcode($atts, $content = '')
{
    global $post;

    $atts = shortcode_atts(array(
        'color' => '#0a0a0a',
    ), $atts);
    ob_start();
?>
    <div class="test">
        <h2><?php echo $content; ?>(<?php echo get_the_ID(); ?>)</h2>
        <span style="color:<?php echo esc_attr($atts['color']); ?>">test</span>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('my-test-shortcode', 'hwy_handle_test_shortcode');
?>