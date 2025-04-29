<?php
// admin/controller/productController.php
require_once './admin/model/productModel.php';

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }
    

    public function index() {
        $products = $this->model->getAllProducts();
        require_once './admin/view/product/QLSP.php';
    }
    

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idDM = $_POST['idDM'];
            $category = $this->model->getCategoryById($idDM);

            if (!$category) {
                echo "<script>alert('Danh mục không tồn tại.'); window.history.back();</script>";
                return;
            }

            $imageName = $_FILES['image']['name'];
            $targetDir = './public/assets/img/';

            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $imageName);

            $data = [
                'ten' => $_POST['ten'],
                'image' => $imageName,
                'gia' => $_POST['gia'],
                'giakhuyenmai' => $_POST['giakhuyenmai'],
                'idDM' => $idDM,
                'soluong' => $_POST['soluong'],
                'mota' => $_POST['mota'],
                'hot' => isset($_POST['hot']) ? 1 : 0,
                'trangthai' => $_POST['trangthai']
            ];

            if ($this->model->addProduct($data)) {
                header('Location: indexAdmin.php?page=product');
            } else {
                echo "<script>alert('Thêm sản phẩm thất bại.'); window.history.back();</script>";
            }
        } else {
            require_once './admin/view/product/add.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = $this->model->getProductById($id);
            if (!$product) {
                echo "<script>alert('Sản phẩm không tồn tại.'); window.history.back();</script>";
                return;
            }
    
            $idDM = $_POST['idDM'] ?? null;
            $category = $this->model->getCategoryById($idDM);
    
            // Kiểm tra danh mục hợp lệ
            if (!$category) {
                echo "<script>alert('Danh mục không hợp lệ hoặc không tồn tại.'); window.history.back();</script>";
                return;
            }
    
            $imageName = !empty($_FILES['image']['name']) ? $_FILES['image']['name'] : $product['image'];
            $targetDir = './public/assets/img/';
            if (!empty($_FILES['image']['name'])) {
                if (!file_exists($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
                move_uploaded_file($_FILES['image']['tmp_name'], $targetDir . $imageName);
            }
    
            $data = [
                'id' => $id,
                'ten' => $_POST['ten'],
                'gia' => $_POST['gia'],
                'giakhuyenmai' => $_POST['giakhuyenmai'],
                'idDM' => $idDM,
                'soluong' => $_POST['soluong'],
                'mota' => $_POST['mota'],
                'hot' => isset($_POST['hot']) ? 1 : 0,
                'trangthai' => $_POST['trangthai'],
                'image' => $imageName
            ];
    
            if ($this->model->updateProduct($data)) {
                header('Location: indexAdmin.php?page=product');
            } else {
                echo "<script>alert('Cập nhật sản phẩm thất bại.'); window.history.back();</script>";
            }
        } else {
            $product = $this->model->getProductById($id);
            $categories = $this->model->getAllCategories();
            require_once './admin/view/product/edit.php';
        }
    }
    
    public function delete($id) {
        if ($this->model->deleteProduct($id)) {
            header('Location: indexAdmin.php?page=product');
        } else {
            echo "<script>alert('Xóa sản phẩm thất bại.'); window.history.back();</script>";
        }
    }
}
?>