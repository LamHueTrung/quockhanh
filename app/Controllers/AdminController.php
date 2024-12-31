<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('admin/index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role'),
            'password' => $this->request->getPost('password'),
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/admin')->with('success', 'Thêm người dùng thành công!');
        }

        return redirect()->back()->with('errors', $userModel->errors());
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        return view('admin/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $data = $this->request->getPost();

        if ($userModel->update($id, $data)) {
            return redirect()->to('/admin')->with('success', 'Cập nhật thông tin thành công!');
        }

        return redirect()->back()->with('errors', $userModel->errors());
    }

    public function delete($id)
    {
        $userModel = new UserModel();

        if ($userModel->delete($id)) {
            return redirect()->to('/admin')->with('success', 'Xóa người dùng thành công!');
        }

        return redirect()->back()->with('error', 'Không thể xóa người dùng.');
    }
}
