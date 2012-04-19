<div id="container">
<?php
	if(isset($_POST['submitted'])) {
		//echo 'Thanks! You should receive a download link to the provided email shortly.';

		//general errors array
		$errors = array();

		//validate name
		if(!empty($_POST['name'])) {
			$name = trim($_POST['name']);
		} else {
			$errors[] = "Please enter your name!";
		}

		//validate email
		if(!empty($_POST['email'])) {
			if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email'])) {
				$email = trim($_POST['email']);
			} else {
				$errors[] = "The email address you entered is not a valid email!.";
			}
		} else {
			$errors[] = "Please enter a valid email address!";
		}
		
		//validate cc
		if (isset($_REQUEST['CC'])) {
			$CC = ($_REQUEST['CC']);
		} else {
			$CC= NULL;
		}



		//if no errors, insert into db
		if(empty($errors)) {
			
			//mail the damn thing
			$message = $_POST['message'];
			$subject = $_POST['subject'];
			$headers = 'From: ' . $email  . "\r\n";
			
			if(isset($_POST['CC'])){
				$headers .= "Cc: $email" . "\r\n";
			} 
			
			$headers .= 'Reply-To: ' . $email . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			if(mail('anthonybui@gmail.com', $subject, $message, $headers)) {
				echo "An email with a download link has been sent to $email.";
			} else {
				$errors[] = "Mail send error! Please try again!";
			}
		} 

		//display errors if there are some
		if(!empty($errors)) {
			echo "<h2>Errors:</h2>";
			foreach($errors as $row) {
				echo "-$row<br/>";
			}
		}


	} //end SUBMITTED IF
	
	


?>
</div>