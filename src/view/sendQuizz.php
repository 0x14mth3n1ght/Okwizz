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
			<h3>Send us your own O'QUIZZ</h3>
			<!-- <h3>Contact us !</h3> -->
		</div>

		<form action="_sendQuizz.php" method="POST">

			<input type="text" name="title" placeholder="Your quizz title" required="">
			<div>
				<h3>Question 1</h3>
				<textarea name="question1" placeholder="Enter your question"></textarea>

				<input type="text" name="prop1_1" placeholder="CORRECT answer" required="">
				<input type="test" name="prop1_2" placeholder="WRONG answer" required="">
				<input type="text" name="prop1_3" placeholder="WRONG answer" required="">
				<input type="text" name="prop1_4" placeholder="WRONG answer" required="">

				<h3>Question 2</h3>
				<textarea name="question2" placeholder="Enter your question"></textarea>

				<input type="text" name="prop2_1" placeholder="CORRECT answer" required="">
				<input type="test" name="prop2_2" placeholder="WRONG answer" required="">
				<input type="text" name="prop2_3" placeholder="WRONG answer" required="">
				<input type="text" name="prop2_4" placeholder="WRONG answer" required="">

				<h3>Question 3</h3>
				<textarea name="question3" placeholder="Enter your question"></textarea>

				<input type="text" name="prop3_1" placeholder="CORRECT answer" required="">
				<input type="test" name="prop3_2" placeholder="WRONG answer" required="">
				<input type="text" name="prop3_3" placeholder="WRONG answer" required="">
				<input type="text" name="prop3_4" placeholder="WRONG answer" required="">


				<h3>Question 4</h3>
				<textarea name="question4" placeholder="Enter your question"></textarea>

				<input type="text" name="prop4_1" placeholder="CORRECT answer" required="">
				<input type="test" name="prop4_2" placeholder="WRONG answer" required="">
				<input type="text" name="prop4_3" placeholder="WRONG answer" required="">
				<input type="text" name="prop4_4" placeholder="WRONG answer" required="">


				<h3>Question 5</h3>
				<textarea name="question5" placeholder="Enter your question"></textarea>

				<input type="text" name="prop5_1" placeholder="CORRECT answer" required="">
				<input type="test" name="prop5_2" placeholder="WRONG answer" required="">
				<input type="text" name="prop5_3" placeholder="WRONG answer" required="">
				<input type="text" name="prop5_4" placeholder="WRONG answer" required="">

			</div>
			<button type="submit">Send</button>

		</form>
	</div>
</section>