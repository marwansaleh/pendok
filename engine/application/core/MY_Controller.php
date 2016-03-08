<?php

/**
 * Description of MY_Controller
 *
 * @author marwansaleh 10:32:08 AM
 */
class MY_Controller extends CI_Controller{
    protected $data = array();
    
    function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
    }
}

/**
 * Filename : MY_Controller.php
 * Location : /MY_Controller.php
 */
