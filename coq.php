<?php
/*
Plugin Name: coq-trotteur modules
Description: Système de modules de coq-trotteur
Author: coq-trotteur
Version: 0.1
*/

add_action('admin_menu', 'add_coq_admin_menu');
add_action('activated_plugin', 'activate_coq_plugin');
add_action('deactivated_plugin', 'deactivate_coq_plugin');
add_action('admin_notices', 'admin_notices');

function activate_coq_plugin()
{
    include('utils/utils.php');
    include('page-templates/page-templates.php');
    include('lifecycle/activate_coq_plugin.php');
}

function deactivate_coq_plugin()
{
    include('utils/utils.php');
    include('lifecycle/deactivate_coq_plugin.php');
}

function add_coq_admin_menu()
{
    include('lifecycle/add_coq_admin_menu.php');
}

function admin_notices()
{
}

function adminPage()
{
    include('utils/utils.php');
    include('page-templates/page-templates.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('admin/update.php');
    } else {
        include('admin/page.php');
    }
}
