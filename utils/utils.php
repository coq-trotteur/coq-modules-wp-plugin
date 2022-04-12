<?php
function getCoqPost()
{
    $args = array(
        'numberposts' => 1,
        'post_type' =>  'coq'
    );
    $result = new WP_Query($args);
    $result->have_posts();
    $result->the_post();
    $id = get_the_ID();
    $content = get_the_content();

    return array(
        'id' => $id,
        'json-content' => $content,
        'content' => json_decode($content)
    );
}

function updateCoqPost($data)
{
    $post = getCoqPost();
    $id = $post['id'];

    $apiKey = $data['apiKey'];
    $destinationId = $data['destinationId'];
    $activitySlug = $data['activitySlug'];
    $marketItemSlug = $data['marketItemSlug'];
    $sectionSlug = $data['sectionSlug'];
    $inspirationSlug = $data['inspirationSlug'];

    wp_update_post(array(
        'ID' => $post['content']->activity->pageId,
        'post_name' => $activitySlug,
        'post_content' => getActivityPageTemplate($apiKey),
    ));

    wp_update_post(array(
        'ID' => $post['content']->marketItem->pageId,
        'post_name' => $marketItemSlug,
        'post_content' => getMarketItemPageTemplate($apiKey),
    ));

    wp_update_post(array(
        'ID' => $post['content']->section->pageId,
        'post_name' => $sectionSlug,
        'post_content' => getSectionPageTemplate($apiKey, $destinationId, $activitySlug, $marketItemSlug),
    ));

    wp_update_post(array(
        'ID' => $post['content']->inspiration->pageId,
        'post_name' => $inspirationSlug,
        'post_content' => getInspirationPageTemplate($apiKey, $destinationId,  $activitySlug, $marketItemSlug),
    ));

    $post['content']->activity->slug = $activitySlug;
    $post['content']->marketItem->slug = $marketItemSlug;
    $post['content']->section->slug = $sectionSlug;
    $post['content']->inspiration->slug = $inspirationSlug;

    wp_update_post(array(
        'id' => $id,
        'post_content' => json_encode($post['content'])
    ));
}
