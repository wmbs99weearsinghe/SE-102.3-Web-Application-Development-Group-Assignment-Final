<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "jnt123";
	$dbname = "ocean_hill";

	$salt = "f8d7b47b050733178502ed863c887d2c";
	
	function cleanInputs($dirtyInput){
		$cleanInput = trim($dirtyInput);
		$cleanInput = addslashes($cleanInput);
		return $cleanInput;
	}
	
	function validateText($textInput){
		if($textInput==""){
			return false;
		}
		else{
			if($textInput==NULL){
				return false;
			}
			else{
				return true;
			}
		}
	}
	
	
?>