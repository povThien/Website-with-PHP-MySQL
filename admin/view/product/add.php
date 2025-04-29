<form method="POST" action="?page=addpro" enctype="multipart/form-data">
    <label for="ten">Tên sản phẩm:</label>
    <input type="text" name="ten" required>

    <label for="image">Hình ảnh:</label>
    <input type="file" name="image" required>

    <label for="gia">Giá:</label>
    <input type="number" name="gia" required>

    <label for="giakhuyenmai">Giá khuyến mãi:</label>
    <input type="number" name="giakhuyenmai">

    <label for="idDM">Danh mục:</label>
    <select name="idDM" required>
        <?php
        $categories = $this->model->getAllCategories();
        foreach ($categories as $category) {
            echo "<option value='{$category['id']}'>{$category['ten']}</option>";
        }
        ?>
    </select>

    <label for="soluong">Số lượng:</label>
    <input type="number" name="soluong" required>

    <label for="mota">Mô tả:</label>
    <textarea name="mota" required></textarea>

    <label for="hot">Hot:</label>
    <input type="checkbox" name="hot">

    <label for="trangthai">Trạng thái:</label>
    <select name="trangthai">
        <option value="1">Hiển thị</option>
        <option value="0">Ẩn</option>
    </select>

    <button type="submit">Lưu</button>
</form>
