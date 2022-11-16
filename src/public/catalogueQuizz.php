<?php
require_once '../public/template.php';

session_start();
extract($_POST);

$category = array(
    ["CategoryId" => 0, "CategoryName" => "AnyCategory", "CategoryImg" => "question-mark.png"],
    ["CategoryId" => 9, "CategoryName" => "General Knowledge", "CategoryImg" => "book.png"],
    ["CategoryId" => 10, "CategoryName" => "Entertainment : Books", "CategoryImg" => "livre.png"],
    ["CategoryId" => 11, "CategoryName" => "Entertainment : Films", "CategoryImg" => "camera-video.png"],
    ["CategoryId" => 12, "CategoryName" => "Entertainment : Musics", "CategoryImg" => "musical-notes.png"],
    ["CategoryId" => 13, "CategoryName" => "Entertainment : Musicals & Theatres", "CategoryImg" => "theatre.png"],
    ["CategoryId" => 14, "CategoryName" => "Entertainment : Television", "CategoryImg" => "television.png"],
    ["CategoryId" => 15, "CategoryName" => "Entertainment : Video Games", "CategoryImg" => "joystick.png"],
    ["CategoryId" => 16, "CategoryName" => "Entertainment : Boards Games", "CategoryImg" => "board-game.png"],
    ["CategoryId" => 17, "CategoryName" => "Science & Nature", "CategoryImg" => "science.png"],
    ["CategoryId" => 18, "CategoryName" => "Science : Computers", "CategoryImg" => "computer.png"],
    ["CategoryId" => 19, "CategoryName" => "Science : Mathematics", "CategoryImg" => "mathematics.png"],
    ["CategoryId" => 20, "CategoryName" => "Mythology", "CategoryImg" => "zeus.png"],
    ["CategoryId" => 21, "CategoryName" => "Sports", "CategoryImg" => "sports.png"],
    ["CategoryId" => 22, "CategoryName" => "Geography", "CategoryImg" => "earth-globe.png"],
    ["CategoryId" => 23, "CategoryName" => "History", "CategoryImg" => "history.png"],
    ["CategoryId" => 24, "CategoryName" => "Politics", "CategoryImg" => "politics.png"],
    ["CategoryId" => 25, "CategoryName" => "Art", "CategoryImg" => "paint-palette.png"],
    ["CategoryId" => 26, "CategoryName" => "Celebreties", "CategoryImg" => "magazine.png"],
    ["CategoryId" => 27, "CategoryName" => "Animals", "CategoryImg" => "livestock.png"],
    ["CategoryId" => 28, "CategoryName" => "Vehicles", "CategoryImg" => "vehicle.png"],
    ["CategoryId" => 29, "CategoryName" => "Entertainment : Comics", "CategoryImg" => "comic.png"],
    ["CategoryId" => 30, "CategoryName" => "Science : Gadgets", "CategoryImg" => "smart-watch.png"],
    ["CategoryId" => 31, "CategoryName" => "Entertainment : Japanese Anime & Manga", "CategoryImg" => "ghost.png"],
    ["CategoryId" => 32, "CategoryName" => "Entertainment : Cartoon & Animations", "CategoryImg" => "leonardo.png"],
);

loadView('catalogueQuizz', array('catalogueQuizz') , array( "name" => $name, "category" => $category));
?>