<?php

class purchaseRepository extends baseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->table_prefix . 'purchase';
        $this->primary_key = 'ID';
    }

    public function get_user_orders($user_id)
    {
        return $this->db->get_results(
            "SELECT ID,buyer_name,buyer_phone,buyer_address,product_name,product_count,single_price,status,date,factor_id FROM {$this->table} WHERE user_id={$user_id}"
        );
    }

    public function insert($insert_info)
    {
        $user_id = $insert_info['user_id'];
        $product_id = $insert_info['product_id'];
        $buyer_name = $insert_info['buyer_name'];
        $bayer_phone = $insert_info['bayer_phone'];
        $buyer_address = $insert_info['buyer_address'];
        $product_name = $insert_info['product_name'];
        $product_count = $insert_info['product_count'];
        $single_price = $insert_info['single_price'];
        $status = $insert_info['status'];
        $date = $insert_info['date'];
        $factor_id = $insert_info['factor_id'];

        $this->db->query("INSERT INTO $this->table (user_id,product_id,buyer_name,buyer_phone,buyer_address,product_name,product_count,single_price,status,date,factor_id)
        VALUES ($user_id,$product_id,'$buyer_name','$bayer_phone','$buyer_address','$product_name',$product_count,$single_price,$status,'$date',$factor_id)");
    }

    public function search(array $where_condition)
    {
        $query_string = "";
        foreach ($where_condition as $key => $value) {

            if ($key == 'buyer_name' || $key == 'buyer_phone' || $key == 'product_name') {
                $query_string .= $key . " LIKE '%" . $value . "%' AND ";
            }

            if ($key == 'user_id' || $key == 'factor_id' || $key == 'ID' || $key == 'product_id') {
                $query_string .= $key . " = " . $value . " AND ";
            }

            if ($key = 'status') {
                if (is_array($value)) {
                    if (count($value)>0) {
                        foreach ($value as $status) {
                            $query_string .= 'status = ' . $status . " OR ";
                        }
                    }
                }
            }
        }
        if ($query_string[strlen($query_string) - 2] == 'D') {
            $query_string_res = substr($query_string, 0, -5);
        } else {
            $query_string_res = substr($query_string, 0, -4);
        }
        
        return $this->db->get_results ("SELECT * FROM  $this->table WHERE ".$query_string_res);
    }
}
