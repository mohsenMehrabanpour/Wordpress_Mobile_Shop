<?php /* Template Name: basket */ ?>

<?php get_header(); ?>
<?php view::render('header_view'); ?>
<?php $my_basket = basket::show_basket(); ?>

<div class="container-fluid mt-5 me-rtl">
    <div class="row mt-5">
        <div class="col-12 col-md-9">
            <table class="table table-striped bg-white table-responsive-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ردیف</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">تعداد</th>
                        <th scope="col">قیمت هر واحد</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($my_basket) : $row = 0; ?>
                        <?php foreach ($my_basket as $pid => $item) : $row++ ?>
                            <tr>
                                <th scope="row"><?php echo $row ?></th>
                                <td><?php echo $item['product_title'] ?></td>
                                <td><?php echo $item['count'] ?></td>
                                <td><?php echo number_format($item['product_price']) ?></td>
                                <td>
                                    <a href="<?php echo add_query_arg(array(
                                                    'basket_item_id' => $pid,
                                                    'basket_action' => 'delete'
                                                )) ?>" class="mx-2"><span uk-icon="trash"></span></a>
                                    <a href="<?php echo add_query_arg(array(
                                                    'basket_item_id' => $pid,
                                                    'basket_action' => 'add'
                                                )) ?>" class="mx-2"><span uk-icon="plus"></span></a>
                                </td>
                            </tr>
                            <?php $total_price += $item['product_price'] * $item['count']; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-md-3">
            <div class="payment_box">
                <p class="payment_box_header">ازین که مارا برای خرید انتخاب کرده اید سپاس گذاریم</p>
                <p class="payment_box_header">نحوه ی پرداخت : <br>
                    <input type="radio" value="offline" name="shipping_method" checked> حضوری
                </p>
                <p class="payment_box_price_header">مبلغ قابل پرداخت :</p>
                <h3 class="payment_box_price"><?php echo number_format($total_price); ?><span>تومان</span></h3>
                <?php if (is_user_logged_in() && $total_price > 0) : ?>
                    <a href="<?php echo add_query_arg(['purchase_action'=>'complete_purchase'])?>" class="btn btn-warning w-100">تکمیل فرایند خرید</a>
                <?php endif; ?>
                <?php if (!is_user_logged_in() && $total_price > 0) : ?>
                    <a href="<?php echo get_site_url().'/login'; ?>" class="btn btn-warning w-100">ورود به سیستم</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>