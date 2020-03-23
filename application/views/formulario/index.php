<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
    <h1><?php echo $titulo ?></h1>

    <section class="row">
             
        <div class="col-4 col-sm-4"> 
          
            <?php
                echo form_open('site/enviar');

                   //INPUT EMAIL
                   echo '<div class="form-group">';
                   echo form_label('E-mail', 'id_email');
                   echo form_input(array('type' =>'text', 'class'=>'form-control', 'name' => 'email', 'id' => 'id_email', 'autocomple'=>'off'));
                   echo '</div>';


                   

                   //INPUT SENHA
                   echo '<div class="form-group">';
                   echo form_label('Senha', 'id_senha');
                   echo form_input(array('type' =>'password', 'class'=>'form-control', 'name' => 'senha', 'id' => 'id_senha', 'autocomple'=>'off'));                      
                   echo '</div>';

                   echo form_submit('submit', 'Logar', array('class'=>'btn btn-outline-success btn-block'));

                echo form_close();
            ?>

             </div> 
                      
    </section>    

</main>