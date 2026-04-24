<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicalCorporationModel extends Model
{
    protected $table = 'medical_corporations';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
