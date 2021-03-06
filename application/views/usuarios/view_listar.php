<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
   <h1><?php echo $titulo_pagina ?></h1>

   <section class="row mb-5">
       <div class="col-12 col-sm-12 text-right">       
            <?php
                echo anchor('usuarios/adicionar', 'Novo usuário', array('title' => 'Novo usuário', 'class' => 'btn btn-success'));
            ?> 
       </div>
    </section>

        <div class="col-12 col-sm-12">
            <?= $this->session->userdata('msg'); ?>
    </div>
   <section class="row">
       <div class="col-12 col-sm-12"> 


       <table class="table" id="table_ismweb_listar">
          <thead>
             <tr>
               <th>Nome</th>
               <th>E-mail</th>
               <th class="text-left">Ativo</th>
               <th class="text-center">Ações</th>
           </tr>
  </thead>
  <tbody>
<?php foreach ($usuarios as $row) { ?>
    <tr>
       <th scope="row"><?= $row->nome ?> </th>
       <td><?= $row->email ?></td>
       <td>
           <?= ($row->ativo == 1 ? '<span class="badge badge-success">Ativos</span>' : '<span class="badge 
                badge-danger">Inativo</span>') ?>
      </td>
       <td class="text-right">
             <?= anchor('usuarios/editar/'.  $row->id,'<i class="fa fa-pencil"></i>' , array('title' => 'Editar', 'class' => 'btn btn-primary btn-sm')); ?>
             <?= anchor('usuarios/apagar/'.  $row->id,'<i class="fa fa-trash-o"></i>', array('title' => 'Apagar', 'class' => "btn btn-danger btn-sm", 'onclick'=> 'return confirm(\'Tem certeza de deseja deletar o usuário?\')')); ?>
             <?php if ($row->ativo ==1) { ?>
                   <?= anchor('usuarios/inativo/'.  $row->id, '<i class="fa fa-times"></i>', array('title' => 'Desativar', 'class' => 'btn btn-info btn-sm')); ?>
             <?php } else { ?>
              <?= anchor('usuarios/ativo/'.  $row->id, '<i class="fa fa-check"></i>', array('title' => 'Ativar', 'class' => 'btn btn-success btn-sm')); ?>
             <?php } ?>
         </td>
       </tr>
      <?php } // fim do foreach ?>
  </tbody>
</table>
       

        </div>
    </section>
</main>