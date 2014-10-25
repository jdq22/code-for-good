<?php

/*
Score class
Team 14
Code for Good Challenge (NY) 2014
*/

class Score {
	
	public $id;
	public $score;
	public $date;
	// .....
	
	// Constructor for Score object
	public function __construct($id, $score, $date) {   
	
        $this->id = $id;
        $this->score = $score;
        $this->date = $date;
		
    } // End of Score constructor
	
	public function __deconstruct() {
	
	}

} // End of Score class

?>