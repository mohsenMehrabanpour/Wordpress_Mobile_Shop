<?php

class ajaxHandler
{

    public static function login_ajax_handler()
    {
        check_ajax_referer('login_ajax', 'login_nonce', true);

        $user_name = sanitize_text_field($_POST['username']);
        $password = sanitize_text_field($_POST['password']);
        $rememberme = isset($_POST['rememberme']);

        if (empty($user_name)  || empty($password)) {
            $result = array(
                'error' => true,
                'message' => 'لطفا فرم را به صورت صحیح تکمیل کنید'
            );
            wp_send_json($result);
        }

        $user = wp_authenticate_username_password(null, $user_name, $password);

        if (is_wp_error($user)) {
            $result = array(
                'error' => true,
                'message' => 'نام کاربری یا کلمه عبور اشتباه است'
            );
            wp_send_json($result);
        }

        $credentials = array(
            'user_login'    => $user_name,
            'user_password' => $password,
            'rememember'    => $rememberme
        );

        $login_user = wp_signon($credentials, false);

        if (is_wp_error($login_user)) {

            $result = array(
                'error' => true,
                'message' => 'متاسفانه خطایی رخ داده است'
            );
            wp_send_json($result);
        }

        $result = array(
            'success' => true,
            'message' => 'شما وارد سایت شدید'
        );
        wp_send_json($result);
    }


    public static function load_content_handler()
    {
        $products = new WP_Query(array(
            'post_type' => 'product'
        ));
        if ($products->have_posts()) {
            $final_result = array();
            while ($products->have_posts()) {
                $each_result = array();
                $products->the_post();
                $each_result['link'] = get_the_permalink();
                $each_result['title'] = get_the_title();
                $each_result['pic_url'] = get_the_post_thumbnail_url();
                $each_result['excerpt'] = get_the_excerpt();
                $each_result['price'] = intval(get_post_meta(get_the_ID(), 'product_price', true));
                $each_result['count'] = intval(get_post_meta(get_the_ID(), 'product_count', true));
                $each_result['discount'] = intval(get_post_meta(get_the_ID(), 'product_discount_price', true));
                $final_result[] = $each_result;
            }
        }
        wp_reset_postdata();
        wp_send_json($final_result);
    }

    public static function filter_content_handler()
    {
        $filter = array();
        $filter['post_type'] = 'product';

        if (strlen(sanitize_text_field($_POST['search_box_filter'])) > 0) {
            $filter['s'] = sanitize_text_field($_POST['search_box_filter']);
        }


        if (strlen(sanitize_text_field($_POST['category_filter'])) > 0) {
            $filter['cat'] = sanitize_text_field($_POST['category_filter']);
        };

        if (strlen(sanitize_text_field($_POST['tags_filter'])) > 0) {

            $tags = explode(",", sanitize_text_field($_POST['tags_filter']));

            $tags = array_map(function ($value) {
                return intval($value);
            }, $tags);
            $filter['tag__in'] = $tags;
        };

        if (intval(sanitize_text_field($_POST['min_price_filter'])) > 0 || intval(sanitize_text_field($_POST['max_price_filter'])) > 0) {

            if (intval(sanitize_text_field($_POST['max_price_filter'])) > 0) {
                $max_price = intval(sanitize_text_field($_POST['max_price_filter']));
            } else {
                $max_price = 5000000000;
            }

            if (intval(sanitize_text_field($_POST['min_price_filter'])) > 0) {
                $min_price = intval(sanitize_text_field($_POST['min_price_filter']));
            } else {
                $min_price = 0;
            }

            $filter['meta_query']['relation'] = 'OR';
            $filter['meta_query'][] = array(
                'key' => 'product_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'numeric',
                'compare' => 'BETWEEN'
            );
            $filter['meta_query'][] = array(
                'key' => 'product_discount_price',
                'value'   => array($min_price, $max_price),
                'type'    => 'numeric',
                'compare' => 'BETWEEN'
            );
        }

        $products = new WP_Query($filter);

        if ($products->have_posts()) {
            $final_result = array();
            while ($products->have_posts()) {
                $each_result = array();
                $products->the_post();
                $each_result['link'] = get_the_permalink();
                $each_result['title'] = get_the_title();
                $each_result['pic_url'] = get_the_post_thumbnail_url();
                $each_result['excerpt'] = get_the_excerpt();
                $each_result['price'] = intval(get_post_meta(get_the_ID(), 'product_price', true));
                $each_result['count'] = intval(get_post_meta(get_the_ID(), 'product_count', true));
                $each_result['discount'] = intval(get_post_meta(get_the_ID(), 'product_discount_price', true));
                $final_result[] = $each_result;
            }
        }
        wp_reset_postdata();

        wp_send_json($final_result);
    }

    public static function discount_list()
    {
        $products = new WP_Query(array(
            'post_type' => 'product',
            'meta_query' => array(
                array(
                    'key' => 'product_discount_price',
                    'value'   => 0,
                    'type'    => 'numeric',
                    'compare' => '>'
                )
            )
        ));
        if ($products->have_posts()) {
            $final_result = array();
            while ($products->have_posts()) {
                $each_result = array();
                $products->the_post();
                $each_result['link'] = get_the_permalink();
                $each_result['title'] = get_the_title();
                $each_result['pic_url'] = get_the_post_thumbnail_url();
                $each_result['excerpt'] = get_the_excerpt();
                $each_result['price'] = intval(get_post_meta(get_the_ID(), 'product_price', true));
                $each_result['count'] = intval(get_post_meta(get_the_ID(), 'product_count', true));
                $each_result['discount'] = intval(get_post_meta(get_the_ID(), 'product_discount_price', true));
                $final_result[] = $each_result;
            }
        }
        wp_reset_postdata();
        wp_send_json($final_result);
    }

    public static function add_to_basket_handler()
    {
        $product_id = sanitize_text_field($_POST['product_id']);
        $product_title = sanitize_text_field($_POST['product_title']);
        $product_price = sanitize_text_field($_POST['product_price']);
        basket::add_to_basket($product_id, $product_price, $product_title);
        echo 'success';
    }
}
