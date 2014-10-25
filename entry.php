<?php 

session_start();
require_once "Score_Handler.php";
?>

<!DOCTYPE html>
<html>
<head>
        <script src="jquery-1.11.1.min.js"></script>
        <script src="control.js"></script>
		<meta charset="UTF-8">
</head>
<body>
<div id="curricula-list">
<h2>All Curricula</h2>
<h3>Select a curriculum to bring its full text up.</h3>
</div> <!-- End of curricula-list -->
<div id="curricula-display"></div>
<form name="addScoreForm">
<select id="scoreScoreField" name="scoreScoreField">
<option value="1">1/5</option>
<option value="2">2/5</option>
<option value="3">3/5</option>
<option value="4">4/5</option>
<option value="5">5/5</option>
</select>
<input type="text" id="scoreDateField" name="scoreDateField" placeholder="Score Date" />
<button id="addScoreSubmit">Add Score</button>
</form>

<div id="scoreDisplay">

</div>
</body>
</html>