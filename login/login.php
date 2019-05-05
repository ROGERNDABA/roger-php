<?php 
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    if(!$_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
        http_response_code(403);
        header("Location: /public/error_pages/403.php");
        exit;
    }
} else {
    http_response_code(403);
    header("Location: /public/error_pages/");
    exit;
}
?>
<div class="row justify-content-center">
  <div class="col-sm-8">
    <div class="card">
      <div class="card-header">Login</div>
      <div class="card-body pt-1">
        <form id="login-form">
          <div class="form-row justify-content-center">
            <div class="form-group col-md-6 mb-0">
              <label for="username" class="col-form-label col-form-label-sm pt-0">Username</label>
              <input
                type="text"
                class="form-control form-control-sm"
                id="username"
                name="username"
                placeholder="Username"
              />
            </div>
            <div class="form-group col-md-6 mb-0">
              <label for="password" class="col-form-label col-form-label-sm pt-0">Password</label>
              <input
                type="password"
                class="form-control form-control-sm"
                id="password"
                placeholder="Password"
                name="password"
              />
            </div>
            <div class="form-group col-md-6 mt-4">
              <button type="submit" class="btn btn-sm btn-block">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#login-form input").on("focus", function() {
      $(this).parent().find("label").animate({
            opacity: 1
          }, 200);
    });
    $("input").focusout(function() {
      $("#login-form").find("label").animate({
            opacity: 0
          }, 200);
    });

    $("#login-form").submit(function (e) { 
      e.preventDefault();
      console.log( $( this ).serialize() );
    });
  });
</script>
