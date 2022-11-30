<?php
require_once '../models/Session.php';

Session::redirectLog();
?>

<form action="doregister.php" method="post">
	<h1>Register</h1>

	<div class="inputs">
		<input type="text" name="pseudo" placeholder="Username" id="username" required />
		<input type="password" name="passwd" placeholder="Password" id="password" required />
		<input type="password" name="passwd_verify" placeholder="Confirm Password" id="confirm_password" required />
	</div>
	<p class="inscription">
		Already have an account ?
		<a href="login.php">Log in.</a>
	</p>
	<div>
		<button type="submit">Register</button>
	</div>
	<script src="../script/passwordValidity.js"></script>
</form>