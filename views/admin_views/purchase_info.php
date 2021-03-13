<link rel="stylesheet" href="<?php Assets::css('uikit-rtl.min.css'); ?>">
<link rel="stylesheet" href="<?php Assets::css('custom.css'); ?>">
<script>
    function open_search_panel(){
        document.querySelector('#search_panel').style.display = "block";
    }
</script>

<?php $DB = new purchaseRepository; ?>
<?php $purchase_info = $DB->get_all(); ?>
<?php $order_seprator = ''; ?>
<?php $not_closed = false; ?>
<?php $not_search = true ?>
<?php $purchase_list_len = count($purchase_info); ?>
<?php $purchase_list_len_counter = 0; ?>

<?php //search part start =========== ?>
<button onclick="open_search_panel()" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom uk-margin-top uk-margin-bottom mitra-font">جستوجو بین خرید ها</button>
<div id="search_panel" class="admin-purchase-search-box mitra-font">
    <form method="post">
        <div>
            بر اساس نام خریدار : <input type="text" name="search_buyer_name" class="uk-form-small uk-input">
        </div>
        <div class="uk-margin-top">
            بر اساس شناسه خریدار : <input type="text" name="search_user_id" class="uk-form-small uk-input ">
        </div>
        <div class="uk-margin-top">
            بر اساس شماره تلفن خریدار : <input type="text" name="search_buyer_phone" class="uk-form-small uk-input ">
        </div>
        <div class="uk-margin-top">
            بر اساس شماره فاکتور : <input type="text" name="search_factor_id" class="uk-form-small uk-input ">
        </div>
        <div class="uk-margin-top">
            بر اساس شناسه خرید : <input type="text" name="search_purchase_ID" class="uk-form-small uk-input ">
        </div>
        <div class="uk-margin-top">
            بر اساس شناسه محصول : <input type="text" name="search_product_id" class="uk-form-small uk-input ">
        </div>
        <div class="uk-margin-top">
            بر اساس نام محصول : <input type="text" name="search_product_name" class="uk-form-small uk-input ">
        </div>
        <div class="uk-margin-top">
            بر اساس وضعیت :
            در انتظار تایید<input type="checkbox" name="search_status[]" value="0" class="uk-margin-left">
            در حال پردازش<input type="checkbox" name="search_status[]" value="1" class="uk-margin-left">
            ارسال شده<input type="checkbox" name="search_status[]" value="2" class="uk-margin-left">
            تحویل شده<input type="checkbox" name="search_status[]" value="3" class="uk-margin-left">
            لغو شده<input type="checkbox" name="search_status[]" value="4" class="uk-margin-left">
        </div>
        <input type="submit" value="جستوجو" class="uk-button uk-button-danger uk-width-1-1 uk-margin-top" name="admin_search_in_purchases">
    </form>
</div>
<?php 
    if ($_POST['admin_search_in_purchases']) {
        $where_condition = array();
        
        if ($_POST['search_buyer_name']) {
            $where_condition['buyer_name'] = $_POST['search_buyer_name'];
        }

        if ($_POST['search_user_id']) {
            $where_condition['user_id'] = intval($_POST['search_user_id']);
        }

        if ($_POST['search_buyer_phone']) {
            $where_condition['buyer_phone'] = $_POST['search_buyer_phone'];
        }

        if ($_POST['search_buyer_phone']) {
            $where_condition['buyer_phone'] = $_POST['search_buyer_phone'];
        }

        if ($_POST['search_factor_id']) {
            $where_condition['factor_id'] = intval($_POST['search_factor_id']);
        }

        if ($_POST['search_purchase_ID']) {
            $where_condition['ID'] = intval($_POST['search_purchase_ID']);
        }

        if ($_POST['search_product_id']) {
            $where_condition['product_id'] = intval($_POST['search_product_id']);
        }

        if ($_POST['search_product_name']) {
            $where_condition['product_name'] = $_POST['search_product_name'];
        }

        if ($_POST['search_status']) {
            $where_condition['status'] = $_POST['search_status'];
        }

        if (count($where_condition)>0) {
            $purchase_info = $DB->search($where_condition);
            $not_search = false;
        }
    }
?>
<?php //search part end   =========== ?>

