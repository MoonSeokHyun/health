<?php

namespace App\Models;

use CodeIgniter\Model;

class EmergencyTransportModel extends Model
{
    protected $table = 'emergency_transport';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
