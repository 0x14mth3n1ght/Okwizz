<?php
require_once '../models/Session.php';
require_once '../models/Utils.php';
Session::doUnLog();
Utils::redirect();
