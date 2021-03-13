<?php
    class Assets{
        public static function __callStatic($method_name,$arguments){
            echo THEME_URL.'/assets/'.$method_name.'/'.$arguments[0];
        }
    }