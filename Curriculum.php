<?php

/*
Curriculum class
Team 14
Code for Good Challenge (NY) 2014
*/

class Curriculum {
	
	public $id;
	public $text;
	public $name;
	// .....
	
	// Constructor for Curriculum object
	public function __construct($id, $text, $name) {   
	
        $this->id = $id;
        $this->score = $text;
        $this->date = $name;
		
    } // End of Curriculum constructor
	
	public function __deconstruct() {
	
	}

} // End of Curriculum class

?>