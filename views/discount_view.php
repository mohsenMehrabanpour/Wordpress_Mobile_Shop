<div id="discount_app">
    <div v-if="discount_list != null">
        <div class="uk-position-relative uk-visible-toggle uk-light discoumnt-slider-bg py-3 mb-5 discount-slider-border" uk-scrollspy="cls:uk-animation-slide-bottom" tabindex="-1" uk-slider>

            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
                <li style="height: 100%;">
                    <div style="margin-top: 50%;">
                        <h1 class="mitra-font text-center fire discount-title shake" uk-scrollspy="cls:uk-animation-slide-bottom" style="color:yellow; font-weight:bolder;">تخفیف ها</h1>
                    </div>
                </li>

                <li class="discount-slider-element" v-for="product in discount_list">
                    <div class="uk-panel">
                        <a :href="product.link" style="text-decoration: none;">
                            <div class="card" uk-scrollspy="cls:uk-animation-slide-bottom">
                                <div class="card-img p-2">
                                    <img :src="product.pic_url">
                                </div>
                                <div class="card-title text-dark mitra-font text-center font-weight-bold p-1">
                                    {{product.title}}
                                </div>
                                <div class="card-body m-0 p-0 text-dark mitra-font text-align-right">
                                    <p class="product-cart-excerpt text-center d-md-block d-none">{{product.excerpt}}</p>
                                    <p class="m-0 p-0 text-center"><small>تومان</small><del class="product-delete">{{product.price}}</del></p>
                                    <p class="text-center font-weight-bold"><span class="product-discount p-2 px-3">{{product.discount}}</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

        </div>
    </div>
</div>