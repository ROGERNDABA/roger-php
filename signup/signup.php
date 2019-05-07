<?php
require("../config/init.php");

$g = new General();
$g->CheckRequest("xmlhttpRequest");
if (isset($_POST["submit"]) && $_POST["submit"] == "ok") {
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password1 = $_POST["password"];
	$password2 = $_POST["password2"];
	$db = new Init("GetSchwifty");
	if ($db) {
		if (!trim($firstname) || !preg_match('/^[a-zA-Z]\'?[-a-zA-Z]+$/', $firstname)) {
			echo $firstname;
		}
		if (!trim($lastname) || !preg_match('/^[a-zA-Z]\'?[-a-zA-Z]+$/', $lastname)) {
			echo $lastname;
		}
		
	} 
	exit;
}
?>
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
							<label for="username" class="col-form-label col-form-label-sm pb-0">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="email" class="col-form-label col-form-label-sm pb-0">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="firstname" class="col-form-label col-form-label-sm pb-0">Firstname</label>
							<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="lastname" class="col-form-label col-form-label-sm pb-0">Lastname</label>
							<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" />
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="password1" class="col-form-label col-form-label-sm pb-0">Password</label>
							<input type="password" class="form-control" id="password1" placeholder="Password" name="password1" />
							<div class="meter form-text">
								<div class="meter-bar">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="5px" >
										<defs> 
										<linearGradient id="lgrad" x1="0%" y1="50%" x2="100%" y2="50%" > 
										<stop offset="0%" style="stop-color:rgb(255,0,0);stop-opacity:1" />
										<stop offset="49%" style="stop-color:rgb(255,245,59);stop-opacity:1" />
										<stop offset="100%" style="stop-color:rgb(0,255,38);stop-opacity:1" />
										</linearGradient> 
										</defs>
										<rect x="0" y="0" width="100%" height="100%" fill="url(#lgrad)"/>
										</svg>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6 mb-0">
							<label for="password2" class="col-form-label col-form-label-sm pb-0">Confirm Password</label>
							<input type="password" class="form-control" id="password2" placeholder="Cornfirm Password" name="password2" />
						</div>
						<div class="form-group col-md-6 mt-4">
							<input type="submit" class="btn btn-block disabled" disabled="disabled" value="Submit" name="submit" />
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
			var formData = $(this).serializeObject();
			formData["submit"] = "ok";
			$.ajax({
				type: "POST",
				url: "/signup/signup.php",
				data: formData,
				success: function (response) {
					$(".container").prepend(response)
					console.log(response)
				}
			});
		});
	});
</script>
