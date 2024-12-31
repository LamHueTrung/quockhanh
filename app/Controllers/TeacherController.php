<?php

namespace App\Controllers;

use App\Models\TeacherModel;

class TeacherController extends BaseController
{
    public function index()
    {
        $teacherModel = new TeacherModel();
        $teachers = $teacherModel->findAll();

        return view('teacher/index', ['teachers' => $teachers]);
    }

    public function create()
    {
        return view('teacher/create');
    }

    public function store()
    {
        $teacherModel = new TeacherModel();
        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'department' => $this->request->getPost('department'),
        ];

        if ($teacherModel->insert($data)) {
            return redirect()->to('/teachers')->with('success', 'Thêm giảng viên thành công!');
        }

        return redirect()->back()->withInput()->with('errors', $teacherModel->errors());
    }

    public function edit($id)
    {
        $teacherModel = new TeacherModel();
        $teacher = $teacherModel->find($id);

        if (!$teacher) {
            return redirect()->to('/teachers')->with('error', 'Không tìm thấy giảng viên.');
        }

        return view('teacher/edit', ['teacher' => $teacher]);
    }

    public function update($id)
    {
        $teacherModel = new TeacherModel();
        $data = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'department' => $this->request->getPost('department'),
        ];

        if ($teacherModel->update($id, $data)) {
            return redirect()->to('/teachers')->with('success', 'Cập nhật giảng viên thành công!');
        }

        return redirect()->back()->with('errors', $teacherModel->errors());
    }

    public function delete($id)
    {
        $teacherModel = new TeacherModel();

        if ($teacherModel->delete($id)) {
            return redirect()->to('/teachers')->with('success', 'Xóa giảng viên thành công!');
        }

        return redirect()->back()->with('error', 'Không thể xóa giảng viên.');
    }
}
