<?php

return [

    // Application info
    'app_name' => 'Task Management System',
    'app_url' => 'http://' . $_SERVER['HTTP_HOST'] . '/tasksystem/public',

    // Default controller & method
    'default_controller' => 'Auth',
    'default_method'     => 'login',

    // Session settings
    'session_name' => 'ts_session',

    // Pagination
    'items_per_page' => 10,

];