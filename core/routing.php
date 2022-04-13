<?php

$pages = [
    'homepage' => './controllers/homepage_controller.php',
    'home_user_page' => './controllers/home_user_page_controller.php',
    // PROGRAMS 
    'add_programs' => './controllers/add_programs_controller.php',
    'programs' => './controllers/programs_controller.php',
    'programs-details' => './controllers/programs-details_controller.php',
    'programs_modification' => './controllers/programs_modification_controller.php',
    // LOTS 
    'add_lots' => './controllers/add_lots_controller.php',
    'lots' => './controllers/lots_controller.php',
    'lots_modification' => './controllers/lots_modification_controller.php',
    // USERS 
    'regisration' => './controllers/regisration_controller.php',
    'logout' => './controllers/logout_controller.php',
    'users' => './controllers/users_controller.php',
    'users_update' => './controllers/users_update_controller.php',
    'forgot_password' => './controllers/forgot_password_controller.php',
    //SEARCH
    'search_result' => './controllers/search_result_controller.php',
];

$page = $pages['homepage'];

if (isset($_GET['page']) && in_array($_GET['page'], array_keys($pages))) {
    $page = $pages[$_GET['page']];
}
