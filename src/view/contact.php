<?php
//afficher le msg d'erreur
if (isset($info)) { ?>
	<p class="request_message" style="color:<?= $color ?>">
		<?= $info ?>
	</p>
<?php
}
?>
<section id="contact">
	<div class="container">
		<div class="title">
			<h6>One Question ? Help ?</h6>
			<h3>Contact us !</h3>
		</div>
		<form action="sendEmail.php" method="POST">
			<input type="text" name="name" placeholder="Enter your name" required="">
			<input type="email" name="email" placeholder="Enter your email" required="">
			<input type="text" name="subject" placeholder="What's the subject" required="">
			<input type="text" name="number" placeholder="Enter your phone number" required="">
			<textarea name="message" placeholder="Enter your message"></textarea>
			<button type="submit">Send</button>
		</form>
	</div>
</section>