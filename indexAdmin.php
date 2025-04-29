<?php
require_once './admin/controller/productController.php';
require_once './admin/controller/categoryController.php';
$controller = new ProductController();
$categoryController = new CategoryController();
$page = $_GET['page'] ?? 'product';
$id = $_GET['id'] ?? 0; // Lấy ID nếu cần
switch ($page) {
    case 'product':
        $controller->index();
        break;
    case 'addpro':
        $controller->add();
        break;
    case 'editpro':
        $id = $_GET['id'] ?? 0; 
        $controller->edit($id);
        break;
    case 'deletepro':
        $id = $_GET['id'] ?? 0;
        $controller->delete($id);
        break;

  // Quản lý danh mục
  case 'category':
    $categoryController->index();
    
    break;
case 'addDm':
    $categoryController->add();
    break;
    case 'editDm':
        $categoryController->edit($id);
        break;
    
case 'deleteDm':
    $categoryController->delete($id);
    break;

        
    default:
        echo "404 Not Found";
        break;
}
