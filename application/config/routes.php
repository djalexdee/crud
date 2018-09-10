<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'investimento';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['cadastrar'] = 'investimento/cadastrar_investimento';
$route['update'] = 'investimento/editar_investimento';
$route['investimento/cadastro'] = 'investimento/cadastro';
$route['investimento/editar'] = 'investimento/editar';
$route['investimento/listar'] = 'investimento/listar_investimentos';
$route['excluirIvestimento/(:num)'] = 'investimento/excluirInvestimento/$1';

$route['cadastrarSimulacao'] = 'investimento/cadastrar_simulacao';
$route['updateSimulacao'] = 'investimento/editar_simulacao';
$route['simulacao/cadastro'] = 'investimento/cadastroSimulacao';
$route['simulacao/editar/(:num)'] = 'investimento/editarSimulacao/$1';
$route['simulacao/listar'] = 'investimento/listar_simulacao';
$route['simulacao/excluirSimulacao/(:num)'] = 'investimento/excluirSimulacao/$1';