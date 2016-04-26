<?php
return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => '',
    'connections' => [
        'mysql' => [
            'adapter'    => 'Mysql',
            'host'       => 'localhost',
            'dbname'   => 'dbname',
            'username'   => 'user',
            'password'   => 'password',
            'charset'    => 'utf8mb4',
            'options'    => [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8mb4" COLLATE "utf8mb4_unicode_ci"',
            ],
            'persistent' => true,
        ],

        'pgsql' => [
            'adapter'   => 'Postgresql',
            'host'     => 'localhost',
            'dbname' => 'dbname',
            'username' => 'user',
            'password' => 'password',
            'charset'  => 'utf8',
            'schema'   => 'public',
        ],
    ],
];
