<?php
require_once '../models/userManager.php';
require_once '../models/helpers.php';
require_once  '../models/sanitization.php';
require_once  '../models/validation.php';
require_once  '../models/filter.php';
$errors = [];
$inputs = [];

if (is_post_request()) {

	$fields = [
        'username' => 'string | required | alphanumeric | between: 3, 25 | unique: users, username',
        'password' => 'string | required | secure',
        'password2' => 'string | required | same: password'
    ];
	$messages = [
        	'password2' => [
            	'required' => 'Please enter the password again',
            	'same' => 'The password does not match'
        	]];
	[$inputs, $errors] = filter($_POST, $fields, $messages);
	if ($errors) {
        	redirect_with('register.php', [
            	'inputs' => $inputs,
            	'errors' => $errors
        	]);
	}

    	if (UserManager::registerPlayer($inputs['username'], $inputs['password'])){
	redirect_with_message(
            'login.php',
            'Your account has been created successfully. Please login here.'
        );
	}
}

else if (is_get_request()) {
    [$inputs, $errors] = session_flash('inputs', 'errors');
}
?>
<form action="register.php" method="post">
	<h1>Register</h1>

	<div class="inputs">
		<input type="text" placeholder="Username" id="username" required />
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

	<script src="../script/passwordValidity.js"></script>
</form>
