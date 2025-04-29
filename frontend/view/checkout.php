<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
</head>
<body>
    <div class="checkout-container">
        <!-- Form nhập thông tin khách hàng -->
        <div class="form-container">
            <h2>Thông tin khách hàng</h2>
            <div class="total-price">
                <p>Tổng tiền: <?php echo number_format($_SESSION['total'], 0, ',', '.') ?> VND</p>
            </div>
            <!-- Kiểm tra giỏ hàng trước khi hiển thị form -->
            <?php
            if (empty($_SESSION['cart'])) {
                echo "<script>alert('Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm vào giỏ hàng trước khi thanh toán.');</script>";
                echo "<script>window.location.href = 'index.php?page=cart';</script>";
                exit;
            }
            ?>
            <form action="index.php?page=processCheckout" method="post">
                <label for="name">Họ và Tên:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>

                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" required>

                <!-- Phương thức thanh toán -->
                <label for="payment">Phương thức thanh toán:</label>
                <select name="pttt" id="payment" required>
                    <option value="cash_on_delivery">Thanh toán khi nhận hàng</option>
                    <option value="credit_card">Thanh toán qua thẻ tín dụng</option>
                    <option value="paypal">Thanh toán qua Momo</option>
                </select>

                <!-- Thêm trường ghi chú -->
                <label for="note">Ghi chú:</label>
                <textarea id="note" name="ghichu"></textarea>

                <button type="submit">Xác nhận thanh toán</button>
            </form>
        </div>

        <!-- Danh sách sản phẩm đã mua -->
        <div class="product-list">
            <h2>Sản phẩm trong giỏ hàng</h2>
            <table>
                <tr>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
                <?php foreach ($_SESSION['cart'] as $product): ?>
                <tr>
                    <td><img width="70px" src="../public/assest/upload/<?=$product['image']?>" alt=""></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo number_format($product['giakhuyenmai'], 0, ',', '.'); ?> VND</td>
                    <td><?php echo number_format($product['giakhuyenmai'] * $product['quantity'], 0, ',', '.'); ?> VND</td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>
