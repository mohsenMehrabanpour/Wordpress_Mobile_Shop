<?php
class initializer
{
    public static function setup()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }

    public static function start_session(){
        $session_id = session_id();
        if(empty($session_id)){
            session_start();
        }
    }
}
