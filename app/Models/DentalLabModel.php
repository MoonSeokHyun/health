<?php

namespace App\Models;

use CodeIgniter\Model;

class DentalLabModel extends Model
{
    protected $table = 'dental_labs';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
