<?php

class Trans extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('Inventory_model');
        $this->obj = $this->CI->Inventory_model;
    }
