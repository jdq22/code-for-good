<?php 

session_start();
require_once "Curriculum_Handler.php";
?>

<!DOCTYPE html>
<html>
<head>
        <script src="jquery-1.11.1.min.js"></script>
        <script src="control.js"></script>
		<meta charset="UTF-8">
</head>
<body>
<h1>Add a New Curriculum</h1><br />
<form name="addCurriculumForm">
<input type="text" id="curNameField" name="curNameField" placeholder="Curriculum Name" /><br />
<textarea id="curTextField" name="curTextField"></textarea><br />
<button id="addCurriculumSubmit">Add Curriculum</button>
</form>
</body>
</html>