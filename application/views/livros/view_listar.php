<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
     <h1><?= $titulo_pagina ?></h1>
     <section class="row mb-5">
        <div class="col-12 col-sm-12 text-right">       
            <?= anchor('livros/adicionar', 'Novo livro', array('title' => 'Novo livro', 'class' => 'btn btn-success')); ?>
        </div>
         </section>
         <section class="row">
           <div class="col-12 col-sm-12">
           <?= $this->session->userdata('msg') ?>
           </div>
       </section>
       <section class ="row">
         <div class="col-12 col-sm-12">
              <table class="table" id="table_ismweb_listar">
                <thead>
                   <tr>
                     <th class="col-1">Imagem</th>
                     <th class="col-4">Titulo</th>
                     <th class="col-3">Autor</th>
                     <th class="col-1 text-right">Preço</th>
                     <th class="col-1 text-center">Status</th>
                     <th class="col-2 text-right">Ações</th>
                  </tr>
               </thead>
                <tbody>
                    <?php foreach ($livros as $l) { ?>
                  <tr>
                     <th scope="row"><img src="<?= base_url('upload/'. $l->img ) ?>" alt=" <?= $l->titulo ?>" class="img-fluid"></th>


                     <td><?= $l->titulo ?></td>
                     <td><?= $l->autor ?></td>
                    <td class="text-right"><?= $l->preco ?></td>
                    <td class="text-center"><?= ($l->ativo == 1 ? '<span class="badge badge-success">Ativos</span>' : '<span 
                        class="badge badge-danger">Inativo</span>') ?></td>
                    <td class="text-right">
                          <?= anchor('livros/editar/'. $l->id, '<i class="fa fa-pencil"></i>'
                                , ['title' => 'Editar', 'class' => 'btn btn-primary btn-sm']) ?>
                          <?= anchor('livros/apagar/'. $l->id, '<i class="fa fa-trash-o"></i>'
                                , ['title' => 'Apagar', 'class' => 'btn btn-danger btn-sm']) ?>
                        <?php if ($l->ativo == 1 ) { ?>
                          <?= anchor('livros/desativar/'. $l->id, '<i class="fa fa-times"></i>'
                          , ['title' => 'Desativar', 'class' => 'btn btn-primary btn-sm']) ?>
                        <?php } else { ?>
                          <?= anchor('livros/ativar/'. $l->id, '<i class="fa fa-check"></i>'
                          , ['title' => 'Ativar', 'class' => 'btn btn-success btn-sm']) ?>
                        <?php } // fim do if do botão mudar status ?>
                    </td>
             </tr>
          <?php  }  // fim do foreach ?>
           </tbody>
         </table>
       </div>    
    </section>    
</main>