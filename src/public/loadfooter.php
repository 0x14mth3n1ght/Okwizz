<?php
require_once '../models/Utils.php';
require_once '../models/Template.php';

$footer = Utils::getOrRedirect($_GET, "footer_page");

$footers = [
	"about_us",
	"our_services",
	"privacy_policy",
	"legal_notice",
	"faq",
	"an_error",
	"payment_option",
	"quizz_kesako",
	"quizz_competition"
];

if (!in_array($footer, $footers, true))
	Utils::redirect();

Template::loadView("footer_pages/" . $footer, array(), null);
