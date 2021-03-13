<?php /* Template Name: profile */ ?>
<?php if (!is_user_logged_in()) : ?>
    <h1 class="me-rtl">شما به این صفحه دسترسی ندارید</h1>
    <?php exit(); ?>
<?php endif; ?>

<?php get_header(); ?>
<?php view::render('header_view'); ?>

<?php $user_data = userProfile::get_user_data(); ?>
<?php $err_msg = userProfile::$profile_err_msg; ?>
<?php $success_msg = userProfile::$profile_success_msg; ?>

<?php if (count($err_msg) > 0) : ?>
    <?php foreach ($err_msg as $err) : ?>
        <div class="px-5">
            <div class="alert alert-warning alert-dismissible fade show me-rtl" role="alert">
                <strong><?php echo $err ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php if (count($success_msg) > 0) : ?>
    <?php foreach ($success_msg as $msg) : ?>
        <div class="px-5">
            <div class="alert alert-success alert-dismissible fade show me-rtl" role="alert">
                <strong><?php echo $msg ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<button onclick="profile_show_data_info()" id="profile_btn_info">مشخصات من</button>
<button onclick="profile_show_purchase_info()" id="profile_btn_purchase">لیست خرید ها</button>

<!--====start info section====-->
<div id="profile_info_section">
<div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="p-5 has-text-align-center">
                    کاربر گرامی لطفا در وارد کردن اطلاعات دقت کافی را داشته باشید چرا که این اطلاعات به عنوان اطلاعات شما در فاکتور ثبت خواهد شد و مرسوله ی شما به این آدرس ارسال خواهد شد
                </p>
            </div>
            <div class="col-12 col-md-6 me-rtl">
                <div class="form-group me-rtl">
                    <form method="post">
                        <label for="profile_edit_full_name">نام و نام خانوادگی :</label>
                        <input type="text" class="form-control" value="<?php isset($_POST['profile_edit_full_name']) ? print $_POST['profile_edit_full_name'] : print $user_data['full_name']; ?>" name="profile_edit_full_name">
                        <label for="profile_edit_phone_number" class="mt-3">شماره تماس :</label>
                        <input type="text" class="form-control" value="<?php isset($_POST['profile_edit_phone_number']) ? print $_POST['profile_edit_phone_number'] : print $user_data['phone_number']; ?>" name="profile_edit_phone_number">
                        <label for="profile_edit_address" class="mt-3">آدرس :</label>
                        <input type="text" class="form-control" value="<?php isset($_POST['profile_edit_phone_number']) ? print $_POST['profile_edit_address'] : print $user_data['address']; ?>" name="profile_edit_address">
                        <button type="submit" class="btn btn-primary mt-3" value="profile_edit">تغییر و بروزرسانی اطلاعات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====end info section====-->

<!--====start purchase section====-->
<div id="profile_purchase_section"">
<?php $DB = new purchaseRepository; ?>
        <?php $my_orders = $DB->get_user_orders($user_data['id']); ?>
        <?php if(count($my_orders)==0): ?>
            <p class="alert alert-secondary me-rtl shadow-lg shadow">
                هنوز سفارشی ثبت نشده است
            </p>
        <?php endif;?>
        <?php $order_seprator = ''; ?>
        <?php $not_closed = false; ?>
        <?php $purchase_list_len = count($my_orders);?>
        <?php $purchase_list_len_counter=0;?>
        <div class="container me-rtl">
            <div class="row">
                <div class="col-12">
                <?php foreach ($my_orders as $order) : ?>
                    <?php $date=myCalender::seprate_clock_and_date($order->date); ?>
                        <?php if ($order_seprator != $order->factor_id) : ?>
                            <?php if ($not_closed) : ?>
                                </tbody>
                                </table>
                                <p class="font-weight-bold px-4">مبلغ کل : <?php echo number_format($total_price); ?></p>
                                <?php $total_price = 0 ?>
                                </div>
                            <?php endif ?>
                            <div class="card mt-3 shadow shadow-lg">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="px-3 font-weight-bold pt-3 mitra-font">نام خریدار : <?php echo $order->buyer_name ?></div>
                                            <small class="px-3">ثبت شده در <?php echo myCalender::to_persian_date($date['date']);?> ساعت <?php echo $date['clock']; ?></small>
                                            <div class="px-3 mitra-font">شماره فاکتور : <?php echo $order->factor_id ?></div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <small class="px-3 d-block pt-3">ارسال به آدرس : <?php echo $order->buyer_address ?></small>
                                            <small class="px-3">شماره ثبت شده : <?php echo $order->buyer_phone ?></small>
                                        </div>
                                    </div>
                                </div>
                                <table class="uk-table uk-table-striped uk-table-hover uk-table-divider mitra-font">
                                <thead>
                                    <tr>
                                        <th>شناسه خرید</th>
                                        <th>محصول</th>
                                        <th>تعداد</th>
                                        <th>قیمت واحد</th>
                                        <th>قیمت کل</th>
                                        <th>وضعیت</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php $order_seprator = $order->factor_id; ?>
                            <?php $not_closed = true; ?>
                        <?php endif ?>

                        <tr>
                            <td><?php echo $order->ID; ?></td>
                            <td><?php echo $order->product_name; ?></td>
                            <td><?php echo $order->product_count; ?></td>
                            <td><?php echo number_format($order->single_price); ?></td>
                            <td><?php echo number_format($order->single_price*$order->product_count); ?></td>
                            <td>
                            <?php if (intval($order->status) === 0) :?>
                                <p class="uk-text-bolder">در انتظار تایید</p>
                            <?php endif;?>

                            <?php if (intval($order->status) === 1) :?>
                                <p class="uk-text-bolder purchase-process-link-color">در حال پردازش</p>
                            <?php endif;?>

                            <?php if (intval($order->status) === 2) :?>
                                <p class="uk-text-bolder purchase-sent-link-color">ارسال شد</p>
                            <?php endif;?>

                            <?php if (intval($order->status) === 3) :?>
                                <p class="uk-text-bolder purchase-recived-link-color">تحویل شد</p>
                            <?php endif;?>

                            <?php if (intval($order->status) === 4) :?>
                                <p class="uk-text-bolder purchase-cancell-link-color">لغوشد</p>
                            <?php endif;?>
                                    </td>
                        </tr>
                        <?php if($order->status != 4):?>
                            <?php $total_price  += $order->product_count*$order->single_price;?>
                        <?php endif;?>
                        <?php $purchase_list_len_counter++ ?>
                        <?php if($purchase_list_len==$purchase_list_len_counter):?>
                            </tbody>
                        </table>
                        <p class="font-weight-bold px-4">مبلغ کل : <?php echo number_format($total_price); ?></p>
                        <?php $total_price = 0 ?>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
     
                </div>
            </div>
        </div>
</div>
<!--====end purchase section====-->
<?php get_footer(); ?>