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

  $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    function meter(input) {
      var level = 0;
      level += (input.length > 6) ? 1 : 0;
      level += /[!@#$%^&*?_~]{1,}/.test(input) ? 1 : 0;
      level += /[a-z]{2,}/.test(input) ? 1 : 0;
      level += /[A-Z]{1,}/.test(input) ? 1 : 0;
      level += /[0-9]{1,}/.test(input) ? 1 : 0;
      return level;
    }

    function formValidator(form, error) {
      $(form).on("input", function() {
        $(error).html("");
        var nameRegex =  /^[a-zA-Z]'?[-a-zA-Z]+$/;
        var usernameRegex =  /^[a-zA-Z0-9_]+$/;
        var emailRegex =  /^[A-Za-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{1,4}[^\\S]+$/;
        var track = 0;
        $(this).find("input[name]").each(function(){
          var inputName = $(this).attr("name").trim();
          var inputVal = $(this).val();
          if((inputName == "firstname" || inputName == "lastname") && inputVal&& !nameRegex.test(inputVal))
            $(error).append($("<li></li>").html("Only A-Z, a-z, - and ' allowed on "+inputName));
          else if((inputName == "username") && inputVal&& !usernameRegex.test(inputVal))
            $(error).append($("<li></li>").html("Only A-Z, a-z, 0-9 and _ allowed "+inputName));
          else if((inputName == "email") && inputVal&& !emailRegex.test(inputVal))
            $(error).append($("<li></li>").html("Formart should be example@domain.com"));
          else if (inputName == "password1") {
            meterVal = meter(inputVal);
            $(".meter-bar").stop();
            $(".meter-bar").animate({
              width: ((meterVal/5)*100)+"%"
            }, 300);
          }
          else if ((inputName == "password2") && inputVal) {
            if (meterVal < 4)
              $(error).append($("<li></li>").html("Password too weak"));
            if (inputVal != $("input[name='password1']").val())
              $(error).append($("<li></li>").html("Passwords don't match"));
          }
          if (!inputVal) track++;
        })
        if (track == 0 && !$(error).html().trim()) {
          $("input[type='submit']").removeClass("disabled")
          $("input[type='submit']").removeAttr("disabled");
        } else { 
          $("input[type='submit']").addClass("disabled")
          $("input[type='submit']").attr("disabled", "disabled")
        }
      });
    };
  
  

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