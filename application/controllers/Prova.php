<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prova extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //Bloco de carregamento dos modelos no controller Investimento
        $this->load->model("user_model");

        //Função inicializa os componentes do template Investimentos (CSS e Javascripts)
        init_painel();

    }
    //Função carrega o index do projeto
	public function index()
	{
		//Função carrega o template
        load_template();
	}

	public function listar_exercicio_1()
	{
        
        $saida = [&$i, 'Fizz', 'Buzz', 'FizzBuzz'];

        for ($i = 0; $i++ < 100;) {
            $a = 1 * (0 === $i % 3)
               + 2 * (0 === $i % 5);
        $dados[] = $saida[$a];
        }    

        set_tema('dados', $dados);
		//Função chama a View de prova_exercicio_1
		set_tema('template', 'prova/prova_exercicio_1');
		//Função carrega o template
		load_template();
	}

    public function listar_exercicio_2()
    {   
        $session = (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true);
        $cookie = (isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true);
        if ($session || $cookie) {
            $this->redirect();
        } 

        //Função chama a View de prova_exercicio_2
        set_tema('template', 'prova/prova_exercicio_2');
        //Função carrega o template
        load_template();
    }

    public function redirect()
    {
        header('Location: http://www.google.com');
        exit();
    }

    public function listar_exercicio_3()
    {
        //Retorna um array com os usuários chamando a função "select_name" do Model User_model
        $users = $this->user_model->select_name();   
        //Envia para a view o array
        set_tema('users', $users);
        //Função chama a View de prova_exercicio_3
        set_tema('template', 'prova/prova_exercicio_3');
        //Função carrega o template
        load_template();
    }
}
