<?php
//old script when course data and descriptions were in the database

$sql="SELECT * FROM course_info";

$result = mysql_query($sql);

echo "<table border=1>";

while($row = mysql_fetch_array($result))
 {
	  echo "<tr><td>Semester</td><td>" . $row['semester'] . "</td></tr>";
	  echo "<tr><td>Department</td><td>" . $row['department'] . "</td></tr>";
	  echo "<tr><td>Course</td><td>" . $row['course'] . "</td></tr>";
	  echo "<tr><td>Units</td><td>" . $row['units'] . "</td></tr>";
	  echo "<tr><td>Instructor</td><td>" . $row['instructor'] . "</td></tr>";
	  echo "<tr><td>Course Title</td><td>" . $row['title'] . "</td></tr>";
	  echo "<tr><td>Description</td><td>" . $row['description'] . "</td></tr>";
 }
echo "</table>";

mysql_close($dbc);
?>