<?php
session_start();
// đăng nhap
ob_start();
// session_unset();
require_once('./frontend/view/header.php'); 


$page = isset($_GET['page']) ? $_GET['page'] : 'home';


switch ($page) {
    case 'home':
        require_once('./frontend/controller/productController.php');
        $productController = new productController();
        $productController->renderHome();
        break;

    case 'product':
        require_once('./frontend/controller/productController.php');
        $productController = new productController();
        $productController->renderProduct();
        break;

    case 'detail':
        $id = $_GET['id'];
        require_once('./frontend/controller/productController.php');
        $productController = new productController();
        $productController->renderDetail($id);
        break;

    case 'addcart':
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->addCart($id, $quantity);
        break;

    case 'cart':
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->renderCart();
        break;

    case 'increase':
        $id = $_GET['id'];
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->increaseQuantity($id);
        break;

    case 'decrease':
        $id = $_GET['id'];
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->decreaseQuantity($id);
        break;

    case 'remove':
        $id = $_POST['id'];
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->removeFromCart($id);
        break;

    case 'checkout':
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->showCheckoutForm();
        break;

    case 'processCheckout':
        require_once('./frontend/controller/cartController.php');
        $cartController = new cartController();
        $cartController->processCheckout();
        break;
    case 'loginpage':
        require_once('./frontend/controller/user_C.php');
        $userController = new userController();
        $userController->renderLogin();
        break;
    case 'login':
        $data = $_POST;
        require_once('./frontend/controller/user_C.php');
        $userController = new userController();
        $userController->login($data);
        break; 
    case 'logout':
        require_once('./frontend/controller/user_C.php');
        $userController = new userController();
        $userController -> logout();
        break; 
    case 'registerpage':
        require_once('./frontend/controller/user_C.php');
        $userController = new userController();
        $userController -> renderRegister();
        break;
    case 'register':
        $data = $_POST;
        require_once('./frontend/controller/user_C.php');
        $userController = new userController();
        $userController->register($data);
        break; 
    case 'purchaseHistory':
        require_once('./frontend/controller/OrderController.php'); // Đường dẫn tới file
        $controller = new OrderController();
        $controller->viewPurchaseHistory();
        break;
         
        

    default:
        echo "Không tồn tại ";
        break;
}
require_once('./frontend/view/footer.php');




?>
