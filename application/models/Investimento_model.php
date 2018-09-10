<?php

class investimento_model extends MY_Model{
    public $_table = 'investimentos_tipo';
    public $primary_key = 'investimento_id';
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

    public function listaInvestimento($investimento_id){
      $lista = $this->db->select("investimentos_tipo.*")
                ->where('investimento_id', $investimento_id)
                ->get('investimentos_tipo')->result_array();
      return $lista;          
    }

    public function listaTodos(){
      $lista = $this->db->select("investimentos_tipo.*")
                ->order_by('investimento_id', 'desc')
                ->get('investimentos_tipo')->result_array();
      return $lista;          
    }
          
}
