    <?php
    // Đảm bảo require đúng file chứa lớp Database
    require_once('./frontend/model/database.php'); 



    class cartController {
        private $productModel;
        private $cartModel;
        private $db;

        public function __construct() {
            // Kết nối cơ sở dữ liệu
            $this->db = Database::getInstance();

            require_once('./frontend/model/productModel.php');
            require_once('./frontend/model/cartModel.php');
            $this->productModel = new ProductModel();
            $this->cartModel = new CartModel();
        }


        public function addCart($id, $quantity) {
            // Lấy thông tin sản phẩm từ database
            $p = $this->productModel->getProductById($id);
            
            // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
            if (isset($_SESSION['cart'][$id])) {
                // Cộng dồn số lượng sản phẩm
                $_SESSION['cart'][$id]['quantity'] += $quantity;
            } else {
                // Thêm sản phẩm mới vào giỏ hàng với thông tin đầy đủ, bao gồm đường dẫn ảnh
                $_SESSION['cart'][$id] = [
                    'ten' => $p['ten'],  // Tên sản phẩm
                    'giakhuyenmai' => $p['giakhuyenmai'],  // Giá khuyến mãi
                    'quantity' => $quantity,  // Số lượng
                    'image' => $p['image']   // Đường dẫn ảnh sản phẩm
                ];
            }
            // In thông tin giỏ hàng ra màn hình để kiểm tra
            require_once('./frontend/view/cart.php');
        }
        
        
        public function renderCart(){
            require_once('./frontend/view/cart.php');
        }
        public function increaseQuantity($id) {
            $_SESSION['cart'][$id]['quantity'] += 1;
            $this->calculateTotal();
            require_once('./frontend/view/cart.php');
        }

        public function decreaseQuantity($id) {
            if ($_SESSION['cart'][$id]['quantity'] > 1) {
                $_SESSION['cart'][$id]['quantity']--;
            }
            $this->calculateTotal();
            require_once('./frontend/view/cart.php');
        }
        private function calculateTotal() {
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $p) {
                $total += $p['giakhuyenmai'] * $p['quantity'];
            }
            $_SESSION['total'] = $total;
        }
        public function removeFromCart($id) {
            if(isset($_SESSION['cart'][$id])) { 
                unset($_SESSION['cart'][$id]); 
            } 
            require_once('./frontend/view/cart.php'); 
        }
        public function showCheckoutForm() {
            if (!empty($_SESSION['cart'])) {
                // Tính tổng tiền giỏ hàng
                $this->calculateTotal();
                require_once('./frontend/view/checkout.php');
            } else {
                echo "<script>alert('Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi thanh toán!');</script>";
                echo "<script>window.location.href = 'index.php?page=cart';</script>";
            }
        }
            
        public function processCheckout() {
        
            // Kiểm tra nếu người dùng chưa đăng nhập
            if (!isset($_SESSION['khachhang']) || empty($_SESSION['khachhang'])) {
                echo "<script>alert('Vui lòng đăng nhập trước khi thanh toán!');</script>";
                echo "<script>window.location.href = '?page=loginpage';</script>";
                exit; // Dừng lại nếu không có session
            }
      
            // Kiểm tra nếu giỏ hàng không trống
            if (empty($_SESSION['cart'])) {
                echo "<script>alert('Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.');</script>";
                echo "<script>window.location.href = 'index.php?page=cart';</script>";
                exit; // Dừng lại nếu giỏ hàng trống
            }
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $phone = htmlspecialchars($_POST['phone']);
                $address = htmlspecialchars($_POST['address']);
                $paymentMethod = htmlspecialchars($_POST['pttt']);
                $note = isset($_POST['ghichu']) ? htmlspecialchars($_POST['ghichu']) : ''; // Ghi chú

                //lấy id user từ session
                $userId = $_SESSION['khachhang']['id'];
                // Lưu đơn hàng vào bảng donhang
                if ($this->cartModel->saveOrder($userId, $name, $phone, $email, $address, $paymentMethod, $note)) {
                     $orderId = $this->db->lastInsertId();
                     $listCart = $_SESSION['cart'];
               
                    // Lưu chi tiết đơn hàng vào bảng chitietdonhang
                    if ($this->cartModel->saveOrderDetails($orderId, $listCart)) {
                        unset($_SESSION['cart']);
                        unset($_SESSION['total']);
                        
                        
                        echo "<script>alert('Đặt hàng thành công. Cảm ơn bạn đã đặt hàng ');</script>";
                        echo "<script>window.location.href = 'index.php?page=home';</script>";
                        // echo "<script>window.location.href = 'index.php?page=orderSuccess';</script>"; // Chuyển hướng sang trang thành công
                    } else {
                        echo "<script>alert('Có lỗi khi lưu chi tiết đơn hàng.');</script>";
                    }
                } else {
                    echo "<script>alert('Có lỗi khi lưu đơn hàng.');</script>";
                }
            }
        }
        
    }        
        
        
        
        
        
    ?>
