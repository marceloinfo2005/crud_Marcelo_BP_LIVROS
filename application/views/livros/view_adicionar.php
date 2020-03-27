<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
     <h1><?= $titulo_pagina ?></h1>
   <section class="row mt-3 mb-3">
       <div class="col-12 col-sm-12">
             <?= anchor('livros', 'Voltar a lista livros', ['title' => 'Voltar a lista de livros', 'class' => 'btn btn-primary']) ?>
         </div>    
     </section> 

  <section class="row">
       <div class="col-12 col-sm-12">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->userdata('msg'); ?>
         </div>    
     </section>    

    <section class="row">  
        <div class="col-12 col-sm-12">
             <? class="form-group">
            <?= form_open_multipart() ?>
                <div class="form-group">
                     <?= form_label('Titulo') ?>
                     <?= form_input( [
                         'type'         => 'text',
                         'class'        => 'form-control', 
                         'name'         => 'titulo',
                         'placeholder'  => 'Título do livro',
                         'required'     => ''
                     ] ) ?>
                </div>
                <div class="form-group">
                     <?= form_label('Autor') ?>
                     <?= form_input( [
                         'type'         => 'text',
                         'class'        => 'form-control', 
                         'name'         => 'autor',
                         'placeholder'  => 'Autor do livro',
                         'required'     => ''
                     ] ) ?>
                </div>     
                <div class="form-group">
                     <?= form_label('Preço') ?>
                     <?= form_input( [
                         'type'         => 'text',
                         'class'        => 'form-control', 
                         'name'         => 'preco',
                         'placeholder'  => 'Preço do livro',
                         'required'     => ''
                     ] ) ?>
                </div>

                <div class="form-group">
                     <?= form_label('Resumo') ?>
                     <?= form_textarea('resumo', '', ['class' => 'form-control', 'required'    => '']); ?>
               </div>

               <div class="form-group">
                    <?= form_label('Ativo') ?>
                    <?= form_dropdown('ativo', [1 => 'SIM', 0 => 'NÃO'], 1, ['class' => 'form-control']);  ?>
               </div>    
                
               <div class="form-group">
                    <input type="file" name="foto_livro" class="foto-control" required="">
               </div>
               
               <hr class="mt-5">
               <?= form_submit('submit', 'Cadastrar livro', ['class' => 'btn btn-success mt-5 mb5']); ?>

            <?= form_close() ?>
        </div>    
    </section>    
</main>