    <?php
    ob_start();
    class userController {
        private $userModel;

        public function __construct() {
            require_once('./frontend/model/user_M.php');
            $this->userModel = new userModel();
        }

        public function renderLogin() {
            require_once('./frontend/view/login.php');
        }

        public function login($data) {
            // In ra biến $data để kiểm tra
            // echo "Data: " . print_r($data, true) . "<br>";
            
            $user = $this->userModel->getUser($data);

            // In ra kết quả trả về từ phương thức getUser
            // echo "User: " . print_r($user, true) . "<br>";

            if ($user) {
                $_SESSION['khachhang'] = $user;
                if ($user['role'] == 1) {
                    // require_once('view/register.php');
                    //admin
                } else {
                    header('location: index.php?page=home');
                }
                exit();
            } else {
                $_SESSION['error'] = "Đăng nhập thất bại, nhập lại";
                header('location: index.php?page=login');
                exit();
            }
        }

        public function logout(){
            unset($_SESSION['khachhang']);
            header('location: index.php');
        }

        public function renderRegister(){
            require_once('./frontend/view/register.php');
        }

        public function register($data){
            // In ra biến $data để kiểm tra
            // echo "Data: " . print_r($data, true) . "<br>";

            $result = $this->userModel->addUser($data);

            if ($result) {
                header('Location: index.php?page=loginpage');
            } else {
                echo "Đăng ký thất bại";
            }
        }
    }
    ob_end_flush();
    ?>
