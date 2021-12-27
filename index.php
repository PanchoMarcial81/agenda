

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=" Jairo Galeas">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Agenda de Contantos Personal</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom styles for this template -->

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Agenda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Redes Sociales</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Yoputube</a>
              <a class="dropdown-item" href="#">Facebook </a>
              <a class="dropdown-item" href="#">Twitter </a>
              <a class="dropdown-item" href="#">Instagram</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="buscar" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </nav>

    <div  class="container">
      <h1 class="page-header text-center">Agenda de contacto Personal</h1>
      <div class="row">
        <div class="col-sm-12">  
          <a href="#addNew" class="btn btn-primary" data-toggle="modal" ><span class="fa fa-plus"></span> Nuevo</a>
          <?php 
            session_start();
            if (isset($_SESSION['menssage'])) {
              ?>
              <div class="alert alert-dismissible alert-success" style="margin-top: 20px;">
                <button type="button" class="close" data-dismiss="alert" >
                  &times;
                </button>
                <?php echo $_SESSION['menssage']; ?>
              </div>
              <?php
              unset($_SESSION['message']);
            }
          ?>
          <table class="table table-bordered table-striped" style="margin-top:20px; " >
            <thead>
              <th>ID</th>
              <th>NOMBRE DE CONTACTO</th>
              <th>CELULAR</th>
              <th>CORREO</th>
              <th>DIRECCION</th>
              <th>ACCIONES</th>
            </thead>
            <tbody>
              <?php 
                include_once('conexion.php');
                $database = new ConectarDB();
                $db = $database->open();
                try{
                  $sql = 'SELECT * FROM personas';
                  foreach ($db->query($sql) as $row) {
                    ?>
                    <tr>
                      <td><?php echo $row['idPersona']; ?></td>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><?php echo $row['telefono']; ?></td>
                      <td><?php echo $row['correo']; ?></td>
                      <td><?php echo $row['direccion']; ?></td>
                      <td>
                        <a href="#edit_<?php echo $row['idPersona']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span></a>
                        <a href="#delete_<?php echo $row['idPersona']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span></a>
                    </tr>
                    <?php
                  }
                } catch (PDOException $e){
                  echo 'Hay problemas con la conexion : '.$e->getMessage();
                }
                $database->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.container -->
    <?php 
      include('addModal.php');

    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

