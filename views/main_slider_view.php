<br>
<?php $slider_pics = get_option('main_slider'); ?>
<div class="container-fluid uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-scrollspy="cls:uk-animation-slide-bottom" uk-slideshow="ratio:8:3;animation: scale;autoplay: true;autoplay-interval: 2000;pause-on-hover:false;">
    <ul class="uk-slideshow-items">
        <?php if (isset($slider_pics) && count($slider_pics) > 0) : ?>
            <?php foreach ($slider_pics as $url) : ?>
                <li>
                    <img src="<?php echo $url ?>" alt="mobile" uk-cover>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
            <?php if (current_user_can('manage_options')) : ?>
                <li>
                    <div class="alert alert-danger" style="text-align: right; height: 200px;" role="alert">
                        لطفا از قسمت تنظیمات اسلایدر سایت عکسی را برای اسلاید انتخاب کنید
                    </div>
                </li>
            <?php else : ?>
                <li></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>