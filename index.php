<?php 
//include_once("Modele/FonctionsManipBD.php");
include_once("Modele/ClassesDeBase.php");
include_once("Vue/Affichage.php");

affficheSuite();

$OnSubmitForm = isset($_POST['btEnvoyer']);
if($OnSubmitForm){
	$debut = $_POST['iStart'];
	$fin = $_POST['iStop'];
	$type = $_POST['type'];
	if($type == 1){
		$suiteFibonacci = new SuiteFibonacci($debut, $fin, $type);
		$suiteFibonacci->getSuite();
		$suiteFibonacci->toDatabase();
	}
	else if($type == 2){
		$suiteConway = new SuiteConway($debut, $fin, $type);
		$suiteConway->getSuite();
		$suiteConway->toDatabase();
	}
}

