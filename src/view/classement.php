<div class="container">
	<table>
		<caption>Scoreboard</caption>
		<tr>
			<th>Pseudo</th>
			<th>Score</th>
			<th>Nombre de parties joué</th>
		</tr>
		<?php
		foreach($data as $id){
			?>
		<tr>
			<td> <?php echo htmlentities($id['pseudo'])?></td>
			<td> <?php echo htmlentities($id['highscore'])?></td>
			<td> <?php echo htmlentities($id['nbparties'])?></td>
		</tr>
			<?php
		}
		?>
	</table>
</div>
