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
<h1>View / Compare Curriculum</h1><br />
<div id="email"></div>
<div id="curriculum">
<?php
echo $_GET['name'] . "<br />";
echo $_GET['text'] . "<br />";
?>
</div>
</form>
</body>
</html>