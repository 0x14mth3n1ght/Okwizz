<div class="info_box">
	<!-- <label for="name">Pseudo :</label> -->
	<div class="info_title">
		<h2>Rules of the game</h2>
	</div>

	<div class="info_list">
		<div class="info">1. Answer the following questions by ticking the correct answers, then click on "validate".</div>
		<div class="info">2. You have 30 seconds to answer each question</div>
		<div class="info">3. The faster you answer, the more points you get!</div>
		<!-- <div class="info">4. Règle n°4</div> -->
	</div>

	<form action="../public/_noaccountlogin.php" method="post">
		<div class="wrapper">
			<div class="input-data">
				<input id="name" name="pseudo" type="text">
				<div class="underline"></div>
				<label>Pseudo</label>
			</div>
		</div>
		<div class="buttons">
			<button type="submit" class="restart">Confirm</button>
		</div>
	</form>
	<form action="catalogue.php" method="post">
		<div class="buttons">
			<button type="submit" class="restart">Start</button>
		</div>
	</form>
</div>