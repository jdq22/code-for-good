<?php

/*
Curriculum Controller
Team 14
Code for Good Challenge (NY) 2014
*/

include 'DAO.php';

// Provide high-level functions for curricula.
class Curriculum_Controller {
    
    public function __construct() {
    }

	// Add a new curriculum to the database.
    public function addCurriculum($text, $name) {
	
		// Don't let through empty values.
		if ($text == "" || $text == NULL) {
			return "Text field was empty.";
		}
		if ($name == "" || $name == NULL) {
			return "Name field was empty.";
		}
		
		// Add to database via DAO
        $dao = new DAO();
        $result = $dao->addCurriculum($text, $name);
        return $result;
		
    } // End of addCurriculum()
	
	// Returns array version of an individual Curriculum object to display.
    public function getCurriculum($id) {
	
        $dao = new DAO();
        $result = $dao->getCurriculumById($id);
        if (!$result instanceof Curriculum) {
            return $result;
        }
		$array =  ["id" => $id, "text" => $result->text, "name" => $result->name,];
        return $array;
		
    } // End of getCurriculum()
	
	// Returns array versions of all Curricula objects to display.
    public function getAllCurricula() {
	
        $dao = new DAO();
		$array = array();
        $result = $dao->getAllCurricula();
		foreach ($result as $r) {
			if (!$r instanceof Curriculum) {
				return $r;
			}
			$array[] =  ["id" => $r->id, "text" => $r->text, "name" => $r->name,];
		}
		return $array;
		
    } // End of getCurricula()

} // End of Curriculum_Controller class

?>