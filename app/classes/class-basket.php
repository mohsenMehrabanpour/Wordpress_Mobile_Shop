<?php

class basket
{
    public static function add_to_basket($product_id, $product_price, $product_title)
    {

        if (!$_SESSION['basket']['items'][$product_id]) {
            $_SESSION['basket']['items'][$product_id] = [
                'product_title' => $product_title,
                'product_price' => $product_price,
                'count' => 1
            ];
        } else {
            $_SESSION['basket']['items'][$product_id]['count']++;
        }
    }

    public static function show_basket()
    {
        return isset($_SESSION['basket']['items']) ? $_SESSION['basket']['items'] : [];
    }

    public static function delete_from_basket($product_id)
    {

        if (isset($_SESSION['basket']['items'][$product_id])) {

            if ($_SESSION['basket']['items'][$product_id]['count'] > 1) {

                $_SESSION['basket']['items'][$product_id]['count']--;
            } else {
                unset($_SESSION['basket']['items'][$product_id]);
            }
        }
    }

    //braye hazf az sabade feeli kharid pas az takmile kharid
    public static function delete_root_from_basket($product_id)
    {
        if (isset($_SESSION['basket']['items'][$product_id])) {

            unset($_SESSION['basket']['items'][$product_id]);
        }
    }


    public static function basket_item_inc($product_id)
    {
        
        if (isset($_SESSION['basket']['items'][$product_id])) {

            $product_count = (int) get_post_meta($product_id,'product_count',true);

            if($_SESSION['basket']['items'][$product_id]['count'] < $product_count && $_SESSION['basket']['items'][$product_id]['count'] <= 10){
                $_SESSION['basket']['items'][$product_id]['count']++;
            }
        }
    }
}
