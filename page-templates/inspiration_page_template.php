<?php
function getInspirationPageTemplate($apiKey, $destinationId, $activitySlug, $marketItemSlug)
{
    return '<link href="https://modules.coq-trotteur.com/style.css" rel="stylesheet"></link>' .
        '<script src="https://modules.coq-trotteur.com/bundle.min.js"></script>' .
        '<style>.wp-site-blocks{padding:0 !important;}</style>' .
        '<div id="root" style="max-width:unset!important; margin:0;"></div>' .
        '<script>' .
        '    window.onload = () => {' .
        '        const modules = coq({' .
        '            destination: "' . $destinationId . '",' .
        '            apiKey: "' . $apiKey . '",' .
        '            getEntityUrl: (entity) => {' .
        '                if(entity.type==="activity") return `' . get_site_url() . '/' . $activitySlug . '?slug=${entity.slug}`;' .
        '                if(entity.type==="market-item") return `' . get_site_url() . '/' . $marketItemSlug . '?id=${entity.id}`;' .
        '                return null' .
        '            }' .
        '        });' .
        '        modules.inspiration().render(document.getElementById("root"));' .
        '    };' .
        '</script>';
}
