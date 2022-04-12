<?php
add_menu_page(
    'coq-trotteur',
    'coq-trotteur',
    'manage_options',
    'coq-trotteur',
    'adminPage',
    plugin_dir_url(__FILE__) . 'logo.png',
    2
);
