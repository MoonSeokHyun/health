<?php

namespace App\Models;

use CodeIgniter\Model;

class HealthRelatedBusinessModel extends Model
{
    protected $table = 'health_related_businesses';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
