<?php
include THEME_PERSIAN_CALENDER_TOOL;

    class myCalender{

        public static function seprate_clock_and_date($date){
    
            $seprated_clock = substr($date, -8, -3);
            $seprated_date = substr($date, -19, -9);
            return ['clock'=>$seprated_clock,'date'=>$seprated_date];
        }

        public static function to_persian_date($miladi_date){

            $persian_calender_arry = array();
            $persian_calender_arry = explode('-',$miladi_date);
            return gregorian_to_jalali($persian_calender_arry[0],$persian_calender_arry[1],$persian_calender_arry[2], '/');
        }

    }