<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction_model extends CI_Model
{
    private $_table = "transaction";
    public $id_trans;
    public $trans_date;
    public $time;
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

    public function save(){
        $post = $this->input->post();
        $this->id_trans = uniqid();
        $this->trans_date = $post["trans_date"];
        $this->time = $post["time"];
        $this->item_id = $post["item_id"];
        if(isset($post["quantity"])){
                $this->available = $post["available"];}
        else{
                $this->available = 1;}
        $this->price_per_item = $post["price_per_item"];
        return $this->db->insert($this->_table, $this);
        }
    
    public function getById($id_trans)
    {
        return $this->db->get_where($this->_table, ["id_trans" => $id_trans])->row();
    }
}

?>