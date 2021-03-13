<?php

class userProfile
{
    public static $profile_err_msg = array();
    public static $profile_success_msg = array();

    public static function get_user_data()
    {
        if (is_user_logged_in()) {
            //std class baz migardoone ke ba -> etelaat grftim
            $current_user = wp_get_current_user();
            return [
                'id'=>$current_user->ID,
                'address' => $current_user->description,
                'phone_number' => $current_user->nickname,
                'full_name' => $current_user->display_name
            ];
        } else {
            self::$profile_err_msg[] = 'ابتدا در سایت وارد شوید';
            return [
                'err' => 'ابتدا در سایت وارد شوید',
            ];
        }
    }

    public static function update_user_data($full_name, $phone_number, $address)
    {
        $user_data = userProfile::get_user_data();
        $id = $user_data['id'];

        if ($full_name != $user_data['full_name']) {

            $updated_user_data = wp_update_user(array('ID'=>$id,'display_name' => $full_name));
            if (is_wp_error($updated_user_data)) {
                self::$profile_err_msg[] = 'متاسفانه در بروزرسانی نام و نام خانوادگی شما خطایی رخ داده است';
            } else {
                self::$profile_success_msg[] = 'به روز رسانی نام و نام خانوادگی شما با موفقیت انجام شد';
            }
        }

        if ($phone_number != $user_data['phone_number']) {

            $updated_user_data = update_user_meta($id,'nickname',$phone_number);
            if ($updated_user_data) {
                self::$profile_success_msg[] = 'به روز رسانی شماره تماس شما با موفقیت انجام شد';
            } else {
                self::$profile_err_msg[] = 'متاسفانه در بروزرسانی اطلاعات شماره تماس خطایی رخ داده است';
            }
        }

        if ($address != $user_data['address']) {

            $updated_user_data = update_user_meta($id,'description',$address);
            if ($updated_user_data) {
                self::$profile_success_msg[] = 'به روز رسانی آدرس با موفقیت انجام شد';
            } else {
                self::$profile_err_msg[] = 'متاسفانه در بروزرسانی آدرس شما خطایی رخ داده است';
            }
        }
    }

}
