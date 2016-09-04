<?php
#To display Error if any on php file
/*ini_set('display_errors',1);*/

#Creating a Session to Access Logined User Details.

session_start();

#Storing value in local variable from Session variable.
$aadhar_no=$_SESSION["user"];


#Connecting Mongodb
$connection = new MongoClient();


#connecting to our database.
$db=$connection->OVS;

#Connection to Aadhar Collection.
$collection=$db->aadhar_info;


#Connection to User Collection.
$collection1=$db->user_login;

#Connection to Political Parties Collection.
$collection2=$db->Political_Parties;

#To store the vote for party. 
$Voted_Party=$_POST["Voted_Party"];



#Updating the party vote count.
$collection2->update(array("Abbrevation"=>$Voted_Party),array('$inc'=>array('Votes'=>1)));


#updating the User status of voted or not.
$collection1->update(array("_aadhar_no" => $aadhar_no),array('$set'=>array('status' =>"YES")));


            	$search=$collection->find();
            	foreach ($search as $document )
            	 {
            		if($_SESSION["user"]==$document["_aadhar_no"])
            			$user=$document["Name"];
            	}

echo "<script type='text/javascript'> alert('$user Voted !!'); location='result_check.php';</script>";
		


?>