<?php

// MAILJEY
// require_once(__DIR__ . '/vendor/autoload.php');

require_once '../models/Template.php';
Template::loadview('contact', array('contact'), NULL);


use \Mailjet\Resources;

define('API_PUBLIC_KEY', 'bfedee816cadab8b91ef9651829a1016');
define('API_PRIVATE_KEY', 'ecb4d118674ada859e5bf01f1b00f729');
$mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY, true, ['version' => 'v3.1']);

if (
	!empty($_POST['name'])
	// && !empty($_POST['number'])
	&& !empty($_POST['email'])
	&& !empty($_POST['subject'])
	&& !empty($_POST['message'])
) {
	$name = htmlspecialchars($_POST['name']);
	$subject = htmlspecialchars($_POST['subject']);
	$number = htmlspecialchars($_POST['number']);
	$email = htmlspecialchars($_POST['email']);
	$message = htmlspecialchars($_POST['message']);

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$body = [
			'Messages' => [
				[
					'From' => [
						'Email' => "okwizzmail@gmail.com",
						'Name' => "O'kwizz"
					],
					'To' => [
						[
							'Email' => "okwizzmail@gmail.com",
							'Name' => "O'kwizz"
						]
					],
					'Subject' => "TEST",
					'TextPart' => "email : $email,\nnumber : $number,\nsubject $subject,\nmessage: $message",
					// 'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
					// 'CustomID' => "AppGettingStartedTest"
				]
			]
		];
		$response = $mj->post(Resources::$Email, ['body' => $body]);
		$response->success();
		// echo "Email envoyé avec succès !";
		$info = "Message successfully sent";
		$color = "green";
	} else {
		//si elles sont vides
		$info = "please fill in all fields ";
		$color = "red";
	}
} else {
	header('Location:contact.php');
	die();
}
