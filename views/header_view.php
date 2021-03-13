<div class="container-fluid">
    <div class="row header_backgroud justify-content-center shadow shadow-lg">
        <div class="col-12 col-md-5 col-lg-3 neon logo_position">
            neon shop
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11 col-md-10 col-lg-8 header_box shadow shadow-lg me-rtl">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center col-lg-2">
                        <a class="header-element-lineheight text-decoration-none font-weight-bold text-dark" href="<?php echo site_url() ?>">صفحه اصلی <span uk-icon="home"></span></a>
                    </div>
                    <div class="col-12 col-lg-2 text-center">
                        <a class="header-element-lineheight text-decoration-none font-weight-bold text-dark" href="<?php echo site_url() . '/#app' ?>">محصولات <span uk-icon="phone"></span></a>
                    </div>
                    <div class="col-12 col-lg-4 text-center" style="background: #ffc65c;">
                        <a class="header-element-lineheight text-decoration-none shake font-weight-bold text-dark" href="<?php echo site_url() . '/basket' ?>">سبد خرید <span uk-icon="cart"></span></a>
                    </div>
                    <div class="col-12 col-lg-2 text-center">

                        <?php if(is_user_logged_in()): ?>
                            <a class="header-element-lineheight text-decoration-none shake font-weight-bold text-dark" href="<?php echo site_url() . '/profile' ?>">پروفایل <span uk-icon="user"></span></a>
                        <?php else: ?>
                            <a class="header-element-lineheight text-decoration-none shake font-weight-bold text-dark" href="<?php echo site_url() . '/register' ?>">ثبت نام <span uk-icon="link"></span></a>
                        <?php endif; ?>
                        
                    </div>

                    <div class="col-12 col-lg-2 text-center d-lg-block <?php is_user_logged_in() ? print 'd-none' : '' ?>">
                    <?php if(is_user_logged_in()): ?>
                            <a class="header-element-lineheight text-decoration-none shake font-weight-bold text-dark" href="<?php echo site_url() . '/#footer' ?>">درباره ی ما <span uk-icon="file-text"></span></a>
                        <?php else: ?>
                            <a class="header-element-lineheight text-decoration-none shake font-weight-bold text-dark" href="<?php echo site_url() . '/login' ?>">ورود <span uk-icon="sign-in"></span></a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>