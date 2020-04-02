<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $_table = "menu";

    public $id_m;
    public $m_name;
    public $price;
    public $picture;
    public $available;

    public function rules()
    {
        return[
            ['field' => 'm_name', 
            'label' => 'm_name', 
            'rules' => 'required'],

            ['field' => 'price', 
            'label' => 'price', 
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_m = uniqid();
        $this->m_name = $post["m_name"];
        $this->price = $post["price"];
        $this->picture = $this->_uploadImage();
        if(isset($post["available"])){
                $this->available = $post["available"];
        }
        else{
                $this->available = 1;       
        }
        return $this->db->insert($this->_table, $this);
        }
    
    public function getById($id_m)
    {
        return $this->db->get_where($this->_table, ["id_m" => $id_m])->row();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_m = $post["id_m"];
        $this->m_name = $post["m_name"];
        $this->price = $post["price"];

        if (!empty($_FILES["gambar"])) {
            $this->picture = $this->_uploadImage();
        } else {
            $this->picture = $post["old_image"];
        }
        if(isset($post["available"])){
                $this->available = $post["available"];
        }
        else{
                $this->available = 0;       
        }
        
        return $this->db->update($this->_table, $this, array('id_m' => $post['id_m']));
    }

    public function delete($id_m)
    {
        $this->_deleteImage($id_m);
        return $this->db->delete($this->_table, array("id_m" =>$id_m));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $this->id_m;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('picture')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }
    private function _deleteImage($id_m)
    {
        $menu = $this->getById($id_m);
        if ($menu->picture != "default.png") {
            $filename = explode(".", $menu->picture)[0];
            return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
    }
    }



}

?>