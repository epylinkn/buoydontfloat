<div id="middle">
<div class="wrapper clearfloat">

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-home') ) : ?>

<?php include (TEMPLATEPATH . "/tag-cloud.php"); ?>

<?php include (TEMPLATEPATH . "/recent-comments.php"); ?>


<?php endif; ?>


<?php 
//Contact script created by Tim McDaniels and Darren Hoyt for the Mimbo Pro and Agregado themes
//May be re-used with credits intact

if($_REQUEST['submit']): ?>

<?php
		$admin_email = get_settings( "contact_email" );
		$admin_subject = get_settings( "contact_subject" );
		$admin_success = get_settings( "contact_success" );
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . $admin_email . "\r\n";
		$body = "<blockquote>
	Name: " . $_REQUEST['Name'] . "<br/>
	Email: " . $_REQUEST['Email'] . "<br/>
	Message:<br/>" . $_REQUEST['Message'] . "<br/>
	<hr/>
	Remote Address: " . $_SERVER['REMOTE_ADDR'] . "<br/>
	Browser: " . $_SERVER['HTTP_USER_AGENT'] . "
	<hr/>
	</blockquote>";
                mail ($admin_email, $admin_subject, $body, $headers);
?>

<?php endif; ?>
	
	<form onsubmit="return(submitContactForm(this));" id="contactform" action="">
    
		

		<h3>Get <em>in</em> Touch</h3>
		<fieldset>
			<legend>Contact</legend>
			<label for="user-name">Your Name</label>
			<input type="text" id="user-name" name="Name" class="field" title="Enter name here" />
			<label for="user-email">Your Email</label>
			<input type="text" id="user-email" name="Email" class="field" title="Enter email address here" />
			<label for="user-comment">Your Message</label>
			<textarea id="user-comment" name="Message" class="field" cols="" rows="" title="Enter comments here"></textarea>
			<input type="hidden" name="submit" value="1" />
			<input type="submit" value="Submit&raquo;" id="submit" class="button" />
		</fieldset>

	</form>

</div><!--END WRAPPER-->
</div><!--END MIDDLE-->