<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Livros extends CI_Controller {

	public function __construct(){
		
		parent::__construct();

		if ( !$this->session->userdata('logado') ) {	   
		    $this->session->set_flashdata('erro_login','<div class="alert alert-danger" role="alert"> Você precisa realizar login!</div>');
		    redirect('login');
	   }

	   //carregar model Livros_model.php
	   $this->load->model('livros_model', 'livros');

	   //carregar form validation
	   $this->load->library('form_validation');

	}
   
	public function index(){
        $this->listar();

	 }
 
	public function listar(){
	    //titulo
	    $data['titulo_site']   = 'Crud livros v. 1.0.0';
		$data['titulo_pagina'] = 'Lista de livros';
		$data['livros']        =  $this->livros->listarLivros();

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/view_listar');
		$this->load->view('layout/rodape');

	}
	
	public function adicionar(){

		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required');
		$this->form_validation->set_rules('autor',  'Autor', 'trim|required');
		$this->form_validation->set_rules('preco',  'Preço', 'trim|required');
		$this->form_validation->set_rules('resumo', 'Resumo', 'trim|required');

		if ($this->form_validation->run() == TRUE) {


		 // UPLOAD DA IMAGEM
		 $config['upload_path']      = './upload/';
		 $config['allowed_types']    = 'gif|jpg|png';
		 $config['max_size']         = 2048;
		 $config['encrypt_name']     = TRUE;
		 $this->load->library('upload', $config);

		 if ( !$this->upload->do_upload('foto_livro') ) {
		 
		    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">'. $this->upload->display_errors() .'</div>');
		    redirect('livros/adicionar','refresh');

		 } else {

		$inputAdicionar['titulo']  = $this->input->post('titulo');
		$inputAdicionar['autor']   = $this->input->post('autor');
		$inputAdicionar['preco']   = $this->input->post('preco');
		$inputAdicionar['resumo']  = $this->input->post('resumo');
		$inputAdicionar['ativo']   = $this->input->post('ativo');
		$inputAdicionar['img']     = $this->upload->data('file_name');

		$this->livros->cadastrarLivro($inputAdicionar);
		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro cadastrado com sucesso!</div>');
		redirect('livros', 'refresh');

		 }

		} else {

		$data['titulo_site']   = 'Crud livros v. 1.0.0';
		$data['titulo_pagina'] = 'Novo livro';

		$this->load->view('layout/topo', $data);
		$this->load->view('livros/view_adicionar');
		$this->load->view('layout/rodape');

		}

	}

	public function editar($id=NULL){

		if ( !$id ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro você precisa selecionar um livro.</div>');
			redirect('livros', 'refresh');
		}

		$query = $this->livros->pegaLivroID($id);

		if ( !$query ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro livro não encontrado.</div>');
			redirect('livros', 'refresh');
		}

		$this->form_validation->set_rules('titulo', 'Titulo', 'trim|required');
		$this->form_validation->set_rules('autor',  'Autor', 'trim|required');
		$this->form_validation->set_rules('preco',  'Preço', 'trim|required');
		$this->form_validation->set_rules('resumo', 'Resumo', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			$inputEditar['titulo']  =  $this->input->post('titulo');
			$inputEditar['autor']   =  $this->input->post('autor');
			$inputEditar['preco']   =  $this->input->post('preco');
			$inputEditar['resumo']  =  $this->input->post('resumo');
			$inputEditar['ativo']   =  $this->input->post('ativo');

			$this->livros->atualizaLivro($inputEditar, ['id' => $this->input->post('id_livro')]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro atualizado com sucesso!</div>');
		    redirect('livros', 'refresh');


		} else {

			$data['titulo_site']    = 'Crud livros v. 1.0.0';
			$data['titulo_pagina']  = 'Editar livro';
			$data['query']          = $query;
	
			$this->load->view('layout/topo', $data);
			$this->load->view('livros/view_editar');
			$this->load->view('layout/rodape');

		}


	}

	public function apagar ($id=NULL){

		if ( !$id ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro você precisa selecionar um livro.</div>');
			redirect('livros', 'refresh');
		}

		$query = $this->livros->pegaLivroID($id);

		if ( !$query ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro livro não encontrado.</div>');
			redirect('livros', 'refresh');
		}

			$this->livros->apagarLivro($query->id);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Livro apagado com sucesso!</div>');
		    redirect('livros', 'refresh');
	}

	public function ativar ($id=NULL){

		if ( !$id ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro você precisa selecionar um livro.</div>');
			redirect('livros', 'refresh');
		}

		$query = $this->livros->pegaLivroID($id);

		if ( !$query ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro livro não encontrado.</div>');
			redirect('livros', 'refresh');
		}

			$this->livros->atualizaLivro(['ativo' =>1], ['id' => $query->id]);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"> Livro esta ativado.</div>');
			redirect('livros', 'refresh');

	}

	public function desativar ($id=NULL){

		if ( !$id ) {

			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro você precisa selecionar um livro.</div>');
			redirect('livros', 'refresh');
		}

		$query = $this->livros->pegaLivroID($id);

		if ( !$query ) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">	Erro livro não encontrado.</div>');
			redirect('livros', 'refresh');
		}
		    $this->livros->atualizaLivro(['ativo' =>0], ['id' => $query->id]);
		    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">	Livro esta desativado.</div>');
		    redirect('livros', 'refresh');

	}

	
}