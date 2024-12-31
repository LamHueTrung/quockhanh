<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\TeacherModel;

class DepartmentController extends BaseController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $projects = $projectModel->findAll();

        return view('department/index', ['projects' => $projects]);
    }

    public function createProject()
    {
        $teacherModel = new TeacherModel();
        $teachers = $teacherModel->findAll();

        return view('department/create_project', ['teachers' => $teachers]);
    }

    public function storeProject()
    {
        $projectModel = new ProjectModel();

        $data = [
            'project_code' => $this->request->getPost('project_code'),
            'title'        => $this->request->getPost('title'),
            'type'         => $this->request->getPost('type'),
            'advisor_id'   => $this->request->getPost('advisor_id'),
            'description'  => $this->request->getPost('description'),
            'status'       => 'in_progress',
        ];

        // Xác thực dữ liệu
        if (!$this->validate($projectModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Thêm đồ án vào cơ sở dữ liệu
        if ($projectModel->insert($data)) {
            return redirect()->to('/department')->with('success', 'Thêm đồ án thành công!');
        }

        // Xử lý lỗi trong quá trình chèn
        log_message('error', 'Insert Project Failed: ' . json_encode($projectModel->errors()));

        return redirect()->back()->withInput()->with('errors', $projectModel->errors());
    }

    public function editProject($id)
    {
        $projectModel = new ProjectModel();
        $teacherModel = new TeacherModel();

        $project = $projectModel->find($id);
        $teachers = $teacherModel->findAll();

        if (!$project) {
            return redirect()->to('/department')->with('error', 'Không tìm thấy đồ án.');
        }

        return view('department/edit_project', [
            'project' => $project,
            'teachers' => $teachers,
        ]);
    }

    

    public function viewProject($id)
    {
        $projectModel = new ProjectModel();

        $project = $projectModel->find($id);

        if (!$project) {
            return redirect()->to('/department')->with('error', 'Không tìm thấy đồ án.');
        }

        return view('department/view_project', ['project' => $project]);
    }

    public function statistics()
    {
        $projectModel = new ProjectModel();
        $statistics = [
            'total_projects' => $projectModel->countAll(),
            'completed'      => $projectModel->where('status', 'completed')->countAllResults(),
            'in_progress'    => $projectModel->where('status', 'in_progress')->countAllResults(),
        ];

        return view('department/statistics', ['statistics' => $statistics]);
    }

    public function deleteProject($id)
    {
        $projectModel = new ProjectModel();

        if ($projectModel->delete($id)) {
            return redirect()->to('/department')->with('success', 'Xóa đồ án thành công!');
        }

        return redirect()->back()->with('error', 'Không thể xóa đồ án.');
    }
}
