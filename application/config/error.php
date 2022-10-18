<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    class Error extends CI_Controller { 
 
    public function __construct() { 
    parent::__construct(); 
    
    $this->load->helper('url'); 
    }
 
        public function index() {
            $this->load->view('templet/header');
            $this->load->view('templet/sidebar');
            $this->load->view('404');
            $this->load->view('templet/footer');
        
        }
    }

?>