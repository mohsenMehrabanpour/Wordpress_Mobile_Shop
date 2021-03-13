<?php

class registerLogics
{
    public static function register_user()
    {
        if ($_POST['submit_register_form']) {
            $user_name = sanitize_text_field($_POST['register_username']);
            $full_name = sanitize_text_field($_POST['register_fullname']);
            $phone_number = sanitize_text_field($_POST['register_phonenumber']);
            $address = sanitize_text_field($_POST['register_address']);
            $password = sanitize_text_field($_POST['register_password']);
            $password_confirm = sanitize_text_field($_POST['register_password_confirm']);
            return registerLogics::validate_register_user($user_name, $full_name, $phone_number, $address, $password, $password_confirm);
        }
    }

    public static function validate_register_user($user_name, $full_name, $phone_number, $address, $password, $password_confirm)
    {
        $has_error = false;
        $err_message = array();
        $phone_number_pattern = '/^(\+98|0)?9\d{9}$/';

        if (empty($user_name) || empty($full_name) || empty($phone_number) || empty($address) || empty($password) || empty($password_confirm)) {
            $has_error = true;
            $err_message[] = "پر کردن تمام فیلد ها الزامی است";
        }

        if (!preg_match($phone_number_pattern, $phone_number)) {
            $has_error = true;
            $err_message[] = "شماره ای که وارد کرده اید نامعتبر است";
        }

        if ($password != $password_confirm) {
            $has_error = true;
            $err_message[] = "کلمات عبور با یکدیگر تطبیق ندارند";
        }

        if (username_exists($user_name)) {
            $has_error = true;
            $err_message[] = "نام کاربری که انتخاب کرده اید مجاز نیست";
        }

        if ($has_error) {
            $err_message[] = 'err';
            return $err_message;
        }
        if (!$has_error) {
            return registerLogics::insert_user($user_name, $full_name, $phone_number, $address, $password);
        }
    }

    public static function insert_user($user_name, $full_name, $phone_number, $address, $password)
    {
        $has_error = false;
        $err_message = array();
        $success_message = array();

        $new_user_data = array(
            'user_login'  => $user_name,
            'user_pass'   => $password,
            'display_name' => $full_name,
            'nickname' => $phone_number,
            'description' => $address,
        );

        $newUserID = wp_insert_user($new_user_data);

        if (is_wp_error($newUserID)) {
            $has_error = true;
            $err_message[] = "در ثبت نام شما خطایی رخ داده است لطفا بعدا امتحان کنید";
        } else {
            // update_user_meta($newUserID, 'mobile', $phone_number);
            // update_user_meta($newUserID, 'address', $address);
        }

        if ($has_error) {
            $err_message = 'err';
            return $err_message;
        } else {
            $success_message[] = 'success';
            $success_message[] = 'ثبت نام شما با موفقیت انجام شد';
            return $success_message;
        }
    }
}
