<?php defined('SYSPATH') or die('Not direct script access.');

class Controller_Paciente extends Controller_Template {
    public $template = 'base';

    public function action_index()
    {
        if(Auth::instance()->get_user()->habilitado)
        {
            $pacientes = ORM::factory('paciente')->find_all();

            $view = View::factory('Paciente/index');
            $view->pacientes = $pacientes;

            $this->template->contenido = $view;
            $this->template->menu = "";
        }
        else
            HTTP::redirect('/Auth/login/');
    }

    public function action_new()
    {
        if(Auth::instance()->get_user()->habilitado)
        {
            $paciente = ORM::factory('paciente');

            $view = View::factory('Paciente/form')
                ->bind('errors', $errors);

            if(http_request::POST == $this->request->method)
            {
                $paciente = ORM::factory('paciente')->values($_POST, array());
            }
        }
    }

    public function action_edit()
    {

    }
}