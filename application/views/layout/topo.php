<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="">
  <title><?= $titulo_site ?></title>

<!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<!-- Custom styles for this template -->
  <link href="<?php echo base_url('dist/bootstrap/css/dashboard.css') ?>" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <style type="text/css">

     .m-topo {
       margin-top: 20px; 
     }

     .hide {
       display: none;
     }

    </style>
</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">L I V R A R I A</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">

          <?php
              echo anchor('livros', 'Listar livros', array('title' => 'Listar livros', 'class' => 'nav-link'));
            ?>
            </li>
            <li class="nav-item">

            <?php
              echo anchor('usuarios', 'Listar usuários', array('title' => 'Listar usuários', 'class' => 'nav-link'));
            ?>
           </li>     
            <li class="nav-item">

            <?php
              echo anchor('login/sair', 'Sair', array('title' => 'Sair', 'class' => 'nav-link'));
            ?>
           </li>     
            <li class="nav-item">

          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
        <!----  <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>  ---->
        </form>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <?php
              echo anchor('livros', 'Listar livros', array('title' => 'Listar livros', 'class' => 'nav-link'));
            ?>       
            </li>
            <li class="nav-item">
            <?php
              echo anchor('usuarios', 'Listar usuários', array('title' => 'Listar usuários', 'class' => 'nav-link'));
            ?>
            <?php
              echo anchor('login/sair', 'Sair', array('title' => 'Sair', 'class' => 'nav-link'));
            ?>   
         </li>        
        </ul>
      </nav>