<?php

namespace App\Models;

use CodeIgniter\Model;

class OtcMedicineStoreModel extends Model
{
    protected $table = 'otc_medicine_stores';
    protected $primaryKey = 'id';
    protected $protectFields = false;
    protected $returnType = 'array';
}
