<link rel="stylesheet" href="../view/classement.css">
<DIV class="container">
<table>
<caption>Scoreboard</caption>
<tr>
	<th>Pseudo</th>
	<th>Score</th>

</tr>
<?php
foreach ($data as $id){
	?>
	<tr>
		<td> <?php echo htmlentities($id['pseudo'])?></td>
		<td> <?php echo htmlentities($id['highscore'])?></td>
	</tr>
	<?php
}
?>
</table>
</DIV>
