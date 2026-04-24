<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Pager extends BaseConfig
{
    public array $templates = [
        'default_full'   => 'App\Views\pagers\custom_pager',
        'default_simple' => 'CodeIgniter\Pager\Views\default_simple',
    ];

    public int $perPage = 12;
}
