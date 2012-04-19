<?php

//echo "<script>alert('hello');</script>";
$q=$_GET["q"];

include('../../mysqli_connect.php');

$sql="SELECT * FROM projects WHERE project_id = '".$q."'";

$result = mysqli_query($dbc, $sql);

echo "<table border=\"1\" cellspacing=\"0\" cellpadding=\"15\">";//why doesnt padding work?

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
 {
	  echo "<tr><td>Title</td><td>" . $row['title'] . "</td></tr>";
	  echo "<tr><td>Category</td><td>" . $row['category'] . "</td></tr>";
	  echo "<tr><td>Date</td><td>" . $row['date'] . "</td></tr>";
	  echo "<tr><td>Description</td><td>" . $row['description'] . "</td></tr>";
	if(!empty($row['attachments'])) {
	  echo "<tr><td>Download</td><td><a href='" . $row['downlink'] . "'>" . $row['namelink'] . "</a></td></tr>";	
	}
	
 }
echo "</table>";

?>