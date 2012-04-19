<div id="container">

<form  action="contact_handler.php" method="post" enctype="multipart/form-data" name="contact_form" id="contact_form">
	
	<table border="0" cellspacing="0" cellpadding="5">
	<tr>
		<!-- name -->
		<td align="right"><label>Name:</label></td>
		<td align="left"><input type="text" name="name" id="name" size="20" maxlength="60"><td>
	</tr>
	<tr>
		<!-- email -->
		<td align="right"><label>Email:</label></td>
		<td align="left"><input type="text" name="email" id="email" size="20" maxlength="60"></td>
	</tr>
	<tr>
		<!-- subject -->
		<td align="right"><label>Subject:</label></td>
		<td align="left"><input type="text" name="subject" id="subject" size="50" maxlength="180"></td>
	</tr>
	<tr>
		<!-- message -->
		<td align="right"><label>Message:</label></td>
		<td align="left"><textarea name="message" id="message" rows="5" cols="48"></textarea></td>
	</tr>
	<tr>	
		<!-- SUBMIT -->
		<td align="right"></td>
		<td align="left"><input type="submit" name="submit" value="Submit"></td>
	</tr>
	<tr>
		<td align="right"><input id="CC" name="CC" type="checkbox" value="" /></td>
		<td align="left"><label for="CC">Send A Copy To Me</label> </td>
		
	
	</tr>
	
	</table>
	<input type="hidden" name="submitted" value="TRUE">
</form>

</div>