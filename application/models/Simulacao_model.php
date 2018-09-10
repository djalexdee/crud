<?php

class simulacao_model extends MY_Model{
    public $_table = 'investimento_simulacao';
    public $primary_key = 'simulacao_id';
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

    public function listaTodos(){
      $lista = $this->db->select("investimento_simulacao.*")
                ->order_by('simulacao_id', 'desc')
                ->get('investimento_simulacao')->result_array();
      return $lista;          
    }
          
}
