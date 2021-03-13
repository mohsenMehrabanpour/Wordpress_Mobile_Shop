<?php get_header(); ?>
<?php view::render('header_view'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php

        $pic_url = get_the_post_thumbnail_url();
        $content = get_the_content();
        $title = get_the_title();
        $price = intval(get_post_meta(get_the_ID(), 'product_price', true));
        $discount = intval(get_post_meta(get_the_ID(), 'product_discount_price', true));
        $count = intval(get_post_meta(get_the_ID(), 'product_count', true));
        $details_str = get_post_meta(get_the_ID(), 'product_general_details', true);
        $details = unserialize($details_str);
        $product_id = get_the_ID();
        $ajax_price = $discount > 0 ? $discount : $price;
        ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
echo '<script>product_info={product_id:"' . $product_id . '",product_title:"' . $title .
    '",product_price:"' . $ajax_price . '"}</script>';
?>
<div class="container-fluid mt-5 py-4 shadow shadow-lg" style="direction: rtl;background:#fff;">
    <div class="row">
        <div class="col-12 pb-4">
            <h4 style="text-align:center;color:orangered;font-family:'mitra';font-weight:bold;text-shadow: 0 0 black;background:#ff45000a;">
                <?php echo $title; ?>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6" style="border-left: 1px solid #80808052;">
            <img src="<?php echo $pic_url ?>" style="float: right;" alt="">
        </div>
        <div class="col-12 col-md-6">
            <p style="text-align: justify; padding:50px ; height: 600px; overflow-y: scroll;">
                <?php echo $content ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <?php if ($count > 0) : ?>
                <?php if ($discount > 0) : ?>
                    <p class="mt-2" style="color: rgb(145, 21, 21);text-align: center;font-size:18px;font-weight:bold;"><del><?php echo number_format($price); ?> تومان</del></p>
                    <p style="color:#16aa16;text-align:center;font-size:24px;font-weight:bold;"><?php echo number_format($discount); ?> تومان</p>
                <?php else : ?>
                    <p class="mt-4" style=" text-align: center;font-size:24px;font-weight:bold;background:#ff45000a;"><?php echo number_format($price); ?> تومان</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="col-12 col-md-6">
            <?php if ($count > 0) : ?>
                <a onclick="single_show_added_to_basket_alert()" id="add_to_basket" class="btn btn-warning w-100 mt-4"><span style="margin-left: 15px;" uk-icon="icon: cart"></span>اضافه کردن به سبد خرید</a>
                <p id="added_to_basket_alert" class="alert-info alert-dismissible me-rtl" style="display: none;">
                    به سبد خرید اضافه شد
                </p>
            <?php else : ?>
                <p class="bg-secondary w-100 mt-4 p-1 text-center text-white font-weight-bold">ناموجود</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mt-5" style="direction: rtl;">
    <div class="row">
        <div class="col-12 col-md-3 col-lg-2">
            <h3 style="border-bottom: 5px solid orange;text-align: center;font-family: 'mitra';"><span style="margin-left: 10px;" uk-icon="table"></span>مشخصات</h3>
        </div>
        <div class="d-none d-md-block col-md-9 col-lg-10">
            <div style="border-bottom: 5px solid #00000052;margin-top: 41px;"></div>
        </div>
    </div>
    <div class="row shadow-lg shadow mt-4">
        <table class="uk-table uk-table-hover uk-table-striped">
            <tbody style="text-align: center;">
                <tr>
                    <td>وزن</td>
                    <td>
                        <?php echo $details['weight']; ?> گرم
                    </td>
                </tr>
                <tr>
                    <td>تعداد سیم کارت</td>
                    <td>
                        <?php echo $details['sim_count']; ?> سیم کارت
                    </td>
                </tr>
                <tr>
                    <td>تراشه پردازنده</td>
                    <td>
                        <?php echo $details['chipset']; ?>
                    </td>
                </tr>
                <tr>
                    <td>پردازنده مرکزی</td>
                    <td>
                        <?php echo $details['cpu']; ?>
                    </td>
                </tr>
                <tr>
                    <td>پردازنده گرافیکی</td>
                    <td>
                        <?php echo $details['gpu']; ?>
                    </td>
                </tr>
                <tr>
                    <td>حافظه داخلی</td>
                    <td>
                        <?php echo $details['memory']; ?> گیگابایت
                    </td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td>
                        <?php echo $details['RAM']; ?> گیگابایت
                    </td>
                </tr>
                <tr>
                    <td>پشتیبانی از کارت حافظه جانبی</td>
                    <td>
                        <?php echo $details['exstorage']; ?>
                    </td>
                </tr>
                <tr>
                    <td>فناوری صفحه نمایش</td>
                    <td>
                        <?php echo $details['display']; ?>
                    </td>
                </tr>
                <tr>
                    <td>سایز صفحه نمایش</td>
                    <td>
                        <?php echo $details['displaySize']; ?> اینچ
                    </td>
                </tr>
                <tr>
                    <td>رزولوشن</td>
                    <td>
                        <?php echo $details['resolution']; ?>
                    </td>
                </tr>
                <tr>
                    <td>شبکه های ارتباطی</td>
                    <td>
                        <?php echo $details['networks']; ?>
                    </td>
                </tr>
                <tr>
                    <td>WI-FI</td>
                    <td>
                        <?php if ($details['wifi'] === 1) {
                            echo 'دارد';
                        } else {
                            echo 'ندارد';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>بلوتوث</td>
                    <td>
                        <?php if ($details['bluetooth'] === 1) {
                            echo 'دارد';
                        } else {
                            echo 'ندارد';
                        } ?>

                    </td>
                </tr>
                <tr id="bluetooth_ver_tr">
                    <td>نسخه بلوتوث</td>
                    <td>
                        <?php if ($details['bluetooth'] === 1) {
                            echo $details['bluetooth_ver'];
                        } else {
                            echo '-';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>رادیو</td>
                    <td>
                        <?php if ($details['radio'] === 1) {
                            echo 'دارد';
                        } else {
                            echo 'ندارد';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>فناوری مکان یابی</td>
                    <td>
                        <?php echo $details['navigate']; ?>
                    </td>
                </tr>
                <tr>
                    <td>درگاه ارتباطی</td>
                    <td>
                        <?php echo $details['port']; ?>
                    </td>
                </tr>
                <tr>
                    <td>دوربین</td>
                    <td>
                        <?php if ($details['camera'] === 1) {
                            echo 'دارد';
                        } else {
                            echo 'ندارد';
                        } ?>
                    </td>
                </tr>
                <tr id="camera_resolution_tr">
                    <td>رزولوشن عکس</td>
                    <td>
                        <?php if ($details['camera'] === 1) {
                            echo $details['camera_resolution'] . ' ' . 'مگاپیکسل';
                        } else {
                            echo '-';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>دوربین سلفی</td>
                    <td>
                        <?php if ($details['selfie'] === 1) {
                            echo 'دارد';
                        } else {
                            echo 'ندارد';
                        } ?>
                    </td>
                </tr>
                <tr id="selfie_resolution_tr">
                    <td>رزولوشن عکس سلفی</td>
                    <td>
                        <?php if ($details['selfie'] === 1) {
                            echo $details['selfie_resolution'] . ' ' . 'مگاپیکسل';
                        } else {
                            echo '-';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td>سیستم عامل</td>
                    <td>
                        <?php echo $details['os']; ?>
                    </td>
                </tr>
                <tr>
                    <td>حس گر ها</td>
                    <td>
                        <?php echo $details['sensor']; ?>
                    </td>
                </tr>
                <tr>
                    <td>مشخصات باتری</td>
                    <td>
                        <?php echo $details['battery']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-4" dir="rtl">
    <?php $comments = comments::get_this_product_comments($product_id); ?>
    <?php $comments_count = count($comments); ?>
    <div class="row">
        <div class="col-12 col-md-3 col-lg-2">
            <h3 style="border-bottom: 5px solid orange;text-align: center;font-family: 'mitra';"><span style="margin-left: 10px;" uk-icon="comments"></span>نظرات<sup class="badge badge-pill badge-danger" style="font-size: 16px;"><?php echo $comments_count; ?></sup></h3>
        </div>
        <div class="d-none d-md-block col-md-9 col-lg-10">
            <div style="border-bottom: 5px solid #00000052;margin-top: 41px;"></div>
        </div>
    </div>

    <div class="row">

        <?php if ($comments_count > 0) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="card w-100 mt-2 shadow shadow-lg">
                    <div class="card-header" style="text-align: right;">
                        <?php echo $comment['writer'] ?>
                    </div>
                    <div class="card-body" style="text-align: right;">
                        <?php echo $comment['content'] ?>
                    </div>
                    <div class="card-footer" style="text-align: right;">
                        <small><?php echo 'ثبت شده در' . $comment['persian_date'] . 'ساعت' . $comment['clock'] ?></small>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h3 style="font-family: mitra;padding: 20px;">هیچ نظری برای این محصول ثبت نشده است</h3>
        <?php endif; ?>
    </div>
    <div class="row mt-4">
        <div class="col-12 col-md-3 col-lg-2">
            <h3 style="border-bottom: 5px solid orange;text-align: center;font-family: 'mitra';"><span style="margin-left: 10px;" uk-icon="comments"></span>ثبت نظر</h3>
        </div>
        <div class="d-none d-md-block col-md-9 col-lg-10">
            <div style="border-bottom: 5px solid #00000052;margin-top: 41px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if (is_user_logged_in()) : ?>
                <?php comments_template(null, true); ?>
            <?php else : ?>
                <p style="text-align: right;">برای ثبت نظر ابتدا باید وارد سیستم شوید</p>
                <a class="btn btn-warning" href="<?php echo get_site_url() . '/login/'; ?>">ورود به سیستم</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>