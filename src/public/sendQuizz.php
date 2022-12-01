<?php
require_once '../models/Session.php';
require_once '../models/Template.php';

Session::redirectUnLog();
Template::loadview('sendQuizz', array('sendQuizz'), NULL);
