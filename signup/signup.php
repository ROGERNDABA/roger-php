<pre>
<?php
require("../config/init.php");

$db = new Init("GetSchwifty");
$g = new General();
$g->CheckRequest("XMLHttpRequest");

if (isset($_POST["submit"]) && $_POST["submit"] == "ok") {
	echo "ff";
}
?>
</pre>
<div class="row justify-content-center">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">Login</div>
			<div class="card-body pt-1">
				<div class="col-sm-12 px-0 pb-2 mx-auto">
        	<small>
						<ul  id="form-error" class="p-0 px-1">
						</ul>
					</small>
				</div>
				<form id="signup-form">
					<div class="form-row justify-content-center">
						<div class="form-group col-md-6 mb-0">
							<label for="username" class="col-form-label col-form-label-sm">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="email" class="col-form-label col-form-label-sm">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="firstname" class="col-form-label col-form-label-sm">Firstname</label>
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="lastname" class="col-form-label col-form-label-sm">Lastname</label>
							<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="password1" class="col-form-label col-form-label-sm">Password</label>
							<input type="password" class="form-control" id="password1" placeholder="Password" name="password1" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="password2" class="col-form-label col-form-label-sm">Confirm Password</label>
							<input type="password" class="form-control" id="password2" placeholder="Cornfirm Password" name="password2" />
						</div>
						<div class="form-group col-md-6 mt-4">
							<input type="submit" class="btn btn-block disabled" value="Submit" name="submit" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		formValidator("#signup-form", "#form-error");

		$("#signup-form input").on("input", function() {
			$(this).parent().find("label").animate({
						opacity: 1
					},200);
		});
		$("input").focusout(function() {
			$("#signup-form").find("label").animate({
						opacity: 0
					},200);
		});

		$("#signup-form").submit(function(e) {
			e.preventDefault();
			console.log($(this).serializeObject());
		});
	});
</script>
