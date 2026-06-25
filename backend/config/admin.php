<?php

return [
    /*
     * Hash password dengan: php artisan tinker --execute="echo bcrypt('passwordmu');"
     * Lalu isi ADMIN_PASSWORD_HASH di file .env
     */
    'password_hash' => env('ADMIN_PASSWORD_HASH'),
];
