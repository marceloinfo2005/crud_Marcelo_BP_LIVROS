<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    function formataDataBr($data=NULL)
    {

        /*
            FORMATO DO BANCO DE DADOS => 2020-02-27
            FORMATO BRASIL            => 27-02-2020  
        */
        
        if ($data) {

           //SEPARA A DATA EM 3 PARTES
           $data_funcao = explode("-", $data);

           /*
              $data_funcao[0] = 2020;
              $data_funcao[1] = 02;
              $data_funcao[2] = 27;
            */
            
             //retorno a data pronto dia/mes/ano
             return $data_funcao[2] .'/'. $data_funcao[1] .'/'. $data_funcao[0];


        }

    } 

    function formataMoeda($valor=NULL)
    {
       
        /* 
            $valor = 10.00

        */ 

         if ($valor)  {

             //retorno o valor R$ 10,00
             return 'R$'.number_format($valor, 2, ',', '.');


         }



    } 