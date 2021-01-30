<?php

class Transaction extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model("transaction_model");
        $this->load->library('form_validation');
    }


	public function index()
	{
		$this->load->model('menu_model');
		$data["transaction"] = $this->transaction_model->getAll();
		$data['menus'] = $this->menu_model->getAvailable();
        $this->load->view("admin/transaction", $data);

	}

	public function add()
    {
        $transaction = $this->transaction_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaction->rules());

        if ($validation->run()) {
            if($transaction->save()){
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            else{
                $this->session->set_flashdata('failed', 'Gagal menyimpan data');

            }
        }

        $this->load->view("admin/");
    }

    public function pay(){
        $db = mysqli_connect("localhost","root","","petrichor");
        $sql="Select id_trans from transaction where trans_date=current_date() order by id_trans desc limit 1";
        $sth= $db->query($sql);
        $result=mysqli_fetch_array($sth);
        $lastid = empty($result['id_trans'])? 1 : $result['id_trans']+1;
        $cartitems=$_SESSION['products'];
        foreach ($cartitems as $items):
            $this->transaction_model->save($lastid,$items);
        endforeach;
        $_SESSION['products'] =array();
        redirect('admin/');
    }

 public function foo(){
        return 'foo';
    }
}

