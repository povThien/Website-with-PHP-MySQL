<div class="container">
    <header class="header__login">
        <div class="header__titlepage">
            <div class="header__titlepage-name">
                Trang Đăng Nhập
            </div>
            <a href="#" class="header__title-help">Cần trợ giúp?</a>
        </div>
    </header>

    <div class="login">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__colum-6">
                    <img src="./assets/img/ShopWhere__2_-removebg-preview.png" alt="Logo" class="logo__img">
                </div>
                <div class="grid__colum-6">
                    <div class="auth-form auth-form--login auth-form--close">
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng Nhập</h3>
                                <span class="auth-form__switch-btn auth-form__switch-btn--js">Đăng Ký</span>
                            </div>
                            <form class="auth-form__body" action="index.php?page=login" method="post">
                                <div class="auth-form__group">
                                    <label for="email" class="auth-form__label">Email</label>
                                    <input type="email" name="email" required placeholder="Email của bạn" class="auth-form__input">
                                </div>
                                <div class="auth-form__group">
                                    <label for="pass" class="auth-form__label">Mật Khẩu</label>
                                    <input type="password" name="pass" required placeholder="Mật khẩu của bạn" class="auth-form__input">
                                </div>
                                <div class="auth-form__aside">
                                    <div class="auth-form__help">
                                        <span class="auth-form__help-separate"></span>
                                        <a href="#" class="auth-form__help-link">Cần trợ giúp?</a>
                                    </div>
                                </div>
                                <div class="auth-form__control">
                                    <button class="btn auth-form__control--back btn--normal">Trở lại</button>
                                    <button class="btn btn--primary" type="submit">Đăng Nhập</button>
                                </div>
                            </form>
                        </div>

                        <div class="auth-form__footer">
                            <a href="#" class="auth-form__btn btn--with-icon--fb">
                                <div class="auth-form__body">
                                    <i class="auth-form__icon fa-brands fa-square-facebook"></i>
                                    <span class="auth-form__title">Kết nối Facebook</span>
                                </div>
                            </a>
                            <a href="#" class="auth-form__btn btn--with-icon--gg">
                                <div class="auth-form__body">
                                    <i class="auth-form__icon fa-brands fa-google"></i>
                                    <span class="auth-form__title">Kết nối Google</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
