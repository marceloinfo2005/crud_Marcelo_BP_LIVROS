<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="<?= $descricao ?>">
     <meta name="author" content="@marceloteixeira">
     <title><?= $titulo ?></title>
     <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style type="text/css">
        .img-livros {

            width: 100px
        }
    </style>

</head>     
<body>
   <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
        <div class="container">
            <a class="navbar-brand" href="#"><?=$titulo ?></a> 
        </div>   
   </nav>
     
   <div class="container">
       <h1 class="mt-3">Livros</h1>
       <hr />

      <?php foreach ($livros as $row) { ?>
          <div class="media mb-5 mt-5">
              <img class="d-flex mr-3 img-livros" src="<?= base_url('upload/'. $row->img ) ?>" alt=" $row->titulo ?>">
              <div class="media-body">
                  <h5 class="mt-0"><?= $row->titulo ?></h5>
                  <?= $row->resumo ?>
            </div> 
       </div>
       </hr>
      <?php } // fim do foreach ?>

</body>    
</html> 