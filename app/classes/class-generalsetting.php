<?php
    class generalSetting{
        public static function slider_setting(){
            add_menu_page('تنظیمات اسلایدر',' تنظیمات اسلایدر','manage_options','slider_setting','generalSetting::generate_slider_main_page');
        }

        public static function generate_slider_main_page(){
            $slider_pics = get_option('main_slider');
            include THEME_VIEW_PATH.'admin_views'.DIRECTORY_SEPARATOR.'main_slider_settings.php';
        }

        public static function purchase_info(){
            add_menu_page('مدیریت فروش ها','مدیریت فروش ها','manage_options','purchase_info','generalSetting::generate_purchase_info_main_page');
        }

        public static function generate_purchase_info_main_page(){

            include THEME_VIEW_PATH.'admin_views'.DIRECTORY_SEPARATOR.'purchase_info.php';
        }
    }