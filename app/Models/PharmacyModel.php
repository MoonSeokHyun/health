<?php

namespace App\Models;

use CodeIgniter\Model;

class PharmacyModel extends Model
{
    protected $table = 'pharmacies';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
