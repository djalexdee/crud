<?php

class user_model extends MY_Model{
    public $_table = 'user';
    public $primary_key = 'user_id';
    protected $return_types = 'array';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function verifica_campo($campo, $valor){
        $get_users = $this->get_by($campo, $valor);
        if ($get_users) {
            return TRUE;
        }  else {
            return FALSE;
        }
    }

    public function select_name(){
      $user = $this->db->select("user.user_name")
                ->order_by('user_id', 'desc')
                ->get('user')->result_array();
      return $user; 
    }

    public function listaTodos(){
      $lista = $this->db->select("user.*")
                ->order_by('user_id', 'desc')
                ->get('user')->result_array();
      return $user; 
    }
          
}
