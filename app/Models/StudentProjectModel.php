<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentProjectModel extends Model
{
    protected $table = 'student_projects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'project_id'];
    protected $returnType = 'array';

    public function getProjectsByStudent($student_id)
    {
        return $this->where('student_id', $student_id)->findAll();
    }

    public function getStudentsByProject($project_id)
    {
        return $this->where('project_id', $project_id)->findAll();
    }
}
