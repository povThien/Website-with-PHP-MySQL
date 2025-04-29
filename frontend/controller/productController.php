<?php

class productController {
    private $productModel;

    public function __construct() {
        require_once('./frontend/model/productModel.php');
        $this->productModel = new ProductModel();
    }
//Phân trang 
public function renderHome() {
    $productsPerPage = 10; // Số sản phẩm mỗi trang
    $currentPage = isset($_GET['pageNum']) ? (int)$_GET['pageNum'] : 1;

    // Tổng số sản phẩm của danh mục Áo (id = 42)
    $totalProductsCate1 = count($this->productModel->getProByCate(42));

    // Tính tổng số trang
    $totalPagesCate1 = ceil($totalProductsCate1 / $productsPerPage);

    // Đảm bảo trang hiện tại nằm trong giới hạn hợp lệ
    $currentPage = max(1, min($currentPage, $totalPagesCate1));

    // Tính toán offset
    $offset = ($currentPage - 1) * $productsPerPage;

    // Lấy sản phẩm cho trang hiện tại (nếu không có sản phẩm thì trả về rỗng)
    $productsCate1 = $offset < $totalProductsCate1 
        ? $this->productModel->laySanPhamTheoDanhMucGioiHang(42, $offset, $productsPerPage)
        : [];

    // Truyền dữ liệu khác
    $productsHot = $this->productModel->getHotProduct();
    $productsCate2 = $this->productModel->getProByCate(43);

    // Truyền dữ liệu vào view
    require_once('./frontend/view/home.php');
}

    public function renderProduct() {
        $productsPerPage = 10; // Số sản phẩm mỗi trang
        $currentPage = isset($_GET['pageNum']) ? (int)$_GET['pageNum'] : 1; // Trang hiện tại (mặc định trang 1)
        // Lấy tổng số sản phẩm từ model
        $totalProducts = $this->productModel->getTotalProducts();
        // Tính tổng số trang
        $totalPages = ceil($totalProducts / $productsPerPage);
        // Giới hạn trang hiện tại trong phạm vi hợp lệ
        $currentPage = max(1, min($currentPage, $totalPages));
        // Tính toán offset cho truy vấn (sản phẩm bắt đầu từ đâu)
        $offset = ($currentPage - 1) * $productsPerPage;
        // Lấy danh sách sản phẩm cho trang hiện tại
        $products = $this->productModel->getProductsByPage($offset, $productsPerPage);
        // Truyền dữ liệu vào view
        require_once('./frontend/view/product.php');
    }

    public function renderDetail($id) {
        $product = $this->productModel->getProductById($id);
        $dssptuongtu = $this->productModel->getSimilarProducts($id);
        require_once('./frontend/view/detail.php');
    }

    // Phần Trang
    
}
?>
