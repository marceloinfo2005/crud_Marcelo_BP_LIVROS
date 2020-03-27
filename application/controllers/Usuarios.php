<?php
     defined('BASEPATH') OR exit('No direct script access allowed');

     class Usuarios extends CI_Controller {

     public function __construct(){
         parent::__construct();
         if ( !$this->session->userdata('logado') ) {	   
          $this->session->set_flashdata('erro_login','<div class="alert alert-danger" role="alert"> Você precisa realizar login!</div>');
          redirect('login');
          }
         $this->load->model('usuarios_model');
         $this->load->helper('security');
         $this->load->library('form_validation');
     }
     
      public function index(){
         $this->listar(); 

     }
     // listar usuários
     public function listar(){


      $data['titulo_site'] = 'Crud usuários';
      $data['titulo_pagina'] = 'Listar usuários';
      $data['usuarios'] = $this->usuarios_model->getUsuarios();

      $this->load->view('layout/topo', $data);
      $this->load->view('usuarios/view_listar');
      $this->load->view('layout/rodape');
    
    }
    // novo usuário
     public function adicionar(){

      $this->form_validation->set_rules('nome', 'NOME', 'required|min_length[3]');

      //valid_email regra campo Nome obrigatório
      $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email',
        array('valid_email' => 'Você deve passar um e-mail válido!'));
  
      //required - min_length max_length regras do campo SENHA
      $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[8]',
       array(
             'required'  => 'Você deve passar uma senha!',
             'min_length' => 'Senha senha deve ter no mínimo 6 letras ou números',
             'max_length' => 'Senha senha deve ter no máximo 8 letras ou números',
            ));
        
      // required - matches, regras do campo repeti senha
      
      $this->form_validation->set_rules('senha2', 'Repita senha', 'required|matches[senha]',
      array(
            'required'   => 'Você deve preencher o campo Repita senha',
            'matches'    => 'Senha não confere!'

         )
      ); 
      
      if ($this->form_validation->run() == TRUE) {
           
         // Salvar no banco de dados
         $dados['nome']  = $this->input->post('nome');
         $dados['email'] = $this->input->post('email');
         $dados['senha'] = do_hash($this->input->post('senha'));
         $dados['ativo'] = 1;

         $this->usuarios_model->doInsert($dados);

         redirect('usuarios', 'refresh');
         
      } else {

        $data['titulo_site'] = 'Crud usuários';
        $data['titulo_pagina'] = 'Cadastrar usuários';

        $this->load->view('layout/topo', $data);
        $this->load->view('usuarios/view_adicionar');
        $this->load->view('layout/rodape');

      }      

  }
   // editar usuários
     public function editar($id=NULL){

       if ( !$id){
          $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, você deve passar um id de 
             usuário.</div>');
         redirect('usuarios');    

       }

       $query = $this->usuarios_model->getUsuarioId($id);

       if ( !$query) {
          $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, usuário não foi localizado, tente 
          novamente.</div>');
         redirect('usuarios');

       } 
       
       $this->form_validation->set_rules('nome', 'NOME', 'required|min_length[3]');

      //valid_email regra campo Nome obrigatório
      $this->form_validation->set_rules('email', 'E-MAIL', 'required|valid_email',
        array('valid_email' => 'Você deve passar um e-mail válido!'));


        if ($this->form_validation->run() == TRUE) {
           
         // Salvar no banco de dados
         $dados['nome']  = $this->input->post('nome');
         $dados['email'] = $this->input->post('email');

         $this->usuarios_model->doUpdate($dados, ['id' => $this->input->post('id')]);
         redirect('usuarios', 'refresh');

      } else {

         $data['titulo_site'] = 'Crud usuários';
         $data['titulo_pagina'] = 'Editar usuários';
         $data['query']  = $query;
        
         $this->load->view('layout/topo', $data);
         $this->load->view('usuarios/view_editar');
         $this->load->view('layout/rodape');
   
        }

     }
   // apagar usuários
     public function apagar($id=NULL){

      if ( !$id){
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, você deve passar um id de usuário.</div>');
       redirect('usuarios');    

     }

     // verifica se existe cadastro com id passada
     $query = $this->usuarios_model->getUsuarioId($id);
     if ( !$query) {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, usuário não foi localizado, tente 
            novamente.</div>');
       redirect('usuarios');

   }

     // verifica se o usuário está logado
     if ( $query->email == $this->session->userdata('email')) {
        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, não é permitido apagar o usuário logado no
       sistema.</div>');
      redirect('usuarios');
   }
   
   
     // Apagar o usuário passado
     if ($this ->usuarios_model->doDelete(['id' => $id])) {
         $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário foi apagado com sucesso!</div>');
     } else {
         $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Erro ao apagar usuário!</div>');
     }
      redirect('usuarios');
}



public function ativo ($id=NULL){
 
  if ( !$id){
    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, você deve passar um id de usuário.</div>');
   redirect('usuarios');    

 }

 // verifica se existe cadastro com id passada
 $query = $this->usuarios_model->getUsuarioId($id);
 if ( !$query) {
    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, usuário não foi localizado, tente 
        novamente.</div>');
   redirect('usuarios');

  }

  // verifica se o usuário está logado
  if ( $query->email == $this->session->userdata('email')) {
    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, não é permitido mudar status de usuário logado no
   sistema.</div>');
  redirect('usuarios');
}

// mudar o status
$dados['ativo'] = 1;
$this->usuarios_model->doUpdate($dados, ['id' => $query->id]);
$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário foi ativado com sucesso!</div>');
redirect('usuarios');

}

public function inativo ($id=NULL){
  if ( !$id){
       $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, você deve passar um id de usuário.</div>');
       redirect('usuarios');    

  }
   // verifica se existe cadastro com id passada
 $query = $this->usuarios_model->getUsuarioId($id);
  if ( !$query) {
    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, usuário não foi localizado, tente 
        novamente.</div>');
   redirect('usuarios');

  }

  // verifica se o usuário está logado
  if ( $query->email == $this->session->userdata('email')) {
    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"> Erro, não é permitido mudar status de usuário logado no
   sistema.</div>');
  redirect('usuarios');
}

// mudar o status
$dados['ativo'] = 0;
$this->usuarios_model->doUpdate($dados, ['id' => $query->id]);
$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Usuário foi desativado com sucesso!</div>');
redirect('usuarios');


 
  }

}