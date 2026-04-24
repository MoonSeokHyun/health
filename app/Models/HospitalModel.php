<?php

namespace App\Models;

use CodeIgniter\Model;

class HospitalModel extends Model
{
    protected $table = 'hospitals';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
