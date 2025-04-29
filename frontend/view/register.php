<div class="container">
    <header class="header__login">
        <div class="header__titlepage">
            <div class="header__titlepage-name">
                Trang Đăng Ký
            </div>
            <a href="#" class="header__title-help">Cần trợ giúp?</a>
        </div>
    </header>
    <div class="login">
        <div class="grid">
            <div class="grid__row">
                <div class="grid__colum-6">
                    <img src="./assest/img/ShopWhere__2_-removebg-preview.png" alt="" class="logo__img">
                </div>
                <div class="grid__colum-6">
                    <div class="auth-form auth-form--register">
                        <div class="auth-form__container">
                            <div class="auth-form__header">
                                <h3 class="auth-form__heading">Đăng Ký</h3>
                                <span class="auth-form__switch-btn auth-form__switch-btn--login-js">Đăng Nhập</span>
                            </div>
                            <form class="auth-form__body" action="index.php?page=register" method="post">
                                <div class="auth-form__group">
                                    <input type="email" name="email" placeholder="Email của bạn" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" name="username" placeholder="User name" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" name="hoten" placeholder="Họ tên của bạn" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" name="diachi" placeholder="Địa chỉ của bạn" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" name="sdt" placeholder="Số điện thoại của bạn" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" name="pass" placeholder="Mật khẩu của bạn" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" name="confirm_pw" placeholder="Nhập lại mật khẩu" class="auth-form__input" required>
                                </div>
                                <div class="auth-form__aside">
                                    <p class="auth-form__policy-text">
                                        Bằng việc đăng ký, bạn đã đồng ý với Shop Say Hi về
                                        <a href="#" class="auth-form__policy-link">Điều khoản dịch vụ</a> &
                                        <a href="#" class="auth-form__policy-link">Chính sách bảo mật</a>.
                                    </p>
                                </div>
                                <div class="auth-form__control">
                                    <button class="btn auth-form__control--back btn--normal btn__registerback--js" type="button">Trở lại</button>
                                    <button class="btn btn--primary btn__register--js" type="submit">Đăng Ký</button>
                                </div>
                            </form>

                        </div>
                        <div class="auth-form__footer">
                            <a href="#" class="auth-form__btn btn--with-icon--fb">
                                <div class="auth-form__body">
                                    <i class="auth-form__icon fa-brands fa-square-facebook"></i>
                                    <span class="auth-form__title">Kết nối với Facebook</span>
                                </div>
                            </a>
                            <a href="#" class="auth-form__btn btn--with-icon--gg">
                                <div class="auth-form__body">
                                    <i class="auth-form__icon auth-form__icon--gg fa-brands fa-google"></i>
                                    <span class="auth-form__title">Kết nối với Google</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
