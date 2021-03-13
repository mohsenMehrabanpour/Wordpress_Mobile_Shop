<?php wp_footer(); ?>

<div class="container-fluid footer-background p-5 me-rtl mt-5" id="footer">
    <div class='row'>
        <div class="col-12 col-md-4">
            <p><a class="text-decoration-none text-white" href="<?php echo site_url() ?>">صفحه اصلی</a></p>
            <p><a class="text-decoration-none text-white" href="<?php echo site_url().'/login' ?>">ورود به سیستم</a></p>
            <p><a class="text-decoration-none text-white" href="<?php echo site_url().'/register' ?>">ثبت نام</a></p>
            <p><a class="text-decoration-none text-white" href="<?php echo site_url().'/basket' ?>">سبد خرید</a></p>
        </div>

        <div class="col-12 col-md-4">
            <h2 class="text-white mitra-font">ارتباط با ما :</h2>
            <p class="text-white font-weight-bold">آدرس :</p>
            <p class="text-white">مشهد احمدآباد پاساز قصر موبایل طبقه دوم <span class="welcome-logo">نئـــون شــاپ</span></p>
            <p class="text-white font-weight-bold">شماره تماس :</p>
            <p class="text-white"> 09351111111-05132222222</p>
        </div>
        <div class="col-12 col-md-4">
            <p class="neon">
                neon shop
            </p>
            <p class="text-white font-weight-bold text-center mt-4">هدف ما رضایت مندی شماست</p>
            <p class="text-white mt-5">مجموعه ما با بیش از پانزده سال سابقه کار در پی آن است بهترین کیفیت را برای شما به عمل آورد .</p>
            <p class="text-white font-weight-bold mt-2">مارا در فضای مجازی دنبال کنید : </p>
            <div>
                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
                <a href="#" class="uk-icon-button  uk-margin-small-right" uk-icon="facebook"></a>
                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="google-plus"></a>
                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="whatsapp"></a>
                <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="youtube"></a>
            </div>

        </div>
    </div>
</div>

<script src="<?php Assets::js('popper.js'); ?>"></script>
<script src="<?php Assets::js('bootstrap.js'); ?>"></script>
<script src="<?php Assets::js('uikit.min.js'); ?>"></script>
<script src="<?php Assets::js('uikit-icons.min.js'); ?>"></script>
<script src="<?php Assets::js('custom.js'); ?>"></script>
<script src="<?php Assets::js('ajax-handler.js'); ?>"></script>
</body>

</html>