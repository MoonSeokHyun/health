<?php

namespace App\Models;

use CodeIgniter\Model;

class PostpartumCareFacilityModel extends Model
{
    protected $table = 'postpartum_care_facilities';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
