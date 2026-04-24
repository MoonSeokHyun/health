<?php

namespace App\Models;

use CodeIgniter\Model;

class ClinicModel extends Model
{
    protected $table = 'clinics';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
