<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('site_model', 'site');
    }

    public function index(){

        $data['titulo']    = "Catálogo de livros";
        $data['descricao'] = "Catálogo de livros, em PHP utilizando Codegniter 3, Autor | Marcelo Teixeira - 2020.";
        $data['livros']    = $this->site->listaLivros();

        $this->load->view('web/view_site', $data);
    }

} 