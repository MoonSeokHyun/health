<?php

namespace App\Models;

use CodeIgniter\Model;

class OpticalShopModel extends Model
{
    protected $table = 'optical_shops';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
