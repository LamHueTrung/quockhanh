<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đồ Án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Chi Tiết Đồ Án</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Mã Đồ Án: <?= $project['project_code'] ?></h5>
            <p class="card-text"><strong>Tên:</strong> <?= $project['title'] ?></p>
            <p class="card-text"><strong>Loại:</strong> <?= ucfirst($project['type']) ?></p>
            <p class="card-text"><strong>Trạng Thái:</strong> <?= ucfirst($project['status']) ?></p>
            <p class="card-text"><strong>Mô Tả:</strong> <?= $project['description'] ?></p>
        </div>
    </div>
    <h2 class="text-dark mt-4">Danh Sách Sinh Viên Tham Gia</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Lớp</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($students)): ?>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['class_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Chưa có sinh viên tham gia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</div>
</body>
</html>
