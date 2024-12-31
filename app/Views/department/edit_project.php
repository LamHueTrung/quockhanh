<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa đồ án</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Sửa Đồ Án</h1>
    <form action="/department/update-project/<?= $project['id'] ?>" method="post" class="shadow p-4 bg-light rounded">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="project_code" class="form-label">Mã Đồ Án</label>
            <input type="text" name="project_code" id="project_code" class="form-control" value="<?= $project['project_code'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tên Đồ Án</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $project['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại Đồ Án</label>
            <select name="type" id="type" class="form-select">
                <option value="foundation" <?= $project['type'] === 'foundation' ? 'selected' : '' ?>>Cơ Sở Ngành</option>
                <option value="specialization" <?= $project['type'] === 'specialization' ? 'selected' : '' ?>>Chuyên Ngành</option>
                <option value="graduation" <?= $project['type'] === 'graduation' ? 'selected' : '' ?>>Tốt Nghiệp</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="advisor_id" class="form-label">Giáo Viên Hướng Dẫn</label>
            <select name="advisor_id" id="advisor_id" class="form-select">
                <?php foreach ($teachers as $teacher): ?>
                    <option value="<?= $teacher['id'] ?>" <?= $project['advisor_id'] == $teacher['id'] ? 'selected' : '' ?>>
                        <?= $teacher['name'] ?> (<?= $teacher['email'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control"><?= $project['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select name="status" id="status" class="form-select">
                <option value="in_progress" <?= $project['status'] === 'in_progress' ? 'selected' : '' ?>>Đang Thực Hiện</option>
                <option value="completed" <?= $project['status'] === 'completed' ? 'selected' : '' ?>>Đã Hoàn Thành</option>
                <option value="pending" <?= $project['status'] === 'pending' ? 'selected' : '' ?>>Đang Chờ</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Cập Nhật Đồ Án</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
