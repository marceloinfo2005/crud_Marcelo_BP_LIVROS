<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <h1><?= $titulo_pagina ?></h1>

    <div class="row mt-5 mb-5">
        <div class="col-12 col-sm-12">
            <?= anchor('usuarios', 'Voltar lista de usuários', array('title' => 'Voltar lista de usuários', 'class' => 'btn btn-primary')); ?>
            </div>
    </div>

    <div class="row">
         
        <div class="col-12 col-sm-12">
           
       <?php
           echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); 
       ?>    

    </div>   
     
</div>

<section class="row">
    <div class="col-4 col-sm-4">
         
        <?php          
          echo form_open();
                  
                //INPUT NOME
                echo '<div class="form-group">';
                echo form_label('Nome', 'id_nome');
                echo form_input(array('type' =>'text', 'class'=>'form-control', 'name' =>'nome', 'id'=>'id_nome', 'autocomple'=>
                     'off', 'placeholde'=>'Nome', 'value' => $query->nome));
                echo '</div>';
                                
                //INPUT EMAIL
                echo '<div class="form-group">';
                echo form_label('E-mail', 'id_email');
                echo form_input(array('type'=>'text', 'value' => $query->email,'class'=>'form-control', 'name' => 'email', 'id' => 'id_email',
                    'autocomple'=>'off'));
                echo '</div>';

                echo form_hidden('id', $query->id);
                echo form_submit('submit', 'Cadastrar', array('class'=>'btn btn-outline-success'));

              echo form_close();
            ?>

             </div>    
                  
    </section>    