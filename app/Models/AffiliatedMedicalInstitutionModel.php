<?php

namespace App\Models;

use CodeIgniter\Model;

class AffiliatedMedicalInstitutionModel extends Model
{
    protected $table = 'affiliated_medical_institutions';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
