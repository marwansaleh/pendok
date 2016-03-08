<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function index(){
        $this->load->model(array('mtr_bidang_m','mtr_perihal_m'));
        $this->data['page_header'] = 'Masukkan Info Surat';
        
        //suporting data
        $this->data['bidang'] = $this->mtr_bidang_m->get();
        
        $this->data['perihal'] = array();
        $perihal = $this->mtr_perihal_m->get();
        foreach ($perihal as $pr){
            $this->data['perihal'][$pr->kategori] [] = $pr;
        }
        
        $this->data['subview'] = 'home/index';
        $this->load->view('_layout_main', $this->data);
    }
}
