<?php
require_once '../public/template.php';
require_once '../models/quizzManager.php';

session_start();
extract($_POST);

if (!isset($category)) {
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
        ["CategoryId" => -1, "CategoryName" => "Community Quizz", "CategoryImg" => "community.png"],
    );
    if (empty($name)) {
        loadView('catalogueQuizz', array('catalogueQuizz'), array("category" => $category));
    } else {
        loadView('catalogueQuizz', array('catalogueQuizz'), array("name" => $name, "category" => $category));
    }
} else {
    if ($category != -1) {
        $difficulte = array(
            ["DifficulteName" => "any difficulty", "DifficulteImg" => "question-mark.png"],
            ["DifficulteName" => "easy", "DifficulteImg" => "thumbs-up.png"],
            ["DifficulteName" => "medium", "DifficulteImg" => "chilli.png"],
            ["DifficulteName" => "hard", "DifficulteImg" => "hard.png"]
        );
        loadView('difficulteQuizz', array('difficulteQuizz'), array("name" => $name, "category" => $category, "difficulte" => $difficulte));
    } else {
        // $quizz_test = new Quizz("Quizz Test", "willy", "0");
        // $question = new Question("caca pipi ?", "caca", ["pipi", "popo", "toilet"]);
        // $quizz_test->addQuestion($question);
        // $quizz_test->addQuestion($question);
        // $quizz_test->addQuestion($question);
        // $quizz_test->addQuestion($question);
        // $quizz_test->addQuestion($question);
        // QuizzManager::addQuizz($quizz_test);
        // $quizz_test = new Quizz("Quizz Test 2", "Willy", "2");
        // $question2 = new Question("best manga ?", "berserk", ["naruto", "one piece", "death note"]);
        // $quizz_test->addQuestion($question2);
        // $quizz_test->addQuestion($question);
        // $quizz_test->addQuestion($question2);
        // $quizz_test->addQuestion($question);
        // $quizz_test->addQuestion($question2);
        // QuizzManager::addQuizz($quizz_test);
        $quizz_list = QuizzManager::listQuizz();
        loadView('communityQuizz', array('communityQuizz'), array("name" => $name, "category" => $category, "quizzList" => $quizz_list));
    }
}
