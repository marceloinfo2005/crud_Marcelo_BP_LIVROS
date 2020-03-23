<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livros extends CI_Controller {

	public function __construct(){
		
		parent::__construct();

		if ( !$this->session->userdata('logado') ) {	   
		    $this->session->set_flashdata('erro_login','<div class="alert alert-danger" role="alert"> Você precisa realizar login!</div>');
		    redirect('login');
	   }
	   
	   //carregar model.php
	   $this->load->model('livros_model', 'livros');

	   //carrega minha função_helper
	   $this->load->helper('funcoes_helper', 'funcoes');	

	}
	
	public function index()
	{
	    //titulo
	    $data['titulo_site'] = 'Crud livros v. 1.0.0';
	    $data['titulo_pagina'] = 'Lista de livros';

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/view_listar');
		$this->load->view('layout/rodape');
	}
	
	
}