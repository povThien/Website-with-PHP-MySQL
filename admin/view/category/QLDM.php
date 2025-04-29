<?php include './admin/view/layout/header.php'; ?>
<div class="content">
    <!-- Header -->
    <div class="header">
        <h1>Quản lý danh mục</h1>
        <a href="?page=addDm" class="btn-add">Thêm danh mục</a>
    </div>

    <!-- Category Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= htmlspecialchars($category['id']) ?></td>
                        <td><?= htmlspecialchars($category['ten']) ?></td>
                        <td class="action-buttons">
                            <a href="?page=editDm&id=<?= htmlspecialchars($category['id']) ?>" class="btn-edit">Sửa</a>
                            <a href="?page=deleteDm&id=<?= htmlspecialchars($category['id']) ?>" 
                               class="btn-delete"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include './admin/view/layout/footer.php'; ?>