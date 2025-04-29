<?php include './admin/view/layout/header.php'; ?>

<div class="header">
    <div class="search-bar">
        <input type="text" placeholder="Tìm kiếm sản phẩm...">
        <button>Tìm kiếm</button>
    </div>
</div>

<div class="table-container">
    <a href="?page=addpro"><button class="btn-add">Thêm sản phẩm</button></a>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $product): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <!-- Tên sản phẩm -->
                <td class="product-name" data-content="<?= htmlspecialchars($product['ten']) ?>">
                    <?= htmlspecialchars($product['ten']) ?>
                </td>
                <!-- Hình ảnh -->
                <td>
                    <img src="../public/assets/img/<?= htmlspecialchars($product['image']) ?>" alt="Hình ảnh sản phẩm">
                </td>
                <!-- Giá -->
                <td><?= number_format($product['gia'], 0, ',', '.') ?> VND</td>
                <!-- Giá khuyến mãi -->
                <td><?= number_format($product['giakhuyenmai'], 0, ',', '.') ?> VND</td>
                <!-- Danh mục -->
                <td><?= htmlspecialchars($product['idDM']) ?></td>
                <!-- Số lượng -->
                <td><?= htmlspecialchars($product['soluong']) ?></td>
                <!-- Mô tả -->
                <td class="product-description" data-content="<?= htmlspecialchars($product['mota']) ?>">
                    <?= htmlspecialchars($product['mota']) ?>
                </td>
                <!-- Thao tác -->
                <td class="action-buttons">
                    <a href="?page=editpro&id=<?= $product['id'] ?>"><button class="btn-edit">Sửa</button></a>
                    <a href="?page=deletepro&id=<?= $product['id'] ?>"><button class="btn-delete">Xóa</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const truncateText = (selector, wordLimit) => {
            document.querySelectorAll(selector).forEach(el => {
                const fullText = el.getAttribute('data-content');
                const words = fullText.split(' ');
                if (words.length > wordLimit) {
                    el.textContent = words.slice(0, wordLimit).join(' ') + '...';
                } else {
                    el.textContent = fullText;
                }
            });
        };

        // Giới hạn 7 từ cho tên sản phẩm và mô tả
        truncateText('.product-name', 7);
        truncateText('.product-description', 7);
    });
</script>

<?php include './admin/view/layout/footer.php'; ?>
