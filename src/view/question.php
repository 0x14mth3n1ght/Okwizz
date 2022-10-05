<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/home.css">
</head>
<body>

<?php
session_start();
extract($_POST);
if(isset($name)){
	$_SESSION["name"] = $name;
	$_SESSION["question_id"] = 0;
	$_SESSION["score"] = 0;
}
$questions = array(
		[ "question" => "Combien de jours il y a-t-il dans une semaine ?",
				"awnsers" => array("7", "4", "1", "8"),
				"correct_awnser" => "7"
		],
		[ "question" => "Combien de jours il y a-t-il dans une année ?",
				"awnsers" => array("245", "365", "456", "0"),
				"correct_awnser" => "365"
		],
		[ "question" => "Combien de semaines il y a-t-il dans une année ?",
				"awnsers" => array("52", "67", "34", "89"),
				"correct_awnser" => "52"
		],
		[ "question" => "De quelle couleur est le ciel ?",
				"awnsers" => array("bleu", "rouge", "vert", "jaune"),
				"correct_awnser" => "bleu"
		],
		[ "question" => "Qui est le président des États-Unis ?",
				"awnsers" => array("Obama", "Biden", "Vous", "Willy"),
				"correct_awnser" => "Biden"
		],
		[ "question" => "Combien de côtés possède un triangle ?",
				"awnsers" => array("3", "5", "2", "9"),
				"correct_awnser" => "3"
		],
		[ "question" => "Quel est le premier élément du tableau de la classification périodique ?",
				"awnsers" => array("titane", "fer", "hydrogene", "cuivre"),
				"correct_awnser" => "hydrogene"
		],
		[ "question" => "Quelle substance produisent les abeilles ?",
				"awnsers" => array("eau", "miel", "pollen", "feu"),
				"correct_awnser" => "miel"
		],
		[ "question" => "Combien de bandes il y a-t-il dans le drapeau américain?",
				"awnsers" => array("13", "34", "12", "42"),
				"correct_awnser" => "13"
		]
);
$info = $questions[$_SESSION["question_id"]];
if($choix == $info["correct_awnser"]){
	$_SESSION["score"]++;
}
?>

<div class="info_box">
	<p> Bonjour, <?php echo htmlspecialchars($_SESSION["name"]); ?>: <?php echo $_SESSION["score"]; ?>pts. </p>
	<div class="info_title">
		<p><?php echo $info["question"]; ?></p>
	</div>
	<?php
	if(isset($choix)){
		?>
		<div class="info_list">
			<?php
			foreach($info["awnsers"] as $a){
				?>
				<div class="info">
					<?php
					if($a == $info["correct_awnser"]){
						?>
						<span class="green">
							<?php echo "✔"; ?>
						</span>
						<?php 
					}else{
						?>
						<span class="red">
							<?php echo "✗"; ?>
						</span>
						<?php
					}
					?>
					<span> <?php echo $a; ?> </span>
				</div>
				<?php
			}
			?>
		</div>
		<div class="info_title">
			<?php
			if($choix == $info["correct_awnser"]){
				echo "Bravo !";
			}else{
				echo "Mauvaise réponse! Désolé. La bonne raiponse est: ".$info["correct_awnser"];
			}
			$_SESSION["question_id"]++;
			?>
		</div>
		<form action="../view/question.php" method="post">
			<div class="buttons">
				<button type="submit"> Question suivante </button>
			</div>
		</form>
		<?php
	}else{
		?>
		<form action="../view/question.php" method="post">
			<div class="info_list">
				<?php
				foreach($info["awnsers"] as $a){
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
			if(! isset($choix)){
				?>
				<div class="buttons">
					<button type="submit">Envoyer la raiponse</button>
				</div>
				<?php 
			}
			?>
		</form>
		<?php
	}
	?>
	<form action="../public/index.php" method="post">
		<div class="buttons">
			<button type="submit"> Main Menu </button>
		</div>
	</form>
</div>
</body>
</html>
