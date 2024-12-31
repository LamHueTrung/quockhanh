<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'project_code', 
        'title', 
        'type', 
        'advisor_id', 
        'score1', 
        'score2', 
        'total_score', 
        'status', 
        'description',
    ];
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'project_code' => 'required|is_unique[projects.project_code]|max_length[50]',
        'title'        => 'required|max_length[255]',
        'type'         => 'required|in_list[foundation,specialization,graduation]',
        'advisor_id'   => 'required|integer',
        'description'  => 'permit_empty|max_length[1000]',
    ];

    protected $validationMessages = [
        'project_code' => [
            'required' => 'Mã đồ án là bắt buộc.',
            'is_unique' => 'Mã đồ án đã tồn tại.',
        ],
        'title' => [
            'required' => 'Tên đồ án là bắt buộc.',
        ],
        'type' => [
            'required' => 'Loại đồ án là bắt buộc.',
            'in_list' => 'Loại đồ án không hợp lệ.',
        ],
        'advisor_id' => [
            'required' => 'Giáo viên hướng dẫn là bắt buộc.',
            'integer' => 'Giáo viên hướng dẫn phải là số.',
        ],
    ];

    public function calculateTotalScore($id)
    {
        $project = $this->find($id);
        if ($project && isset($project['score1'], $project['score2'])) {
            $project['total_score'] = ($project['score1'] + $project['score2']) / 2;
            $this->update($id, $project);
        }
    }
}
