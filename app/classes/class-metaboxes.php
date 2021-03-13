<?php
class metaBoxes
{

    public static function generate_product_count_meta_box(){
        add_meta_box('product_count_metabox', 'تعداد موجودی محصول', 'metaBoxes::handle_product_count_meta_box', 'product');
    }

    public static function handle_product_count_meta_box($post){
        $product_count = (int) get_post_meta($post->ID,'product_count',true);
        ?>
        <p>
            <input type="text" name="product_count" value="<?php echo $product_count ?>">
        </p>
        <?php
    }

    public static function save_product_count($post_id){
        if(isset($_POST['product_count']) && intval($_POST['product_count'] > 0)){
            update_post_meta($post_id,'product_count',intval($_POST['product_count']));
        }
    }

    public static function generate_Price_meta_box()
    {
        add_meta_box('product_price_metabox', 'قیمت محصول', 'metaBoxes::handle_price_meta_box', 'product');
    }

    public static function handle_price_meta_box($post){
        $product_price =(int) get_post_meta($post->ID,'product_price',true);
        ?>
        <p>
            <input type="text" name="product_price" value="<?php echo $product_price ?>">
        </p>
        <?php
    }

    public static function save_product_price($post_id){
        if(isset($_POST['product_price']) && intval($_POST['product_price'] > 0)){
            update_post_meta($post_id,'product_price',intval($_POST['product_price']));
        }
    }

    public static function generate_discount_Price_meta_box()
    {
        add_meta_box('product_discount_price_metabox', 'قیمت محصول پس از تخفیف', 'metaBoxes::handle_discount_price_meta_box', 'product');
    }

    public static function handle_discount_price_meta_box($post){
        $product_discount_price =(int) get_post_meta($post->ID,'product_discount_price',true);
        ?>
        <p>
            <input type="text" name="product_discount_price" value="<?php echo $product_discount_price ?>">
        </p>
        <?php
    }

    public static function save_discount_product_price($post_id){
        if(isset($_POST['product_discount_price'])){
            update_post_meta($post_id,'product_discount_price',intval($_POST['product_discount_price']));
        }
    }

    public static function generate_general_details(){
        add_meta_box('product_details_metabox', 'جزئیات محصول', 'metaBoxes::handle_genral_details', 'product');
    }

    public static function handle_genral_details($post){
        $product_general_details = get_post_meta($post->ID,'product_general_details',true);
        include THEME_VIEW_PATH.'admin_views'.DIRECTORY_SEPARATOR.'product_general_details.php';
    }

    public static function save_general_details($post_id){
        $general_details_arr = array();
        
        if(isset($_POST['weight'])){
            $general_details_arr['weight'] = $_POST['weight'];
        }

        if(isset($_POST['sim_count'])){
            $general_details_arr['sim_count'] = $_POST['sim_count'];
        }

        if(isset($_POST['chipset'])){
            $general_details_arr['chipset'] = $_POST['chipset'];
        }

        if(isset($_POST['cpu'])){
            $general_details_arr['cpu'] = $_POST['cpu'];
        }

        if(isset($_POST['gpu'])){
            $general_details_arr['gpu'] = $_POST['gpu'];
        }

        if(isset($_POST['memory'])){
            $general_details_arr['memory'] = $_POST['memory'];
        }

        if(isset($_POST['RAM'])){
            $general_details_arr['RAM'] = $_POST['RAM'];
        }

        if(isset($_POST['exstorage'])){
            $general_details_arr['exstorage'] = $_POST['exstorage'];
        }

        if(isset($_POST['display'])){
            $general_details_arr['display'] = $_POST['display'];
        }

        if(isset($_POST['displaySize'])){
            $general_details_arr['displaySize'] = $_POST['displaySize'];
        }

        if(isset($_POST['resolution'])){
            $general_details_arr['resolution'] = $_POST['resolution'];
        }

        if(isset($_POST['networks'])){
            $general_details_arr['networks'] = $_POST['networks'];
        }

        if(isset($_POST['wifi'])){
            $general_details_arr['wifi'] = 1;
        }else{
            $general_details_arr['wifi'] = 0;
        }

        if(isset($_POST['bluetooth'])){
            $general_details_arr['bluetooth'] = 1;
            
            if(isset($_POST['bluetooth_ver'])){
                $general_details_arr['bluetooth_ver'] = $_POST['bluetooth_ver'];
            }

        }else{
            $general_details_arr['bluetooth'] = 0;
            $general_details_arr['bluetooth_ver'] = '';
        }

        if(isset($_POST['radio'])){
            $general_details_arr['radio'] = 1;
        }else{
            $general_details_arr['radio'] = 0;
        }

        if(isset($_POST['navigate'])){
            $general_details_arr['navigate'] = $_POST['navigate'];
        }

        if(isset($_POST['port'])){
            $general_details_arr['port'] = $_POST['port'];
        }

        if(isset($_POST['camera'])){
            $general_details_arr['camera'] = 1;
            
            if(isset($_POST['camera_resolution'])){
                $general_details_arr['camera_resolution'] = $_POST['camera_resolution'];
            }

        }else{
            $general_details_arr['camera'] = 0;
            $general_details_arr['camera_resolution'] = '';
        }

        if(isset($_POST['selfie'])){
            $general_details_arr['selfie'] = 1;
            
            if(isset($_POST['selfie_resolution'])){
                $general_details_arr['selfie_resolution'] = $_POST['selfie_resolution'];
            }

        }else{
            $general_details_arr['selfie'] = 0;
            $general_details_arr['selfie_resolution'] = '';
        }


        if(isset($_POST['os'])){
            $general_details_arr['os'] = $_POST['os'];
        }

        if(isset($_POST['sensor'])){
            $general_details_arr['sensor'] = $_POST['sensor'];
        }

        if(isset($_POST['battery'])){
            $general_details_arr['battery'] = $_POST['battery'];
        }
        $general_details_str = serialize($general_details_arr);

        if(!empty($general_details_str)){
            update_post_meta($post_id,'product_general_details',$general_details_str);
        }
    }
}
