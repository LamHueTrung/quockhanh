<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(270deg, #2D99AE 20.1%, #0C5776 64.1%, #001C44 100%);
            color: #fff;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background-color: #0C5776;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2D99AE;
        }
        .navbar {
            background: #001C44;
            padding: 15px;
        }
        .navbar a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
        .navbar a:hover {
            color: #2D99AE;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="container d-flex justify-content-between">
        <h3>Quản Lý Hệ Thống</h3>
        <nav>
            <a href="/admin">Người Dùng</a>
            <a href="/teachers">Giảng Viên</a>
            <a href="/logout" class="btn btn-danger btn-sm">Đăng Xuất</a>
        </nav>
    </div>
</div>

<div class="container">
    <h1 class="mb-4">Danh sách người dùng</h1>
    <a href="/admin/create" class="btn btn-primary mb-3">Thêm người dùng mới</a>
    <div class="card">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><span class="badge bg-info"><?= ucfirst($user['role']) ?></span></td>
                        <td>
                            <a href="/admin/edit/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="/admin/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
