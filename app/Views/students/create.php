<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đồ án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar-student.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Thêm Sinh Viên</h1>
    <form action="/students/store" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="student_code" class="form-label">Mã Sinh Viên</label>
            <input type="text" name="student_code" id="student_code" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Ngày Sinh</label>
            <input type="date" name="dob" id="dob" class="form-control">
        </div>
        <div class="mb-3">
            <label for="class_name" class="form-label">Lớp</label>
            <input type="text" name="class_name" id="class_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
