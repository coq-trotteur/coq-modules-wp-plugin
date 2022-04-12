<?php
function getMarketItemPageTemplate($apiKey)
{
    return '<link href="https://modules.coq-trotteur.com/style.css" rel="stylesheet"></link>' .
        '<script src="https://modules.coq-trotteur.com/bundle.min.js"></script>' .
        '<style>.wp-site-blocks{padding:0 !important;}</style>' .
        '<div id="root" style="max-width:unset!important; margin: 0;"></div>' .
        '<script>' .
        '    const getUrlParams = () => document.location.search.slice(1).split("&").filter(t => !!t).map(t => {' .
        '        const e = [...t.split("="), null];' .
        '        return {' .
        '            [e[0]]: e[1]' .
        '        }' .
        '    }).reduce((t, e) => ({' .
        '        ...t,' .
        '        ...e' .
        '    }), {});' .
        '    const id = getUrlParams().id;' .
        '    window.onload = () => {' .
        '        const modules = coq({' .
        '           apiKey: "' . $apiKey . '",' .
        '        });' .
        '        modules.marketItem({' .
        '            id' .
        '        }).render(document.getElementById("root"));' .
        '    };' .
        '</script>';
}
