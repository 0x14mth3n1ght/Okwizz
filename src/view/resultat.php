<?php
extract($data);
?>

<div class="info_box">
	<p>
		Hi , <?php echo htmlentities($pseudo); ?> !
	</p>

	<div>
		<p>
			Your score: <?php echo $score ?>
		</p>
		<p>
			Your highest Score: <?php echo $hscore ?>
		</p>
	</div>

	<form action="../public/index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
	<form action="../public/classement.php" method="post">
		<div class="buttons">
			<button type="submit">Ranking</button>
		</div>
        </form>
	<form action="../public/review.php" method="post">
        <div class="buttons">
                <button type="submit">Review</button>
        </div>
	</form>
</div>