<?php
require_once('./frontend/model/OrderModel.php');
class OrderController    {
    private $orderModel;

    public function __construct() {
        
        $this->orderModel = new OrderModel();
    }
    // Hiển thị lịch sử mua hàng của khách hàng
    public function viewPurchaseHistory() {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!isset($_SESSION['khachhang']) || empty($_SESSION['khachhang'])) {
            echo "<script>alert('Vui lòng đăng nhập trước khi xem lịch sử mua hàng!');</script>";
            echo "<script>window.location.href = '?page=loginpage';</script>";
            exit; // Dừng lại nếu không có session
        }
    
        // Lấy danh sách đơn hàng của khách hàng
        $customerId = $_SESSION['khachhang']['id'];
        $orders = $this->orderModel->getOrdersByCustomer($customerId);
        if (!$orders) {
            $orders = []; // Đảm bảo $orders là một mảng ngay cả khi không có dữ liệu
        }
        // Chuẩn bị dữ liệu chi tiết từng đơn hàng
        foreach ($orders as $key => $order) {
            $orderDetails = $this->orderModel->getOrderDetails($order['id']);
            $orders[$key]['details'] = $orderDetails ?: [];
        }
    
        // Hiển thị giao diện
        require_once('./frontend/view/purchaseHistory.php');
    }
    public function renderOrderSuccess() {
        require_once('./frontend/view/orderSuccess.php');
    }
}
?>
