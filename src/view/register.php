<form>
	<h1>Register</h1>

	<div class="inputs">
		<input type="text" placeholder="Username" required />
		<input type="password" placeholder="Password" id="password" required />
		<input type="password" placeholder="Confirm Password" id="confirm_password" required />
	</div>

	<p class="inscription">
		Already have an account ?
		<a href="login.php">Log in.</a>
	</p>

	<div align="center">
		<button type="submit">Register</button>
	</div>

	<script type="text/javascript">
	var password = document.getElementById("password");
	var confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords don't match");
	} else {
		confirm_password.setCustomValidity('');
	}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
	</script>
</form>

