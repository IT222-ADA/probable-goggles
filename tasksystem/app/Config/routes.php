<?php

return[
    // public
    
    '/' => 'Public@index',
    '/login' => 'Public@login',
    '/registration' => 'Public@registration',

    '/auth/authenticate' => 'Auth@authenticate',
    '/auth/register' => 'Auth@register'

];