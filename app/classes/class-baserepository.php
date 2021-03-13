<?php
class baseRepository
{
    protected $table;
    protected $db;
    protected $table_prefix;
    protected $primary_key;

    public function __construct()
    {
        global $wpdb, $table_prefix;
        $this->db = $wpdb;
        $this->table_prefix = $table_prefix;
        
    }

    //find in db
    public function find($id,$columns=null){
        if (is_null($columns)) {
            $columns = '*';
        }else{
            $columns = implode(',',$columns);
        }
        return $this->db->get_row(
        //braye jlo giri az sql injection az prepare estefade mikonim ke fqt dade adadi bgire
        $this->db->prepare("SELECT $columns FROM {$this->table} WHERE {$this->primary_key}=%d",$id)
        );
    }

    public function get_all(){
        return $this->db->get_results ("SELECT * FROM  {$this->table}");
    }

    public function update(array $data,array $where){
        $this->db->update($this->table,$data,$where);
    }
}
