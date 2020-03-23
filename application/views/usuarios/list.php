<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
   <h1><?php echo $titulo ?></h1>

   <section class="row mb-5">
       <div class="col-12 col-sm-12 text-right">       
            <?php
                echo anchor('usuarios/add', 'Add usuário', array('title' => 'Add usuário', 'class' => 'btn btn-success'));
            ?> 
       </div>
    </section>

    <div class"row">
        <div class="col-12 col-sm-12">
            <?= $this->session->userdata('msg'); ?>
    </div>
   <section class="row">
       <div class="col-12 col-sm-12"> 


       <table class="table" id="#table_ismweb_listar">
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
             <?= anchor('usuarios/edit/'.  $row->id, 'Editar', array('title' => 'Editar', 'class' => 'btn btn-primary')); ?>
             <?= anchor('usuarios/del/'.  $row->id, 'Apagar', array('title' => 'Apagar', 'class' => 'btn btn-danger')); ?>
             <?php if ($row->ativo ==1) { ?>
                   <?= anchor('usuarios/inativo/'.  $row->id, 'Desativar', array('title' => 'Desativar', 'class' => 'btn btn-info')); ?>
             <?php } else { ?>
              <?= anchor('usuarios/ativo/'.  $row->id, 'Ativar', array('title' => 'Ativar', 'class' => 'btn btn-info')); ?>
             <?php } ?>
         </td>
       </tr>
      <?php } // fim do foreach ?>
  </tbody>
</table>
       

        </div>
    </section>
</main>