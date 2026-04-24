<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicalDeviceRepairModel extends Model
{
    protected $table = 'medical_device_repair';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
