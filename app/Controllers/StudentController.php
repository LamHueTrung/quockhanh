<?php

namespace App\Controllers;

use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();
        $students = $studentModel->findAll();

        return view('students/index', ['students' => $students]);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
{
    $studentModel = new StudentModel();

    $data = [
        'student_code' => $this->request->getPost('student_code'),
        'name'         => $this->request->getPost('name'),
        'dob'          => $this->request->getPost('dob'),
        'class_name'   => $this->request->getPost('class_name'),
        'phone'        => $this->request->getPost('phone'),
        'email'        => $this->request->getPost('email'),
    ];

    if ($studentModel->insert($data)) {
        return redirect()->to('/students')->with('success', 'Thêm sinh viên thành công!');
    }

    return redirect()->back()->withInput()->with('errors', $studentModel->errors());
}


    public function edit($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);

        return view('students/edit', ['student' => $student]);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();

        $data = [
            'student_code' => $this->request->getPost('student_code'),
            'name'         => $this->request->getPost('name'),
            'dob'          => $this->request->getPost('dob'),
            'course'       => $this->request->getPost('course'),
            'class_name'   => $this->request->getPost('class_name'),
            'class_code'   => $this->request->getPost('class_code'),
            'phone'        => $this->request->getPost('phone'),
            'email'        => $this->request->getPost('email'),
        ];

        if ($studentModel->update($id, $data)) {
            return redirect()->to('/students')->with('success', 'Cập nhật sinh viên thành công!');
        }

        return redirect()->back()->withInput()->with('errors', $studentModel->errors());
    }

    public function delete($id)
    {
        $studentModel = new StudentModel();

        if ($studentModel->delete($id)) {
            return redirect()->to('/students')->with('success', 'Xóa sinh viên thành công!');
        }

        return redirect()->back()->with('error', 'Không thể xóa sinh viên.');
    }
}
