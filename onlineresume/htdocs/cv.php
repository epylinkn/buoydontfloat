<?php
$title = "Anthony Bui: Request CV";
$bodyid = "cv";
include_once('includes/header.html');
?>

<!-- PAGE SPECIFIC CONTENT STARTS HERE (THIS IS REALLY ONLY THE LEFT SIDE AS SIDEBAR IS STATIC)-->

<div id="content" name="content" class="bgblack_text_200" style="position:absolute;top: 0;left: 0;"></div>

<div id="content_left" name="content_left" style="position: relative; top:20px; padding: 10px 20px 10px 30px;">
<h2>Request Curriculum Vitae</h2>

<?php
include_once('scripts/dspCVRequest.php');
?>

</div>


<!-- PAGE SPECIFIC CONTENT ENDS HERE -->
<?php
include_once('includes/sidebar.php');
include_once('includes/footer.html');
?>
