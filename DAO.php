<?php

/*
Data Access Object -- Low Level Functionality 
Team 14
Code for Good Challenge (NY) 2014
*/

include 'Score.php';
include 'User.php';
include 'Curriculum.php';

/*
Class to access the database and handle all low-level functions.
/This should not be accessed by anything other than the high-level functions.
*/
class DAO {
    
	// Private vars for DB access.
    private $dbhandle;
	private $hostname = "projects.mberlove.com";
	private $database = "cfgimentor";
	private $user = "imentoruser";
	private $pass = "imentorpass";
    
    function __construct() {        
    }

    function __destruct() {
    }

	// Get a handle to the database for performing actions.
    private function getDBConnection() {
	
		$dbhandle = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database . ';charset=utf8', $this->user, $this->pass);
        return $dbhandle;
		
    } // End of getDBConnection()

	
	
	
	/*******************
	METHODS FOR SCORE
	*******************/
	
	// Get the complete record for a score and return a Score object
	public function getScoreById($id) {
	
		// Attempt to get a Score record for this ID.
		try {
			$dbhandle = $this->getDBConnection();
			$stmt = $dbhandle->prepare("SELECT S_score, S_date FROM Score WHERE S_id=?");
			$stmt->bindValue(1, $id, PDO::PARAM_INT);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
				return new Score($id, $row['S_Score'], $row['S_date']);
			}
		}
		catch (PDOException $e) {
			return "Failed to retrieve score: " . $e->getMessage();
		}
	
	} // End of getScoreById()
	
	
	// Add a new score to the database
	public function addScore($score, $date) {

		try {
			$dbhandle = $this->getDBConnection();
			$stmt = $dbhandle->prepare("INSERT INTO Score VALUES('',?,?)");
			$stmt->bindValue(1, $score, PDO::PARAM_INT);
			$stmt->bindValue(2, $date, PDO::PARAM_STR);
			$stmt->execute();
			
		}
		catch (PDOException $e) {
			return "Failed to add score: " . $e->getMessage();
		}
		
	} // End of addScore()
	
	// Get the complete record for all scores and return an array of score objects
	// Ideally this should be called infrequently at best.
	public function getAllScores() { 
	
		try {
			$dbhandle = $this->getDBConnection();
			$scores = array();
			$stmt = $dbhandle->prepare("SELECT * FROM Score");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
				$scores[] = new Score($row['S_id'], $row['S_score'], $row['S_date']);
			}
			return $scores; 
		}
		catch (PDOException $e) {
			return "Failed to retrieve scores: " . $e->getMessage();
		}
		
	} // End of getAllScores()
	
	
	
	
	/*******************
	METHODS FOR CURRICULUM
	*******************/
	
	// Get the complete record for a Curriculum and return a Curriculum object
	public function getCurriculumById($id) {
	
		// Attempt to get a Curriculum record for this ID.
		try {
			$dbhandle = $this->getDBConnection();
			$stmt = $dbhandle->prepare("SELECT C_text, C_name FROM Curriculum WHERE C_id=?");
			$stmt->bindValue(1, $id, PDO::PARAM_INT);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
				return new Curriculum($id, $row['C_text'], $row['C_name']);
			}
		}
		catch (PDOException $e) {
			return "Failed to retrieve Curriculum: " . $e->getMessage();
		}
	
	} // End of getCurriculumById()
	
	
	// Add a new Curriculum to the database
	public function addCurriculum($text, $name) {

		try {
			$dbhandle = $this->getDBConnection();
			$stmt = $dbhandle->prepare("INSERT INTO Curriculum VALUES('',?,?)");
			$stmt->bindValue(1, $text, PDO::PARAM_STR);
			$stmt->bindValue(2, $name, PDO::PARAM_STR);
			$stmt->execute();
			
		}
		catch (PDOException $e) {
			return "Failed to add Curriculum: " . $e->getMessage();
		}
		
	} // End of addCurriculum()
	
	// Get the complete record for all Curricula and return an array of Curriculum objects
	// Ideally this should be called infrequently at best.
	public function getAllCurricula() { 
	
		try {
			$dbhandle = $this->getDBConnection();
			$Curricula = array();
			$stmt = $dbhandle->prepare("SELECT * FROM Curriculum");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
				$Curricula[] = new Curriculum($row['C_id'], $row['C_text'], $row['C_name']);
			}
			return $Curricula; 
		}
		catch (PDOException $e) {
			return "Failed to retrieve Curriculums: " . $e->getMessage();
		}
		
	} // End of getAllCurricula()
    
} // End of DAO

?>
