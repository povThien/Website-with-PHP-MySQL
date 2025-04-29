<div class="container">
    <div class="grid">
        <div class="grid__row content">
            <div class="grid__colum-10-2">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="category__heading-icon ti-menu"></i>
                        Danh mục
                    </h3>
                    <ul class="category__list">
                        <li class="category__item">
                            <a href="?page=product&hot=1" class="category__item-link">Sản Phẩm Hot</a>
                        </li>
                        <li class="category__item">
                            <a href="?page=product&category=1" class="category__item-link">Sản Phẩm Theo Danh Mục</a>
                        </li>
                        <li class="category__item">
                            <a href="?page=product&category=2" class="category__item-link">Sản Phẩm Quần</a>
                        </li>
                        <li class="category__item">
                            <a href="?page=product&category=3" class="category__item-link">Sản Phẩm Áo</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="grid__colum-10">
                <div class="home-fillter">
                    <span class="home-fillter__label">Sàn Sản Phẩm</span>
                    <div class="home-fillter__page">
                        <div class="home-fillter__page-control">
                            <a href="?page=product&pageNum=<?php echo $currentPage - 1; ?>" class="home-fillter__page-btn <?php echo $currentPage <= 1 ? 'home-fillter__page-btn--disabel' : ''; ?>">
                                <i class="home-fillter__page-btn-icon ti-back-left"></i>
                            </a>
                            <a href="?page=product&pageNum=<?php echo $currentPage + 1; ?>" class="home-fillter__page-btn <?php echo $currentPage >= $totalPages ? 'home-fillter__page-btn--disabel' : ''; ?>">
                                <i class="home-fillter__page-btn-icon ti-back-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid__row">
                    <?php if (isset($products)) { foreach ($products as $p) { ?>
                    <div class="grid__colum-2">
                        <a href="?page=detail&id=<?php echo $p['id']; ?>" class="product">
                            <div class="product__img">
                            <img src="../public/assets/img/<?php echo $p['image']; ?>" alt="" class="product__img-avatar">
                                <div class="product__img-favoutite"><span>Yêu thích</span></div>
                            </div>
                            <div class="product__info">
                                <h5 class="product__info-name"><?php echo $p['ten']; ?></h5>
                                <div class="product__info-price">
                                    <?php echo number_format($p['gia'], 0, ',', '.'); ?>
                                    <span class="product__info-sale"><?php echo number_format($p['giakhuyenmai'], 0, ',', '.'); ?></span>
                                </div>
                                <span class="product__info-star">
                                    <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                    <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                    <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                    <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                    <i class="product__info-star-icon product__info-star-icon--avaluated ti-star"></i>
                                    <span class="product__info-sold">Đã bán <?php echo number_format($p['soluong'], 0, ',', '.'); ?></span>
                                </span>
                            </div>
                        </a>

                    </div>
                    <?php }} ?>
                </div>

                <div class="pagination">
                    <?php if ($currentPage > 1) { ?>
                        <a href="?page=product&pageNum=<?php echo $currentPage - 1; ?>" class="pagination__num">
                            <i class="ti-angle-left"></i>
                        </a>
                    <?php } ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                        <a href="?page=product&pageNum=<?php echo $i; ?>" class="pagination__num <?php echo $i == $currentPage ? 'pagination__num--active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php } ?>

                    <?php if ($currentPage < $totalPages) { ?>
                        <a href="?page=product&pageNum=<?php echo $currentPage + 1; ?>" class="pagination__num">
                            <i class="ti-angle-right"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
