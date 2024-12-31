<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê đồ án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">
    <h1 class="text-dark mb-4">Thống kê đồ án</h1>
    <ul class="list-group shadow">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Tổng số đồ án
            <span class="badge bg-primary rounded-pill"><?= $statistics['total_projects'] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Hoàn thành
            <span class="badge bg-success rounded-pill"><?= $statistics['completed'] ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Đang thực hiện
            <span class="badge bg-warning rounded-pill"><?= $statistics['in_progress'] ?></span>
        </li>
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
