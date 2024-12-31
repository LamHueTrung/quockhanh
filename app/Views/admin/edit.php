<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa người dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">

    <style>
        body {
            background: linear-gradient(270deg, #2D99AE 20.1%, #0C5776 64.1%, #001C44 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>
<div class="card">
    <h2 class="text-center text-dark mb-4">Chỉnh sửa thông tin người dùng</h2>
    <form action="/admin/update/<?= $user['id'] ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Tên người dùng</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select name="role" id="role" class="form-select">
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="department" <?= $user['role'] === 'department' ? 'selected' : '' ?>>Bộ môn</option>
                <option value="student" <?= $user['role'] === 'student' ? 'selected' : '' ?>>Sinh viên</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Cập nhật</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
