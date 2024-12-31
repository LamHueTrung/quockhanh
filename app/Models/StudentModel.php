<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'student_code',
        'name',
        'dob',
        'course',
        'class_name',
        'class_code',
        'phone',
        'email',
    ];
    protected $useTimestamps = false;

    protected $validationRules = [
        'student_code' => 'required|is_unique[students.student_code]',
        'name'         => 'required|max_length[255]',
        'email'        => 'required|valid_email|is_unique[students.email]',
    ];

    protected $validationMessages = [
        'student_code' => [
            'required' => 'Mã sinh viên là bắt buộc.',
            'is_unique' => 'Mã sinh viên đã tồn tại.',
        ],
        'name' => [
            'required' => 'Tên sinh viên là bắt buộc.',
        ],
        'email' => [
            'required' => 'Email là bắt buộc.',
            'valid_email' => 'Email không hợp lệ.',
            'is_unique' => 'Email đã tồn tại.',
        ],
    ];
}
