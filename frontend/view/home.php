<div class="grid__colum-12">
    <div class="grid">
        <div class="grid__row content">
            <div class="grid__colum-12">
                <div class="home-fillter">
                    <span class="home-fillter__label"> Sản Phẩm Hot </span>
                    <div class="home-fillter__page">
                        <span class="home-fillter__page-num">
                            <button class="home-fillter__page-current">xem tất cả</button>
                        </span>
                    </div>
                </div>
                <div class="grid__row">
                    <?php if (isset($productsHot)) { 
                        foreach ($productsHot as $p) { ?>
                            <div class="grid__colum-2">
                                <a href="?page=detail&id=<?php echo $p['id']; ?>" class="product">
                                    <div class="product__img">
                                        <img src="../public/assets/img/<?php echo $p['image']; ?>" alt="" class="product__img-avatar">
                                        <div class="product__img-favoutite"><span>Yêu thích</span></div>
                                    </div>
                                    <div class="product__info">
                                        <h5 class="product__info-name"><?php echo $p['ten']; ?></h5>
                                        <div class="product__info-price"><?php echo $p['gia']; ?> 
                                            <span class="product__info-sale"><?php echo $p['giakhuyenmai']; ?></span>
                                        </div>
                                        <span class="product__info-star">
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <span class="product__info-sold">Đã bán 1.4k</span>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <?php } 
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid">
        <div class="grid__row content">
            <div class="grid__colum-12">
                <div class="home-fillter">
                    <span class="home-fillter__label"> Sản Phẩm Quần </span>
                    <div class="home-fillter__page">
                        <span class="home-fillter__page-num">
                            <button class="home-fillter__page-current">xem tất cả</button>
                        </span>
                    </div>
                </div>
                <div class="grid__row">
                    <?php if (isset($productsCate2)) {
                        foreach ($productsCate2 as $p) { ?>
                            <div class="grid__colum-2">
                                <a href="?page=detail&id=<?php echo $p['id']; ?>" class="product">
                                    <div class="product__img">
                                    <img src="../public/assets/img/<?php echo $p['image']; ?>" alt="" class="product__img-avatar">
                                        <div class="product__img-favoutite"><span>Yêu thích</span></div>
                                    </div>
                                    <div class="product__info">
                                        <h5 class="product__info-name"><?php echo $p['ten']; ?></h5>
                                        <div class="product__info-price"><?php echo $p['gia']; ?> 
                                            <span class="product__info-sale"><?php echo $p['giakhuyenmai']; ?></span>
                                        </div>
                                        <span class="product__info-star">
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <span class="product__info-sold">Đã bán 1.4k</span>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <?php } 
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid">
        <div class="grid__row content">
            <div class="grid__colum-12">
                <div class="home-fillter">
                    <span class="home-fillter__label"> Sản Phẩm Áo </span>
                    <div class="home-fillter__page">
                        <span class="home-fillter__page-num">
                            <button class="home-fillter__page-current">xem tất cả</button>
                        </span>
                    </div>
                </div>
                <div class="grid__row">
                    <?php if (!empty($productsCate1)): ?>
                        <?php foreach ($productsCate1 as $p): ?>
                            <div class="grid__colum-2">
                                <a href="?page=detail&id=<?php echo $p['id']; ?>" class="product">
                                    <div class="product__img">
                                    <img src="../public/assets/img/<?php echo $p['image']; ?>" alt="" class="product__img-avatar" >
                                        <div class="product__img-favoutite"><span>Yêu thích</span></div>
                                    </div>
                                    <div class="product__info">
                                        <h5 class="product__info-name"><?php echo $p['ten']; ?></h5>
                                        <div class="product__info-price"><?php echo $p['gia']; ?> 
                                            <span class="product__info-sale"><?php echo $p['giakhuyenmai']; ?></span>
                                        </div>
                                        <span class="product__info-star">
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                            <span class="product__info-sold">Đã bán 1.4k</span>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="grid__colum-12">
                            <p class="no-products">Không có sản phẩm nào trong danh mục này.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="pagination">
    <!-- Nút "Trước" -->
    <?php if ($currentPage > 1): ?>
        <a href="?page=home&pageNum=<?php echo $currentPage - 1; ?>" class="pagination__num"><i class="ti-angle-left"></i></a>
    <?php else: ?>
        <span class="pagination__num pagination__num--disabled"><i class="ti-angle-left"></i></span>
    <?php endif; ?>

    <!-- Hiển thị trang 1 -->
    <?php if ($currentPage > 2): ?>
        <a href="?page=home&pageNum=1" class="pagination__num">1</a>
        <?php if ($currentPage > 3): ?>
            <span class="pagination__dots">...</span>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Hiển thị các trang gần trang hiện tại -->
    <?php 
    $start = max(1, $currentPage - 1);
    $end = min($totalPagesCate1, $currentPage + 1);
    for ($i = $start; $i <= $end; $i++): ?>
        <a href="?page=home&pageNum=<?php echo $i; ?>" class="pagination__num <?php echo $i == $currentPage ? 'pagination__num--active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <!-- Hiển thị trang cuối -->
    <?php if ($currentPage < $totalPagesCate1 - 1): ?>
        <?php if ($currentPage < $totalPagesCate1 - 2): ?>
            <span class="pagination__dots">...</span>
        <?php endif; ?>
        <a href="?page=home&pageNum=<?php echo $totalPagesCate1; ?>" class="pagination__num"><?php echo $totalPagesCate1; ?></a>
    <?php endif; ?>

    <!-- Nút "Sau" -->
    <?php if ($currentPage < $totalPagesCate1): ?>
        <a href="?page=home&pageNum=<?php echo $currentPage + 1; ?>" class="pagination__num"><i class="ti-angle-right"></i></a>
    <?php else: ?>
        <span class="pagination__num pagination__num--disabled"><i class="ti-angle-right"></i></span>
    <?php endif; ?>
</div>


            </div>
        </div>
    </div>
</div>
