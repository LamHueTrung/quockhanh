<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 
        'email', 
        'department'
    ];
    protected $useTimestamps = false; // Tắt timestamps
}