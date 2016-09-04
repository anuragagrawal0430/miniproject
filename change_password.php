<?php

session_start();

#Connecting Mongodb
$connection = new MongoClient();

#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;

#Connection to User Collection.
$collection1=$db->user_login;

#Connection to Political Parties.
$collection2=$db->Political_Parties;

$search=$collection1->find();

$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];

foreach ($search as $document) 
{
if($_SESSION['user']==$document["_aadhar_no"])
{
	if($document["password"]==$old_password)
	{
		$collection1->update(array("_aadhar_no" =>$_SESSION['user']),array('$set'=>array('password' =>$new_password)));
		echo "<script type='text/javascript'> alert('Password Updated'); location='index.php';</script>";
		die();
	}
	else{
		echo "<script type='text/javascript'> alert('Wrong Old Password'); location='index.php';</script>";
		die();
	}
}
}

?>

