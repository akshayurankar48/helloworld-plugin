<?php
/*
Plugin Name: Hello World
Description: My first WordPress Plugin
Version: 1.0
Author: Akshay Urankar
Author URI: www.akshayurankar.in
License: GPLv2 or later
Text Domain: hello-world-yo
*/

if (!defined("ABSPATH"))
    die('No script kitties please!');

define('HWY_PLUGIN_FILE', __FILE__);
define('HWY_VERSION', '1.0');

require_once(dirname(__FILE__) . "/includes/wp_requirements.php");
$plugin_checks = new HWY_Requirements('Hello World Yo', HWY_PLUGIN_FILE, array(
    'PHP' => '5.3.3',
    'WordPress' => '4.1',
));
if (false === $plugin_checks->pass()) {
    $plugin_checks->halt();
    return;
}

require_once(dirname(__FILE__) . "/includes/news_meta_box.php");
require_once(dirname(__FILE__) . "/includes/shortcode.php");
require_once(dirname(__FILE__) . "/includes/custom_post_types.php");
require_once(dirname(__FILE__) . "/includes/admin_settings.php");
require_once(dirname(__FILE__) . "/includes/news_content.php");
require_once(dirname(__FILE__) . "/includes/enqueue.php");
require_once(dirname(__FILE__) . "/includes/news_location.php");
// require_once(dirname(__FILE__) . "/includes/test_api_calls.php");
require_once(dirname(__FILE__) . "/includes/welcome_screen.php");



// function hwy_inject_advertisement($posts)
// {
//     // Check if it's a main query and not in the admin area
//     if (is_home() && is_main_query()) {
//         // Get the Advertisement page
//         $ad_page = get_page_by_title('Advertisement');
//         array_splice($posts, 1, 0, array($ad_page));
//     }

//     return $posts;
// }

// add_filter('the_posts', 'hwy_inject_advertisement');



// function hwy_exclude_uncategorized_posts($query)
// {
//     if ($query->is_home() && $query->is_main_query()) {
//         $query->set('cat', '-1');
//     }
// }

// add_action('pre_get_posts', 'hwy_exclude_uncategorized_posts');



// function hwy_add_content_at_bottom($content)
// {
//     if (is_page('About')) {
//         $content = str_replace('lorem ipsum', 'Akshay', $content);
//         return $content . '<p>MY CONTENT AT BOTTOM</p>';
//     }
//     return $content;
// }

// add_filter('the_content', 'hwy_add_content_at_bottom');


//! Actions and functions from other plugins & using them in a class.

/*

class HWY_Plugin
{

    function __construct()
    {
        add_filter('tribe_get_full_address', array($this, 'hwy_change_address'), 10, 3);

        add_action('tribe_events_single_meta_venue_section_end', array($this, 'hwy_add_venue_disclaimer'));
    }

    function hwy_change_address($address, $venue_id, $includeVenueName)
    {
        return '<span class="hwy_address">' . $address . '</span>';
    }

    function hwy_add_venue_disclaimer()
    { ?>
        <div class="disclaimer">
            NOTE: <br>
            This venue is subject to change.
        </div>
<?php }
}

$my_plugin = new HWY_Plugin();


//! Actions

/*

function hwy_add_additional_content()
{
    echo 'Additional content';
}

add_action('hwy_template_end', 'hwy_add_additional_content');

?>

<div id="template">
    <?php do_action('hwy_template_start'); ?>
    <h2>Heading</h2>
    <p>Content</p>
    <?php do_action('hwy_template_end'); ?>
</div>

<?php

die();


//! Filters

/*

function hwy_change_my_array($value)
{
    $value['fourth'] = 4;
    return $value;
}

add_filter("hwy_my_array", "hwy_change_my_array");

function hwy_change_my_array_again($value)
{
    $value['second'] = 200;
    return $value;
}

add_filter("hwy_my_array", "hwy_change_my_array_again", 5);

$my_array = apply_filters('hwy_my_array', array('firt' => 1, 'second' => 2, 'third' => 3), $arg, $value);
var_dump($my_array);
die();



//! Strings

/*

$content = 'another';
$test = 'testing';
$my_array = array('first' => 1, 'second' => 2);
$my_string = sprintf('%s %s', $test, $my_array['second']);
$my_string = print_r($my_array, return: true);
$my_json = json_encode($my_array);
$my_string = json_decode($my_json);
substr($test, 0, 4);

/*

//! Super Globals

/*

$my_array = array('firt' => 1, 'second' => 2, 'third' => 3);

class HWY_Plugin
{

    function __construct()
    {
        echo "Starting my plugin";
    }


    public function show_array_values($my_array)
    {
        foreach ($my_array as $key => $value) {
            $this->print_value($value);
        }
    }

    private function print_value($value)
    { ?>
        <div><?php echo $value; ?></div>
<?php }
}

$GLOBALS['hwy_plugin'] = new HWY_Plugin();
$GLOBALS['hwy_plugin']->show_array_values($my_array);


die();

*/
