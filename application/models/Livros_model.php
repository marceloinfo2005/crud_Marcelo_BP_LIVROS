<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Livros_model extends CI_Model {

   // LISTAR TODOS OS LIVROS CADASTRADOS
   public function listarLivros(){
       return $this->db->get('livros')->result();

   }

   // CADASTRAR LIVROS
   public function cadastrarLivro($dados=NULL){
       if (is_array($dados)) {
           $this->db->insert('livros', $dados);
       }
   }


   // PEGAR DETERMINADO LIVRO PELA ID
   public function pegaLivroID($id=NULL){
       if ($id) {
           $this->db->where('id', $id);
           $this->db->limit(1);
           return $this->db->get('livros')->row();
       }
   }

   // ATUALIZAR LIVRO
   public function atualizaLivro($dados=NULL, $condicao=NULL){
      if (is_array($dados) && is_array ($condicao)){
         $this->db->update('livros', $dados, $condicao);

       }

   }
   // APAGAR UM LIVRO
  public function apagarLivro($id=NULL){
      if ($id) {
          $this->db->delete('livros', ['id' => $id]);

      }


  }


  }