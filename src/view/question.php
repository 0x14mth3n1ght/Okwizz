<div class="info_box">
	<p> Bonjour <?php echo htmlspecialchars($_SESSION["name"]); ?>: <?php echo $_SESSION["score"]; ?>pts. </p>
	<div class="info_title">
		<p><?php echo $data['info_question']["question"]; ?></p>
	</div>
	<h1 id="chrono"></h1>
	<script src="../script/chrono.js"></script>
	<form action="../public/questionController.php" method="post">
		<div class="info_list">
			<?php
			foreach($data['info_question']["answers"] as $a){
				?>
				<div class="info">
					<input type="radio" id="<?php echo $a; ?>" name="choix" value="<?php echo $a; ?>" required>
					<label for="<?php echo $a; ?>"><?php echo $a; ?></label>
				</div>
				<?php
			}
			?>
		</div>
		<?php
		if(!isset($data['choix'])){
			?>
			<div class="buttons">
				<button type="submit">Envoyer la réponse</button>
			</div>
			<?php
		}
		?>
	</form>
	<form action="../public/index.php" method="post">
		<div class="buttons">
			<button type="submit">Main Menu</button>
		</div>
	</form>
</div>
