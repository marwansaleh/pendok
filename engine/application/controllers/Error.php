<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author marwansaleh 10:31:51 AM
 */
class Error extends MY_Controller {
    public function page_not_found(){
        $this->data['page_header'] = 'Page Not Found';
        
        $this->data['subview'] = 'error/page_not_found/index';
        $this->load->view('_layout_main', $this->data);
    }
}

/**
 * Filename : Error.php
 * Location : /Error.php
 */
