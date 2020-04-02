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
		$data['menus'] = $this->menu_model->getAll();
        $this->load->view("admin/transaction", $data);

	}

	public function add()
    {
        $transaction = $this->transaction_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaction->rules());

        if ($validation->run()) {
            $transaction->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/");
    }


}

