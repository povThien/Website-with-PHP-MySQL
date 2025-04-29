<h2>Sửa sản phẩm</h2>
<form method="POST" action="?page=editpro&id=<?= $product['id'] ?>" enctype="multipart/form-data">
    <label for="ten">Tên sản phẩm:</label>
    <input type="text" name="ten" value="<?= $product['ten'] ?>" required>
    
    <label for="image">Hình ảnh:</label>
    <input type="file" name="image">
    <img src="../public/assets/img/<?= $product['image'] ?>" width="100">

    <label for="gia">Giá:</label>
    <input type="number" name="gia" value="<?= $product['gia'] ?>" required>
    
    <label for="giakhuyenmai">Giá khuyến mãi:</label>
    <input type="number" name="giakhuyenmai" value="<?= $product['giakhuyenmai'] ?>">



    <label for="soluong">Số lượng:</label>
    <input type="number" name="soluong" value="<?= $product['soluong'] ?>" required>

    <label for="mota">Mô tả:</label>
    <textarea name="mota" required><?= $product['mota'] ?></textarea>
    
    <label for="hot">Hot:</label>
    <input type="checkbox" name="hot" <?= $product['hot'] ? 'checked' : '' ?>>
    
    <label for="trangthai">Trạng thái:</label>
    <select name="trangthai">
        <option value="1" <?= $product['trangthai'] == 1 ? 'selected' : '' ?>>Hiển thị</option>
        <option value="0" <?= $product['trangthai'] == 0 ? 'selected' : '' ?>>Ẩn</option>
    </select>

    <button type="submit">Lưu</button>
</form>
<!-- Hiển thị danh sách danh mục -->
<label for="idDM">Danh mục:</label>
<select name="idDM" required>
    <option value="">-- Chọn danh mục --</option>
    <?php
    $categories = $this->model->getAllCategories();
    foreach ($categories as $category) {
        $selected = (isset($product) && $product['idDM'] == $category['id']) ? 'selected' : '';
        echo "<option value='{$category['id']}' $selected>{$category['ten']}</option>";
    }
    ?>
</select>

