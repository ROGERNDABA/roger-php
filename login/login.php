<pre>
<?php
require("../config/init.php");

$db = new Init("GetSchwifty");
$g = new General();
$g->CheckRequest("XMLHttpRequest");


if ($db) {
  // print_r($db);
}
?>
</pre>
<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body pt-1">
				<div class="col-sm-12 px-0 pb-2 mx-auto">
        	<small>
						<ul  id="form-error" class="p-0 px-1">
						</ul>
					</small>
				</div>
				<form id="login-form">
					<div class="form-row justify-content-center">
						<div class="form-group col-md-8 mb-0">
							<label for="username" class="col-form-label col-form-label-sm pt-0">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
						</div>
						<div class="form-group col-md-8 mb-0">
							<label for="password" class="col-form-label col-form-label-sm pt-0">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password" />
						</div>
						<div class="form-group col-md-6 mt-4">
							<input type="submit" class="btn btn-block" value="Submit" name="submit" disabled="disabled" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		formValidator("#login-form", "#form-error");

		$("#login-form input").on("focus", function() {
			$(this).parent().find("label").animate({
						opacity: 1
					}, 200);
			// formValidator($(this), "#form-error")
		});
		$("input").focusout(function() {
			$("#login-form").find("label").animate({
						opacity: 0
					}, 200);
		});

		$("#login-form").submit(function(e) {
			e.preventDefault();
			console.log($(this).serializeObject());
		});
	});
</script>
