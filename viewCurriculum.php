<?php 

session_start();
require_once "Curriculum_Handler.php";

?>

<!DOCTYPE html>
<html>
<head>
        <script src="jquery-1.11.1.min.js"></script>
		<meta charset="UTF-8">
		<script>
				$("#compareTextButton").click(function() {
					$.get("process.php")});
		</script>
		<style>
			.curName {	
				padding: 12px 0px;
				font-weight: bold;
			}
			.curText {
				margin-bottom: 18px;
				width: 50%;
			}
		</style>
		  <link type="text/css" rel="stylesheet" media="all" href="./iMentor_files/code_for_good.css">
<link type="text/css" rel="stylesheet" media="all" href="./iMentor_files/layout.css">
  <link type="text/css" rel="stylesheet" media="all" href="./iMentor_files/volunteering.css">
		
</head>
<body>
<h1>View / Compare Curriculum</h1><br />
<div id="email"></div>
<div id="curriculum">
<?php
if (!empty($_GET['name']) && !empty($_GET['text'])) {

echo "<div class=\"curName\">" . $_GET['name'] . "</div><br />";
echo "<div class=\"curText\">" . $_GET['text'] . "</div><br />";

}
?>
</div>
<form name="compare" action="process.php" method="get">
<input type="hidden" name="compareCurField" id="compareCurField" value="<?php echo $_GET['text'] ?>" />
<textarea  name="compareTextField" id="compareTextField"></textarea>
<br /><button id="compareTextButton" name="compareTextButton">Score this Text</button>
<input type="submit" value="Score this Text" />
</form>
</form>
</body>
</html>