<?php
require_once 'template.php';
require_once '../models/userManager.php';
session_start();
$Reviews=UserManager::getAllUserReview();

if(isset($_SESSION["name"])){
        foreach($Reviews as $key => $value){
                if($value['pseudo'] == $_SESSION["name"]){
                        $id = $key;
                }
        }
        if(isset($id)){
                $vous = $Reviews[$id];
                unset($Reviews[$id]);
                $pseudo = $vous['pseudo'];
                $vous['pseudo'] = "Vous ($pseudo)";
                array_unshift($Reviews, $vous);
        }
}
   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$rating = $_POST["rating"];
	$comment = $_POST["comment"];
	UserManager::setReview($name, $rating, $comment);
}
loadview('review', array('review'),$Reviews);
?>
