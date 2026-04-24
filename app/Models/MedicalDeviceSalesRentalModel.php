<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicalDeviceSalesRentalModel extends Model
{
    protected $table = 'medical_device_sales_rental';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
