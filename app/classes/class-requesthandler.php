<?php
class requestHandler
{

    public static function get_request()
    {

        //delete from basket handler
        if (isset($_GET['basket_action']) && $_GET['basket_action'] == 'delete') {
            basket::delete_from_basket($_GET['basket_item_id']);
            header("Location: " . get_site_url() . '/basket');
            die();
        }

        //basket item increment handler
        if (isset($_GET['basket_action']) && $_GET['basket_action'] == 'add') {
            basket::basket_item_inc($_GET['basket_item_id']);
            header("Location: " . get_site_url() . '/basket');
            die();
        }

        //compelete purchase
        if (isset($_GET['purchase_action']) && $_GET['purchase_action'] == 'complete_purchase') {

            if (is_user_logged_in()) {
                $user_data = userProfile::get_user_data();
                $basket_data = basket::show_basket();
                $purchase_DB = new purchaseRepository;

                if (count($basket_data) > 0) {
                    $factor_id = rand(1,99).rand(0,99).rand(0,99).rand(0,99);
                    foreach ($basket_data as $product_id => $product) {
                        $purchase_info = [
                            'user_id' => $user_data['id'],
                            'product_id' => $product_id,
                            'buyer_name' => $user_data['full_name'],
                            'bayer_phone' => $user_data['phone_number'],
                            'buyer_address' => $user_data['address'],
                            'product_name' => $product['product_title'],
                            'product_count' => $product['count'],
                            'single_price' => intval($product['product_price']),
                            'status' => 0,
                            'date' => wp_date("Y-m-d H:i:s"),
                            'factor_id' => intval($factor_id)
                        ];


                        //get product count
                        $product_count = (int) get_post_meta($product_id, 'product_count', true);
                        $new_product_count = $product_count - $product['count'];

                        //decrement product count
                        update_post_meta($product_id, 'product_count', $new_product_count);

                        //add to data base
                        $purchase_DB->insert($purchase_info);

                        //bade inke sabt shod az sabad hazf
                        basket::delete_root_from_basket($product_id);
                    }
                }

                header("Location: " . get_site_url() . '/profile');
                die();
            }
        }

        //change purchase status state
        if ($_GET['action'] == 'change_status_state' && is_admin() && is_user_logged_in() && current_user_can('manage_options')) {
            $DB = new purchaseRepository;

            if ($_GET['state'] == 'process') {
                $DB->update(['status' => 1],['ID' => $_GET['purchase_id']]);
            }
            elseif ($_GET['state'] == 'sent') {
                $DB->update(['status' => 2],['ID' => $_GET['purchase_id']]);
            }
            elseif ($_GET['state'] == 'recived') {
                $DB->update(['status' => 3],['ID' => $_GET['purchase_id']]);
            }
            elseif ($_GET['state'] == 'cancell') {
                $DB->update(['status' => 4],['ID' => $_GET['purchase_id']]);
            }
        }
    }

    public static function post_request()
    {
        //edit profile information
        if (isset($_POST['profile_edit_full_name'])) {
            userProfile::update_user_data($_POST['profile_edit_full_name'], $_POST['profile_edit_phone_number'], $_POST['profile_edit_address']);
        }
    }
}
