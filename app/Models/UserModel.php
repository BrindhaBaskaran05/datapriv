<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table      = 'user'; // Change to your table name
    protected $primaryKey = 'user_id'; // Change to your primary key
    protected $allowedFields = ['name', 'email', 'password','middle_name', 'last_name', 'dob', 'address', 'address2', 'city', 'state', 'postal_code', 'country','contact_number1','contact_number2']; // Add other fields
}