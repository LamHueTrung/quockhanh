<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->authenticate($email, $password);

        if ($user) {
            session()->set([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true,
            ]);

            // Điều hướng dựa trên quyền của người dùng
            switch ($user['role']) {
                case 'admin':
                    return redirect()->to('/admin')->with('success', 'Đăng nhập thành công!');
                case 'department':
                    return redirect()->to('/department')->with('success', 'Đăng nhập thành công!');
                case 'student':
                    return redirect()->to('/students')->with('success', 'Đăng nhập thành công!');
                default:
                    return redirect()->to('/login')->with('error', 'Không thể xác định quyền người dùng.');
            }
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => 'student', // Mặc định vai trò là sinh viên khi đăng ký
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hash mật khẩu
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/login')->with('success', 'Đăng ký thành công!');
        }

        return redirect()->back()->with('errors', $userModel->errors());
    }
}
