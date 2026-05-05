<?php

return [
    // ---------- PUBLIC ----------
    '/'                     => 'Public@index',
    '/registration'         => 'Public@registration',
    '/login'                => 'Public@login',

    // ---------- AUTH ----------

    '/logout'               => 'Auth@logout',
    '/auth/authenticate'    => 'Auth@authenticate',
    '/auth/register'        => 'Auth@handleRegister',

    // ---------- ADMIN ----------
    '/admin/dashboard'      => 'Admin@dashboard',

    // ---------- GUEST ----------
    '/tasks'           => 'Task@index', // welcome page
    '/tasks/list'      => 'Task@list', // list all tasks (same as /tasks)
    '/tasks/store'     => 'Task@store',  // Handle create POST
    '/tasks/update'    => 'Task@update', // Handle update POST
    '/tasks/delete'    => 'Task@delete', // delete
    '/tasks/complete'  => 'Task@complete', // mark as complete
    '/tasks/uncomplete'  => 'Task@uncomplete', // mark as incomplete
    '/tasks/filter'    => 'Task@filter', // filter by date
    '/tasks/completed'   => 'Task@CompleteList', // list completed tasks


     // ---------- USERS CRUD ----------
    '/admin/users'             => 'User@index',       // List users
    '/admin/users/create'      => 'User@create',      // Show create form
    '/admin/users/store'       => 'User@store',       // Handle create POST
    '/admin/users/edit'        => 'User@edit',        // Show edit form (with ?id=)
    '/admin/users/update'      => 'User@update',      // Handle update POST
    '/admin/users/delete'      => 'User@delete',      // Delete user
    
];
