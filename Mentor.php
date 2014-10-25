<?php

/*
Mentor class
Team 14
User superclass
Derives mentor, mentee, teacher, administrator from this general class
Code for Good Challenge (NY) 2014
*/

include('User.php');

class Mentor extends User {
	
	public $points;
	// .....
	
	// Constructor for Mentor object
	public function __construct($points) {   
	
        $this->points = $points;
		
    } // End of Mentor constructor
	
	public function __deconstruct() {
	
	}

?>