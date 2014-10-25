<?php

/*
User superclass
Team 14
Derives mentor, mentee, teacher, administrator from this general class
Code for Good Challenge (NY) 2014
*/

class User {
	
	public $id;
	public $name;
	// .....
	
	// Constructor for User object
	public function __construct($id, $name) {   
	
        $this->id = $id;
        $this->name = $name;
		
    } // End of User constructor
	
	public function __deconstruct() {
	
	}
	
}

?>