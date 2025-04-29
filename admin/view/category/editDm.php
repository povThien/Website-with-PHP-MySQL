<h2>Sửa danh mục</h2>
<form method="POST" action="?page=editDm&id=<?= htmlspecialchars($category['id']) ?>">
    <label for="ten">Tên danh mục:</label>
    <input type="text" name="ten" id="ten" value="<?= htmlspecialchars($category['ten']) ?>" required>
    <button type="submit">Lưu</button>
</form>
