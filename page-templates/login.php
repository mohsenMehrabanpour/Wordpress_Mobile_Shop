<?php /* Template Name: login */ ?>
<?php get_header(); ?>
<center>
    <p class="neon sign-logo">
        neon shop
    </p>
    <div class="my-form-wrapper shadow shadow-lg">
        <p class="alert alert-danger me-rtl" id="err_box" style="display: none;color:red;"></p>
        <p class="alert alert-success me-rtl" id="success_box" style="display: none"></p>
        <form action="<?php get_permalink() ?>" id="login-form">
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: user"></span>
                    <input class="uk-input me-rtl" type="text" name="username" id="username" required placeholder="نام کاربری">
                </div>
            </div>

            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                    <input class="uk-input me-rtl" type="password" name="password" id="password" required placeholder="رمز عبور">
                </div>
                <div class="uk-margin">
                <label for="rememberme">مرا به خاطر بسپار</label>
                <input class="uk-checkbox" name="rememberme" id="rememberme" type="checkbox">
                </div>
            </div>
            <?php wp_nonce_field('login_ajax','login_nonce') ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="ورود" class="btn btn-warning w-100">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <a href="<?php echo site_url().'/register' ?>" class="btn btn-outline-warning w-100"> ثبت نام </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</center>
<?php get_footer(); ?>