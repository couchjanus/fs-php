<?php
/**
 * Данные для подключения к БД
 */
return [
    'database' => [
        'name' => 'shopaholics',
        'username' => 'dev',
        'password' => 'ghbdtn',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
