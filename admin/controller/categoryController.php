<?php
require_once './admin/model/categoryModel.php';

class CategoryController {
    private $model;

    public function __construct() {
        $this->model = new CategoryModel();
    }

    public function index() {
        $categories = $this->model->getAllCategories();
        require_once './admin/view/category/QLDM.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['ten'] ?? '');
            if (empty($name)) {
                echo "<script>alert('Tên danh mục không được để trống.'); window.history.back();</script>";
                return;
            }

            if ($this->model->addCategory($name)) {
                header('Location: indexAdmin.php?page=category');
                exit;
            } else {
                echo "<script>alert('Thêm danh mục thất bại.'); window.history.back();</script>";
            }
        } else {
            require_once './admin/view/category/addDm.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['ten'] ?? '');
            if (empty($name)) {
                echo "<script>alert('Tên danh mục không được để trống.'); window.history.back();</script>";
                return;
            }

            if ($this->model->updateCategory($id, $name)) {
                header('Location: indexAdmin.php?page=category');
                exit;
            } else {
                echo "<script>alert('Cập nhật danh mục thất bại.'); window.history.back();</script>";
            }
        } else {
            $category = $this->model->getCategoryById($id);
            if (!$category) {
                echo "<script>alert('Danh mục không tồn tại.'); window.history.back();</script>";
                return;
            }
            require_once './admin/view/category/editDm.php';
        }
    }

    public function delete($id) {
        if ($this->model->deleteCategory($id)) {
            header('Location: indexAdmin.php?page=category');
            exit;
        } else {
            echo "<script>alert('Xóa danh mục thất bại hoặc danh mục không tồn tại.'); window.history.back();</script>";
        }
    }
}
?>
