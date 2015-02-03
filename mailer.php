<?php 
//check $_POST
if($_SERVER['REQUEST_METHOD'] == "POST"){
	//Get and sanitize $_POST values
	$name = strip_tags(trim($_POST['name']));
	$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
	$message = trim($_POST['message']);
	$recipient = $_POST['recipient'];
	$subject = $_POST['subject'];

	//simple validation
	if(empty($name) OR empty($message) OR empty($email)) {
		//set a 400 (bad request) response code ande exit
		http_response_code(400);
		echo "Pleaase check your form fields";
		exit;
	}

	//Build Message
	$message = "Name: $name\n";
	$message .= "Email: $email\n\n";
	$message .= "Message: \n$message\n";

	//Build headers
	$headers = "From: $name <$email>";

	//Send Email
	if(mail($recipient, $subject, $message, $headers)){
		//Set 200 response (success)
		http_response_code(200);
		echo "Thank you: Your message has been sent";
	} else {
		//set 500 response (internal server error)
		http_response_code(500);
		echo "Error: There was problem sending your mail";
	}

} else {
	//set 403 response (forbidden)
	http_response_code(403);
	echo 'There was a problem with your submission, please try again.';
}


?>