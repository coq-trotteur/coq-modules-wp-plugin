<?php

// When plugin is activated, create coq post + pages.

$apiKey = "xxxxxxx";
$destinationId = "61039bb703f47708394fd7f4";
$activitySlug = "a";
$marketItemSlug = "m";

$activityPageId = wp_insert_post(array(
    'post_name' => $activitySlug,
    'post_title' => 'Page activité',
    'post_content' => getActivityPageTemplate($apiKey),
    'post_type' => 'page',
    'post_status' => 'publish'
));

add_post_meta($activityPageId, '_wp_page_template', 'blank');

$marketItemPageId = wp_insert_post(array(
    'post_name' => $marketItemSlug,
    'post_title' => 'Page produit',
    'post_content' => getMarketItemPageTemplate($apiKey),
    'post_type' => 'page',
    'post_status' => 'publish'
));

add_post_meta($marketItemPageId, '_wp_page_template', 'blank');

$sectionPageId = wp_insert_post(array(
    'post_name' => 's',
    'post_title' => 'Page section',
    'post_content' => getSectionPageTemplate($apiKey, $destinationId, $activitySlug, $marketItemSlug),
    'post_type' => 'page',
    'post_status' => 'publish'
));

add_post_meta($sectionPageId, '_wp_page_template', 'blank');

$inspirationPageId = wp_insert_post(array(
    'post_name' => 'inspiration',
    'post_title' => 'Page inspiration',
    'post_content' => getInspirationPageTemplate($apiKey, $destinationId, $activitySlug, $marketItemSlug),
    'post_type' => 'page',
    'post_status' => 'publish'
));

add_post_meta($inspirationPageId, '_wp_page_template', 'blank');

// Create coq data post (store pages, slugs, api key and so on).
$data = array(
    'apiKey' => 'XXXXX-XXXXX-XXXXX-XXXXX',
    'destinationId' => $destinationId,
    'activity' => array(
        'pageId' => $activityPageId,
        'slug' => 'a'
    ),
    'marketItem' => array(
        'pageId' => $marketItemPageId,
        'slug' => 'm'
    ),
    'inspiration' => array(
        'pageId' => $inspirationPageId,
        'slug' => 'inspiration'
    ),
    'section' => array(
        'pageId' => $sectionPageId,
        'slug' => 's'
    )
);

$post = array(
    'post_content' => json_encode($data),
    'post_type' => "coq"
);

wp_insert_post(
    $post
);
