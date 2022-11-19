<?php
require_once '../models/userManager.php';
require '../models/login.php';
require_once '../models/helpers.php';
require_once  '../models/sanitization.php';
require_once  '../models/validation.php';
require_once  '../models/filter.php';
?>


<?php if (isset($errors['login'])) : ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>

<form action="login.php" method="post">
	<h1>Log in</h1>
	<div class="inputs">
		<input type="text" placeholder="Username" required />
		<input type="password" placeholder="Password" required />
	</div>
	<p class="inscription">
		Not registered yet ?
		<a href="register.php">Register now.</a>
	</p>
	<div align="center">
		<button type="submit">Log in</button>
	</div>
</form>
