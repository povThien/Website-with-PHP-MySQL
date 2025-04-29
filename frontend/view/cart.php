<!-- CART -->
        <div class="container">
        <div class="grid">
                <div class="shopcart">
                    <?php 
                    $total = 0; // Khởi tạo biến tổng tiền
                    foreach($_SESSION['cart'] as $id => $p) {
                        $total += $p['giakhuyenmai'] * $p['quantity']; // Cộng dồn tổng tiền
                    ?>
                    <div class="grid__row">
                        <div class="nav__title-cart">
                            <div class="grid__colum-4-shopcart">
                                <input class="nav_check" type="checkbox">
                                <div class="img">
                                    <img src="../public/assest/upload/<?= $p['image'] ?>" alt="" class="img__product">
                                </div>
                                <h5 class="product__name-cart"><?= $p['ten'] ?></h5>
                            </div>
                            <div class="grid__colum-10-2-shopcart">
                                <div class="product__info-price"><?= $p['giakhuyenmai'] ?><span class="product__info-sale">300000</span></div>
                            </div>
                            <div class="grid__colum-10-2-shopcart"> 
                                <div class="detail__quantity"> 
                                    <span class="detail__quantity-value"><?= $p['quantity'] ?></span> 
                                </div> 
                            </div>
                            <div class="grid__colum-10-2-shopcart">
                                <div class="product__info-price"></div>
                            </div>
                            <div class="grid__colum-10-2-shopcart">
                                <form action="?page=remove" method="post"> 
                                    <input type="hidden" name="id" value="<?= $id ?>"> 
                                    <button type="submit" class="btn__shopcart">Xóa</button> 
                                </form>
                            </div>
                        </div> 
                    </div> 
                    <?php } ?>      
                </div>

                <div class="grid__row">
                    <div class="pay">
                        <div class="grid__row">
                            <div class="grid__colum-10-2-shopcart">
                                <input class="nav_check" type="checkbox">
                                <span class="nav_name-product-titlie">Chọn tất cả (0)</span>
                            </div>
                            <div class="grid__colum-10-2-shopcart">
                                <span style="cursor: pointer;" class="nav_name-product-titlie">Bỏ sản phẩm không hoạt động</span>
                            </div>
                            <div class="grid__colum-10-2-shopcart">
                                <span style="cursor: pointer;" class="nav_name-product-titlie nav_name-product-titlie--acitive">Lưu vào mục đã thích</span>
                            </div>
                            <div class="grid__colum-4-shopcart">
                                <span class="nav_name-product-titlie">Tổng thanh toán (<?= count($_SESSION['cart']) ?> sản phẩm): <?= number_format($total, 0, ',', '.') ?>đ
                                    <div class="box__detail__sale">
                                        <div class="detail__box">
                                            <h5 class="detail__box-title">Chi Tiết Khuyến Mãi</h5>
                                            <h1></h1>
                                            <div class="detail__box-tutal">
                                                <div class="detail__box-tong">Tổng tiền hàng</div>
                                                <div class="detail__box-tien-tong">99.000đ</div>
                                            </div>
                                            <h1></h1>
                                            <div class="detail__box-tutal">
                                                <div class="detail__box-tong">Giảm giá sản phẩm</div>
                                                <div class="detail__box-tien-tong">-20.000đ</div>
                                            </div>
                                            <h1></h1>
                                            <div class="detail__box-tutal">
                                                <div class="detail__box-tong">Tiết kiệm được</div>
                                                <div class="detail__box-tien-tong" style="color: var(--primary-color) !important;">20.000đ</div>
                                            </div>
                                        
                                            <div class="detail__box-tutal">
                                                <h5 class="detail__box-title">Số tiền cuối cùng cần thanh toán</h5>
                                                <div class="detail__box-tien-tong">79.000đ</div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="grid__colum-10-2-shopcart">
                                <a href="index.php?page=checkout" class="btn btn__pay"><?php if (!empty($_SESSION['cart'])): ?>
        Thanh toán
    </a>
<?php endif; ?>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--CART END  -->
