<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>ADMIN</title>
    <!-- Favicon-->
    <link rel="icon" href="" type="image/x-icon">
    <!-- Materialize icons -->
    <link type="text/css" rel="stylesheet" href="<?= base_url('materialize/css/icon.css'); ?>" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome Icons https://fontawesome.com/icons?d=gallery&s=solid&m=free -->
    <link type="text/css" rel="stylesheet" href="<?= base_url('materialize/css/fontawesomeicons_all.min.css'); ?>">
     <!-- Materialize CSS (http://materializecss.com/)-->
    <link type="text/css" rel="stylesheet" href="<?= base_url('materialize/css/materialize.min.css'); ?>" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url('materialize/css/main.css'); ?>" media="screen,projection"/>
    <!-- Import Scripts-->
    <!-- jQuery (http://api.jquery.com/)-->
    <script type="text/javascript" src="<?= base_url('materialize/js/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Materialize js-->
    <script type="text/javascript" src="<?= base_url('materialize/js/materialize.min.js'); ?>"></script>
    <!-- Sweetalert (https://sweetalert.js.org/)-->
    <script type="text/javascript" src="<?= base_url('materialize/js/sweetalert.min.js'); ?>"></script>
    <!-- estilos del menu -->
    <?php if ($menu): ?>
    <style type="text/css">
      /* controla los estilos del sidenav */
      header, main, footer {
        padding-left: 300px;
        background-color: #f5f5f5; /* Color en el body */
      }

      @media only screen and (max-width : 992px) {
        header, main, footer {
          padding-left: 0;
        }
      }

      nav {
        padding-right: 300px;
      }

      @media only screen and (max-width : 992px) {
        nav {
          padding-right: 0px;
        }
      }

      main {
        margin-top: 0px;
      }
    </style>
    <?php endif; ?>
    <!-- fin -->
</head>

<body>
  <!-- Loader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- /Loader -->
<header>
  <div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper blue-grey lighten-5">
          <a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only <?= $menu? 'show': 'hide' ?>"><i class="material-icons color-sipaa">menu</i></a>

          <ul class="left <?= $menu? 'show': 'hide' ?>">
            <li><div class="hide-on-small-only logo-sipaa"><img src="https://placehold.it/250x250"></div></li>
            <li><div class="hide-on-med-and-up logo-sipaa-resp"><img src="https://placehold.it/250x250"></div></li>
          </ul>

          <ul class="right">
            <!-- Dropdown Trigger -->
            <li><font class="hide-on-med-and-down color-sipaa">Sistema de Administración</font></li>
            <li><font class="hide-on-large-only color-sipaa">Admin</font></li>
            <li><a class="dropdown-button" href="#" data-activates="dropdown1"><i class="material-icons color-sipaa">more_vert</i></a></li>
          </ul>

        </div>
    </nav>
  </div>  
  <!-- Dropdown del botón superior der. -->
  <?php if ($menu): ?>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!" style="color: #0052A2 !important;"><i class="material-icons">person</i>Perfil</a></li>
      <li class="divider"></li>
      <li><a href="<?= base_url('welcome/logout/1'); ?>" style="color: #0052A2 !important;"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
    </ul>
  <?php else: ?>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!" style="color: #0052A2 !important;"><i class="material-icons">info</i>Acerca de</a></li>
    </ul>
  <?php endif; ?>
  <!-- menu lateral -->
  <?php if ($menu): ?>
  <ul id="slide-out" class="side-nav fixed <?= $menu? 'show': 'hide' ?>" id="mobile-demo">
    <li><div class="user-view">
      <div class="background">
        <img src="<?= base_url('materialize/img/commons/office.jpg'); ?>">
      </div>
      <a href="#!user"><img class="circle" src="<?= base_url('materialize/img/commons/user.jpg'); ?>"></a>
      <a href="#!name"><span class="white-text name"><?= $this->session->userdata('username'); ?></span></a>
      <a href="#!email"><span class="white-text email"><?= $this->session->userdata('email'); ?></span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <?php endif; ?>
</header>
