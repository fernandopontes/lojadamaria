<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'app_main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['vitrine'] = 'app_main';
$route['vitrine/(:any)'] = 'app_main/index/$1';

$route['produtos'] = 'app_main/produtos';
$route['painel'] = 'app_painel';
$route['usuario_login'] = 'app_painel/usuario_login';
$route['usuario_logout'] = 'app_painel/usuario_logout';

$route['usuarios_listar'] = 'app_painel_usuarios/index';
$route['usuarios_listar/(:num)'] = 'app_painel_usuarios/index/$1';
$route['usuarios_listar/(:num)/(:any)'] = 'app_painel_usuarios/index/$1/$2';
$route['usuario_cadastro_form'] = 'app_painel_usuarios/usuario_cadastro_form';
$route['usuario_cadastro_db'] = 'app_painel_usuarios/usuario_cadastro_db';
$route['usuario_editar_form/(:num)'] = 'app_painel_usuarios/usuario_editar_form/$1';
$route['usuario_editar_db'] = 'app_painel_usuarios/usuario_editar_db';
$route['usuario_excluir/(:num)'] = 'app_painel_usuarios/usuario_excluir_db/$1';

$route['produtos_listar'] = 'app_painel_produtos/index';
$route['produtos_listar/(:num)'] = 'app_painel_produtos/index/$1';
$route['produtos_listar/(:num)/(:any)'] = 'app_painel_produtos/index/$1/$2';
$route['produto_cadastro_form'] = 'app_painel_produtos/produto_cadastro_form';
$route['produto_cadastro_db'] = 'app_painel_produtos/produto_cadastro_db';
$route['produto_editar_form/(:num)'] = 'app_painel_produtos/produto_editar_form/$1';
$route['produto_editar_db'] = 'app_painel_produtos/produto_editar_db';
$route['produto_excluir/(:num)'] = 'app_painel_produtos/produto_excluir_db/$1';
$route['produto_excluir_imagem/(:num)'] = 'app_painel_produtos/excluir_imagem_capa/$1';