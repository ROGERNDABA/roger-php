<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
// $servername = "localhost";
// $username = "root";
// $password = "Rootroot2%";

// try {
//     $conn = new PDO("mysql:host=$servername;", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// }
// catch(PDOException $e) {
//     // echo "Connection failed: " . $e->getMessage();
// }

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <!-- Boostrap 4.3 -->
  <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.css">
  <!-- Fontawesome 5 Free -->
  <link rel="stylesheet" href="/public/fontawesome/css/all.css">
  <link rel="stylesheet" href="/public/css/style.css">
  <script src="/public/js/jquery.js"></script>
  <script src="/public/bootstrap/js/bootstrap.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg r-shadow">
    <a class="navbar-brand" href="#"><img width="50" class="d-inline-block align-top" src="https://seeklogo.com/images/M/marvel-comics-logo-31D9B4C7FB-seeklogo.com.png" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup">Sign Up</a>
        </li>
      </ul>
  </nav>
  <div class="root">
    <div class="container mt-3"></div>
    <div id="loader">
      <div class="spinner"><i class="fas fa-spinner fa-spin"></i></div>
    </div>
  </div>
</body>
<script>
  function resolveUrl(url) {
    var path = url.replace(/\//gi, '').trim();
    if (path) {
      $(".container").load("/" + path + "/" + path + ".php");
      return path;
    } else {
      $(".container").load("/home/home.php");
    }
  }

  function resolveActiveTab(pathName) {
    $(".nav-item").removeClass("active");
    if (pathName) {
      $("li > a[href='" + pathName + "']").parent().addClass("active");
    } else {
      $("li > a").first().parent().addClass("active");
    }
  }
  

  $(document).ready(function () {
    var currentPath = resolveUrl(window.location.pathname);
    resolveActiveTab(currentPath)

    $(document).ajaxStart(function () {
      $("#loader").css({
        "display": "block"
      });
    })
    $(document).ajaxStop(function () {
      $("#loader").css({
        "display": "none"
      });
    })

    $('.nav-link').click(function (e) {
      e.preventDefault();
      var path = $(this).attr("href");

      $(".container").load("/" + path + "/" + path + ".php");
      resolveActiveTab(path)
      window.history.pushState("", "", "/" + path +"/");
    })

  })
</script>

</html>