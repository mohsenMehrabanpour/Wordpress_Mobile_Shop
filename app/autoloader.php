<?php
class AutoLoader
{
    public function __construct()
    {
        //return unkown class name to autoload method
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($unknown_class_name){
        $file = $this->generate_file_path_from_name($unknown_class_name);
        if(is_file($file) && file_exists($file) && is_readable($file)){
            include $file;
        }
    }

    public function generate_file_path_from_name($unknown_class_name){
        $class_name = strtolower($unknown_class_name);
        $class = 'class-'.$class_name;
        $file = $class.'.php';
        $file_path = THEME_PATH.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.$file;
        return $file_path;
    }
}
new AutoLoader;