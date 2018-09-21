<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'prova';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['prova/fizzBuzz'] = 'prova/listar_exercicio_1';
$route['prova/refatorar_1'] = 'prova/listar_exercicio_2';
$route['prova/refatorar_2'] = 'prova/listar_exercicio_3';
