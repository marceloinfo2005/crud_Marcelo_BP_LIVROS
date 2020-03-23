<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title><?php echo $titulo ?></title>
<!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

<!-- Custom styles for this template -->
    <link href="<?php echo base_url('dist/bootstrap/css/dashboard.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/login.css') ?>" rel="stylesheet">
</head>

<body>

     <div class="container">
       <?= $this->session->flashdata('erro_login'); ?>
     <form action="" class="form-signin" method="POST">
        <h2 class="form-signin-heading">Dados de acesso</h2>
        <label for="inputEmail" class="sr-only">E-Mail</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name= "senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
     </form>

</div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/
    EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('dist/bootstrap/js/bootsrap.min.js') ?>"></script>
</body> 
</html>