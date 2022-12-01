<?php
extract($data);
?>
<form class="container" action="_catalogue.php" method="post">
	<?php
	foreach ($category as $c) {
	?>
		<button type="submit" class="box" name="category" value=<?php echo $c["CategoryId"] ?>>
			<div class="content">
				<img src="../images/<?php echo $c["CategoryImg"]; ?>" alt="<?php echo $c["CategoryName"]; ?>">
				<p><?php echo $c["CategoryName"]; ?></p>
			</div>
		</button>
	<?php
	}
	?>
</form>