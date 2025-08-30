<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model
{
    protected $table = 'plan';            // your table name
    protected $primaryKey = 'plan_id';     // primary key of the table

    protected $allowedFields = [
        'plan',
        'description',
        'valid_days',
        'plan_cost',
        'created_dtm',
    ];

    protected $useTimestamps = false; // set to true if you want automatic created_at/updated_at
}
