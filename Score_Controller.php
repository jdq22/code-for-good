<?php

/*
Score Controller
Team 14
Code for Good Challenge (NY) 2014
*/

include 'DAO.php';

// Provide high-level functions for scores.
class Score_Controller {
    
    public function __construct() {
    }

	// Assume the date coming in from the view is a string from the JQuery datepicker e.g. dd/mm/yyyy
    public function addScore($score, $date) {
	
		// Don't let through empty dates.
		if ($date == "" || $date == NULL) {
			return "Date was empty.";
		}
		
		// Convert date to MYSQL format.
		if (($timestamp = strtotime($date)) === false) {
			echo "Failed due to bad date.";
		}
		$sqldate = date('Y-m-d H:i:s', $timestamp);
		
		// Add to database via DAO
        $dao = new DAO();
        $result = $dao->addScore($score, $sqldate);
        return $result;
		
    } // End of addScore()
	
	// Returns array version of an individual Score object to display.
    public function getScore($id) {
	
        $dao = new DAO();
        $result = $dao->getScoreById($id);
        if (!$result instanceof Score) {
            return $result;
        }
		$array =  ["id" => $result->id, "score" => $result->score, "date" => strtotime($result->date),];
        return $array;
		
    } // End of getScore()
	
	// Returns array versions of all Score objects to display.
    public function getAllScores() {
	
        $dao = new DAO();
        $result = $dao->getAllScores();
		foreach ($result as $r) {
			if (!$r instanceof Score) {
				return $r;
			}
			$array[] =  ["id" => $r->id, "score" => $r->score, "date" => strtotime($r->date),];
		}
		return $array;
		
    } // End of getAllScores()

} // End of Score_Controller class

?>