<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>
    <link rel="stylesheet" href="../public/assest/css/base.css">
    <link rel="stylesheet" href="../public/assest/css/main.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Lịch sử mua hàng của bạn</h1>
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order):?>
                <div class="order-card">
                    <div class="order-header">
                        <h3>Đơn hàng ID: <?php echo $order['id']; ?></h3>
                        <p><strong>Ngày đặt hàng:</strong> <?php echo $order['date']; ?></p>
                        <p><strong>Phương thức thanh toán:</strong> <?php echo $order['pttt']; ?></p>
                        <p><strong>Ghi chú:</strong> <?php echo $order['ghiChu']; ?></p>
                    </div>
                    <h4 class="details-title">Chi tiết đơn hàng:</h4>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order['details'] as $detail): ?>
                                <tr>
                                    <td><img src="../public/assest/upload/<?php echo $detail['image']; ?>" alt="" class="product-image"></td>
                                    <td><?php echo $detail['ten']; ?></td>
                                    <td><?php echo $detail['soluong']; ?></td>
                                    <td><?php echo number_format($detail['dongia'], 0, ',', '.'); ?> VND</td>
                                    <td><?php echo number_format($detail['soluong'] * $detail['dongia'], 0, ',', '.'); ?> VND</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-orders">Bạn chưa có đơn hàng nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<style>
    .title {
    text-align: center;
    color: #007bff;
    margin: 20px;
}

/* Order card styles */
.order-card {
    margin-bottom: 30px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.order-header {
    background-color: #f7f7f7;
    padding: 15px;
    border-bottom: 1px solid #ddd;
}

.order-header h3 {
    margin: 0;
    color: #007bff;
}

.details-title {
    margin: 15px 15px 10px;
    font-size: 18px;
    color: #333;
}

/* Table styles */
.order-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 15px;
}

.order-table th,
.order-table td {
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
}

.order-table th {
    background-color: #f1f1f1;
    font-weight: bold;
}

.order-table td {
    background-color: #fff;
}

.product-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}

/* No orders message */
.no-orders {
    text-align: center;
    font-size: 18px;
    color: #999;
}
</style>