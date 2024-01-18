<?php

function hwy_test_api_calls()
{
    // Define the API endpoint
    $data = wp_remote_get('https://jsonplaceholder.typicode.com/posts');


    if (is_array($data)) {
        $posts = json_decode($data['body']);
        foreach ($posts as $post) {
            wp_insert_post(array(
                'post_title' => $post->title,
                'post_content' => $post->body,
            ));
        }
        die();
    }
}

add_filter('the_content', 'hwy_test_api_calls');
