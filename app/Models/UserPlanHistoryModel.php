<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPlanHistoryModel extends Model
{
    protected $table            = 'dp_user_plan_history';
    protected $primaryKey       = 'user_plan_history_id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array'; // or 'object'
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'user_id',
        'plan_id',
        'plan_start_dt',
        'plan_end_dt',
        'plan_status',
        'created_dtm'
    ];

    // Dates
    protected $useTimestamps = false; // Change to true if you want auto-updated timestamps
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_dtm';
    protected $updatedField  = ''; // you don’t have updated_dtm field
    protected $deletedField  = '';

    // Validation (optional)
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
}
