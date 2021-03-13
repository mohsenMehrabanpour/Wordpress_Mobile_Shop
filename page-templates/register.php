<?php /* Template Name: register */ ?>
<?php get_header() ?>
<div>
    <p class="neon sign-logo">
        neon shop
    </p>
    <div class="container-fluid">
        <div class="row justify-content-center me-rtl">
            <div class="col-12 col-md-10 col-lg-7 register-wrapper shadow shadow-lg my-5">
                <form method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <?php if (isset($register_request_result)) : ?>
                                    <?php if (in_array('err', $register_request_result)) : ?>
                                        <div class="alert-danger pr-2 py-3 custom-register-alerts">
                                            <?php foreach ($register_request_result as $res) : ?>
                                                <p><?php $res != 'err' ? print $res : ''; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (in_array('success', $register_request_result)) : ?>
                                        <div class="alert-success pr-2 py-3 custom-register-alert-success">
                                            <?php foreach ($register_request_result as $res) : ?>
                                                <p><?php $res != 'success' ? print $res : ''; ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-7 col-lg-4">
                                <label for="register_username">نام کاربری خود را انتخاب کنید :</label>
                                <input type="text" name="register_username" required class="form-control" id="register_username">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-7 col-lg-4">
                                <label for="register_fullname">نام و نام خانوادگی :</label>
                                <input type="text" name="register_fullname" class="form-control" required id="register_fullname">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-7 col-lg-4">
                                <label for="register_phonenumber">شماره تماس :</label>
                                <input type="text" name="register_phonenumber" class="form-control " required id="register_phonenumber">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-12 col-lg-12">
                                <label for="register_address">آدرس (در وارد کردن آدرس دقت داشته باشید ، خرید شما به این آدرس ارسال خواهد شد) :</label>
                                <input type="text" name="register_address" class="form-control" required id="register_address">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-7 col-lg-4">
                                <label for="register_password">رمز عبور :</label>
                                <input type="text" name="register_password" class="form-control" required id="register_password">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-7 col-lg-4">
                                <label for="register_password_confirm">تکرار رمز عبور :</label>
                                <input type="text" name="register_password_confirm" class="form-control" required id="register_password_confirm">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-md-7 col-lg-4">
                                <input type="submit" name="submit_register_form" value="ثبت نام" class="form-control btn btn-warning form-submit my-2" id="submit_register_form">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>