<?php
extract($data);
?>
<form class="container" action="_difficulty.php" method="post">
	<input type="hidden" name="category" value="<?php echo $category; ?>">
	<?php
	foreach ($difficultes as $d) {
	?>
		<button type="submit" class="box" name="difficulty" value=<?php echo $d["DifficulteName"] ?>>
			<div class="content">
				<img src="../images/<?php echo $d["DifficulteImg"]; ?>" alt="<?php echo $d["DifficulteName"]; ?>">
				<p><?php echo $d["DifficulteName"]; ?></p>
			</div>
		</button>
	<?php
	}
	?>
</form>