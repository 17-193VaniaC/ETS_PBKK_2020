<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("menu_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["menus"] = $this->menu_model->getAll();
        $this->load->view("admin/product/menu", $data);
    }

    public function add()
    {
        $menu = $this->menu_model;
        $validation = $this->form_validation;
        $validation->set_rules($menu->rules());

        if ($validation->run()) {
            $menu->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/new_form");
    }

    public function edit($id_m = null)
    {
        if (!isset($id_m)) redirect('admin/menu');
        $menu = $this->menu_model;
        $validation = $this->form_validation;
        $validation->set_rules($menu->rules());

        if ($validation->run()) {
            $menu->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["menu"] = $menu->getById($id_m);
        if (!$data["menu"]) show_404();
        
        $this->load->view("admin/product/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->menu_model->delete($id)) {
            redirect(site_url('admin/menu'));
        }
    }
}