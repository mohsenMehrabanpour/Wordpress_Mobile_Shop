<?php 
    class view{
        public static function render($view_file_path){
            get_template_part('views/'.$view_file_path);
        }
    }