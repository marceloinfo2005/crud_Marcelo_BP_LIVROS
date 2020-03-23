<?php
     defined('BASEPATH') OR exit('No direct script access allowed');

     class Usuarios_model extends CI_Model {
        // funcao cadastrar
        public function doInsert($dados=NULL){

          if (is_array($dados)) {
              $this->db->insert('usuarios', $dados);
          }

        }
        // funcao para pegar um usuario pela sua id
        public function getUsuarioId($id=NULL){

          if ($id) {

             $this->db->where('id', $id);
             $this->db->limit(1);
             return $this->db->get('usuarios')->row();
        }
        
      }
        // para atualizar
        public function doUpdate($dados=NULL, $condicao=NULL){

            if (is_array($dados) && $condicao) {
                $this->db->update('usuarios', $dados, $condicao);
            }
          }


        // para listar os usuarios
        public function getUsuarios(){
          return $this->db->get('usuarios')->result();
      }
      
      // para apagar um usuário
      public function doDelete($condicao=NULL){
        
        if ($condicao) {
           $this->db->delete('usuarios', $condicao);
           return true;
        } else {
              return false;
        }

      }   
  }