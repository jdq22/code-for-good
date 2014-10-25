<?php

/*
Curriculum Handler

This is a fake view, to give an example of how the API can be used.
The physical page and JS are defined respectively in entry.php and control.js.

Team 14
Code for Good Challenge (NY) 2014
*/

include 'Curriculum_Controller.php';

if (!empty($_GET['getAll']) && $_GET['getAll'] != "" && $_GET['getAll'] != NULL) {

	$sc = new Curriculum_Controller();
	$obj = $sc->getAllCurricula();
	foreach ($obj as $o) {
		echo "<a href=\"viewCurriculum.php?id=" . $o['id'] . "&name=" . $o['name'] . "&text=" . $o['text'] . "\" class='curriculum' id='" . $o['id'] . "'>" . $o['name'] . "</a><br />";
	}
	
}
else if (!empty($_GET['getId'])) {

	$sc = new Curriculum_Controller();
	$obj = $sc->getCurriculum($_GET['getId']);
	foreach ($obj as $o) {
		echo $o['text'];
	}
	
}
else if (!empty($_GET['curNameField']) && !empty($_GET['curTextField']) && $_GET['curNameField'] != "" && $_GET['curTextField'] != "" && $_GET['curNameField'] != NULL && $_GET['cTextField'] != NULL) {
	
	$sc = new Curriculum_Controller();
	echo $sc->addCurriculum($_GET['curTextField'], $_GET['curNameField']);
	
}

?>