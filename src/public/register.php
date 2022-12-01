<?php
require_once '../models/Session.php';
require_once '../models/Template.php';
Session::redirectLog();
Template::loadview('register', array('login'), NULL);
