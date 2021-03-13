<?php
include 'constant.php';
include 'app/autoloader.php';

//remove defult navbar
add_filter('show_admin_bar', '__return_false');

//initialize theme
add_action('after_setup_theme', 'initializer::setup');

//initialize session
add_action('init','initializer::start_session');

//slider setting page
add_action('admin_menu', 'generalSetting::slider_setting');

//admin purchase information
add_action('admin_menu', 'generalSetting::purchase_info');

//add custom post type
add_action('init', 'customPostType::make_product_custom_post_type');

//add product count meta box
add_action('add_meta_boxes', 'metaBoxes::generate_product_count_meta_box');

//save product count metabox change
add_action('save_post', 'metaBoxes::save_product_count');

//add price meta box
add_action('add_meta_boxes', 'metaBoxes::generate_Price_meta_box');

//save price metabox change
add_action('save_post', 'metaBoxes::save_product_price');

//add Discount price meta box
add_action('add_meta_boxes', 'metaBoxes::generate_discount_Price_meta_box');

//save discount price metabox change
add_action('save_post', 'metaBoxes::save_discount_product_price');

//handle login ajax request
add_action('wp_ajax_nopriv_mehraban_user_login', 'ajaxHandler::login_ajax_handler');

//handle register request
$register_request_result = registerLogics::register_user();

//add general details meta box
add_action('add_meta_boxes', 'metaBoxes::generate_general_details');

//save general details metabox
add_action('save_post', 'metaBoxes::save_general_details');

//handle load products ajax request
add_action('wp_ajax_nopriv_load_product', 'ajaxHandler::load_content_handler');
add_action('wp_ajax_load_product', 'ajaxHandler::load_content_handler');

//handle filter products ajax request
add_action('wp_ajax_nopriv_filter_product', "ajaxHandler::filter_content_handler");
add_action('wp_ajax_filter_product', "ajaxHandler::filter_content_handler");

//handle filter products ajax request
add_action('wp_ajax_nopriv_load_products_with_discount', "ajaxHandler::discount_list");
add_action('wp_ajax_load_products_with_discount', "ajaxHandler::discount_list");

//handle add to basket ajax request
add_action('wp_ajax_nopriv_mehraban_add_to_basket', 'ajaxHandler::add_to_basket_handler');
add_action('wp_ajax_mehraban_add_to_basket', 'ajaxHandler::add_to_basket_handler');


//get request handler (in bayad hamishe tahe tahe dastan bashe)
add_action('init',"requestHandler::get_request");

//post request hanlder
add_action('init',"requestHandler::post_request");