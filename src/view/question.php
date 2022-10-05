<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../view/stylesheet.css">
</head>
<body>

<?php
session_start();
extract($_POST);
if(isset($name)){
	$_SESSION["name"] = $name;
	$_SESSION["question_id"] = 0;
}
$questions = array(
		[ "question" => "Combien de jours il y a-t-il dans une semaine?",
				"awnsers" => array("7", "4", "1", "8"),
				"correct_awnser" => "7"
		],
		[ "question" => "Combien de jours il y a-t-il dans une année?",
				"awnsers" => array("245", "365", "456", "0"),
				"correct_awnser" => "365"
		],
		[ "question" => "Combien de semaines il y a-t-il dans une année ?",
				"awnsers" => array("52", "67", "34", "89"),
				"correct_awnser" => "52"
		],
		[ "question" => "De quelle couleur est le ciel ?",
				"awnsers" => array("bleu", "rouge", "vert", "jaune"),
				"correct_awnser" => "blue"
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
?>

Bonjour, <?php echo htmlspecialchars($_SESSION["name"]); ?>

<?php 
	$info = $questions[$_SESSION["question_id"]];
?>
<p><?php echo $info["question"]; ?></p>
<div class="AnswerPanel">
	<form action="../view/question.php" method="post">
		<?php
		foreach($info["awnsers"] as $a){
			print_r($a);
			?>
			<input type="radio" id="consomateur" name="choix" value="<?php echo $a?>" <?php echo $a?> required>
			<br>
			<?php
		}
		?>
		<?php 
		if(! isset($choix)){
			?>
			<button type="submit">Envoyer la raiponse</button>
			<?php 
		}
		?>
	</form>
</div>
<?php 
if(isset($choix)){
	$info = $questions[$_SESSION["question_id"]];
	if($choix == $info["correct_awnser"]){
		echo "Bravo !";
	}else{
		echo "Mauvaise réponse! Désolé. La bonne raiponse était: ".$info["correct_awnser"];
	}
	$_SESSION["question_id"]++;
	?>
	<form action="../view/question.php" method="post">
		<button type="submit"> => Question suivante </button>
	</form>
	<?php 
}
?>
<a class="button" href="../public/index.php">
	<strong>Main Menu</strong>
</a>

</body>
</html>
