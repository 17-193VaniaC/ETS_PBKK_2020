<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction_model extends CI_Model
{
    private $_table = "transaction";
    public $id_trans;
    public $trans_date;
    public $trans_time;
    public $item_id;
    public $quantity;
    public $price_per_item;

    public function rules()
    {
        return[
            ['field' => 'item_id', 
            'label' => 'item_id', 
            'rules' => 'required'],

            ['field' => 'price_per_item', 
            'label' => 'price_per_item', 
            'rules' => 'required']
        ];
    }

    public function getAll(){
        return $this->db->get($this->_table)->result();
    }

    public function save($id, $item){
        $this->id_trans = $id;
        $this->trans_date = date('Y-m-d');
        $this->trans_time = date("h:i:s");
        $this->item_id = $item["id_m"];
        $this->quantity = $item['qnty'];
        $this->price_per_item = $item['price'];
        return $this->db->insert($this->_table, $this);
    }
    
    public function getById($id_trans)
    {
        return $this->db->get_where($this->_table, ["id_trans" => $id_trans])->row();
    }

}

?>