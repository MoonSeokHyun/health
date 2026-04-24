<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    public string $defaultGroup = 'default';

    public array $default = [
        'DSN'          => '',
        'hostname'     => '203.245.28.201',
        'username'     => 'mls0000',
        'password'     => 'Alcls1475',
        'database'     => 'health',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_unicode_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        if (env('database.default.hostname')) {
            $this->default['hostname'] = env('database.default.hostname');
        }
        if (env('database.default.database')) {
            $this->default['database'] = env('database.default.database');
        }
        if (env('database.default.username')) {
            $this->default['username'] = env('database.default.username');
        }
        if (env('database.default.password')) {
            $this->default['password'] = env('database.default.password');
        }
        if (env('database.default.DBDriver')) {
            $this->default['DBDriver'] = env('database.default.DBDriver');
        }
    }
}
