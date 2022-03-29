<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Curso internet avanzado</title>


  <!-- Bootstrap core CSS -->
  <link href="<?php URLROOT ?> /bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php URLROOT ?> /fontawesome/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
</head>

<body class="d-flex flex-column h-100">

  <header class="mt-3">
    <h1 class="container">Internet avanzado</h1>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand " href="<?= URLROOT ?>">Web ITCC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>"><i class="fa fa-home text-white"></i></a>
            </li>
            <li class="nav-item">
              <a class ="nav-link active" href="<?= URLROOT?>/alumnos">Alumnos</a>
            </li>

          </ul>
          <ul class="navbar-nav d-flex my-2 my-lg-0">
            <?php if (estalogeado()) { ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" ><?= $_SESSION['usuario_nombre']; ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>/usuarios/logout" ;>Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>/usuarios/login" ;>Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>/usuarios/registrar" ;>Registrar</a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </nav>

  </header>