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
         </div>    
    </section>       

    <section class="row">  
        <div class="col-12 col-sm-12">
            <?= form_open() ?>
                <div class="form-group">
                     <?= form_label('Titulo') ?>
                     <?= form_input( [
                         'type'         => 'text',
                         'class'        => 'form-control', 
                         'name'         => 'titulo',
                         'placeholder'  => 'Título do livro',
                         'value'        => $query->titulo
                     ] ) ?>
                </div>
                <div class="form-group">
                     <?= form_label('Autor') ?>
                     <?= form_input( [
                         'type'         => 'text',
                         'class'        => 'form-control', 
                         'name'         => 'autor',
                         'placeholder'  => 'Autor do livro',
                         'value'        => $query->autor
                     ] ) ?>
                <div class="form-group">
                     <?= form_label('Preço') ?>
                     <?= form_input( [
                         'type'         => 'text',
                         'class'        => 'form-control', 
                         'name'         => 'preco',
                         'placeholder'  => 'Preço do livro',
                         'value'        => $query->preco
                     ] ) ?>
                </div>

                <div class="form-group">
                     <?= form_label('Resumo') ?>
                     <?= form_textarea('resumo', $query->resumo, ['class' => 'form-control']); ?>
               </div>

               <div class="form-group">
                    <?= form_label('Ativo') ?>
                    <?= form_dropdown('ativo', [1 => 'SIM', 0 => 'NÃO'], ( $query->ativo == 1 ? 1 : 0 ), ['class' => 'form-control']);  ?>
               </div>
               <hr class="mt-5">
               <?= form_hidden('id_livro', $query->id); ?>
               <?= form_submit('submit', 'Atualizar livro', ['class' => 'btn btn-success mt-3 mb5' ]); ?>


            <?= form_close() ?>
        </div>    
    </section>    
</main>