<?php foreach ($purchase_info as $purchase) : ?>
    <?php $date = myCalender::seprate_clock_and_date($purchase->date); ?>
    <?php if ($order_seprator != $purchase->factor_id) : ?>
        <?php if ($not_closed) : ?>
            </tbody>
            </table>
            <?php if($not_search):?>
            <p class="font-weight-bold">مبلغ کل : <?php echo number_format($total_price); ?></p>
            <?php $total_price = 0 ?>
            <?php endif; ?>
            </div>
        <?php endif ?>
        <div class="uk-card uk-card-default uk-card-body uk-margin-medium-bottom uk-overflow-auto">
            <div class="mitra-font font-weight-bold">
                <small class="admin-purchase-details">نام خریدار : <?php echo $purchase->buyer_name; ?></small>
                <small class="admin-purchase-details">شناسه خریدار : <?php echo $purchase->user_id; ?></small>
                <small class="admin-purchase-details">ثبت شده در <?php echo myCalender::to_persian_date($date['date']); ?> ساعت <?php echo $date['clock']; ?></small><br>
                <small class="admin-purchase-details">شماره تماس : <?php echo $purchase->buyer_phone; ?></small>
                <small class="admin-purchase-details">آدرس : <?php echo $purchase->buyer_address; ?></small>
                <small class="admin-purchase-details">فاکتور : <?php echo $purchase->factor_id ?></small>
            </div>


            <table class="uk-table uk-table-striped uk-table-hover uk-table-divider mitra-font">
                <thead>
                    <tr>
                        <th>شناسه خرید</th>
                        <th>محصول</th>
                        <th>شناسه محصول</th>
                        <th>تعداد</th>
                        <th>قیمت واحد</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $order_seprator = $purchase->factor_id; ?>
                    <?php $not_closed = true; ?>
                <?php endif ?>
                <tr>
                    <td><?php echo $purchase->ID; ?></td>
                    <td><?php echo $purchase->product_name; ?></td>
                    <td><?php echo $purchase->product_id; ?></td>
                    <td><?php echo $purchase->product_count; ?></td>
                    <td><?php echo number_format($purchase->single_price); ?></td>
                    <td>
                        <?php if (intval($purchase->status) === 0) : ?>
                            <p class="uk-text-bolder">در انتظار تایید</p>
                        <?php endif; ?>

                        <?php if (intval($purchase->status) === 1) : ?>
                            <p class="uk-text-bolder purchase-process-link-color">در حال پردازش</p>
                        <?php endif; ?>

                        <?php if (intval($purchase->status) === 2) : ?>
                            <p class="uk-text-bolder purchase-sent-link-color">ارسال شد</p>
                        <?php endif; ?>

                        <?php if (intval($purchase->status) === 3) : ?>
                            <p class="uk-text-bolder purchase-recived-link-color">تحویل شد</p>
                        <?php endif; ?>

                        <?php if (intval($purchase->status) === 4) : ?>
                            <p class="uk-text-bolder purchase-cancell-link-color">لغوشد</p>
                        <?php endif; ?>
                    </td>
                    <td>
                        <p class="uk-text-bolder uk-display-inline uk-margin-small-left">
                            <a class="purchase-process-link-color inline" href="<?php echo add_query_arg([
                                                                                    'action' => 'change_status_state',
                                                                                    'purchase_id' => $purchase->ID,
                                                                                    'state' => 'process'
                                                                                ]) ?>">پردازش</a>
                        </p>
                        <p class="uk-text-bolder uk-display-inline uk-margin-small-left">
                            <a class="purchase-sent-link-color" href="<?php echo add_query_arg([
                                                                            'action' => 'change_status_state',
                                                                            'purchase_id' => $purchase->ID,
                                                                            'state' => 'sent'
                                                                        ]) ?>">ارسال شده</a>
                        </p>
                        <p class="uk-text-bolder uk-display-inline uk-margin-small-left">
                            <a class="purchase-recived-link-color" href="<?php echo add_query_arg([
                                                                                'action' => 'change_status_state',
                                                                                'purchase_id' => $purchase->ID,
                                                                                'state' => 'recived'
                                                                            ]) ?>">تحویل داده شد</a>
                        </p>
                        <p class="uk-text-bolder uk-display-inline">
                            <a class='purchase-cancell-link-color' href="<?php echo add_query_arg([
                                                                                'action' => 'change_status_state',
                                                                                'purchase_id' => $purchase->ID,
                                                                                'state' => 'cancell'
                                                                            ]) ?>">لغو سفارش</a>
                        </p>
                    </td>
                </tr>
                <?php if ($purchase->status != 4) : ?>
                    <?php $total_price  += $purchase->product_count * $purchase->single_price; ?>
                <?php endif; ?>
                <?php $purchase_list_len_counter++ ?>
                <?php if ($purchase_list_len == $purchase_list_len_counter) : ?>
                </tbody>
            </table>
            <p class="font-weight-bold">مبلغ کل : <?php echo number_format($total_price); ?></p>
            <?php $total_price = 0 ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>