<?php
$txt_html_producttuongtu = "";
if (isset($dssptuongtu) && is_array($dssptuongtu)) {
    foreach ($dssptuongtu as $p) {
        $link = 'index.php?page=detailProduct&id=' . $p['id'];
        $txt_html_producttuongtu .= "
        <div class='grid__colum-2'>
            <a href='$link' class='product'>
                <div class='product__img'>
                    <img src='../public/assets/img/{$p['image']}' alt='' class='product__img-avatar'>
                    <div class='product__img-favoutite'><span>Yêu thích</span></div>
                </div>
                <div class='product__info'>
                    <h5 class='product__info-name'>{$p['ten']}</h5>
                    <div class='product__info-price'>{$p['giakhuyenmai']} <span class='product__info-sale'>{$p['gia']}</span></div>
                    <span class='product__info-star'>
                        <i class='product__info-star-icon product__info-star-icon--avaluated ti-star'></i>
                        <i class='product__info-star-icon product__info-star-icon--avaluated ti-star'></i>
                        <i class='product__info-star-icon product__info-star-icon--avaluated ti-star'></i>
                        <i class='product__info-star-icon product__info-star-icon--avaluated ti-star'></i>
                        <i class='product__info-star-icon product__info-star-icon--avaluated ti-star'></i>
                        <span class='product__info-sold'>Đã bán 1.4k</span>
                    </span>
                    <form action='?page=addcart' method='post'>
                        <input type='hidden' name='id' value='{$p['id']}'>
                        <input type='hidden' name='quantity' value='1' min='1'>
                        <button type='submit' class='order-button'>Đặt Hàng</button>
                    </form>
                </div>
            </a>
        </div>";
    }
}

$txt_html_detailproduct = "";
if (isset($product) && is_array($product)) {
    $txt_html_detailproduct = "
    <div class='detailproduct'>
        <div class='grid__row'>
            <div class='grid__columdetail-4'>
                <img src='../public/assets/img/{$product['image']}' alt='' class='product__img-avatar'>
            </div>
            <div class='grid__columdetail-8'>
                <div class='detail__name'>{$product['ten']}</div>
                <div class='detail__price'>
                    <div class='detail__price-sale'>" . number_format($product['giakhuyenmai'], 0, ',', '.') . " VNĐ<span class='detail__price-original'>" . number_format($product['gia'], 0, ',', '.') . " VNĐ</span></div>
                </div>
                <div class='detail__quantity'>
                    <input style='outline: none; border: 1px solid #999; width: 200px;' class='detail__quantity-value' type='number' name='sl' value='1' min='1' max='50' required>
                </div>
                <div class='detail__quantity-total'>{$product['soluong']} sản phẩm hiện có</div>
                <form action='?page=addcart' method='post'>
                    <div class='detail__buy'>
                        <input type='hidden' name='tensp' value='{$product['ten']}'>
                        <input type='hidden' name='anhsp' value='{$product['image']}'>
                        <input type='hidden' name='giaban' value='{$product['giakhuyenmai']}'>
                        <input type='hidden' name='giagoc' value='{$product['gia']}'>
                        <input type='hidden' name='id' value='{$product['id']}'>
                        <button name='btn__addtocart' type='submit' class='btn__detail'>
                            <i class='detail__buy-icon ti-shopping-cart-full'></i>
                            thêm vào giỏ hàng
                        </button>
                        <input type='hidden' name='quantity' value='1' min='1'>
                        <button name='btn__addtocart' type='submit' class='btn__detail'>Đặt Hàng</button>
                    </div>
                </form>
            </div>
        </div>
        <div class='grid__row'>
            <div class='grid__colum-12'>
                <div style='font-size: 2rem; border-bottom: 1px solid var(--primary-color); color: var(--primary-color); font-weight: 500;' class='description__title'>Mô Tả</div>
                <div style='font-size: 1.6rem; word-spacing: 5px; line-height: 23px; color: #918d8d;' class='detail__description'>{$product['mota']}</div>
            </div>
        </div>
    </div>";
} else {
    $txt_html_detailproduct = "<p>Không tìm thấy sản phẩm</p>";
}
?>

<!-- CONTENT -->
<div class="detail">
    <div class="grid">
        <?=$txt_html_detailproduct?>
    </div>

    <div class="grid">
        <div class="grid__row content">
            <div class="grid__colum-12">
                <div class="home-fillter">
                    <span class="home-fillter__label">sản phẩm liên quan</span>
                </div>
                <div class="grid__row">
                    <?=$txt_html_producttuongtu?>
                </div>
            </div>
        </div>
    </div>
</div>
