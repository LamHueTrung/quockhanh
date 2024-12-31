<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Đồ Án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Danh Sách Đồ Án</h1>
    <a href="/department/create-project" class="btn btn-primary mb-3">Thêm Đồ Án</a>
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Mã Đồ Án</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project['id'] ?></td>
                    <td><?= $project['project_code'] ?></td>
                    <td><?= $project['title'] ?></td>
                    <td><?= ucfirst($project['type']) ?></td>
                    <td><?= ucfirst($project['status']) ?></td>
                    <td>
                        <a href="/department/view-project/<?= $project['id'] ?>" class="btn btn-info btn-sm">Xem</a>
                        <a href="/department/edit-project/<?= $project['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="/department/delete-project/<?= $project['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
