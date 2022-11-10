<?php 

function connexion() {
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=db_suite', 'root', '');
		return $bdd;
	} catch(EXCEPTION $ex){
		die("Erreur de connexion : ".$ex->getMessage());
	}
}

function getElementID($start, $stop){
	$bdd = connexion();
	$sql = "SELECT ID
			FROM suite_math
			WHERE iStart=".$start." AND iStop:=".$stop;
	$reponse = $bdd->query($sql);
	$donnees = $reponse->fetchAll();
	return $donnees;
}

function insertion($debut, $fin, $suite) : void
{
	$bdd = connexion();
	$sql = "INSERT INTO suite_math(iStart, iStop, str_suite)
			VALUES(?, ?, ?)";
	$req = $bdd->prepare($sql);
	$req->execute(array($debut, $fin, $suite));
	echo "Insertion reussie !!!!!!";
}

function miseAjour($id, $debut, $fin, $suite) : void
{
	$bdd = connexion();
	$sql = "UPDATE (iStart, iStop, str_suite)
			SET(:d, :f, :s)
			WHERE ID =".$id;
	$req = $bdd->prepare($sql);
	$req->execute(array("d"=>$debut, "f"=>$fin, "s"=>$suite));
	echo "MAJ reussie !!!!!!";
}

function affficheSuite()
{
	$bdd = connexion();
	$sql = "SELECT *
			FROM suite_math 
			INNER JOIN type_suite
			ON suite_math.ref_typeSuite=type_suite.ID";
	$reponse = $bdd->query($sql);
	while($value = $reponse->fetch())
	{
		
			echo $value['ID']." ".$value['iStart']." ".$value['iStop']." ".$value['str_suite']." ".$value['nom']." ".$value['formule']." ".$value['description']."</br>";
		
	}
}