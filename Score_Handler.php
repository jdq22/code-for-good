<?php

/*
Score Handler

This is a fake view, to give an example of how the API can be used.
The physical page and JS are defined respectively in entry.php and control.js.

Team 14
Code for Good Challenge (NY) 2014
*/

include 'Score_Controller.php';

if (!empty($_GET['scoreIdField']) && $_GET['scoreIdField'] != "" && $_GET['scoreIdField'] != NULL) {

	$sc = new Score_Controller();
	echo $sc->getScore($_POST['ScoreId']);
	
}
else if (!empty($_GET['getAll']) && $_GET['getAll'] != "" && $_GET['getAll'] != NULL) {

	$sc = new Score_Controller();
	$obj = $sc->getAllScores();
	echo "<h2>Recently Recorded Scores</h2><table><tr><th>Score</th><th>Date</th></tr>";
	foreach ($obj as $o) {
		echo "<tr><td>" . $o['score'] . "</td><td>" . $o['date'] . "</td><td></tr>";
	}
	echo "</table>";
	
}
else if (!empty($_GET['scoreDateField']) && !empty($_GET['scoreScoreField']) && $_GET['scoreDateField'] != "" && $_GET['scoreScoreField'] != "" && $_GET['scoreScoreField'] != NULL && $_GET['scoreDateField'] != NULL) {
	
	$sc = new Score_Controller();
	echo $sc->addScore($_GET['scoreScoreField'], $_GET['scoreDateField']);
	
}

?>