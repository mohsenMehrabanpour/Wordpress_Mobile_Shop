<?php $categories = get_categories(); ?>
<?php $tags = get_tags(); ?>
<div id="app">
    <!-- ======================= -->
    <div class="me-rtl" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
    <button class="btn btn-primary me-rtl filter-bottom" type="button" uk-toggle="target: #offcanvas-overlay" uk-scrollspy="cls:uk-animation-slide-bottom">جستوجوی پیشرفته</button>
    </div>

    <div id="offcanvas-overlay" uk-offcanvas="overlay: true">
        <div class="uk-offcanvas-bar main-page-filter-panel">
            <button class="uk-offcanvas-close text-dark" type="button" uk-close></button>
            <p class="me-rtl text-dark mt-3">جستوجو بین تمام نتایج :</p>
            <div class="filter_search_box mb-1">
                <input type="text" id="filter_search_box" class="form-control w-100 me-rtl" placeholder="نام مورد نظر را وارد کنید">
            </div>
            <p class="me-rtl text-dark mt-3">انتخاب برند محصول :</p>
            <div class="main-page-terms-box" id="term_box">
                <?php foreach($categories as $category):?>
                    <p class="text-dark m-0 p-0"><input type="checkbox" class="terms" id="terms" name="terms[]" value="<?php echo $category->term_id ?>"> <?php echo $category->name ?></p>
                <?php endforeach;?>
            </div>
            <div class="cost-filter mt-3">
                <p class="text-dark me-rtl m-0 p-0">قیمت از :</p>
                <input type="text" id="min_poroduct_price_filter" name="min_poroduct_price_filter" class="form-control w-100 me-rtl" placeholder="به تومان وارد کنید">
                <p class="text-dark me-rtl m-0 p-0 mt-3">تا :</p>
                <input type="text" id="max_poroduct_price_filter" name="max_poroduct_price_filter" class="form-control w-100 me-rtl" placeholder="به تومان وارد کنید">
            </div>

            <p class="me-rtl text-dark m-0 p-0 mt-3">موارد بیشتر :</p>
            <div class="main-page-terms-box m-0 p-0" id="term_box">
                <?php foreach($tags as $tag):?>
                    <p class="text-dark m-0 p-0 me-rtl"><input type="checkbox" class="tags" id="tags" name="tags[]" value="<?php echo $tag->term_id ?>"> <?php echo $tag->name ?></p>
                <?php endforeach;?>
            </div>

            <div class="alert alert-success me-rtl mt-3" id="filter_added_alert" style="display: none;">اعمال شد</div>
            <button id="filter_product_list" class="btn btn-primary w-100 no-border-radius mt-3">اعمال فیلتر</button>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-end">
            <div v-if="products == null">
                <p class="bg-danger p-5">متاسفانه محصولی با مشخصات داده شده یافت نشد</p>
            </div>
            <div class="col-12 col-md-3" v-for="product in products">
                <a :href="product.link" style="text-decoration: none;">
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body mt-1" uk-scrollspy="cls:uk-animation-slide-bottom">
                        <div class="uk-card-media-top">
                            <img :src="product.pic_url" alt="product.title">
                        </div>
                        <h4 class="product-cart-title">{{product.title}}</h4>
                        <p class="product-cart-excerpt">{{product.excerpt}}</p>
                        <center>

                            <span v-if="product.discount == 0 && product.count>0">
                                <h4 class="product-price">تومان</h4>
                                <h4 class="product-price">
                                    {{product.price}}
                                </h4>
                            </span>
                            <span v-if="product.discount > 0 && product.count>0">
                                <h4 class="product-price">تومان</h4>
                                <h4 class="product-price">
                                    <del class="product-delete">{{product.price}}</del><span class="product-discount">{{product.discount}}</span>
                                </h4>
                            </span>
                            <span v-if="product.count<1">
                                <h4 class="product-price mt-40px">
                                    <span>ناموجود</span>
                                </h4>
                            </span>
                        </center>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>