<?php

// When plugin is deactivated, delete coq post & pages.

$coqData = getCoqPost();

wp_delete_post($coqData['content']->activity->pageId);
wp_delete_post($coqData['content']->marketItem->pageId);
wp_delete_post($coqData['content']->inspiration->pageId);
wp_delete_post($coqData['content']->section->pageId);

wp_delete_post($coqData['id']);
