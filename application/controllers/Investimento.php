<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investimento extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        //Bloco de carregamento dos modelos no controller Investimento
        $this->load->model("investimento_model");
        $this->load->model("simulacao_model");

        //Função inicializa os componentes do template Investimentos (CSS e Javascripts)
        init_painel();

    }
    //Função carrega o index do projeto
	public function index()
	{
		//Função carrega o template
        load_template();
	}

	public function listar_investimentos()
	{

		$get_investimentos = $this->investimento_model->listaTodos();

		foreach ($get_investimentos as $value) {
			$dados_investimento[] = array(
			"nome" => $value['investimento_nome'],
			"rentabilidade" => $value['investimento_rentabilidade'],
			"taxa" => $value['investimento_taxa'],
			"periodo" => $value['investimento_periodo'],
            "data" => $value['investimento_data'],
			"editar" => '<a href="editar/'.$value['investimento_id'].'" style="width:44px; margin-right:5px;" title="Editar" class="btn btn-info"><i class="fa fa-pencil"></i></a>',
            "deletar" => '<button type="button" data-toggle="modal" data-target="#myModalInvestimentoExcluir" style="width:44px;" title="Deletar" class="btn btn-danger" onclick="excluirInvestimento('.$value['investimento_id'].');"><i class="fa fa-trash"></i></button>'
			);
		}
		set_tema('js', load_js(base_url('assets/js/excluirInvestimento.js')), false);
		set_tema('investimentos', $dados_investimento);
		//Função chama a View de listagem de investimentos
		set_tema('template', 'investimento/investimento_listar');
		//Função carrega o template
		load_template();
	}

	//Função carrega a página de cadastro de investimentos	
	public function cadastro()
	{
		//Função chama a View de cadastro de investimentos
		set_tema('template', 'investimento/investimento_cadastro');
		//Função carrega o template
		load_template();	
	}

	public function cadastrar_investimento()
	{
		//Validação dos dados passados no formulário na view "investimento_cadastro"
        $this->form_validation->set_rules('investimento_nome', 'investimento_nome', 'required');
        $this->form_validation->set_rules('investimento_rentabilidade', 'investimento_rentabilidade', 'required');
        $this->form_validation->set_rules('investimento_taxa', 'investimento_taxa', 'required');
        $this->form_validation->set_rules('investimento_periodo', 'investimento_periodo', 'required');
        //Roda a validação do Form
        $sucesso = $this->form_validation->run();
        //Verifica se passou na validação do Form
        if ($sucesso) {
        	//Monta o Array com as informções do Formulário
            $dados_investimento = array(
                "investimento_nome"=> get_data_form('investimento_nome'),
                "investimento_rentabilidade"=> get_data_form('investimento_rentabilidade'),
                "investimento_taxa"=> get_data_form('investimento_taxa'),
                "investimento_periodo"=> get_data_form('investimento_periodo'),
                "investimento_data"=> date('d/m/Y'),
            );
            //Insere no DB de dados do investimento
            $insert_investimento = $this->investimento_model->insert($dados_investimento);
            //Verifica se foi feito o inserto no DB
            if ($insert_investimento) {
                set_notificacao('Investimento cadastrado!', 'success');
                redirect('investimento/listar');

            }  else {
                set_notificacao('Não foi possível inserir o investimento', 'warning');
                redirect('investimento/cadastro');
            }

        }else{
        	set_notificacao('Não foi possível inserir o investimento, preencha todos os campos obrigatórios do formulário', 'warning');
            redirect('investimento/cadastro');
        }
	}

	public function editar($id)
	{
		//Pega os dados do Investimento
		$get_dados_investimento[] = $this->investimento_model->get_by('investimento_id', $id);
        
        set_tema('investimento', $get_dados_investimento);
		//Função chama a View de cadastro de investimentos
		set_tema('template', 'investimento/investimento_editar');
		//Função carrega o template
		load_template();	
	}

	public function editar_investimento()
	{
        $investimento_id = get_data_form('investimento_id');

        $dados_investimento = array(
            "investimento_nome"=> get_data_form('investimento_nome'),
            "investimento_rentabilidade"=> get_data_form('investimento_rentabilidade'),
            "investimento_taxa"=> get_data_form('investimento_taxa'),
            "investimento_periodo"=> get_data_form('investimento_periodo')                      
        );

        $update = $this->investimento_model->update(get_data_form('investimento_id'), $dados_investimento);
        set_notificacao('Investimento Atualizado!', 'success');
        redirect('investimento/listar');
	}

	public function excluirInvestimento($id)
	{
		//Exclui o investimento pelo seu ID
        $investimentoDeletado = $this->investimento_model->delete_by('investimento_id', $id);
        if ($investimentoDeletado) {
            set_notificacao('Investimento deletado', 'warning');
            redirect('investimento/listar');
        }else{
            set_notificacao('Não foi possível excluir o Investimento', 'warning');
            redirect('investimento/listar');
        }
	}

	public function listar_simulacao()
	{

		$get_simulacaoes = $this->simulacao_model->listaTodos();

		foreach ($get_simulacaoes as $value) {

            $investimento = $this->investimento_model->listaInvestimento($value['simulacao_investimento_id']);

            $diferenca = strtotime(date('Y/m/d')) - strtotime($value['simulacao_data']);

            $periodo_total = floor($diferenca / (60 * 60 * 24));

            $rendimento_mensal = ($value['simulacao_valor'] / 100) * $investimento[0]['investimento_rentabilidade'];

            if ($periodo_total <= 0) {
                $rendimento_total = 0;
            }else{
                $rendimento_total = $rendimento_mensal / $investimento[0]['investimento_periodo'] * $periodo_total;
            }

			$dados_simulacao[] = array(
			"investimento" => $investimento[0]['investimento_nome'],
			"aplicacao_total" => number_format($value['simulacao_valor'], 2, ',', '.'),
			"periodo_total" => $periodo_total,
			"rendimento_total" => number_format($rendimento_total, 2, ',', '.'),
            "data" => date('d/m/Y', strtotime($value['simulacao_data'])),
			"editar" => '<a href="editar/'.$value['simulacao_id'].'" style="width:44px; margin-right:5px;" title="Editar" class="btn btn-info"><i class="fa fa-pencil"></i></a>',
            "deletar" => '<button type="button" data-toggle="modal" data-target="#myModalSimulacaoExcluir" style="width:44px;" title="Deletar" class="btn btn-danger" onclick="excluirSimulacao('.$value['simulacao_id'].');"><i class="fa fa-trash"></i></button>'
			);
		}
		set_tema('js', load_js(base_url('assets/js/excluirSimulacao.js')), false);
		set_tema('simulacoes', $dados_simulacao);
		//Função chama a View de listagem de investimentos
		set_tema('template', 'simulacao/simulacao_listar');
		//Função carrega o template
		load_template();
	}

	//Função carrega a página de cadastro de simulações	
	public function cadastroSimulacao()
	{
        $get_investimentos = $this->investimento_model->listaTodos();

        set_tema('investimentos', $get_investimentos);
		//Função chama a View de cadastro de simulacões
		set_tema('template', 'simulacao/simulacao_cadastro');
		//Função carrega o template
		load_template();	
	}

	public function cadastrar_simulacao()
	{
		//Validação dos dados passados no formulário na view "simulacao_cadastro"
        $this->form_validation->set_rules('simulacao_investimento_id', 'simulacao_investimento_id', 'required');
        $this->form_validation->set_rules('simulacao_valor', 'simulacao_valor', 'required');
        $this->form_validation->set_rules('simulacao_data', 'simulacao_data', 'required');
        //Roda a validação do Form
        $sucesso = $this->form_validation->run();
        //Verifica se passou na validação do Form
        if ($sucesso) {
        	//Monta o Array com as informções do Formulário
            $dados_simulacao = array(
                "simulacao_investimento_id"=> get_data_form('simulacao_investimento_id'),
                "simulacao_valor"=> get_data_form('simulacao_valor'),
                "simulacao_data"=> get_data_form('simulacao_data')
            );
            //Insere no DB de dados dam simualacao
            $insert_simulacao = $this->simulacao_model->insert($dados_simulacao);
            //Verifica se foi feito o inserto no DB
            if ($insert_simulacao) {
                set_notificacao('Simulação cadastrada!', 'success');
                redirect('simulacao/listar');
            }  else {
                set_notificacao('Não foi possível inserir a simulação.', 'warning');
                redirect('simulacao/cadastro');
            }

        }else{
        	set_notificacao('Não foi possível inserir a simulação, preencha todos os campos obrigatórios do formulário', 'warning');
            redirect('simulacao/cadastro');
        }
	}

	public function editarSimulacao($id)
	{
		//Pega os dados do Investimento
		$get_dados_simulacao[] = $this->simulacao_model->get_by('simulacao_id', $id);

        $get_investimento = $this->investimento_model->listaInvestimento($get_dados_simulacao[0]->simulacao_investimento_id);

        $get_investimentos = $this->investimento_model->listaTodos();

        set_tema('investimento', $get_investimento);
        set_tema('investimentos', $get_investimentos);
        set_tema('simulacao', $get_dados_simulacao);
		//Função chama a View de cadastro de investimentos
		set_tema('template', 'simulacao/simulacao_editar');
		//Função carrega o template
		load_template();	
	}

	public function editar_simulacao()
	{
        $simulacao_id = get_data_form('simulacao_id');

        $dados_simulacao = array(
            "simulacao_investimento_id"=> get_data_form('simulacao_investimento_id'),
            "simulacao_valor"=> get_data_form('simulacao_valor'),
            "simulacao_data"=> get_data_form('simulacao_data')                      
        );

        $update = $this->simulacao_model->update(get_data_form('simulacao_id'), $dados_simulacao);
        set_notificacao('Simulação Atualizada!', 'success');
        redirect('simulacao/listar');
	}

	public function excluirSimulacao($id)
	{
		//Exclui o investimento pelo seu ID
        $SimulacaoDeletada = $this->simulacao_model->delete_by('simulacao_id', $id);
        if ($SimulacaoDeletada) {
            set_notificacao('Simulação deletada', 'warning');
            redirect('simulacao/listar');
        }else{
            set_notificacao('Não foi possível excluir a Simulação', 'warning');
            redirect('simulacao/listar');
        }
	}
}
