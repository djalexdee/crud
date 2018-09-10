<?php

class Sistema{
    protected $CI;
    public $tema = array();
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->helper('funcoes');
    }
}

