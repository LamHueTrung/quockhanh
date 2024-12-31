<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đồ án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar-student.php'; ?>

<div class="container">
    <h1 class="text-dark mb-4">Chi tiết đồ án</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">Mã đồ án: <?= $project['project_code'] ?></h5>
            <p class="card-text"><strong>Tên đồ án:</strong> <?= $project['title'] ?></p>
            <p class="card-text"><strong>Loại đồ án:</strong> <?= ucfirst($project['type']) ?></p>
            <p class="card-text"><strong>Trạng thái:</strong> <?= ucfirst($project['status']) ?></p>
            <p class="card-text"><strong>Mô tả:</strong> <?= $project['description'] ?></p>
            <p class="card-text"><strong>Điểm giáo viên 1:</strong> <?= $project['teacher1_score'] ?? 'Chưa có' ?></p>
            <p class="card-text"><strong>Điểm giáo viên 2:</strong> <?= $project['teacher2_score'] ?? 'Chưa có' ?></p>
            <p class="card-text"><strong>Điểm tổng:</strong> <?= $project['final_score'] ?? 'Chưa có' ?></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
