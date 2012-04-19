<?php
//should be sticky...
//results of the submission:
	//email if everything checks out, form validation if have to



//email something here. (probably some hashed string with link and GET and match hash with db)
	
if(isset($_POST['submitted'])) {
	//echo 'Thanks! You should receive a download link to the provided email shortly.';
	echo 'hello';
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
	

	
	//if no errors, insert into db
	if(empty($errors)) {
		//now insert the info into the database
		include('../mysqli_connect.php');
		$q = "INSERT INTO cv_requests (name, email, linkcode) VALUES (?, ?, ?)";
		$r = mysqli_prepare($dbc, $q);
		mysqli_stmt_bind_param($r, 'sss', $name, $email, md5($name)); #s means bind the ? => string
		mysqli_stmt_execute($r);
		
		//confirm query results
		if(mysqli_stmt_affected_rows($r)==1)
		{
			//mail the damn thing
			$message = "Hi $name, thanks for requesting my curriculum vitae.  You can download it using this link: \n\n$link?id="
				. md5($name) . "\n\n I hope you are not a complete stranger and that I will hear from you soon! \n\nWarmest regards, Anthony";
			$subject = "Anthony Bui's Curriculum Vitae";
			$headers = 'From: anthonybui@gmail.com' . "\r\n" .
			    'Reply-To: anthonybui@gmail.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			if(mail($email, $subject, $message, $headers)) {
				echo "An email with a download link has been sent to $email.";
			} else {
				$errors[] = "Mail send error! Please try again!";
			}
		} else {
			$errors[] = "Database error! Sorry for the inconvenience. Please try again. (It might be a duplicate entry)";
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

Because I really should practice some precautions in displaying information about myself publicly, you'll have to provide a valid name and email.  You'll be sent a link to download my CV!

<form action="cv.php" method="post" enctype="multipart/form-data" name="CV_request" id="CV_request">
	
	<table border="0" cellspacing="10" cellpadding="15">
	<tr>
		<!-- name -->
		<td align="right"><label>Full name:</label></td>
		<td align="left"><input type="text" name="name" id="name" size="30" maxlength="60"><td>
	</tr>
	<tr>
		<!-- email -->
		<td align="right"><label>Email:</label></td>
		<td align="left"><input type="text" name="email" id="email" size="30" maxlength="60"></td>
	</tr>
	<tr>	
		<!-- SUBMIT -->
		<td></td>
		<td align="left"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
	
	<input type="hidden" name="submitted" value="TRUE">
</form>