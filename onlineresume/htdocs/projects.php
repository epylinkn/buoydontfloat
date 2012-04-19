<?php
$title = "Anthony Bui: Projects";
$bodyid = "projects";
include_once('includes/header.html');
?>

<!-- PAGE SPECIFIC CONTENT STARTS HERE (THIS IS REALLY ONLY THE LEFT SIDE AS SIDEBAR IS STATIC)-->
<div id="content" name="content" class="bgblack_text_200" style="position:absolute;top: 0;left: 0;"></div>

<div id="content_left" name="content_left" style="position: relative; top:20px; padding: 10px 20px 10px 30px;">
<h2>Projects</h2>




<table id="background-image" summary="Course info">
    <thead>
        <tr>
            <th scope="col" width="20%">Date</th>
            <th scope="col" width="20%">Category</th>
            <th scope="col" width="60%">Title</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="3">Click on a course to see description...</td>
        </tr>
    </tfoot>
    <tbody>

		<?php
		//generate course info
			//connect to db
			include('../mysqli_connect.php');

			//query all projects and organize by date
			$sql = "SELECT * FROM projects ORDER BY date DESC";

			$result = mysqli_query($dbc, $sql);


			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			 {
				echo "<tr onmouseover=\"this.style.cursor='pointer'\" onclick=\"showInfo(" . $row['project_id'] . ")\">";
				echo "<td>" . $row['date'] . "</td>";
				echo "<td>" . $row['category'] . "</td>";
				echo "<td>" . $row['title'] . "</td>";
				echo "</tr>";
			 }


			mysqli_close($dbc);
		


		?>
    </tbody>
</table>




</div>


<!-- PAGE SPECIFIC CONTENT ENDS HERE -->
<?php
include_once('includes/sidebar.php');
include_once('includes/footer.html');
?>
