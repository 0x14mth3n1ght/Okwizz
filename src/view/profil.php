<?php
extract($data);
?>

<div class="card">
	<div class="ds-top"></div>
	<div class="avatar-holder">
		<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1820405/profile/profile-512.jpg?1533058950" alt="Albert Einstein">
	</div>
	<div class="name">
		<a href="#"><?php echo htmlentities($pseudo) ?></a>
		<!-- <h6 title="Followers">
			<i class="fas fa-users"></i>
			<span class="followers">90</span>
		</h6> -->
	</div>
	<div class="button">
		<a href="../public/questionController.php" class="btn" onmousedown="follow();">Play</a>
	</div>
	<div class="ds-info">
		<div class="ds pens">
			<h6 title="Nombre de points">HighScore</h6>
			<p><?php echo htmlentities($highscore) ?></p>
		</div>
		<div class="ds projects">
			<h6 title="Nombre de parties">Games played</h6>
			<p><?php echo htmlentities($nbparties) ?></p>
		</div>
	</div>
	<!-- <div class="ds-skill">
		<h6>Categories</h6>
		<div class="skill html">
			<h6>Culture General</h6>
			<div class="bar bar-html">
				<p>95%</p>
			</div>
		</div>
		<div class="skill css">
			<h6>Countries</h6>
			<div class="bar bar-css">
				<p>90%</p>
			</div>
		</div>
		<div class="skill javascript">
			<h6>Science</h6>
			<div class="bar bar-js">
				<p>75%</p>
			</div>
		</div>
	</div> -->
</div>