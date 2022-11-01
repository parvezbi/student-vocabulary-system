<?php
  include"../inc/db.php";
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location:../index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Saifurs - Student Vocabulary</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png'/>
</head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
              <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"><i data-feather="align-justify"></i>
              </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown">
            <div class="dropdown-title"></div>
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <span style="color: black;"><?php echo $_SESSION['name']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <a href="profile.php" class="dropdown-item has-icon">Profile</a> 
              <a href="logout.php" class="dropdown-item has-icon text-danger">Logout</a>
            </div>
          </li>
        </ul>
      </nav>