<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đồ án mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-dark mb-4">Thêm đồ án mới</h1>

    <!-- Hiển thị thông báo lỗi -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/department/store-project" method="post" class="shadow p-4 bg-light rounded">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="project_code" class="form-label">Mã đồ án</label>
            <input type="text" name="project_code" id="project_code" class="form-control" value="<?= old('project_code') ?>" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Tên đồ án</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= old('title') ?>" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại đồ án</label>
            <select name="type" id="type" class="form-select">
                <option value="foundation" <?= old('type') === 'foundation' ? 'selected' : '' ?>>Cơ sở ngành</option>
                <option value="specialization" <?= old('type') === 'specialization' ? 'selected' : '' ?>>Chuyên ngành</option>
                <option value="graduation" <?= old('type') === 'graduation' ? 'selected' : '' ?>>Tốt nghiệp</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="advisor_id" class="form-label">Giáo viên hướng dẫn</label>
            <select name="advisor_id" id="advisor_id" class="form-select">
                <?php foreach ($teachers as $teacher): ?>
                    <option value="<?= $teacher['id'] ?>" <?= old('advisor_id') == $teacher['id'] ? 'selected' : '' ?>>
                        <?= $teacher['name'] ?> (<?= $teacher['email'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control" rows="4"><?= old('description') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Thêm đồ án</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
