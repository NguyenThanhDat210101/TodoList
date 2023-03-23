<?php

namespace App\Models;

enum Config
{
    const CONFIG_ENV = [
        'host'          => 'dbdata',
        'username'      => 'root',
        'password'      => 'secret',
        'databaseName'  => 'todo',
        'port'          => '3306',
    ];
}
