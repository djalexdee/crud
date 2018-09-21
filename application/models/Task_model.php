<?php

class task_model extends MY_Model{
    public $_table = 'tasks';
    public $primary_key = 'task_id';
    protected $return_types = 'array';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function verifica_campo($campo, $valor){
        $get = $this->get_by($campo, $valor);
        if ($get) {
            return TRUE;
        }  else {
            return FALSE;
        }
    }

    public function listaTodos(){
      $lista = $this->db->select("tasks.*")
                ->order_by('task_id', 'desc')
                ->get('tasks')->result_array();
      return $lista; 
    }
          
}
