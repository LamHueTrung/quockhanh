<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách giảng viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Danh sách giảng viên</h1>
    <a href="/teachers/create" class="btn btn-primary mb-3">Thêm giảng viên</a>
    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Khoa</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><?= $teacher['id'] ?></td>
                    <td><?= $teacher['name'] ?></td>
                    <td><?= $teacher['email'] ?></td>
                    <td><?= $teacher['department'] ?></td>
                    <td>
                        <a href="/teachers/edit/<?= $teacher['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="/teachers/delete/<?= $teacher['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
