<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function load_css ($arquivo=null, $media='screen', $import=FALSE, $echo=FALSE){

		$css = '';

		if($import == TRUE){

			$css = '<link rel="stylesheet" type="text/css" href="'.$arquivo.'" media="'.$media.'"/>'."\n";

		}else{

			if($arquivo != NULL) {
				
				if(file_exists('./assets/css/'.$arquivo.'.css')) {
					
					$arquivo = base_url('assets/css/'.$arquivo.'.css');

				}else{
                    $arquivo = base_url('assets/css/'.$arquivo.'.css');                    
                }
				if ($echo == TRUE) {
					
					echo '<link rel="stylesheet" type="text/css" href="'.$arquivo.'" media="'.$media.'"/>'."\n";

				}else{

					return '<link rel="stylesheet" type="text/css" href="'.$arquivo.'" media="'.$media.'"/>'."\n";
				
				}

			}else{

				echo "Arquivo não encontrado";

			}
		}

	}
	//fim load_css

	function load_js ($arquivo=NULL, $echo=FALSE){

		if ($arquivo != NULL) {
				
				if (file_exists('./assets/js/'.$arquivo.'.js')) {
					
					$arquivo = base_url('assets/js/'.$arquivo.'.js');

				}
				
				$js = '<script type="text/javascript" src="'.$arquivo.'"></script>'."\n";

			}if ($echo) {
				
				echo $js;

			}else{

				return $js;

			}

	}
	//fim load_js

	define('MGSUCESSO',' success');
	define('MGALERT',' warning');
	define('MGINFO',' info');
	define('MGERROR',' danger');

	function set_mensagem($texto, $tipo, $extras=NULL, $echo=TRUE)
    {
        $mensagem = '<div class="alert alert-'.$tipo.' alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Sistema!</strong> '.$texto.'
                    </div>';
        if ($echo) {
                echo $mensagem;
        }else{
                return $mensagem;
        }
	}
        
    function set_notificacao($mensagem=NULL, $tipo='green', $id_notificacao='ok')
    {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->session->set_flashdata($id_notificacao, set_mensagem($mensagem, $tipo, NULL, FALSE));
    }

    function get_notificacao($id_notificacao='ok')
    {
        $CI =& get_instance();
        $CI->load->library('session');
        return $CI->session->flashdata($id_notificacao);
    }

    function set_modal($id_modal, $text_title, $text_body, $extras=NULL, $echo=TRUE)
    {
        $modal = '<div class="modal fade" id="'.$id_modal.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">'.$text_title.'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p><strong>'.$text_body.'</strong></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          </div>
                        </div>
                      </div>
                    </div>';
        if ($echo) {
                    echo $modal;
        }else{
                return $modal;
        }
    }

    function set_notification_modal($id_modal=NULL, $text_title=NULL, $text_body=NULL, $id_notificacao='okModal')
    {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->session->set_flashdata($id_notificacao, set_modal($id_modal, $text_title, $text_body, NULL, FALSE));
    }

    function get_notification_modal($id_notificacao='okModal')
    {
        $CI =& get_instance();
        $CI->load->library('session');
        return $CI->session->flashdata($id_notificacao);
    }

    function modal_script($id_modal, $extras=NULL, $echo=TRUE)
    {
        $script = '<script>
                         $(window).on("load",function(){
                                $("#'.$id_modal.'").modal("show");
                        });
                    </script>';
        if ($echo) {
                echo $script;
        }else{
                return $script;
        }
    }

    function set_modal_script($id_modal=NULL, $id_notificacao='okScriptModal')
    {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->session->set_flashdata($id_notificacao, modal_script($id_modal, NULL, FALSE));
    }

    function get_modal_script($id_notificacao='okScriptModal')
    {
        $CI =& get_instance();
        $CI->load->library('session');
        return $CI->session->flashdata($id_notificacao);
    }  
    
    function get_data_form($campo, $tipo='post')
    {
        $CI =& get_instance();
        return $CI->input->$tipo($campo);
    }

        function get_tema(){
            $CI =& get_instance();
            $CI->load->library('sistema');
            return $CI->sistema->tema;
        }
        
        function set_tema($propriedade, $valor, $replace = TRUE){
            $CI =& get_instance();
            $CI->load->library('sistema');
            if ($replace):
                    $CI->sistema->tema[$propriedade] = $valor;
            else:
                if (!isset($CI->sistema->tema[$propriedade]))$CI->sistema->tema[$propriedade] = "";
                $CI->sistema->tema[$propriedade] .=$valor;
            endif;
        }
        
        function load_template(){
            $CI =& get_instance();
            $CI->load->library('sistema');
            $CI->load->library('session');
            if (isset($CI->sistema->tema['header'])){
                $CI->parser->parse($CI->sistema->tema['header'], get_tema());
            }
            if (isset($CI->sistema->tema['menu'])){
                $CI->parser->parse($CI->sistema->tema['menu'], get_tema());
            }
            if (isset($CI->sistema->tema['template'])){
                $CI->parser->parse($CI->sistema->tema['template'], get_tema());
            }
            if (isset($CI->sistema->tema['footer'])){
                $CI->parser->parse($CI->sistema->tema['footer'], get_tema());
            }
        }
        
        function get_valor_sessao($valor=NULL, $nome_session='usuario_logado'){
            $CI =& get_instance();
            $CI->load->library('session');
            $get_session = $CI->session->userdata($nome_session);

            if (is_array($get_session)) {
                if ($get_session){
                    return $get_session[''.$valor.''];
                }  else {
                    return FALSE;
                }    
            }else{
                if ($get_session){
                    return $get_session->$valor;
                }  else {
                    return FALSE;
                }
            }
            
                        
        }
        
        function init_painel(){
            set_tema('css', load_css('bootstrap.min'), FALSE);
            set_tema('css', load_css('metisMenu.min'), FALSE);
            set_tema('css', load_css('sb-admin-2'), FALSE);
            set_tema('css', load_css('morris'), FALSE);
            
            set_tema('js', load_js('jquery.min'), FALSE);
            set_tema('js', load_js('bootstrap.min'), FALSE);
            set_tema('js', load_js('metisMenu.min'), FALSE);
            set_tema('js', load_js('raphael.min'), FALSE);
            set_tema('js', load_js('morris.min'), FALSE);
            set_tema('js', load_js('morris-data'), FALSE);
            set_tema('js', load_js('sb-admin-2'), FALSE);

            set_tema('header', 'prova/header');
            set_tema('menu', 'prova/menu');
            set_tema('template', 'prova/content');
            set_tema('link_profile', base_url('usuarios/profile'));
            set_tema('link_sair', base_url('login/sair'));
            set_tema('footer', 'prova/footer');
            set_tema('debug', '');
        }
        
        function set_dashboard($nome=NULL){
            set_tema('dashboard', $nome);
        }

        function debug_cms($parametro){
            set_tema('debug', '<pre>'.print_r($parametro, TRUE).'</pre>');
        }

        function init_tabela($idtabela){            
            set_tema('header_inc', load_css('dataTables.bootstrap'),FALSE);
            
            set_tema('scripts', '
                        <script>
                            $(document).ready(function()
                                {
                                   $("#'.$idtabela.'").DataTables({
                                        "oLanguage": {
                                            "aLengthMenu": "Exibir _MENU_ por página",
                                            "sZeroRecords": "Nenhum dado encontrado.",
                                            "sInfo": "Mostrando _START_ de _END_ de registros",
                                            "sInfoEmpty": "Nenhum registro para ser exibido",
                                            "sInfoFiltered": "(Filtrando de _ MAX_ de registros)",
                                            "eSearch": "Pesquisar:",
                                            "oPaginate": {
                                                "sFirst": "Primeiro",
                                                "sLast": "Último",
                                                "sNext": "Próximo",
                                                "sPrevious": "Anterior"
                                            }
                                    },
                                    "bPaginate": true,
                                    "aaSorting": [(0,"asc")],
                                    "aPaginationType": "full_numbers"
                                });
                                });
                        </script>', FALSE);
        }
        
        function  get_nome_tipo($id_tipo){
            $tipos = array(
                "1"=> "Admin Master",
                "2"=> "Admin Estadual",
                "3"=> "Admin Municipal",
                "4"=> "Cliente"
            );
            if(!isset($tipos[$id_tipo])){
                return "Nível não encontrado";
            }else{
                return $tipos[$id_tipo];
            } 
        }
        
        function uploadImage($tmp, $nome, $width, $dir='assets/img/'){
            $ext = substr($nome, -3);
            $pasta = 'uploads/'.$dir;
            switch ($ext){
                case 'jpg':
                    $img = imagecreatefromjpeg($tmp);
                    break;
                case 'png':
                    $img = imagecreatefrompng($tmp);
                    break;
                case 'gif':
                    $img = imagecreatefromgif($tmp);
                    break;
                default :
                    break;
            }
            $x = imagesx($img);
            $y = imagesy($img);
            $height = ($width * $y) / $x;
            
            $nova = imagecreatetruecolor($width, $height);
            
            imagealphablending($nova, FALSE);
            imagesavealpha($nova, TRUE);
            imagecopyresampled($nova, $img, 0, 0, 0, 0, $width, $height, $x, $y);
            $nome_nova_image = $pasta.md5($nome.time()).'.'.$ext;
            switch ($ext){
                case 'jpg':
                    imagejpeg($nova, $nome_nova_image, 100);
                    break;
                case 'png':
                    imagepng($nova, $nome_nova_image);
                    break;
                case 'gif':
                    imagegif($nova, $nome_nova_image);
                    break;
            }
            
            imagedestroy($img);
            imagedestroy($nova);
            return $nome_nova_image;
        }
        
        function urlAmigavel($string){
            $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ??"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
            $b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
            $string = utf8_decode($string);
            $string = strtr($string, $a, $b);
            $string = strip_tags(trim($string));
            $string = str_replace(" ","-",$string);
            $string = str_replace(array("-----","----","---","--"),"-",$string);
            $string = strtolower($string);
            return $string;
	}

