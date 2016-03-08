<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    public function index(){
        $this->load->model(array('mtr_bidang_m'));
        $this->data['page_header'] = 'Masukkan Info Surat';
        
        //suporting data
        $this->data['bidang'] = $this->mtr_bidang_m->get();
        $this->data['subview'] = 'home/index';
        $this->load->view('_layout_main', $this->data);
    }
}
